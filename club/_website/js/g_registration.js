var lang = document.getElementById("input_lang").value;

if(typeof document.getElementsByClassName("g_button_next_first")[0] !== "undefined"){
	document.getElementsByClassName("g_button_next_first")[0].addEventListener("click", () => {
		var data = {};
		var memberTypeList = document.getElementsByClassName("g_memberType");
		for(var i = 0; i < memberTypeList.length; i++){
			if(memberTypeList[i].checked){
				data.memberType = memberTypeList[i].value;
			}
		};

		var projects = document.getElementsByClassName("g_chosenproject");
		for(var i = 0; i < projects.length; i++){
			if(projects[i].checked){
				data.projects = projects[i].value;
			}
		};

		if(
			typeof data.memberType !== "undefined" && 
			typeof data.projects !== "undefined"  
		){
			document.getElementById("registration_step_one").submit();
		}
	});
};

if(typeof document.getElementsByClassName("g_button_prev_second")[0] !== "undefined"){
	document.getElementsByClassName("g_button_prev_second")[0].addEventListener("click", () => {
		location.href = lang+"/registratsia";
	});
};

if(typeof document.getElementsByClassName("g_button_next_second")[0] !== "undefined"){
	document.getElementsByClassName("g_button_next_second")[0].addEventListener("click", () => {
		var g_firstname = document.getElementById("g_firstname");
		var g_lastname = document.getElementById("g_lastname");
		var g_birthday = document.getElementById("g_birthday");
		var g_usertype = document.getElementById("g_usertype");
		var g_personalnumber = document.getElementById("g_personalnumber");
		var g_address = document.getElementById("g_address");
		var g_email = document.getElementById("g_email");
		var g_phone = document.getElementById("g_phone");
		var g_workplace = document.getElementById("g_workplace");
		var g_position = document.getElementById("g_position");
		var g_password = document.getElementById("g_password");
		var g_comfirmpassword = document.getElementById("g_comfirmpassword");
		var g_agreeterms = document.getElementById("g_agreeterms");
		var CSRF_token = document.getElementById("CSRF_token");

		var data = {};
		data.type = "register";
		data.g_firstname = g_firstname.value;
		data.g_lastname = g_lastname.value;
		data.g_birthday = g_birthday.value;
		data.g_usertype = g_usertype.value;
		data.g_personalnumber = g_personalnumber.value;
		data.g_address = g_address.value;
		data.g_email = g_email.value;
		data.g_phone = g_phone.value;
		data.g_workplace = g_workplace.value;
		data.g_position = g_position.value;
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



		if(g_agreeterms.checked){
			var xmlhttp = new XMLHttpRequest();   // new HttpRequest instance 
			xmlhttp.open("POST", "?ajax=true");
			xmlhttp.setRequestHeader("Content-Type", "application/json");
			xmlhttp.onreadystatechange = function() {
			    if (xmlhttp.readyState === 4) {
					var resp = JSON.parse(xmlhttp.response);
			    	// console.log(resp);
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
			    		var genHash = resp.Success.genHash;
			    		document.getElementById("userhash").value = genHash;
			    		document.getElementById("g_final_step_form").submit();
			    	}
			    };
			 };

			xmlhttp.send(JSON.stringify(data));		
		}else{
			alert(g_agreeterms.getAttribute("data-error"));
		}
	});
};