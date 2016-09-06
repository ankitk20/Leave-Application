$(document).ready(function(){

	$(".mdl-button").on("click",function(){
		$("tbody").find("tr").click(function(){
			$fromDate=$(this).find("tr:nth-child(2)").text();
			console.log($fromDate);

		$.ajax({
			url:"../php/cancelLeave.php",
			type:"post",
			data:{FromDate:$fromDate},
			success:function($feedback){
                      console.log($.parseJSON($feedback));	
					},
			error:function(){
				  	console.log($.parseJSON($feedback));
			      }
		})
	})
});