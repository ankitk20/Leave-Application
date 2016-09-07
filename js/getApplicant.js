$(document).ready(function(){
	$.ajax({
		url:"../php/getApplicant.php",
		type:"post",
		datatype:"json",
		success:function($row){
			$.each($.parseJSON($row),function(column,value){
				if(value['ID'] == null){
					console.log('EMPTY');
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
							default:{
								$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric'>"+val+"</td>");
							}
						}
					});
					$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric'><button class='mdl-button mdl-js-button mdl-js-ripple-effect' value='accept'>Accept</button></td>");
					$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric'><button class='mdl-button mdl-js-button mdl-js-ripple-effect' value='reject'>Reject</button></td>");
				}
			});
			$('.mdl-spinner').hide();
			$('table').removeClass('hidden');
			acceptReject();
		},
		error:function(){
			console.log("failed to load");
		}
	});
});