// Wait for ContentBlocks to finish loading.
// Depends on arrive.js library (included in Romanesco theme).
$(document).arrive("#contentblocks-modal", function() {
    $(document).arrive(".contentblocks-modal-content", function() {

        // Hide link rel settings
        $("label[for='setting-link_rel']").parent().hide();
    });
});
