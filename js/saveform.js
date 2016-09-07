$(document).ready(function(){
	$("#apply").on("click",function(){
		$("#apply>a").addClass("hidden");
		$("#applySpinner").addClass("is-active");
		$applyTo = $('li:contains("'+$("#applyTo").val()+'")').attr('id');
		$fromDate = moment(new Date($("#fromDate").val())).format("YYYY/MM/DD");
		$toDate = moment(new Date($("#toDate").val())).format("YYYY/MM/DD");
		$type = $("#typeOfLeave").val();
		$note = $("#note").val();
		if($applyTo && $fromDate && $type &&toDate){
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
					if($result == 1)
					window.location.href = "history.php";
				},
				error: function(){
					console.log("error");
				} 
			});
		}
	});
});