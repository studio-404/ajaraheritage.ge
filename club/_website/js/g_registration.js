document.getElementsByClassName("g_button_next_first")[0].addEventListener("click", function(){
	var data = {};
	
	var memberTypeList = document.getElementsByClassName("g_memberType");
	for(var i = 0; i < memberTypeList.length; i++){
		if(memberTypeList[i].checked){
			data.memberType = memberTypeList[i].value;
		}
	}

	var projects = document.getElementsByClassName("g_chosenproject");
	for(var i = 0; i < projects.length; i++){
		if(projects[i].checked){
			data.projects = projects[i].value;
		}
	}

	console.log(data);
});

(function(){


});