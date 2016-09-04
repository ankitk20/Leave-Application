$(function(){
	$.ajax({
		url:"../php/getHistory.php",
		datatype:"json",
		type:"post",
		success:function($row){
			console.log($.parseJSON($row));
			$.each($.parseJSON($row),function(column,value){
				$("tbody").append("<tr></tr>");
				$.each(value, function(col,val){
					$("tbody>tr:eq(" + column + ")").append("<td>"+val+"</td>");
				});
			});
		},
		error: function($result){
			alert("he maa!! maataji.");
		}
	});

});