$(function(){

	$.ajax({

		url:"../php/getHistory.php",
		datatype:"json",
		type:"post",
		success:function($row){

					console.log($.parseJSON($row));
					$("tbody").append("<tr></tr>");
					$.each($.parseJSON($row),function(column,value){

						$("tbody>tr").append("<td>"+value+"</td>");

					});
				},
		error:  function($result){
					alert("he maa!! maataji.");
				}
	});

});