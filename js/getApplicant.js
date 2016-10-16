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
					$tr = $("<tr></tr>");
					$accept = $("<button class='mdl-button mdl-js-button mdl-js-ripple-effect' value='accept'>Accept</button>");
					$reject = $("<button class='mdl-button mdl-js-button mdl-js-ripple-effect' value='reject'>Reject</button>");
					var words;
					var limit = 0;
					$.each(value, function(col,val){
						switch(col){
							case 'ID':{
								$tr.attr('id',val);
								$accept.data('id',val);
								$reject.data('id',val);
								break;
							}
							case 'Type':{
								$accept.data('type',val);
								$reject.data('type',val);
								$tr.append("<td class='mdl-data-table__cell--non-numeric'>"+val+"</td>");
								break;
							}
							case 'To':{
								$tr.append("<td class='mdl-data-table__cell--non-numeric'>"+moment(val).format("ddd, MMM D YYYY")+"</td>");
								$accept.data('to',val);
								$reject.data('to',val);
								break;
							}
							case 'From':{
								$accept.data('from',val);
								$reject.data('from',val);
								$tr.append("<td class='mdl-data-table__cell--non-numeric'>"+moment(val).format("ddd, MMM D YYYY")+"</td>");
								break;
							}
							case 'Note':{
								if(val.length != 0){
									console.log(val.length);
									if(val.length<=10)
									$tr.append("<td class='mdl-data-table__cell--non-numeric'>"+val+"</td>");
									else{
										$tr.append("<td class='mdl-data-table__cell--non-numeric' id='note"+column+"'>"+val.substring(0,10)+" ...</td>");
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
									$tr.append("<td class='mdl-data-table__cell--non-numeric'>----</td>");
								}
								break;
							}
							default:{
								$tr.append("<td class='mdl-data-table__cell--non-numeric'>"+val+"</td>");
							}
						}
					});
					$td = $("<td class='mdl-data-table__cell--non-numeric'></td>");
					$tr.append($td.append($accept));
					$td = $("<td class='mdl-data-table__cell--non-numeric'></td>");
					$tr.append($td.append($reject));
					$('tbody').append($tr);
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