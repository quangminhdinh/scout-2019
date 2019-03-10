$(".tab-wizard").steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: "Submit"
    }, 
    onFinished: function (event, currentIndex) {
        var form = $(this);
        // Submit form input
        form.submit();        
    }
});


var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h6"
    , bodyTag: "section"
    , transitionEffect: "fade"
    , titleTemplate: '<span class="step">#index#</span> #title#'
    , labels: {
        finish: "Submit"
    }
    , onStepChanging: function (event, currentIndex, newIndex) {
		if (newIndex === 2 && $('#startpos').val() === "") {
			$('#startpos-error').show();
			$('#startpos-error').html("Cax");
			return false;
		}
		if (newIndex === 3 && $('#end-process').val() === "") {
			$('#strategy-error').show();
			$('#strategy-error').html("Cax");
			return false;
		}
		$('#startpos-error').hide();
        if (currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())) {
			if (newIndex === 2) {
				$('#gart-menu').show();
				$('#gart-menu').css('left', getInfo().width * 0.1);
				$('#gart-menu').css('top', getInfo().width * 0.1);
			} else {
				$('#gart-menu').hide();
			}
			return true;
		}
		return false;
    }
    , onFinishing: function (event, currentIndex) {
        return form.validate().settings.ignore = ":disabled", form.valid()
    }
    , onFinished: function (event, currentIndex) {
         $.ajax ({ url: "match.php",
					data: $('#gart-frm').serialize(),
					dataType: "text",
					type: "POST",
					success: function(result){
						if (result == "true") {
							window.location.replace("./match_scout.php");
						}
					},
					error: function(xhr,status,error) {
						alert("Error! Please check your connection again.");
					}
		});
    }
}), $(".validation-wizard").validate({
    ignore: []
    , errorClass: "text-danger"
    , successClass: "text-success"
    , highlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , errorPlacement: function (error, element) {
        error.insertAfter(element)
    }
    , rules: {
        email: {
            email: !0
        },
		hid: {
			required: true
		},
		hid3: {
			required: true
		}
    }
})