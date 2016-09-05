$(document).ready(function(){
	// $('#application').hide();
	$.ajax({
		url:"../php/getType.php",
		datatype:"json",
		type:"post",
		success:function($leaveTypes){
			$(".mdl-textfield__label[for='typeOfLeave']").after('<ul for="typeOfLeave" class="mdl-menu mdl-menu--bottom-left mdl-js-menu"></ul>');
			$.each($.parseJSON($leaveTypes),function(column,value){
				$("ul[for='typeOfLeave']").append('<li class="mdl-menu__item">'+column+'</li>');
			});
			$.ajax({
				url:"../php/applyTo.php",
				datatype:"json",
				type:"post",
				success:function($applyTo){
					$(".mdl-textfield__label[for='applyTo']").after('<ul for="applyTo" class="mdl-menu mdl-menu--bottom-left mdl-js-menu"></ul>');
					$.each($.parseJSON($applyTo),function(column,value){
						$("ul[for='applyTo']").append('<li class="mdl-menu__item">'+value['FirstName']+' '+value['LastName']+' ('+value['Title']+')</li>');
					});
				},
				error:function($applyTo){
					console.log("Something wrong inside");
				}
			});
			$('head').append('<link rel="stylesheet" href="../getmdl-select/getmdl-select.min.css">');
			$.getScript('../getmdl-select/getmdl-select.min.js',function(){
				$('.mdl-spinner').hide();
				$('#application').removeClass('hidden');
			});
		},
		error:function($leaveTypes){
			console.log('IDK whats wrong');
		}
	});
});