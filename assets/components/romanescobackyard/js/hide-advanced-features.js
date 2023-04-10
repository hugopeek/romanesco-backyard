// LOADED INLINE ALREADY, IN MANAGER AUGMENTATIONS PLUGIN
// Wait for ContentBlocks to finish loading.
// Depends on arrive.js library (included in Romanesco theme).
$(document).arrive("#contentblocks-modal", function() {
    $(document).arrive(".contentblocks-modal-content", function() {
        let settings = '';
        let fields = '';

        // Hide settings
        if (settings) {
            settings = settings.split(',');
            for (const name of settings) {
                $(".contentblocks-modal-field [data-name='" + name + "']").parent().hide();
            }
        }

        // Hide CB fields
        if (fields) {
            fields = fields.split(',');
            for (const id of fields) {
                $("li.tooltip a[data-id='" + id + "']").closest('li').hide();
            }
        }
    });
});
