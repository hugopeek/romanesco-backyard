<?php
/**
 * Default English Lexicon Entries for FormBlocks
 *
 * @package formblocks
 * @subpackage lexicon
 */

// General
// =====================================================================

$_lang['formblocks'] = 'FormBlocks';


// MANAGER CONTEXT
// =====================================================================

// Menus
// ---------------------------------------------------------------------

$_lang['formblocks.menu.edit_forms_title'] = 'FormBlocks';
$_lang['formblocks.menu.edit_forms_description'] = 'Build and edit your own forms';

// Collection views
// ---------------------------------------------------------------------

$_lang['formblocks.collections'] = 'Overview of all your FormBlocks forms';
$_lang['formblocks.collections.children'] = 'Forms';
$_lang['formblocks.collections.children.create'] = 'Create new form';
$_lang['formblocks.collections.children.back_to_collection_label'] = 'Back to overview';

// ContentBlocks
// ---------------------------------------------------------------------

$_lang['formblocks.cb.input_textfield_description'] = 'You can select a different input type or add an optional placeholder in the Settings menu.';
$_lang['formblocks.cb.input_textarea_description'] = 'You can add an optional placeholder in the Settings menu.';


// WEB CONTEXT
// =====================================================================

// Form template
// ---------------------------------------------------------------------

$_lang['formblocks.form.validation_error_heading'] = 'Uh oh, something went wrong!';
$_lang['formblocks.form.validation_error_message'] = 'The form could not be sent, because not all required fields were filled. Please fill in the remaining fields (marked in red) and try again.';
$_lang['formblocks.form.honeypot_field'] = 'If you\'re a human, keep this field blank!';
$_lang['formblocks.form.submit_button'] = 'Send';

// Email template
// ---------------------------------------------------------------------

$_lang['formblocks.email.subject'] = 'Contact form response';
$_lang['formblocks.email.introtext'] = 'This is what the visitor submitted:';
$_lang['formblocks.email.other_namely'] = 'namely:';

// Registration
// ---------------------------------------------------------------------

$_lang['formblocks.registration.email_subject'] = 'Confirm your registration';
$_lang['formblocks.registration.email_content'] = '
<p>Dear [[+username]],</p>

<p>Thanks for registering! To activate your new account, please click on the following link:</p>

<p><a href="[[+confirmUrl]]">[[+confirmUrl]]</a></p>

<p>
    Thanks,<br />
    <em>[[++site_name]]</em>
</p>
';

$_lang['formblocks.registration.success_message'] = 'Thanks for signing up! Please check your email and click the confirmation link to activate your account.';
$_lang['formblocks.registration.validation_error_heading'] = 'Uh oh, something went wrong!';
$_lang['formblocks.registration.validation_error_message'] = 'The form could not be sent, because of the following issue:<br>[[+validation_error_message]]';
