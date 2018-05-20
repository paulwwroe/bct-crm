(function($) { "use strict";
  
  $("#log-in-error").hide();
  
  var handleLogIn = function() {

    var referrer = $("#referrer").val();

  	$.ajax({

      type : "POST",
  		url : "processes/User.login.php",
  		data : $("#form").serialize(),
  		error : handleError,
  		statusCode : {

  			200 : function() {
  				if (referrer.length > 0) {
  					window.location.replace(decodeURIComponent(referrer));
  				} else {
  					window.location.replace("views/index.php");
  				}
  			},

  			500 : handleError
  			
  		}

  	});

  }

  var handleError = function() {

  	$("#log-in-error").show();

  	$("#username").val("");
  	$("#password").val("");

    $("#log-in-error").focus();

  };

  var handleSubmit = function(event) {

  	event.preventDefault();

  	$("#log-in-error").hide();

  	var username = $("#username").val();
  	var password = $("#password").val();

  	if (username.length === 0 || password.length === 0) {
  		handleError();
  		return;
  	}

  	var regex = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
  	if (!regex.test(username)) {
  		handleError();
  		return;
  	}

  };

  $("#log-in-form").submit(handleSubmit);

})(jQuery); // End of use strict
