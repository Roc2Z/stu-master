$("document").ready(function(){
	var btnStu    =   $(".stu-login");
	var btnTec    =   $(".tec-login");
	btnStu.click(function(){
		var stuName   =   $(".stu-form-account").val();
		var stuPswd   =   $(".stu-form-passwd").val();
		if(!stuName){
			alert('请输入用户名');
			return false;
		}
		if(!stuPswd){
			alert("请输入密码");
			return false;
		}
	});
	btnTec.click(function(){
		var stuName   =   $(".tec-form-account").val();
		var stuPswd   =   $(".tec-form-passwd").val();
		if(!stuName){
			alert('请输入用户名');
			return false;
		}
		if(!stuPswd){
			alert("请输入密码");
			return false;
		}
	});
	
});