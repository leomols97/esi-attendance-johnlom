/**
 * Handles "toggle all" checkbox. Depends on JQuery.
 * Source : https://stackoverflow.com/a/2191026
 */
function addClickEvent() {
    $('#select-all').click(function(event) {
        if (this.checked) {
            $(':checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    });
}

addClickEvent();