$(document).ready(function(){

	$.ajax({
		url:"../php/getApplicant.php",
		type:"post",
		datatype:"json",
		success:function($row){
					// console.log($.parseJSON($.parseJSON($row)));
					$.each($.parseJSON($row),function(column,value){
						$("tbody").append("<tr></tr>");
						$.each(value, function(col,val){
							$("tbody>tr:eq(" + column + ")").append("<td>"+val+"</td>");
							$("tbody>tr:eq(" + column + ")").addClass("mdl-data-table__cell--non-numeric");
						});
					});
					$('.mdl-spinner').hide();
					$('table').removeClass('hidden');
				},
		error:function(){
				console.log("failed to load");
		      }
	});

});