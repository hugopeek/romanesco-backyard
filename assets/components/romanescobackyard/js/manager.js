$(window).on('load', function() {

    // Add 'large' class to CB modal if height is over 500px.
    // This allows dividing the settings into 2 columns to avoid scrolling.
    // Depends on arrive.js library (included in Romanesco theme) for detecting when the modal is being triggered.
    // @todo: uses a timeout to ensure that ContentBlocks is loaded, but there must be a better way..
    setTimeout(function(){
        document.getElementById("contentblocks-modal").arrive(".contentblocks-modal-content", function() {
            if ($('#contentblocks-modal').height() > 500) {
                $(this).addClass('large');
            }
        });
    }, 3000);
});
