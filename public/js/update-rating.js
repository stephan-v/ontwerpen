$(function() {
  $(".radio").on("click",function(e) {  
  	// Entry id
	var entry_id = $(this).closest(".entry-item").attr("id");

  	// Ajax call 
    $.post('/contests/any',{ rating: this.value, entry_id : entry_id}, function(data) {
      console.log(data);
    });
  });  
});