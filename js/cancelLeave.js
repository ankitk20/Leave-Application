function cancelLeave(){
	$("button").on("click",function(){
		$(this).hide();
		var spinner = document.createElement('div');
		spinner.className = 'mdl-spinner mdl-js-spinner is-active';
		$(this).parent().append(spinner);
		componentHandler.upgradeElement(spinner);
		$appliedTo = $(this).parent().parent().attr('value');
		$fromDate = moment(new Date($(this).parent().parent().children('td').eq(1).text())).format('YYYY/MM/DD');
		$toDate = moment(new Date($(this).parent().parent().children('td').eq(2).text())).format('YYYY/MM/DD');
		$type = $(this).parent().parent().children('td').eq(0).text();
		$but = $(this);
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
				$but.parent().parent().hide();
				console.log($.parseJSON($feedback));
			},
			error:function($feedback){
				console.log($.parseJSON($feedback));
			}
		});
	});
};