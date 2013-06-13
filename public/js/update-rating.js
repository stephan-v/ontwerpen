$(function() {

    // Initiate tooltips overal
    $( document ).tooltip({
        track: true
    });

    // Berekening voor totaalprijs in het "maak een wedstrijd aan" formulier
    $('input[name="budget"]').keyup(function () {
        var value = parseInt($(this).val());
        var percentage = Math.ceil(value * 1.05 - value);

        if(!isNaN(value)) {
            $("#price").text('€ ' + value);
            $("#service").text('€ ' + percentage);
            $("#total").text('€ ' + (value + 25 + percentage));
        }
    }).keyup();

    $(".radio").on("click",function(e) {  
        // Entry id
      	var entry_id = $(this).closest(".entry-item").attr("id");

        // Ajax call 
        $.post(BASE+'/contests/any/entries/any',{ 
            rating: this.value, 
            entry_id : entry_id
        }, function(data) {
            console.log(data);
        });
    }); 

    $(".delete-entry").on("mouseover",function(e) {
        $(".options-entry", this).stop().fadeIn('fast');
    });

    $(".options-entry").on("mouseleave",function(e) {
        $(this).stop().fadeOut('fast');
    });

    $(".delete-entry").on("mouseleave",function(e) {
        $(".options-entry").stop().fadeOut('slow');
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
                url: BASE+'/contests/any/entries/any',
                type: 'DELETE',
                data: { 
                    entry_id : entry_id 
                },
                success: function() {
                    // Selecteer entryitem with corresponding idnumber and remove it without refresh
                    $(".entry-item#"+entry_id).remove();
                }     
            });
        }        
    }); 

    // Delete a comment without refresh
    $("#comments .comment .user-info .delete").on("click",function(e) {
        // Entry id
        var comment_id = $(this).closest(".comment").attr("id");

        // Popup dialog to confirm deletion of entry-item
        var answer = confirm('Weet u zeker dat u uw commentaar wilt verwijderen?');

        if (answer){
            // Ajax call 
            $.ajax({
                url: BASE+'/contests/any/comments',
                type: 'DELETE',
                data: { 
                    comment_id : comment_id
                },
                success: function() {
                    // Selecteer comment with corresponding id number and remove it without refresh
                    $(".comment#"+comment_id).hide('slow', function(){ $(".comment#"+comment_id).remove(); });
                }     
            });
        }        
    }); 

    // UI function single contest tabs
    $(function() {
        $("#tabs").tabs({ active: tab_index });
    });

    // UI function modal windows
    $(function() {
        $( "#dialog" ).dialog({
            width: 500,
            modal: true,
            buttons: [ 
                { 
                    class: 'btn-entry',
                    text: "Ok", click: function() { 
                        $( this ).dialog( "close" ); 
                    } 
                } 
            ]
        });
    });

    $(window).resize(function() {
        $("#dialog").dialog("option", "position", "center");
    });

});