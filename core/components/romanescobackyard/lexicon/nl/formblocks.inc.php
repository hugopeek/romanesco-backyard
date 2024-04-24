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
$_lang['formblocks.form.recaptchav3_legal_notice'] = 'Dit formulier is beveiligd met reCAPTCHA en de Google <a href="https://policies.google.com/privacy">Privacy Policy</a> en <a href="https://policies.google.com/terms">Algemene Voorwaarden</a> zijn hierop van toepassing.';
$_lang['formblocks.form.submit_button'] = 'Verzenden';

// Email template
$_lang['formblocks.email.subject'] = 'Reactie via de website';
$_lang['formblocks.email.introtext'] = 'Dit is wat de bezoeker heeft ingevuld:';
$_lang['formblocks.email.footer'] = '--- Einde bericht ---';
$_lang['formblocks.email.other_namely'] = 'namelijk:';

// Frontend validation
$_lang['formblocks.validation.required_text_empty'] = 'Vul het veld <strong>[[+field_name:lcase]]</strong> in.';
$_lang['formblocks.validation.required_text_checked'] = 'Dit veld moet worden aangevinkt.';
$_lang['formblocks.validation.required_text_email'] = 'Geef een geldig <strong>emailadres</strong> op.';
$_lang['formblocks.validation.required_text_url'] = 'Vul een geldige URL in.';
$_lang['formblocks.validation.required_text_number'] = 'He, dat is geen nummer...';
$_lang['formblocks.validation.required_text_password'] = 'Vul een wachtwoord in van minimaal 8 karakters.';
$_lang['formblocks.validation.required_text_date_start'] = 'Selecteer een <strong>start datum</strong>.';
$_lang['formblocks.validation.required_text_date_end'] = 'Selecteer een <strong>eind datum</strong>.';
$_lang['formblocks.validation.required_text_math'] = 'Maak je het rekensommetje nog even af?';
$_lang['formblocks.validation.required_text_terms'] = 'Je dient akkoord te gaan met de <strong>voorwaarden</strong>.';

// Backend validation
$_lang['formblocks.validation.file_too_big'] = 'Bestand is te groot. De maximum toegestane grootte is [[+max_file_size]] MB.';
$_lang['formblocks.validation.file_not_allowed'] = 'Bestanden met .[[+ext]] extensie zijn niet toegestaan.';

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