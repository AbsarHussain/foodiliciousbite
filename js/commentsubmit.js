function SubmitFormData() {
	var name = $("#name").val();
	var comment = $("#comment").val();
	var product_id = $("#product_id").val();
	var shop_id = $("#shop_id").val();
	var user_id = $("#user_id").val();
	$.post("submitcomment.php", { name: name, comment: comment,product_id:product_id,shop_id: shop_id,user_id:user_id},
	   function(data) {
		 $('#results').html(data);
		 $('#myForm')[0].reset();
	   });
}

