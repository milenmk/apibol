<?php
/* Copyright (C) 2005      Patrick Rouillon     <patrick@rouillon.net>
 * Copyright (C) 2005-2009 Destailleur Laurent  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2011-2015 Philippe Grand       <philippe.grand@atoo-net.com>
 * Copyright (C) 2017      Ferran Marcet       	 <fmarcet@2byte.es>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 *       \file       htdocs/compta/facture/contact.php
 *       \ingroup    facture
 *       \brief      Onglet de gestion des contacts des factures
 */

require '../../main.inc.php';
require_once DOL_DOCUMENT_ROOT . '/compta/facture/class/facture.class.php';
require_once DOL_DOCUMENT_ROOT . '/contact/class/contact.class.php';
require_once DOL_DOCUMENT_ROOT . '/core/class/discount.class.php';
require_once DOL_DOCUMENT_ROOT . '/core/lib/invoice.lib.php';
require_once DOL_DOCUMENT_ROOT . '/core/class/html.formcompany.class.php';
if (!empty($conf->projet->enabled)) {
    require_once DOL_DOCUMENT_ROOT . '/projet/class/project.class.php';
}

require_once "./class/class.setup.php"; //Зареждане на класа, въвеждащ данните на подателя от базата с данни
require_once "./class/class.xmlclient.php"; //Зареждане на класа генериращ заявката към Еконт

// Load translation files required by the page
$langs->loadLangs(array('bills', 'companies'));

$id     = (GETPOST('id') ? GETPOST('id', 'int') : GETPOST('facid', 'int')); // For backward compatibility
$ref    = GETPOST('ref', 'alpha');
$lineid = GETPOST('lineid', 'int');
$socid  = GETPOST('socid', 'int');
$action = GETPOST('action', 'aZ09');

// Security check
if ($user->socid) $socid = $user->socid;
$result = restrictedArea($user, 'facture', $id);

$object = new Facture($db);

/*
 * View
 */

$title = $langs->trans('InvoiceCustomer') . " - " . $langs->trans('EcontBol');
llxHeader('', $title);

$form = new Form($db);
$formcompany = new FormCompany($db);
$contactstatic = new Contact($db);
$userstatic = new User($db);

$eecont = new EcontSetup($db);
$eecont->selectSetUpRecord();

/* *************************************************************************** */
/*                                                                             */
/* View and edit mode                                                         */
/*                                                                             */
/* *************************************************************************** */

if ($id > 0 || !empty($ref)) {
    if ($object->fetch($id, $ref) > 0) {
        $object->fetch_thirdparty();
        $head = facture_prepare_head($object);
        $totalpaye = $object->getSommePaiement();
        print dol_get_fiche_head($head, 'econt', $langs->trans('InvoiceCustomer'), -1, 'bill');
        // Invoice content
        $linkback = '<a href="' . DOL_URL_ROOT . '/compta/facture/list.php?restore_lastsearch_values=1' . (!empty($socid) ? '&socid=' . $socid : '') . '">' . $langs->trans("BackToList") . '</a>';
        $morehtmlref = '<div class="refidno">';
        // Ref customer
        $morehtmlref .= $form->editfieldkey("RefCustomer", 'ref_client', $object->ref_client, $object, 0, 'string', '', 0, 1);
        $morehtmlref .= $form->editfieldval("RefCustomer", 'ref_client', $object->ref_client, $object, 0, 'string', '', null, null, '', 1);
        // Thirdparty
        $morehtmlref .= '<br>' . $langs->trans('ThirdParty') . ' : ' . $object->thirdparty->getNomUrl(1, 'customer');
        // Project
        if (!empty($conf->projet->enabled)) {
            $langs->load("projects");
            $morehtmlref .= '<br>' . $langs->trans('Project') . ' ';
            if ($user->rights->facture->creer) {
                if ($action != 'classify') {
                    //$morehtmlref.='<a class="editfielda" href="' . $_SERVER['PHP_SELF'] . '?action=classify&amp;id=' . $object->id . '">' . img_edit($langs->transnoentitiesnoconv('SetProject')) . '</a> : ';
                    $morehtmlref .= ' : ';
                }
                if ($action == 'classify') {
                    //$morehtmlref.=$form->form_project($_SERVER['PHP_SELF'] . '?id=' . $object->id, $object->socid, $object->fk_project, 'projectid', 0, 0, 1, 1);
                    $morehtmlref .= '<form method="post" action="' . $_SERVER['PHP_SELF'] . '?id=' . $object->id . '">';
                    $morehtmlref .= '<input type="hidden" name="action" value="classin">';
                    $morehtmlref .= '<input type="hidden" name="token" value="' . newToken() . '">';
                    $morehtmlref .= $formproject->select_projects($object->socid, $object->fk_project, 'projectid', $maxlength, 0, 1, 0, 1, 0, 0, '', 1);
                    $morehtmlref .= '<input type="submit" class="button valignmiddle" value="' . $langs->trans("Modify") . '">';
                    $morehtmlref .= '</form>';
                } else {
                    $morehtmlref .= $form->form_project($_SERVER['PHP_SELF'] . '?id=' . $object->id, $object->socid, $object->fk_project, 'none', 0, 0, 0, 1);
                }
            } else {
                if (!empty($object->fk_project)) {
                    $proj = new Project($db);
                    $proj->fetch($object->fk_project);
                    $morehtmlref .= '<a href="' . DOL_URL_ROOT . '/projet/card.php?id=' . $object->fk_project . '" title="' . $langs->trans('ShowProject') . '">';
                    $morehtmlref .= $proj->ref;
                    $morehtmlref .= '</a>';
                } else {
                    $morehtmlref .= '';
                }
            }
        }
        $morehtmlref .= '</div>';
        $object->totalpaye = $totalpaye; // To give a chance to dol_banner_tab to use already paid amount to show correct status
        dol_banner_tab($object, 'ref', $linkback, 1, 'ref', 'ref', $morehtmlref, '', 0, '', '', 1);
        print dol_get_fiche_end();
        print '<hr><br>';
?>
        <div class="fichecenter">
            <form method="post">
           
                //HTML съдържание на формата за въвеждане на данните
           
                <div>
                    <input type="submit" class="button" name="generate" value="<?php print $langs->trans('Test'); ?>">
                </div>
            </form>
            <?php
            if (isset($_POST['generate'])) {
                $econtXml = new EcontXMLClient();
                $params = array(
                    'system' => array(
                        'validate' => 0, //1 - samo validira dannite, 0 - suzdava pratka
                        'only_calculate' => 0, //1 - samo kalkulaciq na cena, 0 - suzdava pratka
                        'response_type' => 'HTML',
                        'email_errors_to' => 'milen@blacktiehost.com',
                    ),
                    'client' => array(
                        'username' => '' . $eecont->eecont_username . '',
                        'password' => '' . $eecont->eecont_password . '',
                    ),
                    'loadings' => array(
                        'row' => array(
                            'sender' => array(
                                'name' => "" . $eecont->company_name . "",
                                'name_person' => "" . $eecont->name_person . "",
                                'email' => '' . $eecont->email . '',
                                'phone' => '' . $eecont->phone . '',
                                'email_on_delivery' => '' . $eecont->email_on_delivery . '',
                                'city' => '' . $eecont->city . '',
                                'post_code' => '' . $eecont->postal_code . '',
                                'quarter' => '' . $eecont->quarter . '',
                                'street' => '' . $eecont->street . '',
                                'street_num' => '' . $eecont->street_num . '',
                                'street_bl' => '' . $eecont->street_bl . '',
                                'street_vh' => '' . $eecont->street_vh . '',
                                'street_et' => '' . $eecont->street_et . '',
                                'street_ap' => '' . $eecont->street_ap . '',
                                'street_other' => '' . $eecont->street_other . ''
                            ),
                            'receiver' => array(
                                'name' => "" . GETPOST('receiver_company_name', 'alphanohtml') . "",
                                'name_person' => "" . GETPOST('receiver_name_person', 'alphanohtml') . "",
                                'email' => '' . GETPOST('receiver_email', 'alphanohtml') . '',
                                'phone_num' => '' . GETPOST('receiver_phone', 'alphanohtml') . '',
                                'city' => '' . GETPOST('receiver_city', 'alphanohtml') . '',
                                'post_code' => '' . GETPOST('receiver_postal_code', 'alphanohtml') . '',
                                'quarter' => '' . GETPOST('receiver_quarter_name', 'alphanohtml') . '',
                                'street' => '' . GETPOST('receiver_street_name', 'alphanohtml') . '',
                                'street_num' => '' . GETPOST('receiver_street_num', 'alphanohtml') . '',
                                'street_bl' => '' . GETPOST('receiver_street_bl', 'alphanohtml') . '',
                                'street_vh' => '' . GETPOST('receiver_street_vh', 'alphanohtml') . '',
                                'street_et' => '' . GETPOST('receiver_street_et', 'alphanohtml') . '',
                                'street_ap' => '' . GETPOST('receiver_street_ap', 'alphanohtml') . '',
                                'street_other' => '' . GETPOST('receiver_street_other', 'alphanohtml') . ''
                            ),
                            
                            
                            
                            //
                            //
                            //Опциите по-долу са в процес на доработка. Стойностите ще се задават с GETPOST, както е направено за получателя
                            //
                            //
                            
                            
                            'payment' => array(
                                'side' => 'RECEIVER', //страна платец: SENDER, RECEIVER, OTHER;
                                'method' => 'CASH', //начин на плащане: CASH, CREDIT, VOUCHER
                                'key_word' => '' //клиентски номер на платеца. Задължително само при отложено плащане
                            ),
                            'shipment' => array(
                                'shipment_type' => 'PACK', //PACK – колет, DOCUMENT - документи, PALLET – палет, CARGO – карго експрес, DOCUMENTPALLET – палет + документи;
                                'description' => 'opisanie na pratkata',
                                'pack_count' => 1,
                                'weight' => 0.25,
                                'tariff_sub_code' => 'DOOR_DOOR', //начин на доставка: DOOR_DOOR, OFFICE_DOOR, DOOR_OFFICE, OFFICE_OFFICE;
                                'pay_after_accept' => 1, //разрешава се преглед на пратката преди събиране на Наложения платеж. 1 – разрешавам; 0 – не разрешавам (по подразбиране);
                                'pay_after_test' => 1, //пратката да се прегледа и тества от получателя и да плати Наложения платеж само ако приеме стоката ми. 1 – разрешавам; 0 – не разрешавам (по подразбиране);
                                'invoice_before_pay_CD' => '', //пратката да се прегледа от получателя и да плати Наложения платеж само ако приеме стоката ми. 1 – разрешавам; 0 – не разрешавам (по подразбиране);
                                'send_date' => '', //дата на изпращане на пратката – по подразбиране текущата;
                            ),
                            'services' => array(
                                'oc' => 18.42, //Обявена стойност;
                                'oc_currency' => 'BGN', //валута на Обявената стойност (3 буквен код);
                                'cd' => 18.42, //Наложен платеж
                                'cd_currency' => 'BGN', //валута на Наложения платеж (3 буквен код);
                                'cd_agreement_num' => '' //номер на споразумението за изплащане на Наложен платеж;
                            ),
                        )
                    )
                );
                //var_dump(EcontXMLClient::request('http://www.econt.com/e-econt/xml_parcel_import2.php', $params));
                //$response = EcontXMLClient::request('http://www.econt.com/e-econt/xml_parcel_import2.php', $params);

                //var_dump(EcontXMLClient::request('http://demo.econt.com/e-econt/xml_parcel_import2.php', $params));
                //$response = EcontXMLClient::request('http://demo.econt.com/e-econt/xml_parcel_import2.php', $params);
            }
            ?>
        </div>
<?php
    } else {
        // Record not found
        print "ErrorRecordNotFound";
    }
}

// End of page
llxFooter();
$db->close();
