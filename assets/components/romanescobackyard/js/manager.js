// Wait for ContentBlocks to finish loading.
// Depends on arrive.js library (included in Romanesco theme).
$(document).arrive("#contentblocks-modal", function() {

    // Apply minimal styling to Redactor instances in narrower columns
    $(document).arrive(".redactor-box", function() {
        if ($(this).width() < 600) {
            $(this).addClass('redactor-theme-minimal');
        }

        // Re-evaluate after drag
        $(this).parent().parent().parent().on('mouseup', function () {
            var $this = $(this);

            // Little timeout to ensure width is adjusted after mouseUp
            setTimeout(function() {
                $box = $this.find('.redactor-box');
                if ($box.width() < 600) {
                    $box.addClass('redactor-theme-minimal');
                } else {
                    $box.removeClass('redactor-theme-minimal');
                }
            }, 50);
        })
    });

    // Evaluate initial instances (they can't arrive because they're already there)
    $('.redactor-box').each(function () {
        if ($(this).width() < 600) {
            $(this).addClass('redactor-theme-minimal');
        }
    });

    // Add 'large' class to CB settings modal if height is over 500px.
    // This allows dividing the settings into 2 columns to avoid scrolling.
    $(document).arrive(".contentblocks-modal-content", function() {

        // Abort if it's not a Settings modal (to protect Add layout / Add field)
        if ($('.contentblocks-modal-header h3').text().indexOf('Settings') === -1) {
            return true;
        }
        // Check height and apply class
        if ($('#contentblocks-modal').height() > 500) {
            $(this).addClass('large');
        }
    });
});

// Remove HTML from selected value in combo boxes (dropdowns)
$(document).arrive("[id*='modx-tv-tab'] .x-form-element > .x-form-field-wrap > input.x-form-text", function() {
    let img = this.value.match(/<img.*?src="([^">]*\/([^">]*?))".*?>/g);
    let value = this.value.replace(/<\/?[^>]+(>|$)/g, "").trim();

    // Show preview image, why not :)
    if (img) {
        $(this).parent().after(img[0].replace('width:30%', 'width:402px;margin-top:5px'));
    }

    // Alter value on load
    $(this).val(value);

    // Alter value and image preview again when selection changes
    $(document).on('click', ".x-combo-list-item.x-combo-selected", {fieldId : this.id}, function(e){
        $('#' + e.data.fieldId).each(function () {
            let id = this.id;
            let img = this.value.match(/<img.*?src="([^">]*\/([^">]*?))".*?>/g);
            let value = this.value.replace(/<\/?[^>]+(>|$)/g, "").trim();
            let ghost = '<div id="' + id + '_ghost" class="x-form-text x-form-field x-trigger-noedit x-form-focus" style="margin-top:-30px;">' + value + '</div>';

            // Unset previous selection
            $('#' + id +'_ghost').remove();

            // Add shadow element
            $(ghost).insertAfter('#' + id);

            // Make existing selector transparent, so ghost content is visible underneath
            $(this)
                .css('opacity', '0')
                .css('z-index', '2')
            ;

            // Replace image thumbnail
            if (img) {
                $(this).parent().siblings('img').remove();
                $(this).parent().after(img[0].replace('width:30%', 'width:402px;margin-top:5px'));
            }
        });
    });
});

// Reset element width after initial calculations
$(document).arrive("div[id*='modx-window-mi-grid-update-'] .x-panel.x-grid-panel", function() {
    $(this).css('width','100%');
});