$(function(){
	/*点击切换*/
	$(".tabCateTtl li a").click(function(){
		$(this).addClass("cur");
		$(this).siblings().removeClass("cur");
		var $linum=$(".tabCateTtl li a").index(this);
            $(".tabCateTtl li a").removeClass("cur");
            $(this).addClass("cur");            
            $(".tabCateCon .tabPro").removeClass("dispBlock");
            $(".tabCateCon .tabPro").eq($linum).addClass("dispBlock");
	});

	$(".tabTtl li").click(function(){
		$(this).addClass("active");
		$(this).siblings().removeClass("active");
		var $linum=$(".tabTtl li").index(this);
            $(".tabTtl li").removeClass("active");
            $(this).addClass("active");            
            $(".tabCon .orderList").removeClass("dispBlock");
            $(".tabCon .orderList").eq($linum).addClass("dispBlock");
	});

	$(".tabTtl li").click(function(){
		$(this).addClass("active");
		$(this).siblings().removeClass("active");
		var $linum=$(".tabTtl li").index(this);
            $(".tabTtl li").removeClass("active");
            $(this).addClass("active");            
            $(".tabCon ul").removeClass("dispBlock");
            $(".tabCon ul").eq($linum).addClass("dispBlock");
	});

	//全选
	$("#checkall").click(function() {
        sign=$(this).attr("sign");
        if(!sign){
            $(".boxcheck").find("input").prop("checked",false);
            $(this).attr("sign","1");
			$(this).addClass("checkall_active");
        }else{
            $(".boxcheck").find("input").prop("checked",true);
            $(this).attr("sign","");
			$(this).removeClass("checkall_active");
        }
        $(".boxcheck").find("label").click();
    });

    //弹出框
	jQuery(document).ready(function($){
	//open popup
	$('.ico_del').on('click', function(event){
	  event.preventDefault();
	  $('#floatbox').addClass('is-visible');
	});
	//close popup
	$('.flbox').on('click', function(event){	  
	  //点击'.btn_cancel'关闭弹出框
	  if( $(event.target).is('.btn_cancel')) {
	    event.preventDefault();
	    $('#floatbox').removeClass('is-visible');
	  }
	});
	//close popup when clicking the esc keyboard button
	$(document).keyup(function(event){
	    if(event.which=='27'){
	      $('#floatbox').removeClass('is-visible');
	    }
	  });
	});
});