(function(){
	if(typeof document.getElementsByClassName("g_login_submit")[0] !== "undefined"){
		document.getElementsByClassName("g_login_submit")[0].addEventListener("click", () => {
			var g_login_email = document.getElementsByClassName("g_login_email")[0].value;
			var g_login_password = document.getElementsByClassName("g_login_password")[0].value;
			var CSRF_login_token = document.getElementsByClassName("CSRF_login_token")[0].value;
			var g_login_save = document.getElementsByClassName("g_login_save")[0].checked;

			var data = {};
			data.type = "login";
			data.g_login_email = g_login_email;
			data.g_login_password = g_login_password;
			data.CSRF_login_token = CSRF_login_token;
			data.g_login_save = g_login_save;

			var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance 
			xmlhttp.open("POST", "?ajax=true");
			xmlhttp.setRequestHeader("Content-Type", "application/json");
			xmlhttp.onreadystatechange = function() {
			    if (xmlhttp.readyState === 4) {
					var resp = JSON.parse(xmlhttp.response);
			    	if(resp.Error.Code==1){
			    		var errorText = resp.Error.Text;
			    		document.getElementsByClassName("g_login_error_box")[0].style.display = "block"; 
			    		document.getElementsByClassName("g_login_error_text")[0].innerHTML = errorText; 
					}else if(resp.Success.Code==1){
			    		document.getElementById("loginForm").submit();
			    	}
			    };
			};

			xmlhttp.send(JSON.stringify(data));
		});
	}

	if(document.getElementsByClassName("g_signout")[0] !== "undefined"){
		document.getElementsByClassName("g_signout")[0].addEventListener("click", () => {
			var data = {};
			data.type = "signout";

			var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance 
			xmlhttp.open("POST", "?ajax=true");
			xmlhttp.setRequestHeader("Content-Type", "application/json");
			xmlhttp.onreadystatechange = function() {
			    if (xmlhttp.readyState === 4) {
					var resp = JSON.parse(xmlhttp.response);
			    	if(resp.Error.Code==1){
			    		var errorText = resp.Error.Text;
			    		console.log("Error: "+errorText); 
					}else if(resp.Success.Code==1){
			    		location.reload();
			    	}
			    };
			};

			xmlhttp.send(JSON.stringify(data));
		});
	};
})();