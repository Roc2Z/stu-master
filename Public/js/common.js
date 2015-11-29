/* 顶部菜单高亮 */
function highlight_manNav()
	{
	 	var mainNav = $(".main-nav");
	    url = window.location.pathname + window.location.search;
	    url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
	    mainNav.find("a[href='" + url + "']").parent().addClass("current");
	}
/* 左边菜单高亮 */	
function highlight_subNav()
	{
	 	var subNav = $(".side-sub-menu");
	    url = window.location.pathname + window.location.search;
	    url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
	    subNav.find("a[href='" + url + "']").addClass("active");
	}
$('document').ready(function(){

	//侧边隐藏
	$('.subnav h3').click(function(){
		$(this).next().slideToggle(500);
	})
	//用户隐藏
	$('.user-bar').mouseover(function(){
		$('.user-menu').removeClass('hidden');
	}).mouseout(function(){
		$('.user-menu').addClass('hidden');
	});
	//checkbox -all

	$('.check-all').click(function(){
		var flag = $(this).prop("checked");
		$('.ids').each(function(){
			$(this).prop('checked',flag);
		});
			//$('.ids').attr("checked",true);
	});
	//ldsn-cp 宽度
	var mwidth = $('.main-content').width();
	$('.ldsn-cp').css('width',mwidth);

})
