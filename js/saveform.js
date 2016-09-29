$(document).ready(function() {
    $("#apply").on("click", function() {
        $("#apply>a").addClass("hidden");
        $("#applySpinner").addClass("is-active");
        $applyTo = $('li:contains("' + $("#applyTo").val() + '")').attr('id');
        $fromDate = moment(new Date($("#fromDate").val())).format("YYYY/MM/DD");
        $toDate = moment(new Date($("#toDate").val())).format("YYYY/MM/DD");
        $type = $("#typeOfLeave").val();
        $note = $("#note").val();
        if ($applyTo && $fromDate != 'Invalid date' && $type && toDate != 'Invalid date') {
            $("#error").html('');
            $.ajax({
                url: "../php/saveform.php",
                type: "POST",
                data: {
                    appliedTo: $applyTo,
                    fromDate: $fromDate,
                    toDate: $toDate,
                    type: $type,
                    note: $note
                },
                success: function($result) {
                    if ($result == 'applied')
                        window.location.href = "history.php";
                    else {
                        $("#apply>a").removeClass("hidden");
                        $("#applySpinner").hide();
                        $("#error").html($result);
                    }
                },
                error: function() {
                    console.log("error");
                }
            });
        } else {
            $("#apply>a").removeClass("hidden");
            $("#applySpinner").removeClass("is-active");
            $("#error").html('Please fill the complete form.');
        }
    });
});
