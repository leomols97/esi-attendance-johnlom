/**
 * Handles "toggle all" checkbox. Depends on JQuery.
 * Source : https://stackoverflow.com/a/2191026 
 */
 $('#select-all').click(function(event) {   
    if(this.checked) {
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
}); 