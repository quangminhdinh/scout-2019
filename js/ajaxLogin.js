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
			$.ajax ({ url: "login.php",
						data: $("#loginform").serialize(),
						dataType: "text",
						type: "POST",
						success: function(result){
							if (result.slice(0, 4) == "true") {
								var res = result.split("-");
								localStorage.setItem("username", res[0]);
								localStorage.setItem("name", res[1]);
								localStorage.setItem("type", res[2]);
								if (res[2] == "Scouter") {
									window.location.replace("./match_scout.php");
								}
							} else if (result == "Wrong") {
								alert("Incorrect username or password, please check again.");
							}
						},
						error: function(xhr,status,error) {
							alert("Error! Please check your connection again.");
						}
			});
			return false;
		}
		, rules: {
			"username": {
				required: true
			},
			"password": {
				required: true,
			}
		}
	})
});