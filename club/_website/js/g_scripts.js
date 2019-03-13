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

	if(typeof document.getElementsByClassName("g_signout")[0] !== "undefined"){
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

	if(typeof document.getElementsByClassName("g_button_update")[0] !== "undefined"){
		document.getElementsByClassName("g_button_update")[0].addEventListener("click", () => {
			var g_firstname = document.getElementById("g_firstname");
			var g_lastname = document.getElementById("g_lastname");
			var g_birthday = document.getElementById("g_birthday");
			var g_personalnumber = document.getElementById("g_personalnumber");
			var g_address = document.getElementById("g_address");
			var g_phone = document.getElementById("g_phone");
			var g_workplace = document.getElementById("g_workplace");
			var g_position = document.getElementById("g_position");
			var CSRF_token = document.getElementById("CSRF_token");

			var data = {};
			data.type = "update-profile";
			data.g_firstname = g_firstname.value;
			data.g_lastname = g_lastname.value;
			data.g_birthday = g_birthday.value;
			data.g_personalnumber = g_personalnumber.value;
			data.g_address = g_address.value;
			data.g_phone = g_phone.value;
			data.g_workplace = g_workplace.value;
			data.g_position = g_position.value;
			data.CSRF_token = CSRF_token.value;

			var InputDiv = document.getElementsByClassName("InputDiv");
			var ErrorBox = document.getElementsByClassName("ErrorBox");
			for(var i = 0; i<InputDiv.length; i++){
				InputDiv[i].classList.remove("InputError");
			}

			for(var i = 0; i<ErrorBox.length; i++){
				ErrorBox[i].remove();
			}

			var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance 
			xmlhttp.open("POST", "?ajax=true");
			xmlhttp.setRequestHeader("Content-Type", "application/json");
			xmlhttp.onreadystatechange = function() {
			    if (xmlhttp.readyState === 4) {
					var resp = JSON.parse(xmlhttp.response);
			    	if(resp.Error.Code==1){
			    		var errorFields = resp.Error.gErrorRedLine;
						for (var item in errorFields) {
							let errorBox = document.createElement("div"); 
							errorBox.className = "ErrorBox";
							errorBox.innerHTML = errorFields[item];
							let elem = document.getElementById(item).parentElement;

							elem.className += " InputError";
							elem.appendChild(errorBox); 
						}
			    		
			    	}else if(resp.Success.Code==1){
			    		location.reload();
			    	}
			    };
			};

			xmlhttp.send(JSON.stringify(data));
		});
	};



	if(typeof document.getElementsByClassName("g_button_update_password")[0] !== "undefined"){
		document.getElementsByClassName("g_button_update_password")[0].addEventListener("click", () => {
			var g_old_password = document.getElementById("g_old_password");
			var g_password = document.getElementById("g_password");
			var g_comfirmpassword = document.getElementById("g_comfirmpassword");
			var CSRF_token = document.getElementById("CSRF_token");

			var data = {};
			data.type = "update-profile-password";
			data.g_old_password = g_old_password.value;
			data.g_password = g_password.value;
			data.g_comfirmpassword = g_comfirmpassword.value;
			data.CSRF_token = CSRF_token.value;

			var InputDiv = document.getElementsByClassName("InputDiv");
			var ErrorBox = document.getElementsByClassName("ErrorBox");
			for(var i = 0; i<InputDiv.length; i++){
				InputDiv[i].classList.remove("InputError");
			}

			for(var i = 0; i<ErrorBox.length; i++){
				ErrorBox[i].remove();
			}

			var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance 
			xmlhttp.open("POST", "?ajax=true");
			xmlhttp.setRequestHeader("Content-Type", "application/json");
			xmlhttp.onreadystatechange = function() {
			    if (xmlhttp.readyState === 4) {
					var resp = JSON.parse(xmlhttp.response);
			    	if(resp.Error.Code==1){
			    		var errorFields = resp.Error.gErrorRedLine;
						for (var item in errorFields) {
							let errorBox = document.createElement("div"); 
							errorBox.className = "ErrorBox";
							errorBox.innerHTML = errorFields[item];
							let elem = document.getElementById(item).parentElement;

							elem.className += " InputError";
							elem.appendChild(errorBox); 
						}
			    		
			    	}else if(resp.Success.Code==1){
			    		document.getElementById("msgForUser").innerHTML = resp.Success.Text;
			    		document.getElementById("msgForUserBox").style.display = "block";

			    		setTimeout(()=>{
			    			location.reload();
			    		}, 1500);
			    	}
			    };
			};

			xmlhttp.send(JSON.stringify(data));
		});
	};

	if(typeof document.getElementsByClassName("g_button_forget_second")[0] !== "undefined"){
		document.getElementsByClassName("g_button_forget_second")[0].addEventListener("click", () => {
			var g_email = document.getElementById("g_email");
			var CSRF_token = document.getElementById("CSRF_token");

			var data = {};
			data.type = "recover-password";
			data.g_email = g_email.value;
			data.CSRF_token = CSRF_token.value;

			var InputDiv = document.getElementsByClassName("InputDiv");
			var ErrorBox = document.getElementsByClassName("ErrorBox");
			for(var i = 0; i<InputDiv.length; i++){
				InputDiv[i].classList.remove("InputError");
			}

			for(var i = 0; i<ErrorBox.length; i++){
				ErrorBox[i].remove();
			}

			var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance 
			xmlhttp.open("POST", "?ajax=true");
			xmlhttp.setRequestHeader("Content-Type", "application/json");
			xmlhttp.onreadystatechange = function() {
			    if (xmlhttp.readyState === 4) {
					var resp = JSON.parse(xmlhttp.response);
			    	if(resp.Error.Code==1){
			    		var errorFields = resp.Error.gErrorRedLine;
						for (var item in errorFields) {
							let errorBox = document.createElement("div"); 
							errorBox.className = "ErrorBox";
							errorBox.innerHTML = errorFields[item];
							let elem = document.getElementById(item).parentElement;

							elem.className += " InputError";
							elem.appendChild(errorBox); 
						}
			    		
			    	}else if(resp.Success.Code==1){
			    		document.getElementById("g_recover_form").submit();
			    	}
			    };
			};

			xmlhttp.send(JSON.stringify(data));
		});
	};

	if(typeof document.getElementsByClassName("g_button_forget_final")[0] !== "undefined"){
		document.getElementsByClassName("g_button_forget_final")[0].addEventListener("click", () => {
			var g_email = document.getElementById("g_email");
			var g_code = document.getElementById("g_code");
			var g_newpass = document.getElementById("g_newpass");
			var CSRF_token = document.getElementById("CSRF_token");

			var data = {};
			data.type = "recover-password-final";
			data.g_email = g_email.value;
			data.g_code = g_code.value;
			data.g_newpass = g_newpass.value;
			data.CSRF_token = CSRF_token.value;

			var InputDiv = document.getElementsByClassName("InputDiv");
			var ErrorBox = document.getElementsByClassName("ErrorBox");
			for(var i = 0; i<InputDiv.length; i++){
				InputDiv[i].classList.remove("InputError");
			}

			for(var i = 0; i<ErrorBox.length; i++){
				ErrorBox[i].remove();
			}

			var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance 
			xmlhttp.open("POST", "?ajax=true");
			xmlhttp.setRequestHeader("Content-Type", "application/json");
			xmlhttp.onreadystatechange = function() {
			    if (xmlhttp.readyState === 4) {
					var resp = JSON.parse(xmlhttp.response);
			    	if(resp.Error.Code==1){
			    		var errorFields = resp.Error.gErrorRedLine;
						for (var item in errorFields) {
							let errorBox = document.createElement("div"); 
							errorBox.className = "ErrorBox";
							errorBox.innerHTML = errorFields[item];
							let elem = document.getElementById(item).parentElement;

							elem.className += " InputError";
							elem.appendChild(errorBox); 
						}
			    		
			    	}else if(resp.Success.Code==1){
			    		document.getElementById("g_recover_form").submit();
			    	}
			    };
			};

			xmlhttp.send(JSON.stringify(data));
		});
	};

})();