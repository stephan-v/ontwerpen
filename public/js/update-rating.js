$(function() {

    $(".radio").on("click",function(e) {  
        // Entry id
      	var entry_id = $(this).closest(".entry-item").attr("id");

        // Ajax call 
        $.post(BASE+'/contests/any/entries/1',{ rating: this.value, entry_id : entry_id}, function(data) {
            console.log(data);
        });
    }); 

    $(".delete-entry").on("mouseover",function(e) {
        $(".options-entry", this).stop().slideDown(100);
    });

    $(".options-entry").on("mouseleave",function(e) {
        $(this).stop().slideUp(100);
    });

    // Delete an entry-item without refresh
    $(".delete-entry .delete").on("click",function(e) {
      	// Entry id
    	var entry_id = $(this).closest(".entry-item").attr("id");

        // Popup dialog to confirm deletion of entry-item
        var answer = confirm('Weet u zeker dat u deze inzending wilt verwijderen?');

        if (answer){
            // Ajax call 
            $.ajax({
                url: BASE+'/contests/any/entries/1',
                type: 'DELETE',
                data: { entry_id : entry_id },
                success: function(data) {
                    // Selecteer entryitem with corresponding idnumber and remove it without refresh
                    $(".entry-item#"+entry_id).remove();
                }     
            });
        }        
    }); 
});