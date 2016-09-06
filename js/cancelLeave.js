function cancelLeave(){
	console.log('inside cancel');
	$("button").on("click",function(){
		$appliedTo = $(this).parent().parent().attr('value');
		$fromDate = moment(new Date($(this).parent().parent().children('td').eq(1).text())).format('YYYY/MM/DD');
		console.log($appliedTo);
		console.log($fromDate);
		$.ajax({
			url:"../php/cancelLeave.php",
			type:"post",
			data:{fromDate:$fromDate,
				AppliedTo:$appliedTo},
			success:function($feedback){
                      console.log($.parseJSON($feedback));	
					},
			error:function($feedback){
				  	console.log($.parseJSON($feedback));
			      }
		});
	});
};