$(function(){

	$.ajax({

		url:'../php/getHistory.php',
		datatype:'json',
		success:function($result){
					console.log($.parseJSON($result));
					// console.log("success");
				},
		error:function($result){
					alert("he maa!! maataji.");
				}
	});

});