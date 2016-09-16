$(document).ready(function(){
	$('.mdl-spinner').hide();
	$('table').removeClass('hidden');

	$startDate=$('#startDate').val();
	$endDate=$('#endDate').val();
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
			$.ajax({
				url:"../php/admin.php",
				type:"post",
				datatype:"json",
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