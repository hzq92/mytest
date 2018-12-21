//banner
$(document).ready(function(){
	$(".banner").hover(function(){
		$("#btn_prev,#btn_next").fadeIn()
	},function(){
		$("#btn_prev,#btn_next").fadeOut()
	});
	
	$dragBln = false;
	
	$(".banImg").touchSlider({
		flexible : true,
		speed : 200,
		btn_prev : $("#btn_prev"),
		btn_next : $("#btn_next"),
		paging : $(".banIcon a"),
		counter : function (e){
			$(".banIcon a").removeClass("on").eq(e.current-1).addClass("on");
		}
	});
	
	$(".banImg").bind("mousedown", function() {
		$dragBln = false;
	});
	
	$(".banImg").bind("dragstart", function() {
		$dragBln = true;
	});
	
	$(".banImg a").click(function(){
		if($dragBln) {
			return false;
		}
	});
	
	timer = setInterval(function(){
		$("#btn_next").click();
	}, 5000);
	
	$(".banner").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(function(){
			$("#btn_next").click();
		},5000);
	});
	
	$(".banImg").bind("touchstart",function(){
		clearInterval(timer);
	}).bind("touchend", function(){
		timer = setInterval(function(){
			$("#btn_next").click();
		}, 5000);
	});
});