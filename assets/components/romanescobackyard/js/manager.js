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
