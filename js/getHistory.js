$(document).ready(function(){
	$.ajax({
		url:"../ajax/getHistory.php",
		datatype:"json",
		type:"post",
		success:function($row){
			$.each($.parseJSON($row),function(column,value){
				if(value['ID'] == null){
					console.log('EMPTY HISTORY');
					$("tbody").append('<tr><td style="text-align: center;" colspan="7">Your leave history is empty for now!</td></tr>');
				}
				else{
					$tr = $("<tr></tr>");
					$cancel = $("<button class='mdl-button mdl-js-button mdl-js-ripple-effect'>Cancel</button>");
					$.each(value, function(col,val){
						switch(col){
							case 'ID':{
								$tr.attr('id',val);
								$cancel.data('id',val);
								break;
							}
							case 'To':{
								$tr.append("<td class='mdl-data-table__cell--non-numeric'>"+moment(val).format("ddd, MMM D YYYY")+"</td>");
								$cancel.data('to',val);
								break;
							}
							case 'From':{
								$tr.append("<td class='mdl-data-table__cell--non-numeric'>"+moment(val).format("ddd, MMM D YYYY")+"</td>");
								$cancel.data('from',val);
								break;
							}
							case 'Type':{
								$cancel.data('type',val);
								$tr.append("<td class='mdl-data-table__cell--non-numeric'>"+val+"</td>");
								break;
							}
							default:{
								$tr.append("<td class='mdl-data-table__cell--non-numeric'>"+val+"</td>");
							}
						}
					});
					$td = $("<td class='mdl-data-table__cell--non-numeric'></td>");
					if (value['Status'] == 'PENDING') {
						$td.append($cancel);
					}
					else {
						$td.append("<button class='mdl-button mdl-js-button mdl-js-ripple-effect' disabled>Cancel</button>")
					}
					$tr.append($td);
					$("tbody").append($tr);
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