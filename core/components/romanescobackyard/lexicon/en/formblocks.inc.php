<?php
/**
 * Default English lexicon entries for FormBlocks
 */

// General
//-----------------------------------------------------

$_lang['formblocks'] = 'FormBlocks';


// Manager context
//-----------------------------------------------------

// Menus
$_lang['formblocks.menu.edit_forms_title'] = 'FormBlocks';
$_lang['formblocks.menu.edit_forms_description'] = 'Build and edit your own forms';

// Collection views
$_lang['formblocks.collections'] = 'Overview of all your FormBlocks forms';
$_lang['formblocks.collections.children'] = 'Forms';
$_lang['formblocks.collections.children.create'] = 'Create Form';
$_lang['formblocks.collections.children.back_to_collection_label'] = 'All Forms';

// ContentBlocks
$_lang['formblocks.cb.input_textfield_description'] = 'You can select a different input type or add an optional placeholder in the Settings menu.';
$_lang['formblocks.cb.input_textarea_description'] = 'You can add an optional placeholder in the Settings menu.';


// Web context
//-----------------------------------------------------

// Form template
$_lang['formblocks.form.validation_error_heading'] = 'Uh oh, something went wrong!';
$_lang['formblocks.form.validation_error_message'] = 'The form could not be sent, because not all required fields were filled. Please fill in the remaining fields (marked in red) and try again.';
$_lang['formblocks.form.honeypot_field'] = 'If you\'re a human, keep this field blank!';
$_lang['formblocks.form.recaptchav3_legal_notice'] = 'This form is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.';
$_lang['formblocks.form.submit_button'] = 'Send';
$_lang['formblocks.form.submit_loading'] = 'Sending';
$_lang['formblocks.form.success_heading'] = 'The form has been sent.';
$_lang['formblocks.form.success_message'] = 'Thank you for your message!';

// Form fields
$_lang['formblocks.field.other_namely'] = 'namely...';

// Email template
$_lang['formblocks.email.subject'] = 'Contact form response';
$_lang['formblocks.email.introtext'] = 'This is what the visitor submitted:';
$_lang['formblocks.email.footer'] = '--- End of message ---';
$_lang['formblocks.email.other_namely'] = 'namely:';

// Frontend validation
$_lang['formblocks.validation.required_text_empty'] = 'Please fill in the <strong>[[+field_name:lcase]]</strong> field.';
$_lang['formblocks.validation.required_text_checked'] = 'This field needs to be checked.';
$_lang['formblocks.validation.required_text_email'] = 'Please provide a valid <strong>email address</strong>.';
$_lang['formblocks.validation.required_text_url'] = 'Please provide a valid URL.';
$_lang['formblocks.validation.required_text_number'] = 'Oops, that\'s not a number.';
$_lang['formblocks.validation.required_text_password'] = 'Please provide a password of at least 8 characters long.';
$_lang['formblocks.validation.required_text_date_start'] = 'Please select a <strong>start date</strong>.';
$_lang['formblocks.validation.required_text_date_end'] = 'Please select an <strong>end date</strong>.';
$_lang['formblocks.validation.required_text_math'] = 'You need to beat the spam bots at math!';
$_lang['formblocks.validation.required_text_terms'] = 'You need to accept the <strong>terms and conditions</strong> to continue.';

// Registration
$_lang['formblocks.registration.email_subject'] = 'Confirm your registration';
$_lang['formblocks.registration.email_content'] = '
<p>Dear [[+username]],</p>

<p>Thanks for registering! To activate your account, please click on the link below:</p>

<p><a href="[[+confirmUrl]]">[[+confirmUrl]]</a></p>

<p>
    Thanks,<br />
    <em>[[++site_name]]</em>
</p>
';

$_lang['formblocks.registration.success_message'] = 'Thanks for signing up! Please check your email and click the confirmation link to activate your account.';
$_lang['formblocks.registration.validation_error_heading'] = 'Uh oh, something went wrong!';
$_lang['formblocks.registration.validation_error_message'] = 'The form could not be sent because:<br>[[+validation_error_message]]';
