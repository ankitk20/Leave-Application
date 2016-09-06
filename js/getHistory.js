$(document).ready(function(){
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
					if(val==="PENDING"){
						$id=$(this).closest("tr").attr("id");
						addCancelButton($id);
					}
				});
			});
			$('.mdl-spinner').hide();
			$('table').removeClass('hidden');
		},
		error:function($result){
			alert("he maa!! maataji.");
		}
	});

	function addCancelButton($id){
		$($id).append("<button>Cancel</button>");
		console.log($id);
	}

});