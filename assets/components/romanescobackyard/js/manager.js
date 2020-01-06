$(window).on('load', function() {

    // Add 'large' class to CB settings modal if height is over 500px.
    // This allows dividing the settings into 2 columns to avoid scrolling.
    // Depends on arrive.js library (included in Romanesco theme) for detecting when the modal is triggered.
    // @todo: uses a timeout to ensure that ContentBlocks is loaded, but there must be a better way..
    setTimeout(function(){
        document.getElementById("contentblocks-modal").arrive(".contentblocks-modal-content", function() {
            // Check if it's a Settings modal (and not Add layout / Add field)
            if ($('.contentblocks-modal-header h3').text().indexOf('Settings') === -1) {
                return true;
            }
            // Add 'large' class
            if ($('#contentblocks-modal').height() > 500) {
                $(this).addClass('large');
            }
        });
    }, 3000);
});
