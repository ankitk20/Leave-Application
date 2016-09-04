$(function(){
	$("#apply").on("click",function(){
		$applyTo = $("#applyTo").val();
		$fromDate = $("#fromDate").val();
		$toDate = $("#toDate").val();
		$type = $("#typeOfLeave").val();
		$note = $("#note").val();
		if( $applyTo && $fromDate && $type){
			$.ajax({
				url: "../php/saveform.php",
				type:"POST",
				data:{
					appliedTo: $applyTo,
					fromDate: $fromDate,
					toDate: $toDate,
					type: $type,
					note: $note
				},
				success: function($result){
					console.log($result);
					if($result == -1)
					window.location.href = "history.php";
				},
				error: function(){
					console.log("error");
				} 
			});
		}
	});
});