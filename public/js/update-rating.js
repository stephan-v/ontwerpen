$(function() {

  // Give an entry-item a rating of 1 to 5
  var entry_id;

  $(".radio").on("click",function(e) {  
  	// Entry id
	var entry_id = $(this).closest(".entry-item").attr("id");

  	// Ajax call 
    $.post('/contests/any',{ rating: this.value, entry_id : entry_id}, function(data) {
      console.log(data);
    });
  });  


  // Delete an entry-item without refresh
  $(".delete-entry").on("click",function(e) {  
  	// Entry id
	var entry_id = $(this).closest(".entry-item").attr("id");

  	// Ajax call 
    $.ajax({
	   url: '/contests/any',
	   type: 'DELETE',
	   data: { entry_id : entry_id },
	   success: function(data) {
	   	 // Selecteer entryitem with corresponding idnumber and remove it without refresh
	     $(".entry-item#"+entry_id).remove();
	   }	   
	});
  });    

});