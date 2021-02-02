<?php
/**
 * Dutch Lexicon Entries for FormBlocks
 *
 * @package formblocks
 * @subpackage lexicon
 */

// General
//-----------------------------------------------------
$_lang['formblocks'] = 'FormBlocks';


// Manager context
//-----------------------------------------------------

// Menus
$_lang['formblocks.menu.edit_forms_title'] = 'FormBlocks';
$_lang['formblocks.menu.edit_forms_description'] = 'Bouw en bewerk je eigen formulieren';

// Collection views
$_lang['formblocks.collections'] = 'Overzicht van al je FormBlocks formulieren';
$_lang['formblocks.collections.children'] = 'Formulieren';
$_lang['formblocks.collections.children.create'] = 'Nieuw Formulier';
$_lang['formblocks.collections.children.back_to_collection_label'] = 'Alle Formulieren';


// Web context
//-----------------------------------------------------

// Form template
$_lang['formblocks.form.validation_error_heading'] = 'Ai, er is iets mis gegaan!';
$_lang['formblocks.form.validation_error_message'] = 'Het formulier kon helaas niet worden verstuurd, omdat niet alle verplichte velden zijn ingevuld. Vul a.u.b. de ontbrekende velden in (in rood gemarkeerd) en probeer het opnieuw.';
$_lang['formblocks.form.honeypot_field'] = 'Wezens van vlees en bloed: dit veld niet invullen aub!';
$_lang['formblocks.form.submit_button'] = 'Verzenden';

// Email template
$_lang['formblocks.email.subject'] = 'Reactie via de website';
$_lang['formblocks.email.introtext'] = 'Dit is wat de bezoeker heeft ingevuld:';
$_lang['formblocks.email.footer'] = '--- Einde bericht ---';
$_lang['formblocks.email.other_namely'] = 'namelijk:';

// Registration
$_lang['formblocks.registration.email_subject'] = 'Bevestig je registratie';
$_lang['formblocks.registration.email_content'] = '
<p>Beste [[+username]],</p>

<p>Bedankt voor je registratie! Klik op onderstaande link om je account te activeren:</p>

<p><a href="[[+confirmUrl]]">[[+confirmUrl]]</a></p>

<p>
    Groet,<br />
    <em>[[++site_name]]</em>
</p>
';

$_lang['formblocks.registration.success_message'] = 'Bedankt voor je registratie! Check je email en klik op de bevestigingslink om je account te activeren.';
$_lang['formblocks.registration.validation_error_heading'] = 'Oh nee! Daar ging iets mis...';
$_lang['formblocks.registration.validation_error_message'] = 'Het formulier kon niet verzonden worden omdat:<br>[[+validation_error_message]]';

// TVs
// DOESN'T WORK !!
//$_lang['formblocks.tv.form_email_to.name'] = 'E-mailadres ontvanger';
//$_lang['formblocks.tv.form_email_to.description'] = 'Optioneel. Als dit veld leeg is, wordt het formulier automatisch naar het hoofdadres verzonden (in te stellen onder Extra\'s > Configuratie).';