function cancelLeave(){
	$("button").on("click",function(){
		$(this).hide();
		var spinner = document.createElement('div');
		spinner.className = 'mdl-spinner mdl-js-spinner is-active';
		$(this).parent().append(spinner);
		componentHandler.upgradeElement(spinner);
		$appliedTo = $(this).data('id');
		$fromDate = $(this).data('from');
		$toDate = $(this).data('to');
		$type = $(this).data('type');
		$row = $('#'+$(this).data('id'));
		console.log($appliedTo);
		console.log($fromDate);
		console.log($toDate);
		console.log($type);
		$.ajax({
			url:"../ajax/cancelLeave.php",
			type:"post",
			data:{fromDate:$fromDate,
				toDate:$toDate,
				type:$type,
				AppliedTo:$appliedTo},
			success:function($feedback){
				$row.hide();
				console.log($.parseJSON($feedback));
			},
			error:function($feedback){
				console.log($.parseJSON($feedback));
			}
		});
	});
};