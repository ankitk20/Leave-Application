$(document).ready(function(){
	loadLeavesAndAuthorities();
});

loadLeavesAndAuthorities = function(){
	$.when(loadLeaveTypes, loadLeaveAuthorities).then(function(){
	 	$('.mdl-spinner').hide();
	 	$('#application').removeClass('hidden');
		initializeMdlSelect();
	});
}

loadLeaveTypes = $.ajax({
	url:"../php/getType.php",
	datatype:"json",
	type:"post",
	success:function($leaveTypes){
		$(".mdl-textfield__label[for='typeOfLeave']").after('<ul for="typeOfLeave" class="mdl-menu mdl-menu--bottom-left mdl-js-menu"></ul>');
		$.each($.parseJSON($leaveTypes),function(column,value){
			$("ul[for='typeOfLeave']").append('<li class="mdl-menu__item">'+column+'</li>');
		});
	},
	error:function($leaveTypes){
		console.log('IDK whats wrong');
	}
});

loadLeaveAuthorities = $.ajax({
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
