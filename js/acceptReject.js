function acceptReject(){
	$("button").on("click",function(){
		$(this).prop('disabled',true);
		$row = $('#'+$(this).data('id'));
		$row.find('button').prop('disabled',true);
		$(this).hide();
		$action = $(this).attr('value');
		var spinner = document.createElement('div');
		spinner.className = 'mdl-spinner mdl-js-spinner is-active';
		$(this).parent().append(spinner);
		componentHandler.upgradeElement(spinner);
		$appliedBy = $(this).data('id');
		$fromDate = $(this).data('from');
		$toDate = $(this).data('to');
		$type = $(this).data('type');
		$.ajax({
			url:"../ajax/acceptReject.php",
			type:"post",
			data:{action:$action,
				fromDate:$fromDate,
				toDate:$toDate,
				AppliedBy:$appliedBy,
				type:$type},
			success:function($feedback){
				$row.hide();
				console.log($.parseJSON($feedback));
			},
			error:function($feedback){
				console.log($.parseJSON($feedback));
			}
		});
	});
}