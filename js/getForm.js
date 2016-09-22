$(document).ready(function(){
	var error = 0;
	$.when($.ajax({
		url:"../php/getType.php",
		datatype:"json",
		type:"post",
		success:function($leaveTypes){
			console.log($leaveTypes);
			$(".mdl-textfield__label[for='typeOfLeave']").after('<ul for="typeOfLeave" class="mdl-menu mdl-menu--bottom-left mdl-js-menu"></ul>');
			$.each($.parseJSON($leaveTypes),function(column,value){
				if(value>0)
					$("ul[for='typeOfLeave']").append('<li class="mdl-menu__item">'+column+'</li>');
				else
					$("ul[for='typeOfLeave']").append('<li class="mdl-menu__item" disabled>'+column+'</li>');
			});
		},
		error:function($leaveTypes){
			console.log('IDK whats wrong');
		}
	}),$.ajax({
		url:"../php/applyTo.php",
		datatype:"json",
		type:"post",
		success:function($applyTo){
			if($.parseJSON($applyTo)[0] != null){
				$(".mdl-textfield__label[for='applyTo']").after('<ul for="applyTo" class="mdl-menu mdl-menu--bottom-left mdl-js-menu"></ul>');
				$.each($.parseJSON($applyTo),function(column,value){
					$("ul[for='applyTo']").append('<li class="mdl-menu__item" id="'+value['Google_UID']+'">'+value['FirstName']+' '+value['LastName']+' ('+value['Title']+')</li>');
				});
			}
			else{
				error = 1;
			}
		},
		error:function($applyTo){
			console.log("Something wrong inside");
		}
	})).then(function(){
		if(error == 0){
			$('#formSpinner').hide();
		 	$('#application').removeClass('hidden');
            componentHandler.upgradeDom();
	        getmdlSelect.init('.getmdl-select');
		}
		else{
			$('#formSpinner').hide();
			$('.mdl-card__supporting-text').append("Seems like DB didn't return much");
		}
	});
});