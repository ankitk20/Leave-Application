$(document).ready(function(){
	$('.mdl-spinner').hide();
	$('table').removeClass('hidden');

	$lastDate=getdate();
	console.log($.type($lastDate));
	if( true/*startdate>=$lastdate*/ ){  //admin has to reset within 10 days after term starts otherwise the button
		$('button').prop('disabled',false);
		console.log("date checked");
	}

	$repeatRequest=true;

	$('#reset').on('click',function(){
		if($repeatRequest){
			console.log("request");
			$startDate=moment(new Date($('#startDate').val())).format('YYYY/MM/DD');
			$endDate=moment(new Date($('#endDate').val())).format('YYYY/MM/DD');
			$.ajax({
				url:"../ajax/resetTerm.php",
				type:"post",
				datatype:"json",
				data:{startDate:$startDate,
					endDate:$endDate},
				success:function($output){
					console.log($output);
				},
				error:function($output){
					console.log($output);
				}
			});
			$repeatRequest=false;
		}
	});

	function getdate(){
		var date = new Date();
		$lastDate = date.getFullYear()+"/"+(date.getMonth()+1)+"/"+(date.getDate()-10);
		console.log($lastDate);
		return $lastDate;
	}
});