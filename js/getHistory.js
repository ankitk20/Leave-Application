$(document).ready(function(){
	$.ajax({
		url:"../php/getHistory.php",
		datatype:"json",
		type:"post",
		success:function($row){
			$.each($.parseJSON($row),function(column,value){
				$("tbody").append("<tr></tr>");
				$.each(value, function(col,val){
					if(col == 'ID'){
						$("tbody>tr:eq(" + column + ")").attr('value',val);
						return true;
					}
					if(col == 'From'){
						$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric'>"+moment(val).format("ddd, MMM D YYYY")+"</td>");
						return true;
					}
					if(col == 'To'){
						$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric'>"+moment(val).format("ddd, MMM D YYYY")+"</td>");
						return true;
					}
					$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric'>"+val+"</td>");
					if(col == 'Status'){
						if(val == 'PENDING')
							$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric'><button class='mdl-button mdl-js-button mdl-js-ripple-effect'>Cancel</button></td>");
						if(val == 'ACCEPTED' || val == 'REJECTED')
							$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric'><button class='mdl-button mdl-js-button mdl-js-ripple-effect' disabled>Cancel</button></td>");
					}
				});
			});
			$('.mdl-spinner').hide();
			$('table').removeClass('hidden');
			cancelLeave();
		},
		error:function($result){
			alert("he maa!! maataji.");
		}
	});
});