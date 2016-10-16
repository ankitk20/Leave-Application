$(document).ready(function(){
	$.ajax({
		url:"../ajax/getApplicant.php",
		type:"post",
		datatype:"json",
		success:function($row){
			$.each($.parseJSON($row),function(column,value){
				if(value['ID'] == null){
					console.log('EMPTY');
					$("tbody").append('<tr><td style="text-align: center;" colspan="8">No leave applications to show.</td></tr>');
				}
				else{
					$("tbody").append("<tr></tr>");
					var words;
					var limit = 0;
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
							case 'Note':{
								if(val!=' '){
									console.log(val);
									if(val.length<=10)
										$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric'>"+val+"</td>");
									else{
										$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric' id='note"+column+"'>"+val.substring(0,10)+" ...</td>");
										var tooltip = document.createElement('span');
										tooltip.className = 'mdl-tooltip mdl-tooltip--large';
										tooltip.setAttribute('for','note'+column);
										words = val.split(" ");
										limit = 0;
										for (var j = 0; j < words.length; j++) {
											limit += words[j].length;
											if(length>20){
												tooltip.innerHTML += '<br/>'+words[j];
												limit = words[j].length;
											}
											else{
												tooltip.innerHTML += ' '+words[j];
												limit++;
											}
										}
										$('body').append(tooltip);
										componentHandler.upgradeElement(tooltip);
									}
								}
								else{
									console.log(val);
									$("tbody>tr:eq(" + column + ")").append("<td class='mdl-data-table__cell--non-numeric'>----</td>");
								}
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