$(document).ready(function() {
	$("#loginform").validate({
		ignore: "input[type=hidden]"
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
		},
		submitHandler: function (form) { 
			$.ajax ({ url: "signup.php",
						data: $("#loginform").serialize(),
						dataType: "text",
						type: "POST",
						success: function(result){
							if (result == "true") {
								if (typeof(Storage) !== "undefined") {
								  localStorage.setItem("username", $('.nick1').first().val());
								  localStorage.setItem("name", $('.nickn').first().val());
								  localStorage.setItem("name", "Scouter");
								}
								window.location.replace("./match_scout.php");
							} else if (result == "Exist") {
								alert("The username has already taken, please choose another name.");
							}
						},
						error: function(xhr,status,error) {
							alert("Error! Please check your connection again.");
						}
			});
			return false;
		}
		, rules: {
			"nickn": {
				required: true
			},
			"pass": {
				required: true,
			},
			"nick1": {
				required: true,
			},
			"re-pass": {
				equalTo: "#g_pass"
			}
		}
	})
});