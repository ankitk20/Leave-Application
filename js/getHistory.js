$(function(){
	$('table').hide();
	$.ajax({
		url:"../php/getHistory.php",
		datatype:"json",
		type:"post",
		success:function($row){
			$.each($.parseJSON($row),function(column,value){
				$("tbody").append("<tr></tr>");
				$.each(value, function(col,val){
					$("tbody>tr:eq(" + column + ")").append("<td>"+val+"</td>");
					$("tbody>tr:eq(" + column + ")").addClass("mdl-data-table__cell--non-numeric");
				});
			});
			$('.mdl-spinner').hide();
			$('table').show();
		},
		error: function($result){
			alert("he maa!! maataji.");
		}
	});
});