/**
 * 教师界面异步传输
 * 
 * @authur Jason
 */
$('document').ready(function(){
	getinfo();
	$('.activty-btn').click(function(){
		setApply();
	});
	
});
function getinfo(){
	$.ajax({
		url    :"http://localhost/student/index.php/Home/stu/getStuInfo",
		dataType:"json",
		success:function(data){
			var table = "<tr><td>姓名：        </td><td>"+data.data.username      +"</td></tr>" +
					    "<tr><td>学号：        </td><td>"+data.data.school_id     +"</td></tr>" +
					    "<tr><td>专业：        </td><td>"+data.data.major         +"</td></tr>" +
					    "<tr><td>性别：        </td><td>"+data.data.sex           +"</td></tr>" +
					    "<tr><td>民族：        </td><td>"+data.data.nation        +"</td></tr>" +
					    "<tr><td>籍贯：        </td><td>"+data.data.country       +"</td></tr>" +
					    "<tr><td>身份证：      </td><td>"+data.data.person_id     +"</td></tr>" +
					    "<tr><td>政治面貌：	   </td><td>"+data.data.political     +"</td></tr>" +
					    "<tr><td>出生日期：	   </td><td>"+data.data.birth_time    +"</td></tr>" +
					    "<tr><td>入学年份：	   </td><td>"+data.data.register_time +"</td></tr>" ;
			var table1= "<tr><td>联系方式：    </td><td>"+data.data.phone         +"</td></tr>" +
					    "<tr><td>健康状况：    </td><td>"+data.data.health        +"</td></tr>" +
					    "<tr><td>家庭住址：    </td><td>"+data.data.family        +"</td></tr>" +
					    "<tr><td>家庭电话：    </td><td>"+data.data.familyphone	  +"</td></tr>" +
					    "<tr><td>邮编：        </td><td>"+data.data.zipcode       +"</td></tr>" +
					    "<tr><td>邮箱：        </td><td>"+data.data.mail          +"</td></tr>" ;
			var msg   = "未取得数据";
			if(data){
				$('.stuinfo').append(table);
				$('.stuinfo_person').append(table1);
			}else{
				$('.stuinfo').append(msg);
			}
		},
			
	});
}
/*function getApplyinfo(){
	$.ajax({
		url		:"http://localhost/student/index.php/Home/stu/getApplyinfo",
	});
}*/
function setApply(){
	var title       = $('#activty-name').val();
	var description = $('#activty-des').val();
	var reason 		= $('#apply-reason').val();
	var content 	= $('#editor').val();
	if(!title){
		alert('请填写标题');
		return false;
	}
	if(!description){
		alert('请填写描述');
		return false;
	}
	if(!reason){
		alert('请填写原因');
		return false;
	}
	if(!content){
		alert('请填写原因');
		return false;
	}
	var sendData 	= {'title':title,'description':description,'reason':reason,'content':content};
	//console.log(sendData);
	$.ajax({
		url		:"http://localhost/student/index.php/Home/stu/setApply",
		dataType:"json",
		type    :"post",
		data    :sendData,
		success :function(data){
			if(data.status ==0){
				alert('申请已提交');
				title.attr("value","");
				description.attr("value","");
				reason.attr("value","");
				content.attr("value","");
			}else{
				alert('申请提交失败');
			}
		}
	});
}