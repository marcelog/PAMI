window.onload = function () {
	// Fix PNG for Ie 6
	if ( (/MSIE 6\.0/).test(navigator.userAgent) && !(/MSIE 7\.0/).test(navigator.userAgent) && !(/MSIE 8\.0/).test(navigator.userAgent) ) {	
		DD_belatedPNG.fix(".fix-png");
	}
}

$(document).ready(function(){
	
	// Setup Tabs
	/*if($(".tab-title").length > 0) {
		var tab_active; // 0 is the first tab
		var the_url = window.location.hash.split("#tab-");
		if(the_url.length > 1) {
			tab_active = the_url[1];
		} else {
			tab_active = 0;
		}
		$(".tab-title li").removeClass("active").eq(tab_active).addClass("active");
		$(".tab-content").hide();
		$(".tab-content").eq(tab_active).show();
		$(".tab-title li").each(function() {
			var this_tab = $(this);
			this_tab.bind("click", function() {
				$(".tab-title li").removeClass("active");
				$(this).addClass("active");
				
				$(".tab-content").hide();
				var get_tab = $(this).find("a").eq(0).attr("rel");
				$("#" + get_tab).show();
				
				$(".set-height-1").height("auto");
				equalHeight(".set-height-1");
				
				return false;
			});
		});
	}*/
});

//Auto hide label
function hideLabel(obj,text) {
	$("#" + obj).focus(function() {
		if($(this).val() == text) {
			$(this).val("");
		}
	});
	$("#" + obj).blur(function() {
		if($(this).val() == "") {
			$(this).val(text);
		}
	});
}

function equalHeight(obj) {
	if($(obj).length > 0) {
		var maxHCell = 0;
		$(obj).each(function() {
			var thisObj = $(this);
			var thisH = thisObj.height();
			if(maxHCell < thisH) {
				maxHCell = thisH;
			}
		});
		$(obj).height(maxHCell);
	}
}