$(function() {

    $(".radio").on("click",function(e) {  
        // Entry id
      	var entry_id = $(this).closest(".entry-item").attr("id");

        	// Ajax call 
        $.post('/contests/any/entries/1',{ rating: this.value, entry_id : entry_id}, function(data) {
            console.log(data);
        });
    }); 

    // Delete an entry-item without refresh
    $(".delete-entry").on("click",function(e) {
      	// Entry id
    	  var entry_id = $(this).closest(".entry-item").attr("id");

        // Popup dialog to confirm deletion of entry-item
        var answer = confirm('Weet u zeker dat u deze inzending wilt verwijderen?');

        if (answer){
            // Ajax call 
            $.ajax({
                url: '/contests/any/entries/1',
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