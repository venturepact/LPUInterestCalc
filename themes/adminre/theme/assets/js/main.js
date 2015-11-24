"use strict";var Core=function(){var e=$("body"),n=function(){function e(){var e=window.navigator.userAgent,n=e.indexOf("MSIE ");if(n>0||navigator.userAgent.match(/Trident.*rv\:11\./)){var t=parseInt(e.substring(n+5,e.indexOf(".",n)));return 9===t&&$("body").addClass("no-js ie"+t),t}return!1}$.fn.disableSelection=function(){return this.attr("unselectable","on").css("user-select","none").on("selectstart",!1)},e()},t=function(){setTimeout(function(){$("body").addClass("onload-check")},100),$(".animated-delay[data-animate]").each(function(){var e=$(this),n=e.data("animate"),t="fadeIn";n.length>1&&n.length<3&&(n=e.data("animate")[0],t=e.data("animate")[1]);setTimeout(function(){e.removeClass("animated-delay").addClass("animated "+t).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){e.removeClass("animated "+t)})},n)}),$(".animated-waypoint").each(function(){var e=$(this),n=e.data("animate"),t="70%";n.length>1&&n.length<3&&(n=e.data("animate")[0],t=e.data("animate")[1]);new Waypoint({element:e,handler:function(){console.log(t),e.hasClass("animated-waypoint")&&e.removeClass("animated-waypoint").addClass("animated "+n).one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){e.removeClass("animated "+n)})},offset:t})})},a=function(){$(".navbar-search").on("click",function(e){var n=$(this),t=n.find("input"),a=n.find(".search-remove");$("body.mobile-view").length&&(n.addClass("search-open"),a.length||n.append('<div class="search-remove"></div>'),setTimeout(function(){n.find(".search-remove").fadeIn(),t.focus(),t.one("keydown",function(){$(this).val("")})},330),"search-remove"==$(e.target).attr("class")&&(n.removeClass("search-open"),n.find(".search-remove").remove()))}),$(".dropdown-item-slide").length&&($(".dropdown-item-slide").on("shown.bs.dropdown",function(){var e=$(this);setTimeout(function(){e.addClass("slide-open")},20)}),$(".dropdown-item-slide").on("hidden.bs.dropdown",function(){$(this).removeClass("slide-open")})),$("#user-status").length&&$("#user-status").multiselect({buttonClass:"btn btn-default btn-sm",buttonWidth:100,dropRight:!1}),$("#user-role").length&&$("#user-role").multiselect({buttonClass:"btn btn-default btn-sm",buttonWidth:100,dropRight:!0}),$(".dropdown-menu.dropdown-persist").length&&$(".dropdown-menu.dropdown-persist").on("click",function(e){function n(){t.parents(".dropdown-persist").find(".btn-group").each(function(){$(this).children(".multiselect").length&&$(this).removeClass("open")})}e.stopPropagation();var t=$(e.target);t.hasClass("multiselect")||t.parent().hasClass("multiselect")?(n(),t.parents(".btn-group").toggleClass("open")):n()});var e=$("#topbar-dropmenu"),n=e.find(".metro-tile"),t=$(".metro-modal");$(".topbar-menu-toggle").on("click",function(){e.slideToggle(230).toggleClass("topbar-menu-open"),$(n).addClass("animated animated-short fadeInDown").css("opacity",1),t.length||(t=$('<div class="metro-modal"></div>').appendTo("body")),setTimeout(function(){t.fadeIn()},380)}),$("body").on("click",".metro-modal",function(){t.fadeOut("fast"),setTimeout(function(){e.slideToggle(150).toggleClass("topbar-menu-open")},250)})},s=function(n){$(".nano").length&&$(".nano").nanoScroller({preventPageScrolling:!0});var t=function(){e.hasClass("sb-l-c")&&"sb-l-m"===n.collapse&&e.removeClass("sb-l-c"),e.toggleClass(n.collapse).removeClass("sb-r-o").addClass("sb-r-c"),i()},a=function(){n.siblingRope===!0&&!e.hasClass("mobile-view")&&e.hasClass("sb-r-o")?e.toggleClass("sb-r-o sb-r-c").toggleClass(n.collapse):e.toggleClass("sb-r-o sb-r-c").addClass(n.collapse),i()};$(".sidebar-toggle-mini").on("click",function(n){n.preventDefault(),e.addClass("sb-l-c"),i(),e.hasClass("mobile-view")||setTimeout(function(){e.toggleClass("sb-l-m sb-l-o")},250)});var s=function(){$("body.sb-l-o").length||$("body.sb-l-m").length||$("body.sb-l-c").length||$("body").addClass(n.sbl),$("body.sb-r-o").length||$("body.sb-r-c").length||$("body").addClass(n.sbr),$(window).width()<1080&&e.removeClass("sb-r-o").addClass("mobile-view sb-l-m sb-r-c")},o=function(){if($(window).width()<1080&&!e.hasClass("mobile-view"))e.removeClass("sb-r-o").addClass("mobile-view sb-l-m sb-r-c");else{if(!($(window).width()>1080))return;e.removeClass("mobile-view")}},i=function(){setTimeout(function(){$(window).trigger("resize")},300)};s(),$("#toggle_sidemenu_l").click(t),$("#toggle_sidemenu_r").click(a);var l=function(){o()},r=_.debounce(l,300);$(window).resize(r);var d=$(".user-menu").find("a");$(".sidebar-menu-toggle").click(function(e){e.preventDefault(),$(".user-menu").toggleClass("usermenu-open").slideToggle("fast"),$(".user-menu").hasClass("usermenu-open")&&d.addClass("animated fadeIn")}),$(".sidebar-menu li a.accordion-toggle").click(function(e){if(e.preventDefault(),!$("body").hasClass("sb-l-m")||$(this).parents("ul.sub-nav").length){if($(this).parents("ul.sub-nav").length){var n=$(this).next("ul.sub-nav"),t=$(this).parent().siblings("li").children("a.accordion-toggle.menu-open").next("ul.sub-nav");n.slideUp("fast","swing",function(){$(this).attr("style","").prev().removeClass("menu-open")}),t.slideUp("fast","swing",function(){$(this).attr("style","").prev().removeClass("menu-open")})}else $("a.accordion-toggle.menu-open").next("ul").slideUp("fast","swing",function(){$(this).attr("style","").prev().removeClass("menu-open")});$(this).hasClass("menu-open")||$(this).next("ul").slideToggle("fast","swing",function(){$(this).attr("style","").prev().toggleClass("menu-open")})}})},o=function(){var n=$('.tray[data-tray-height="match"]');n.length&&n.each(function(){var e=$("body").height();$(this).height(e)});var t=function(){$(window).width()<1e3?e.addClass("tray-rescale"):e.removeClass("tray-rescale tray-rescale-left tray-rescale-right")},a=_.debounce(t,300);e.hasClass("disable-tray-rescale")||($(window).resize(a),t())},i=function(){$(".sortable").length&&($(".sortable").sortable(),$(".sortable").disableSelection());var e=$("[data-toggle=tooltip]");e.length&&(e.parents("#sidebar_left")?e.tooltip({container:$("body"),template:'<div class="tooltip tooltip-white" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'}):e.tooltip()),$("[data-toggle=popover]").length&&$("[data-toggle=popover]").popover(),$(".dropdown-menu .dropdown-persist").click(function(e){e.stopPropagation()}),$(".dropdown-menu .nav-tabs li a").click(function(e){e.preventDefault(),e.stopPropagation(),$(this).tab("show")}),$(".btn-states").length&&$(".btn-states").click(function(){$(this).addClass("active").siblings().removeClass("active")})};return{init:function(e){var l={sbl:"sb-l-o",sbr:"sb-r-c",collapse:"sb-l-m",siblingRope:!0},e=$.extend({},l,e);n(),t(),s(e),o(),i(),a()}}}(),bgPrimary="#4a89dc",bgPrimaryL="#5d9cec",bgPrimaryLr="#83aee7",bgPrimaryD="#2e76d6",bgPrimaryDr="#2567bd",bgSuccess="#70ca63",bgSuccessL="#87d37c",bgSuccessLr="#9edc95",bgSuccessD="#58c249",bgSuccessDr="#49ae3b",bgInfo="#3bafda",bgInfoL="#4fc1e9",bgInfoLr="#74c6e5",bgInfoD="#27a0cc",bgInfoDr="#2189b0",bgWarning="#f6bb42",bgWarningL="#ffce54",bgWarningLr="#f9d283",bgWarningD="#f4af22",bgWarningDr="#d9950a",bgDanger="#e9573f",bgDangerL="#fc6e51",bgDangerLr="#f08c7c",bgDangerD="#e63c21",bgDangerDr="#cd3117",bgAlert="#967adc",bgAlertL="#ac92ec",bgAlertLr="#c0b0ea",bgAlertD="#815fd5",bgAlertDr="#6c44ce",bgSystem="#37bc9b",bgSystemL="#48cfad",bgSystemLr="#65d2b7",bgSystemD="#2fa285",bgSystemDr="#288770",bgLight="#f3f6f7",bgLightL="#fdfefe",bgLightLr="#ffffff",bgLightD="#e9eef0",bgLightDr="#dfe6e9",bgDark="#3b3f4f",bgDarkL="#424759",bgDarkLr="#51566c",bgDarkD="#2c2f3c",bgDarkDr="#1e2028",bgBlack="#283946",bgBlackL="#2e4251",bgBlackLr="#354a5b",bgBlackD="#1c2730",bgBlackDr="#0f161b";