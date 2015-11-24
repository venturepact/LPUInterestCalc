"use strict";var Demo=function(){var e=function(){$(".admin-form").on("submit",function(e){return $("body.timeline-page").length||$("body.admin-validation-page").length?void 0:(e.preventDefault,alert("Your form has submitted!"),!1)})},a=function(){$("#topbar-multiple").length&&$("#topbar-multiple").multiselect({buttonClass:"btn btn-default btn-sm ph15",dropRight:!0})},t=function(){if($("#skin-toolbox").length){$("#skin-toolbox .panel-heading").on("click",function(){$("#skin-toolbox").toggleClass("toolbox-open")}),$("#skin-toolbox .panel-heading").disableSelection();var e=$("#topbar"),a=$("#sidebar_left"),t=$(".navbar"),r=t.children(".navbar-branding"),o="bg-primary bg-success bg-info bg-warning bg-danger bg-alert bg-system bg-dark bg-light",i="sidebar-light light dark",n={headerSkin:"bg-light",sidebarSkin:"sidebar-default",headerState:"navbar-fixed-top",breadcrumbState:"relative",breadcrumbHidden:"visible"},s="admin-settings",l=localStorage.getItem(s);null===l&&(localStorage.setItem(s,JSON.stringify(n)),l=localStorage.getItem(s)),function(){var s=JSON.parse(l);n=s,$.each(s,function(n,s){switch(n){case"headerSkin":t.removeClass(o).addClass(s),"bg-light"===s?r.removeClass(o):r.removeClass(o).addClass(s),$('#toolbox-header-skin input[value="bg-light"]').prop("checked",!1),$('#toolbox-header-skin input[value="'+s+'"]').prop("checked",!0);break;case"sidebarSkin":a.removeClass(i).addClass(s),$('#toolbox-sidebar-skin input[value="bg-light"]').prop("checked",!1),$('#toolbox-sidebar-skin input[value="'+s+'"]').prop("checked",!0);break;case"headerState":"navbar-fixed-top"===s?(t.addClass("navbar-fixed-top"),$("#header-option").prop("checked",!0)):(t.removeClass("navbar-fixed-top"),$("#header-option").prop("checked",!1));break;case"sidebarState":"affix"===s?(a.addClass("affix"),$("#sidebar-option").prop("checked",!0)):(a.removeClass("affix"),$("#sidebar-option").prop("checked",!1));break;case"breadcrumbState":"affix"===s?(e.addClass("affix"),$("#breadcrumb-option").prop("checked",!0)):(e.removeClass("affix"),$("#breadcrumb-option").prop("checked",!1));break;case"breadcrumbHidden":"hidden"===s?(e.addClass("hidden"),$("#breadcrumb-hidden").prop("checked",!0)):(e.removeClass("hidden"),$("#breadcrumb-hidden").prop("checked",!1))}})}(),$("#toolbox-header-skin input").on("click",function(){var e=$(this).val();t.removeClass(o).addClass(e),r.removeClass(o).addClass(e+" dark"),n.headerSkin=e+" dark",localStorage.setItem(s,JSON.stringify(n))}),$("#toolbox-sidebar-skin input").on("click",function(){var e=$(this).val();a.removeClass(i).addClass(e),n.sidebarSkin=e,localStorage.setItem(s,JSON.stringify(n))}),$("#header-option").on("click",function(){var r="navbar-fixed-top";t.hasClass("navbar-fixed-top")?(t.removeClass("navbar-fixed-top"),r="relative",a.removeClass("affix"),$("#sidebar-option").parent(".checkbox-custom").addClass("checkbox-disabled").end().prop("checked",!1).attr("disabled",!0),n.sidebarState="",localStorage.setItem(s,JSON.stringify(n)),e.removeClass("affix"),$("#breadcrumb-option").parent(".checkbox-custom").addClass("checkbox-disabled").end().prop("checked",!1).attr("disabled",!0),n.breadcrumbState="",localStorage.setItem(s,JSON.stringify(n))):(t.addClass("navbar-fixed-top"),r="navbar-fixed-top",$("#sidebar-option").parent(".checkbox-custom").removeClass("checkbox-disabled").end().attr("disabled",!1),$("#breadcrumb-option").parent(".checkbox-custom").removeClass("checkbox-disabled").end().attr("disabled",!1)),n.headerState=r,localStorage.setItem(s,JSON.stringify(n))}),$("#sidebar-option").on("click",function(){var e="";a.hasClass("affix")?(a.removeClass("affix"),e=""):(a.addClass("affix"),e="affix"),$(".nano").length&&$(".nano").nanoScroller({preventPageScrolling:!0}),$(window).trigger("resize"),n.sidebarState=e,localStorage.setItem(s,JSON.stringify(n))}),$("#breadcrumb-option").on("click",function(){var a="";e.hasClass("affix")?(e.removeClass("affix"),a=""):(e.addClass("affix"),a="affix"),n.breadcrumbState=a,localStorage.setItem(s,JSON.stringify(n))}),$("#breadcrumb-hidden").on("click",function(){var a="";e.hasClass("hidden")?(e.removeClass("hidden"),a=""):(e.addClass("hidden"),a="hidden"),n.breadcrumbHidden=a,localStorage.setItem(s,JSON.stringify(n))}),$("#clearLocalStorage").on("click",function(){new PNotify({title:"Are you sure?",hide:!1,type:"dark",addclass:"mt50",buttons:{closer:!1,sticker:!1},confirm:{confirm:!0,buttons:[{text:"Yup, Do it.",addClass:"btn-sm btn-info"},{text:"Cancel",addClass:"btn-sm btn-danger"}]},history:{history:!1}}).get().on("pnotify.confirm",function(){localStorage.clear(),location.reload()}).on("pnotify.cancel",function(){})})}},r=function(){$(window).load(function(){})},o=function(){var e=[900,700,350,500],a=$("#sidebar-right-map");a.vectorMap({map:"us_lcc_en",backgroundColor:"transparent",series:{markers:[{attribute:"r",scale:[3,7],values:e}]},regionStyle:{initial:{fill:"#E5E5E5"},hover:{"fill-opacity":.3}},markers:[{latLng:[37.78,-122.41],name:"San Francisco,CA"},{latLng:[36.73,-103.98],name:"Texas,TX"},{latLng:[38.62,-90.19],name:"St. Louis,MO"},{latLng:[40.67,-73.94],name:"New York City,NY"}],markerStyle:{initial:{fill:"#a288d5",stroke:"#b49ae0","fill-opacity":1,"stroke-width":10,"stroke-opacity":.3,r:3},hover:{stroke:"black","stroke-width":2},selected:{fill:"blue"},selectedHover:{}}});var t=["US-CA","US-TX","US-MO","US-NY"],r=[bgPrimaryLr,bgInfoLr,bgWarningLr,bgAlertLr],o=[bgPrimary,bgInfo,bgWarning,bgAlert];$.each(t,function(e,t){$("path[data-code="+t+"]",a).css({fill:r[e]})}),a.find(".jvectormap-marker").each(function(e,a){$(a).css({fill:o[e],stroke:o[e]})})},i=function(){var e=$.fullscreen.isNativelySupported();$(".request-fullscreen").click(function(){e?$.fullscreen.isFullScreen()?$.fullscreen.exit():$("html").fullscreen({overflow:"visible"}):alert("Your browser does not support fullscreen mode.")})};return{init:function(){e(),a(),t(),r(),o(),i()}}}();