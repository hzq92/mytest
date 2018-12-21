//farm 多个弹窗
function show(tag){
 var SonContent=document.getElementById(tag);
 SonContent.style.display='block';
 }
function hide(tag){
 var SonContent=document.getElementById(tag);
 SonContent.style.display='none';
}

$(function(){
    //弹出框
	jQuery(document).ready(function($){
	//open popup
	$('.listBox .points').on('click', function(event){
	  event.preventDefault();
	  $('.floatbox').addClass('is-visible');
	});

	$('.btn_province').on('click', function(event){
	  event.preventDefault();
	  $('.floatbox').addClass('is-visible');
	});

	$('.btn_sign').on('click', function(event){
	  event.preventDefault();
	  $('.floatbox').addClass('is-visible');
	});

	//close popup
	$('.floatbox').on('click', function(event){
	  if( $(event.target).is('.floatbox')) {
	    event.preventDefault();
	    $('.floatbox').removeClass('is-visible');
	  }
	});
	$(document).keyup(function(event){
	    if(event.which=='27'){
	      $('.floatbox').removeClass('is-visible');
	    }
	  });
	});

	//tab切换
	$(".comTtl li").click(function(){
		$(this).addClass("active");
		$(this).siblings().removeClass("active");
		var $linum=$(".comTtl li").index(this);
	        $(".comTtl li").removeClass("active");
	        $(this).addClass("active");            
	        $(".comTabCont .comTab").removeClass("dispBlock");
	        $(".comTabCont .comTab").eq($linum).addClass("dispBlock");
	});

});

//签到按钮
function myFunction() {
    x = document.getElementById("btn_sign");
    x.style.backgroundColor = '#b3b3b3';
    x.innerHTML = "已签到";
}