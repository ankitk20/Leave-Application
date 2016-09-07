$(document).ready(function(){
	$.ajax({
		url:"../php/getHistory.php",
		datatype:"json",
		type:"post",
		success:function($row){
			$.each($.parseJSON($row),function(column,value){
				if(value['ID'] == null){
					console.log('EMPTY HISTORY');
					$("tbody").append('<tr><td style="text-align: center;" colspan="7">Your leave history is empty for now!</td></tr>');
				}
				else{
					$("tbody").append("<tr></tr>");
					$.each(value, function(col,val){
						switch(col){
							case 'ID':{
								$("tbody>tr:eq(" + column + ")").attr('value',val);
								break;
							}
							case 'To':
							case 'From':{
								$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric'>"+moment(val).format("ddd, MMM D YYYY")+"</td>");
								break;
							}
							case 'Status':{
								$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric'>"+val+"</td>");
								if(val == 'PENDING')
									$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric'><button class='mdl-button mdl-js-button mdl-js-ripple-effect'>Cancel</button></td>");
								else
									$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric'><button class='mdl-button mdl-js-button mdl-js-ripple-effect' disabled>Cancel</button></td>");
								break;
							}
							default:{
								$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric'>"+val+"</td>");
							}
						}
					});
				}
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