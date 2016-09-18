function acceptReject(){
	$("button").on("click",function(){
		$(this).prop('disabled',true);
		$(this).parent().parent().find('button').prop('disabled',true);
		$(this).hide();
		$action = $(this).attr('value');
		var spinner = document.createElement('div');
		spinner.className = 'mdl-spinner mdl-js-spinner is-active';
		$(this).parent().append(spinner);
		componentHandler.upgradeElement(spinner);
		$appliedBy = $(this).parent().parent().attr('value');
		$fromDate = moment(new Date($(this).parent().parent().children('td').eq(1).text())).format('YYYY/MM/DD');
		$toDate = moment(new Date($(this).parent().parent().children('td').eq(2).text())).format('YYYY/MM/DD');
		$type = $(this).parent().parent().children('td').eq(4).text();
		$but = $(this);
		$.ajax({
			url:"../php/acceptReject.php",
			type:"post",
			data:{action:$action,
				fromDate:$fromDate,
				toDate:$toDate,
				AppliedBy:$appliedBy,
				type:$type},
			success:function($feedback){
				$but.parent().parent().hide();
				console.log($.parseJSON($feedback));
			},
			error:function($feedback){
				console.log($.parseJSON($feedback));
			}
		});
	});
}