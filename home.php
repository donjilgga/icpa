<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv='X-UA-Compatible' content='IE=edge'/><script type="text/javascript">(window.NREUM||(NREUM={})).init={privacy:{cookies_enabled:true}};(window.NREUM||(NREUM={})).loader_config={licenseKey:"a653bfb5fd",applicationID:"313827782"};window.NREUM||(NREUM={}),__nr_require=function(e,n,t){function r(t){if(!n[t]){var i=n[t]={exports:{}};e[t][0].call(i.exports,function(n){var i=e[t][1][n];return r(i||n)},i,i.exports)}return n[t].exports}if("function"==typeof __nr_require)return __nr_require;for(var i=0;i<t.length;i++)r(t[i]);return r}({1:[function(e,n,t){function r(){}function i(e,n,t){return function(){return o(e,[u.now()].concat(c(arguments)),n?null:this,t),n?void 0:this}}var o=e("handle"),a=e(5),c=e(6),f=e("ee").get("tracer"),u=e("loader"),s=NREUM;"undefined"==typeof window.newrelic&&(newrelic=s);var d=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],p="api-",l=p+"ixn-";a(d,function(e,n){s[n]=i(p+n,!0,"api")}),s.addPageAction=i(p+"addPageAction",!0),s.setCurrentRouteName=i(p+"routeName",!0),n.exports=newrelic,s.interaction=function(){return(new r).get()};var m=r.prototype={createTracer:function(e,n){var t={},r=this,i="function"==typeof n;return o(l+"tracer",[u.now(),e,t],r),function(){if(f.emit((i?"":"no-")+"fn-start",[u.now(),r,i],t),i)try{return n.apply(this,arguments)}catch(e){throw f.emit("fn-err",[arguments,this,e],t),e}finally{f.emit("fn-end",[u.now()],t)}}}};a("actionText,setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(e,n){m[n]=i(l+n)}),newrelic.noticeError=function(e,n){"string"==typeof e&&(e=new Error(e)),o("err",[e,u.now(),!1,n])}},{}],2:[function(e,n,t){function r(e,n){var t=e.getEntries();t.forEach(function(e){"first-paint"===e.name?d("timing",["fp",Math.floor(e.startTime)]):"first-contentful-paint"===e.name&&d("timing",["fcp",Math.floor(e.startTime)])})}function i(e,n){var t=e.getEntries();t.length>0&&d("lcp",[t[t.length-1]])}function o(e){e.getEntries().forEach(function(e){e.hadRecentInput||d("cls",[e])})}function a(e){if(e instanceof m&&!g){var n=Math.round(e.timeStamp),t={type:e.type};n<=p.now()?t.fid=p.now()-n:n>p.offset&&n<=Date.now()?(n-=p.offset,t.fid=p.now()-n):n=p.now(),g=!0,d("timing",["fi",n,t])}}function c(e){d("pageHide",[p.now(),e])}if(!("init"in NREUM&&"page_view_timing"in NREUM.init&&"enabled"in NREUM.init.page_view_timing&&NREUM.init.page_view_timing.enabled===!1)){var f,u,s,d=e("handle"),p=e("loader"),l=e(4),m=NREUM.o.EV;if("PerformanceObserver"in window&&"function"==typeof window.PerformanceObserver){f=new PerformanceObserver(r);try{f.observe({entryTypes:["paint"]})}catch(v){}u=new PerformanceObserver(i);try{u.observe({entryTypes:["largest-contentful-paint"]})}catch(v){}s=new PerformanceObserver(o);try{s.observe({type:"layout-shift",buffered:!0})}catch(v){}}if("addEventListener"in document){var g=!1,y=["click","keydown","mousedown","pointerdown","touchstart"];y.forEach(function(e){document.addEventListener(e,a,!1)})}l(c)}},{}],3:[function(e,n,t){function r(e,n){if(!i)return!1;if(e!==i)return!1;if(!n)return!0;if(!o)return!1;for(var t=o.split("."),r=n.split("."),a=0;a<r.length;a++)if(r[a]!==t[a])return!1;return!0}var i=null,o=null,a=/Version\/(\S+)\s+Safari/;if(navigator.userAgent){var c=navigator.userAgent,f=c.match(a);f&&c.indexOf("Chrome")===-1&&c.indexOf("Chromium")===-1&&(i="Safari",o=f[1])}n.exports={agent:i,version:o,match:r}},{}],4:[function(e,n,t){function r(e){function n(){e(a&&document[a]?document[a]:document[i]?"hidden":"visible")}"addEventListener"in document&&o&&document.addEventListener(o,n,!1)}n.exports=r;var i,o,a;"undefined"!=typeof document.hidden?(i="hidden",o="visibilitychange",a="visibilityState"):"undefined"!=typeof document.msHidden?(i="msHidden",o="msvisibilitychange"):"undefined"!=typeof document.webkitHidden&&(i="webkitHidden",o="webkitvisibilitychange",a="webkitVisibilityState")},{}],5:[function(e,n,t){function r(e,n){var t=[],r="",o=0;for(r in e)i.call(e,r)&&(t[o]=n(r,e[r]),o+=1);return t}var i=Object.prototype.hasOwnProperty;n.exports=r},{}],6:[function(e,n,t){function r(e,n,t){n||(n=0),"undefined"==typeof t&&(t=e?e.length:0);for(var r=-1,i=t-n||0,o=Array(i<0?0:i);++r<i;)o[r]=e[n+r];return o}n.exports=r},{}],7:[function(e,n,t){n.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],ee:[function(e,n,t){function r(){}function i(e){function n(e){return e&&e instanceof r?e:e?f(e,c,o):o()}function t(t,r,i,o){if(!p.aborted||o){e&&e(t,r,i);for(var a=n(i),c=v(t),f=c.length,u=0;u<f;u++)c[u].apply(a,r);var d=s[w[t]];return d&&d.push([b,t,r,a]),a}}function l(e,n){h[e]=v(e).concat(n)}function m(e,n){var t=h[e];if(t)for(var r=0;r<t.length;r++)t[r]===n&&t.splice(r,1)}function v(e){return h[e]||[]}function g(e){return d[e]=d[e]||i(t)}function y(e,n){u(e,function(e,t){n=n||"feature",w[t]=n,n in s||(s[n]=[])})}var h={},w={},b={on:l,addEventListener:l,removeEventListener:m,emit:t,get:g,listeners:v,context:n,buffer:y,abort:a,aborted:!1};return b}function o(){return new r}function a(){(s.api||s.feature)&&(p.aborted=!0,s=p.backlog={})}var c="nr@context",f=e("gos"),u=e(5),s={},d={},p=n.exports=i();p.backlog=s},{}],gos:[function(e,n,t){function r(e,n,t){if(i.call(e,n))return e[n];var r=t();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(e,n,{value:r,writable:!0,enumerable:!1}),r}catch(o){}return e[n]=r,r}var i=Object.prototype.hasOwnProperty;n.exports=r},{}],handle:[function(e,n,t){function r(e,n,t,r){i.buffer([e],r),i.emit(e,n,t)}var i=e("ee").get("handle");n.exports=r,r.ee=i},{}],id:[function(e,n,t){function r(e){var n=typeof e;return!e||"object"!==n&&"function"!==n?-1:e===window?0:a(e,o,function(){return i++})}var i=1,o="nr@id",a=e("gos");n.exports=r},{}],loader:[function(e,n,t){function r(){if(!x++){var e=E.info=NREUM.info,n=l.getElementsByTagName("script")[0];if(setTimeout(s.abort,3e4),!(e&&e.licenseKey&&e.applicationID&&n))return s.abort();u(w,function(n,t){e[n]||(e[n]=t)});var t=a();f("mark",["onload",t+E.offset],null,"api"),f("timing",["load",t]);var r=l.createElement("script");r.src="https://"+e.agent,n.parentNode.insertBefore(r,n)}}function i(){"complete"===l.readyState&&o()}function o(){f("mark",["domContent",a()+E.offset],null,"api")}function a(){return O.exists&&performance.now?Math.round(performance.now()):(c=Math.max((new Date).getTime(),c))-E.offset}var c=(new Date).getTime(),f=e("handle"),u=e(5),s=e("ee"),d=e(3),p=window,l=p.document,m="addEventListener",v="attachEvent",g=p.XMLHttpRequest,y=g&&g.prototype;NREUM.o={ST:setTimeout,SI:p.setImmediate,CT:clearTimeout,XHR:g,REQ:p.Request,EV:p.Event,PR:p.Promise,MO:p.MutationObserver};var h=""+location,w={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1177.min.js"},b=g&&y&&y[m]&&!/CriOS/.test(navigator.userAgent),E=n.exports={offset:c,now:a,origin:h,features:{},xhrWrappable:b,userAgent:d};e(1),e(2),l[m]?(l[m]("DOMContentLoaded",o,!1),p[m]("load",r,!1)):(l[v]("onreadystatechange",i),p[v]("onload",r)),f("mark",["firstbyte",c],null,"api");var x=0,O=e(7)},{}],"wrap-function":[function(e,n,t){function r(e){return!(e&&e instanceof Function&&e.apply&&!e[a])}var i=e("ee"),o=e(6),a="nr@original",c=Object.prototype.hasOwnProperty,f=!1;n.exports=function(e,n){function t(e,n,t,i){function nrWrapper(){var r,a,c,f;try{a=this,r=o(arguments),c="function"==typeof t?t(r,a):t||{}}catch(u){p([u,"",[r,a,i],c])}s(n+"start",[r,a,i],c);try{return f=e.apply(a,r)}catch(d){throw s(n+"err",[r,a,d],c),d}finally{s(n+"end",[r,a,f],c)}}return r(e)?e:(n||(n=""),nrWrapper[a]=e,d(e,nrWrapper),nrWrapper)}function u(e,n,i,o){i||(i="");var a,c,f,u="-"===i.charAt(0);for(f=0;f<n.length;f++)c=n[f],a=e[c],r(a)||(e[c]=t(a,u?c+i:i,o,c))}function s(t,r,i){if(!f||n){var o=f;f=!0;try{e.emit(t,r,i,n)}catch(a){p([a,t,r,i])}f=o}}function d(e,n){if(Object.defineProperty&&Object.keys)try{var t=Object.keys(e);return t.forEach(function(t){Object.defineProperty(n,t,{get:function(){return e[t]},set:function(n){return e[t]=n,n}})}),n}catch(r){p([r])}for(var i in e)c.call(e,i)&&(n[i]=e[i]);return n}function p(n){try{e.emit("internal-error",n)}catch(t){}}return e||(e=i),t.inPlace=u,t.flag=a,t}},{}]},{},["loader"]);</script>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=0.3, maximum-scale=3" />
	<title>POS-IN 인천포스코고 진로진학사이트</title>
	<style type='text/css' media='print'>
	.noprint{ display:none; }
	.tablefont td{color:black;}
	</style>
	<style>
		textarea{
			background-repeat:no-repeat !important;
		}
	</style>
    <link rel='stylesheet' href='function.css' type='text/css'>
    <link rel='stylesheet' href='home.css' type='text/css'>
    <link type="text/css" rel="stylesheet" href="animate.css">
    <link type="text/css" rel="stylesheet" href="common.css?ver=20200708">
    <link type="text/css" rel="stylesheet" href="menu.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/all.css">
    <!--link rel="manifest" href="/index/manifest.json" /-->
	
	<link type='text/css' rel='stylesheet' href='//fonts.googleapis.com/earlyaccess/nanumgothic.css'/>
	<style type="text/css">*{font-family:'Nanum Gothic'}</style>
	<link type='text/css' rel='stylesheet' href='riroschool.css?ver=20200708' />
	<link type='text/css' rel='stylesheet' href='//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css'/>
	<link type='text/css' rel='stylesheet' href='jqslide/src/css/jquery.body.css' />
	<link type='text/css' rel='stylesheet' href='jqslide/src/css/treemenu.css' />
	<link rel='stylesheet' href='//app.riroschool.kr/select2.min.css'>
    <script type='text/javascript' src='https://cdn.rawgit.com/asvd/dragscroll/master/dragscroll.js'></script>
	<script type='text/javascript' src='//app.riroschool.kr/include/jquery.min.js'></script>
	<script type='text/javascript' src='//app.riroschool.kr/include/jquery-ui.min.js'></script>
	<script type='text/javascript' src='jquery.form.js'></script>
	<script type='text/javascript' src='jqslide/src/js/treemenu.js'></script>
	<script type='text/javascript' src='main.js?ver=20200415'></script>
	<script type='text/javascript' src='//app.riroschool.kr/select2.min.js'></script>
    <script type='text/javascript' src='//cdn.jsdelivr.net/npm/fingerprintjs2@1.8.0/dist/fingerprint2.min.js'></script>
	<script>
	    var uuid;
        new Fingerprint2().get(function(result, components) {
	    	    uuid = result;
	    	    $('#uuid').val(uuid);
//                console.log(result) // a hash, representing your device fingerprint
//                console.log(components) // an array of FP components
        });
        
		function onTr(obj,t){if(t)obj.style.background='#ebf2f8'; else obj.style.background='';}
		function onTch(obj,t){if(t)obj.style.background='#DDD'; else obj.style.background='';}
		function onTch2(obj,t){if(t)obj.style.background='#ebf2f8'; else obj.style.background='';}
		function M_location(url){
			location.href=url;
		}
		
		$(window).load(function(){
			
			$('#riro-menu').click(function(){
				$(this).toggleClass('open');
			});
			
			$('#sdate').datepicker({
				changeYear:true, //콤보 박스에 연도 보이기
				changeMonth:true, //콤보 박스에 월 보이기
				showMonthAfterYear:true,
				showOn:'button', //우측에 달력 icon을 보인다.
				buttonImage:'https://app.riroschool.kr/img/new/calendar.png', //우측 달력 icon의 이미지경로
				buttonImageOnly:true, //달력에 icon사용하기
				monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)','7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
				monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
				dayNames: ['일','월','화','수','목','금','토'],
				dayNamesShort: ['일','월','화','수','목','금','토'],
				dayNamesMin: ['일','월','화','수','목','금','토'],
				beforeShow: function(input) {
				    var i_offset = $(input).offset();
				    window.setTimeout(function() {
				        $('#ui-datepicker-div').css({'top':i_offset.top + 'px', 'left':i_offset.left + 'px'});
				    }, 1);
				}
			});
			
            $('#sdate2').datepicker({
				changeYear:true, //콤보 박스에 연도 보이기
				changeMonth:true, //콤보 박스에 월 보이기
				showMonthAfterYear:true,
				showOn:'button', //우측에 달력 icon을 보인다.
				buttonImage:'https://app.riroschool.kr/img/new/calendar.png', //우측 달력 icon의 이미지경로
				buttonImageOnly:true, //달력에 icon사용하기
				monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)','7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
				monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
				dayNames: ['일','월','화','수','목','금','토'],
				dayNamesShort: ['일','월','화','수','목','금','토'],
				dayNamesMin: ['일','월','화','수','목','금','토'],
			});
        
			$('#sdate_cardcheck').datepicker({
				changeYear:true, //콤보 박스에 연도 보이기
				changeMonth:true, //콤보 박스에 월 보이기
				showMonthAfterYear:true,
				showOn:'button', //우측에 달력 icon을 보인다.
				buttonImage:'https://app.riroschool.kr/img/btn_calendar_cardcheck.png', //우측 달력 icon의 이미지경로
				buttonImageOnly:true, //달력에 icon사용하기
				monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)','7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
				monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
				dayNames: ['일','월','화','수','목','금','토'],
				dayNamesShort: ['일','월','화','수','목','금','토'],
				dayNamesMin: ['일','월','화','수','목','금','토'],
			});
			$('#edate').datepicker({
//					$('[name=edate]:last-child').datepicker({
				changeYear:true, //콤보 박스에 년도 보이기
				changeMonth:true, //콤보 박스에 월 보이기
				showMonthAfterYear:true,
				showOn:'button', //우측에 달력 icon을 보인다.
				buttonImage:'https://app.riroschool.kr/img/new/calendar.png', //우측 달력 icon의 이미지경로
				buttonImageOnly:true, //달력에 icon사용하기
				monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)','7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
				monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
				dayNames: ['일','월','화','수','목','금','토'],
				dayNamesShort: ['일','월','화','수','목','금','토'],
				dayNamesMin: ['일','월','화','수','목','금','토'],
			});
			//마우스를 손가락 모양으로 하고 여백주기
			$('img.ui-datepicker-trigger').css({'cursor':'pointer','position':'relative','top':'10px','left':'3px'});

			$.datepicker.setDefaults({
				changeYear:true, //콤보 박스에 연도 보이기
				changeMonth:true, //콤보 박스에 월 보이기
				showMonthAfterYear:true,
				showOn:'both', //우측에 달력 icon을 보인다.
				buttonImage:'http://img.rirodata.kr/img/btn/btn_calendar.png', //우측 달력 icon의 이미지경로
				buttonImageOnly:true, //달력에 icon사용하기
				monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)','7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
				monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
				dayNames: ['일','월','화','수','목','금','토'],
				dayNamesShort: ['일','월','화','수','목','금','토'],
				dayNamesMin: ['일','월','화','수','목','금','토'],
				isRTL : false,
				dateFormat:'yy-mm-dd'
			});
			$('.calendar').datepicker();
/*
			$('.ui-datepicker-trigger').attr('align','absmiddle').each(function(){
				var _this = $(this);
				_this.prev('.calendar').each(function(){
					_this.insertBefore($(this));
				});
			});
*/
			$('.re_m_select').select2();
			$('.namesel').select2();
			
			setInterval(function(){
				$.get('/refresh.php?auto=1');
			},600000);
			
		});
	</script>
</head>
<body style='padding:0px;margin:0px'>
		<style>
		    .mask {
                position:absolute;
                left:0;
                top:0;
                z-index:9999;
                background-color:#000;
                display:none;
            }
        </style>
<div class="mask"></div>
<div id="msgalertbox_bg" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:#000;filter:alpha(opacity=70);opacity:.7;z-index:9999;"></div>
<div id="msgalertbox" style="display:none;position:absolute;top:0;left:0;width:100%;height:100%;z-index:99999;text-align:center;z-index:10000;">
    <div style="min-width:300px;min-height:100px;background-color:#fff;border:2px solid #ccc;border-radius:6px;text-align:center;position:relative;margin:0 auto;top:100px;display:inline-block;">
        <div style="width:100%;padding:10px 0;text-align:center;background-color:#eaeaea;font-weight:bold;font-size:14px;">알림</div>
        <div style="padding:10px;display:inline-block;" class="contents"></div>
    </div>
</div>

                <script>
                    var minimizeFlag = false;
                    
                    function slideAction(flag) {
                        if (minimizeFlag) {
                            if (flag) {
                                $('.sidebar').addClass('sidebar-min')
                                $('.sidebar').removeClass('sidebar-max')
                                $('#slide_togle1').hide();
                                $('#slide_togle2').hide();
                                $('#side_logo').attr('src', './include/header_logo.png');
//                                $('#side_logo').addClass('logo-min');
//                                $('#side_logo').removeClass('logo-max');
                                $('.caret').addClass('slide-toggle-hide');
                                $('.caret').removeClass('slide-toggle-show');
                                $('.first_menu_label').addClass('slide-toggle-hide');
                                $('.first_menu_label').removeClass('slide-toggle-show');
                                $('.re_menual_btn').addClass('manual-button-min');
                                $('.re_menual_btn').removeClass('manual-button-max');
                                $('.submenu_div').hide();
                                $('.first_active').addClass('active')
                                $('.re_user_menu').hide();
                                $('#user_name').removeClass('user_name');
                                $('.logo-img').width('100%');
                            } else {
                                $('.sidebar').addClass('sidebar-max')
                                $('.sidebar').removeClass('sidebar-min')
                                if (minimizeFlag)
                                    $('#slide_togle2').show();
                                else 
                                    $('#slide_togle1').show();
                                $('#side_logo').attr('src', './include/logo.png');
//                                $('#side_logo').addClass('logo-max');
//                                $('#side_logo').removeClass('logo-min');
                                $('.caret').addClass('slide-toggle-show');
                                $('.caret').removeClass('slide-toggle-hide');
                                $('.first_menu_label').addClass('slide-toggle-show');
                                $('.first_menu_label').removeClass('slide-toggle-hide');
                                $('.re_menual_btn').addClass('manual-button-max');
                                $('.re_menual_btn').removeClass('manual-button-min');
                                $('.submenu_div').show();
                                $('.first_active').removeClass('active')
                                $('.re_user_menu').show();
                                $('#user_name').addClass('user_name');
                                $('.logo-img').width('80%');
                            }
                        }
                    }
                
                    function minimize(flag) {
                        minimizeFlag = flag
                        document.cookie = 'slide_toggle=' + flag
                        if (flag) {
                            $('.sidebar').addClass('sidebar-min')
                            $('.sidebar').removeClass('sidebar-max')
                            $('.re-main-panel').addClass('main-min')
                            $('.re-main-panel').removeClass('main-max')
                            $('.login_wrap').addClass('login-min')
                            $('.login_wrap').removeClass('login-max')
                            $('#slide_togle1').hide();
                            $('#slide_togle2').hide();
                            $('#side_logo').attr('src', './include/header_logo.png');
//                            $('#side_logo').addClass('logo-min');
//                            $('#side_logo').removeClass('logo-max');
                            $('.caret').addClass('slide-toggle-hide');
                            $('.caret').removeClass('slide-toggle-show');
                            $('.first_menu_label').addClass('slide-toggle-hide');
                            $('.first_menu_label').removeClass('slide-toggle-show');
                            $('.re_menual_btn').addClass('manual-button-min');
                            $('.re_menual_btn').removeClass('manual-button-max');
                            $('.submenu_div').hide();
                            $('.first_active').addClass('active')
                            $('.re_user_menu').hide();
                            $('#user_name').removeClass('user_name');
                            $('.logo-img').width('100%');
                        } else {
                            $('.sidebar').addClass('sidebar-max')
                            $('.re-main-panel').addClass('main-max')
                            $('.re-main-panel').removeClass('main-min')
                            $('.sidebar').removeClass('sidebar-min')
                            $('.login_wrap').addClass('login-max')
                            $('.login_wrap').removeClass('login-min')
                            $('#slide_togle1').show();
                            $('#slide_togle2').hide();
                            $('#side_logo').attr('src', './include/logo.png');
//                            $('#side_logo').addClass('logo-max');
//                            $('#side_logo').removeClass('logo-min');
                            $('.caret').addClass('slide-toggle-show');
                            $('.caret').removeClass('slide-toggle-hide');
                            $('.first_menu_label').addClass('slide-toggle-show');
                            $('.first_menu_label').removeClass('slide-toggle-hide');
                            $('.re_menual_btn').addClass('manual-button-max');
                            $('.re_menual_btn').removeClass('manual-button-min');
                            $('.submenu_div').show();
                            $('.first_active').removeClass('active')
                            $('.re_user_menu').show();
                            $('#user_name').addClass('user_name');
                            $('.logo-img').width('80%');
                        }
                    } 
                    
                    var mymenuScroll = 0;
                    var mymenuWidth = 0;
                    function slideScroll(position) {
                        var value = mymenuScroll + (position * 900);
                            
                        if (value >= mymenuWidth - $('.mymenu_ul').width() - 10) {
                            value = mymenuWidth - $('.mymenu_ul').width();
//                            $('#menu_slide_right > a').fadeOut();
//                            $('#menu_slide_left > a').fadeIn();
                        } else if (value <= 0) {
                            value = 0;
//                            $('#menu_slide_left > a').fadeOut();
//                            $('#menu_slide_right > a').fadeIn();
                        } else {
//                            $('#menu_slide_right > a').fadeIn();
//                            $('#menu_slide_left > a').fadeIn();
                        }
                        
                        $('.mymenu_ul').animate({
                            scrollLeft:  value
                        })
                    }
                    
                    $(document).ready(function() {
                        $('.mymenu_li').each(function(i) {
                            mymenuWidth += $('.mymenu_ul').children()[i].clientWidth
                        })
                        
                        $('.sidebar-wrapper').scrollTop();
                        $('.mymenu_ul').scrollLeft();
                            if (0 >= mymenuWidth - $('.mymenu_ul').width()) {
                                $('#menu_slide_right > a').fadeOut();
                                $('#menu_slide_left > a').fadeIn();
                            } else if (0 <= 0) {
                                $('#menu_slide_left > a').fadeOut();
                                $('#menu_slide_right > a').fadeIn();
                            } else {
                                $('#menu_slide_right > a').fadeIn();
                                $('#menu_slide_left > a').fadeIn();
                            }
                        $('.sidebar-wrapper').scroll(function() {
                            document.cookie = 'slide_scroll_top=' + $('.sidebar-wrapper').scrollTop();
                        })
                        
                        var mymenuFixed = false
                        $(document).scroll(function() {
                            if(!mymenuFixed && $(document).scrollTop() >= 10) {
                                mymenuFixed = true
                                
                                $('.login_wrap').addClass('login_wrap_fixed');
                            } else if(mymenuFixed && $(document).scrollTop() < 10){
                                mymenuFixed = false
                                
                                $('.login_wrap').removeClass('login_wrap_fixed');
                            }
                        })
                        
                        $('.mymenu_ul').scroll(function() {
                            mymenuScroll = $('.mymenu_ul').scrollLeft();
                            document.cookie = 'mymenu_scroll_left=' + mymenuScroll;
                            
                            if (mymenuScroll >= mymenuWidth - $('.mymenu_ul').width() - 10) {
                                mymenuScroll = mymenuWidth - $('.mymenu_ul').width();
                                $('#menu_slide_right > a').fadeOut();
                                $('#menu_slide_left > a').fadeIn();
                            } else if (mymenuScroll <= 0) {
                                mymenuScroll = 0;
                                $('#menu_slide_left > a').fadeOut();
                                $('#menu_slide_right > a').fadeIn();
                            } else {
                                $('#menu_slide_right > a').fadeIn();
                                $('#menu_slide_left > a').fadeIn();
                            }

                        });
                        
                        $('#menu_slide_left').click(function(e) {
                            slideScroll(-1)
                        });
                        
                        $('#menu_slide_right').click(function(e) {
                            slideScroll(+1)
                        });
                        
                    });
                </script>
    <div data-color="azure" data-image="" data-background-color="black" class="sidebar " style="display:none; background-image: url(&quot;&quot;);" 
     onscroll='sidebarScroll()' onmouseenter='slideAction(false)' onmouseleave='slideAction(true)'>
    <div class="logo_wrap" style="/*background-color: rgb(51, 51, 51);*/background-color: #ffffff;" >
        <div class="logo" style="margin: 10px; border-radius: 5px; background: rgb(255, 255, 255); padding: 8px 0px;">
            <a href="#" onclick='location.href="/home.php"' class="simple-text logo-mini" style="left: -10px;">
                <div class="logo-img" style="width:80%"><img id='side_logo' src='./include/logo.png' ></div>
            </a>
            <div class="navbar-minimize">
                <div class="md-button md-round md-just-icon md-transparent md-theme-default" id="minimizeSidebar">
                    <div class="md-ripple">
                        <div class="md-button-content">
                            <i id='slide_togle1' class="material-icons text_align-center visible-on-sidebar-regular" style="color: rgb(51, 51, 51) !important; " onclick='minimize(true)'>format_indent_decrease</i>
                            <i id='slide_togle2' class="material-icons design_bullet-list-67 visible-on-sidebar-mini" style="color: rgb(51, 51, 51) !important; display:none" onclick='minimize(false)'>format_indent_increase</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-wrapper" style="overflow-x:hidden">
         
        <div class="user">
            <div class="photo"><img src="https://app.riroschool.kr/img/new/avatar1.png" alt="전종민"></div>
            <div class="user-info" style='width:260px'>
                <a id='user_name' class='user_name' href='user.php?action=modify_form' style='padding-right: 0 !important;padding-left: 0!important;'>
                    <span class='first_menu_label  ' title='정보수정' style='font-size:11pt'>
                    전종민 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user-cog"></i></span>
                </a> 
                
                <a class='re_user_menu' href=my_page.php target=_new title='학급관리' style='float: left;'><i style='font-size: 17px;' class="fas fa-id-card"></i></a>
			    <a class='re_user_menu' href='user.php?action=user_logout' title='로그아웃' style=''><i class="fas fa-sign-out-alt"></i></a>
			    
            </div>
        </div>
        <ul class="md-list nav md-theme-default"><li tag="li" mn=0 class="submenu_first isActive0">
                        <a href="#" onclick="javascript:mL('9','index','1901','idx');" class="nav-link sidebar-menu-item">
                            <img src="https://img.rirodata.kr/Image/img/icon/w_a1.png" style='margin-top: 5px;'>
                                <p class='first_menu_label '>알림신청</p><b class="caret "></b>
                                </a>
                <div class='submenu_div' style=''>
                    <ul class="nav" id='submenu_nav알림신청'>
                        <submenu_nav알림신청></submenu_nav알림신청>
                    </ul>
                </div></li><li tag="li" mn=1 class="submenu_first isActive1">
                        <a href="#" onclick="javascript:location.href='portfolio.php?db=1551'" class="nav-link sidebar-menu-item">
                            <img src="https://img.rirodata.kr/Image/img/icon/w_a2.png" style='margin-top: 5px;'>
                                <p class='first_menu_label '>수행대회</p><b class="caret "></b>
                                </a>
                <div class='submenu_div' style=''>
                    <ul class="nav" id='submenu_nav수행대회'>
                        <submenu_nav수행대회></submenu_nav수행대회>
                    </ul>
                </div></li><li tag="li" mn=2 class="submenu_first isActive2">
                        <a href="#" onclick="javascript:location.href='portfolio.php?db=1502'" class="nav-link sidebar-menu-item">
                            <img src="https://img.rirodata.kr/Image/img/icon/w_a2.png" style='margin-top: 5px;'>
                                <p class='first_menu_label '>성적분석</p><b class="caret "></b>
                                </a>
                <div class='submenu_div' style=''>
                    <ul class="nav" id='submenu_nav성적분석'>
                        <submenu_nav성적분석></submenu_nav성적분석>
                    </ul>
                </div></li><li tag="li" mn=3 class="submenu_first isActive3">
                        <a href="#" onclick="javascript:mL('1','index','1010','idx');" class="nav-link sidebar-menu-item">
                            <img src="https://img.rirodata.kr/Image/img/icon/w_a4.png" style='margin-top: 5px;'>
                                <p class='first_menu_label '>성적조회</p><b class="caret "></b>
                                </a>
                <div class='submenu_div' style=''>
                    <ul class="nav" id='submenu_nav성적조회'>
                        <submenu_nav성적조회></submenu_nav성적조회>
                    </ul>
                </div></li><li tag="li" mn=4 class="submenu_first isActive4">
                        <a href="#" onclick="javascript:mL('5','index','1701','idx');" class="nav-link sidebar-menu-item">
                            <img src="https://img.rirodata.kr/Image/img/icon/w_a5.png" style='margin-top: 5px;'>
                                <p class='first_menu_label '>방과후학교</p><b class="caret "></b>
                                </a>
                <div class='submenu_div' style=''>
                    <ul class="nav" id='submenu_nav방과후학교'>
                        <submenu_nav방과후학교></submenu_nav방과후학교>
                    </ul>
                </div></li><li tag="li" mn=5 class="submenu_first isActive5">
                        <a href="#" onclick="javascript:mL('5','index','1702','idx');" class="nav-link sidebar-menu-item">
                            <img src="https://img.rirodata.kr/Image/img/icon/w_a6.png" style='margin-top: 5px;'>
                                <p class='first_menu_label '>자기주도학습</p><b class="caret "></b>
                                </a>
                <div class='submenu_div' style=''>
                    <ul class="nav" id='submenu_nav자기주도학습'>
                        <submenu_nav자기주도학습></submenu_nav자기주도학습>
                    </ul>
                </div></li><li tag="li" mn=6 class="submenu_first isActive6">
                        <a href="#" onclick="javascript:mL('qlist','index','1800','');" class="nav-link sidebar-menu-item">
                            <img src="https://img.rirodata.kr/Image/img/icon/w_a10.png" style='margin-top: 5px;'>
                                <p class='first_menu_label '>교육콘텐츠</p><b class="caret "></b>
                                </a>
                <div class='submenu_div' style=''>
                    <ul class="nav" id='submenu_nav교육콘텐츠'>
                        <submenu_nav교육콘텐츠></submenu_nav교육콘텐츠>
                    </ul>
                </div></li><li tag="li" mn=7 class="submenu_first isActive7">
                        <a href="#" onclick="javascript:mL('0','index','1111','idx');" class="nav-link sidebar-menu-item">
                            <img src="https://img.rirodata.kr/Image/img/icon/w_a9.png" style='margin-top: 5px;'>
                                <p class='first_menu_label '>진로진학정보</p><b class="caret "></b>
                                </a>
                <div class='submenu_div' style=''>
                    <ul class="nav" id='submenu_nav진로진학정보'>
                        <submenu_nav진로진학정보></submenu_nav진로진학정보>
                    </ul>
                </div></li><li tag="li" mn=8 class="submenu_first isActive8">
                        <a href="#" onclick="javascript:mL('0','index','1003','idx');" class="nav-link sidebar-menu-item">
                            <img src="https://img.rirodata.kr/Image/img/icon/w_a9.png" style='margin-top: 5px;'>
                                <p class='first_menu_label '>질문방</p><b class="caret "></b>
                                </a>
                <div class='submenu_div' style=''>
                    <ul class="nav" id='submenu_nav질문방'>
                        <submenu_nav질문방></submenu_nav질문방>
                    </ul>
                </div></li>
        </ul>
    </div>
</div>
<div class='re-main-panel  ' >
    <style type=text/css>
        table.top_menu td {font-size:18px;color:white;cursor:pointer;font-weight:bold;} 
        .user_name {
            float: left;
        }
        
        .mymenu_ul {
            margin: 0;
            padding: 0 !important;
            width: 782px; height: 53px;
            white-space: nowrap;
            overflow: hidden; 
            float:left;
        }
                
        .mymenu_ul::-webkit-scrollbar {
            width: 0px; height: 0;
            background: transparent;
        }
        
        .mymenu_ul::-webkit-scrollbar-thumb {
            background: #cccccc;
            border-radius: 6px;
        }
        
        .mymenu_li {
            height: 53px;
            display:inline-block;
        }
        
        .mymenu_icon {
            margin-right: 5px;
        }
        
        .mymenu_li a{
            display: block;
            height: 53px;
            padding: 10px 15px;
            vertical-align: middle;
            box-sizing: border-box;
        }
        
        .mymenu_li a img{
            width: 20px;
            vertical-align: middle;
        }
        
        .mymenu_li a span {
            font-size: 11pt;
        }
        
        .login_wrap_fixed {
            height: 53px;
            position: fixed;
            top: 0;
            right: 0;
            left: 260px;
            z-index: 999;
            background: #FFFFFF;
            -webkit-box-shadow: 0 1px 18px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
            box-shadow: 0 1px 18px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
            background-size: cover;
            background-position: 50%;
        }
        .bookmark i:hover{
            color: #0088cc;
        }
        
    </style>
    
    <div class='login_wrap animated' style='opacity: 0'>
        <div class='login_wrap_container' style='position:relative;width:1030px;height:50px;margin:auto;/*text-align:center;*/padding-left:0px;'>
                <div id='menu_slide_left' style="float:left;padding-top:18px;padding-right:18px; width: 20px;line-height: 14px; cursor: pointer;">
                                <a><i class="fas fa-chevron-left"></i></a>
                            </div>
                            <ul class='mymenu_ul'><li class='mymenu_li' >
                                <a href='#' class='re_menu_btn' onclick="location.href='portfolio.php?db=1551'">
                                    <img class='mymenu_icon' src='https://img.rirodata.kr/Image/img/icon/w_a2.png' width='15px'><span>수행대회</span>
                                </a>
                            </li><li class='mymenu_li' >
                                <a href='#' class='re_menu_btn' onclick="location.href='portfolio.php?db=1502'">
                                    <img class='mymenu_icon' src='https://img.rirodata.kr/Image/img/icon/w_a2.png' width='15px'><span>성적분석</span>
                                </a>
                            </li><li class='mymenu_li' >
                                <a href='#' class='re_menu_btn' onclick="mL('1','index','1010','idx');">
                                    <img class='mymenu_icon' src='https://img.rirodata.kr/Image/img/icon/w_a4.png' width='15px'><span>성적조회</span>
                                </a>
                            </li><li class='mymenu_li' >
                                <a href='#' class='re_menu_btn' onclick="mL('5','index','1701','idx');">
                                    <img class='mymenu_icon' src='https://img.rirodata.kr/Image/img/icon/w_a5.png' width='15px'><span>방과후학교</span>
                                </a>
                            </li><li class='mymenu_li' >
                                <a href='#' class='re_menu_btn' onclick="mL('5','index','1702','idx');">
                                    <img class='mymenu_icon' src='https://img.rirodata.kr/Image/img/icon/w_a6.png' width='15px'><span>자기주도학습</span>
                                </a>
                            </li><li class='mymenu_li' >
                                <a href='#' class='re_menu_btn' onclick="mL('qlist','index','1800','');">
                                    <img class='mymenu_icon' src='https://img.rirodata.kr/Image/img/icon/w_a10.png' width='15px'><span>교육콘텐츠</span>
                                </a>
                            </li><li class='mymenu_li' >
                                <a href='#' class='re_menu_btn' onclick="mL('0','index','1111','idx');">
                                    <img class='mymenu_icon' src='https://img.rirodata.kr/Image/img/icon/w_a9.png' width='15px'><span>진로진학정보</span>
                                </a>
                            </li><li class='mymenu_li' >
                                <a href='#' class='re_menu_btn' onclick="mL('0','index','1003','idx');">
                                    <img class='mymenu_icon' src='https://img.rirodata.kr/Image/img/icon/w_a9.png' width='15px'><span>질문방</span>
                                </a>
                            </li>
            <li class='mymenu_li' >
                <a href=javascript:d() class='re_menu_btn' >
                    <img class='re_dictionary_img mymenu_icon' src=https://app.riroschool.kr/img/new/naver_dictionary.jpg border=0 align=absmiddle alt='네이버 사전' title='네이버 사전'>
                    <span>네이버사전</span>
                </a>
            </li>
        </ul>
        <div id='menu_slide_right' style="float: left; padding: 18px 0; width: 30px; line-height: 14px; cursor: pointer;">
            <a><i class="fas fa-chevron-right"></i></a>
        </div>
        <!--div style="float: left; padding: 16px 0; width: 30px; line-height: 14px; cursor: pointer;">
            <i id='notification' style='font-size: 17px;' class="fas fa-bell-slash" title='알림'></i>
        </div-->
        <div style="float: left; padding: 16px 0; width: 30px; line-height: 14px; cursor: pointer;">
            <a href=my_page.php target=_new title='학급관리'><i style='font-size: 17px;' class="fas fa-id-card"></i></a>
        </div><div style="float: left; padding: 18px 0; width: 30px; line-height: 14px; cursor: pointer;">
            <a href='mymenu.php' title='마이메뉴편집'><i class="fas fa-user-tag"></i></a>
        </div>
                <div style='float:left;padding:18px 0;width:30px;line-height:14px;cursor:pointer;'>
                    <a href='user.php?action=user_logout' title='로그아웃'><i class='fas fa-sign-out-alt' style='font-size: 17px;'></i></a>
                </div>
            <div style='float:right;text-align:right;margin-top:8px;' nowrap>
<!--<i class='fas fa-bookmark' style='z-index:2;font-weight: 600;font-size: 62pt;position: absolute;top: -10px;'></i>--><!--<div style='position: absolute; top: 80px; left: -70px;' class='tooltiptext'>현재 페이지를 상단메뉴로 등록합니다.</div>--></a></div>
        </div>
    </div>
    
    
		<link type='text/css' rel='stylesheet' href='//app.riroschool.kr/include/script/jquery.bxslider.css' />
		<script type='text/javascript' src='//app.riroschool.kr/include/script/jquery.bxslider.js'></script>
		<script>
		$(function(){
			$('#slide1').bxSlider({
			  mode: 'vertical',
			  pager:false,
			  touchEnabled: false,
			  auto:true
			});

			$('#slide2').bxSlider({
			  mode: 'vertical',
			  pager:false,
			  touchEnabled: false,
			  auto:true
			});
			setTimeout(function () {
			    $('.sliderContainer').show()
            }, 100);
			setTimeout(function() {
			    $('.login_wrap').addClass('fadeInDown faster')
			    $('.login_wrap').css('opacity', 1)
            }, 400);
		});
		
		function getNotice(no){
				

			$.get('home.php?action=getnotice&no='+no, function(data){
				
				var obj = JSON.parse(data);

				$('#notice_title').html(obj.TITLE);
				$('#notice_content').html(obj.TEXT);

				$('#popnoti_bg, #popnoti_noti').show();
				
				}).error(function(){
					//alert('에러');
				});
			}
        
            $(document).ready(function() {
                $('.sidebar').addClass('animated');
                $('.sidebar').addClass('fadeInLeft');
                $('.sidebar').show();
            });
        
		</script>
		
                <div class='sliderContainer animated rubberBand' style='width:100%;height:40px; background-color:#f1f1f1;overflow: hidden; padding-left: 0px'>
                    <div class='sliderContainer animated ' style='width:1000px;margin:auto;height:40px;'>
                        <div style='width:50%; height:40px; float:left'>
                            <ul id='slide1' style='top:35px;z-index:1;'>
			<li style='height:40px;'>
				<div style='width:550px;'>
					<!--<img src='https://app.riroschool.kr/img/dot_board.gif' border='0' align='absmiddle'/>-->
					<i class="fas fa-bullhorn"></i> &nbsp;
					<a href='board.php?action=view&uid=137&db=1003'>
						보안 프로그램
					</a>
					<span style='float:right; boarder:1px solid red;display:block;'>2020-07-21</span>
				</div>
			</li>
			<li style='height:40px;'>
				<div style='width:550px;'>
					<!--<img src='https://app.riroschool.kr/img/dot_board.gif' border='0' align='absmiddle'/>-->
					<i class="fas fa-bullhorn"></i> &nbsp;
					<a href='board.php?action=view&uid=135&db=1003'>
						파일 첨부 방법
					</a>
					<span style='float:right; boarder:1px solid red;display:block;'>2020-04-13</span>
				</div>
			</li>
			<li style='height:40px;'>
				<div style='width:550px;'>
					<!--<img src='https://app.riroschool.kr/img/dot_board.gif' border='0' align='absmiddle'/>-->
					<i class="fas fa-bullhorn"></i> &nbsp;
					<a href='board.php?action=view&uid=133&db=1003'>
						과제 제출시 모든 파일을 타이핑해서 내야 하나요?
					</a>
					<span style='float:right; boarder:1px solid red;display:block;'>2020-04-09</span>
				</div>
			</li>
			<li style='height:40px;'>
				<div style='width:550px;'>
					<!--<img src='https://app.riroschool.kr/img/dot_board.gif' border='0' align='absmiddle'/>-->
					<i class="fas fa-bullhorn"></i> &nbsp;
					<a href='board.php?action=view&uid=132&db=1003'>
						온라인 시간표에서 화살표가 무슨 뜻인가요?
					</a>
					<span style='float:right; boarder:1px solid red;display:block;'>2020-04-05</span>
				</div>
			</li>
			<li style='height:40px;'>
				<div style='width:550px;'>
					<!--<img src='https://app.riroschool.kr/img/dot_board.gif' border='0' align='absmiddle'/>-->
					<i class="fas fa-bullhorn"></i> &nbsp;
					<a href='board.php?action=view&uid=131&db=1003'>
						리로 엑셀파일 열기 오류에 대한 해결방법입니다 [그림설명]
					</a>
					<span style='float:right; boarder:1px solid red;display:block;'>2020-04-03</span>
				</div>
			</li></ul>
                        </div>
                        <div style='width:50%; height:40px; float:right'>
                            <ul id='slide2' style='top:35px;z-index:1;'></ul>
                        </div>
        
                    </div>
                </div>
		


            <div id=container style='width:95%;max-width:1024px;min-width:1024px;text-align:center;margin:auto;padding:0px 2%;position:relative;'>
                <div class='re_main_wrap animated fadeIn board-msg' id=main_content style='z-index:9;width:100%;text-align:center;margin:auto;float:left;margin-right:10px;margin-left:5px;;margin:0;min-height:550px;_height:700px;'>
            
<link rel='stylesheet' href='config_new.css' type='text/css'/>
<p align=center style='margin:0px;padding:0px;margin-top: 30px;'><img class='re_main_img' src=include/main.jpg border=0 style='width:100%;max-width:1200px;_width:1200px;'></p>
 
		<ul class='home-box re_menucon_wrap'  >
			
			<li class='home-title re_menucon_li' onclick=location.href='board_msg.php?db=1903&action=list'><img class='re_li_tit_icon' src="https://img.rirodata.kr/Image/img/new/a1.png"><span class='re_menucon_li_b' style='float:left;'>재학생 공지사항</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board_msg.php?action=view&db=1903&cate=2&uid=1429&num=0'><span class='m-new-li-left cut-50' style='width:70%;'>2020 정규교육과정외 학습선택권 보장 정기 실태...</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.23</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board_msg.php?action=view&db=1903&cate=1&uid=1428&num=1'><span class='m-new-li-left cut-50' style='width:70%;'>2020 정규교육과정외 학습선택권 보장 정기 실태...</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.23</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board_msg.php?action=view&db=1903&cate=1&uid=1427&num=2'><span class='m-new-li-left cut-50' style='width:70%;'>인천시설공단 시민 웹툰 공모전 안내</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.23</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board_msg.php?action=view&db=1903&cate=1&uid=1426&num=3'><span class='m-new-li-left cut-50' style='width:70%;'>2021년 연수구 주민참여예산 온라인 투표 안내</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.21</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board_msg.php?action=view&db=1903&cate=1&uid=1425&num=4'><span class='m-new-li-left cut-50' style='width:70%;'>2020년 서구 청소년 정책토론회 아이디어 모집 ...</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.21</span></li>
		</ul>	
		<ul class='home-box re_menucon_wrap' style='margin-left:1%;margin-right:1%;' >
			
			<li class='home-title re_menucon_li' onclick=location.href='board_msg.php?db=1901&action=list'><img class='re_li_tit_icon' src="https://img.rirodata.kr/Image/img/new/a1.png"><span class='re_menucon_li_b' style='float:left;'>가정통신(신청)</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board_msg.php?action=view&db=1901&cate=0&uid=563&num=0'><span class='m-new-li-left cut-50' style='width:70%;'>교육재난지원금 지급 안내</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.22</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board_msg.php?action=view&db=1901&cate=0&uid=562&num=1'><span class='m-new-li-left cut-50' style='width:70%;'>보건소(선별진료소) 방문 확인증- 보건소 방문 전...</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.22</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board_msg.php?action=view&db=1901&cate=0&uid=561&num=2'><span class='m-new-li-left cut-50' style='width:70%;'>(필독) 9/22부터 계획된 인플루엔자(독감) 무...</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.22</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board_msg.php?action=view&db=1901&cate=0&uid=560&num=3'><span class='m-new-li-left cut-50' style='width:70%;'>9/14 시행한 3학년 결핵검진 결과 안내</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.21</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board_msg.php?action=view&db=1901&cate=0&uid=559&num=4'><span class='m-new-li-left cut-50' style='width:70%;'>2학기 가정폭력예방안내 가정통신문</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.21</span></li>
		</ul>	
		<ul class='home-box re_menucon_wrap'  >
			
			<li class='home-title re_menucon_li' onclick=location.href='portfolio.php?db=1551&action=idx'><img class='re_li_tit_icon' src="https://img.rirodata.kr/Image/img/new/a3.png"><span class='re_menucon_li_b' style='float:left;'>수행평가</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='portfolio.php?action=list&db=1551&cate=2559&uid=0&t_doc=&num=0'><span class='m-new-li-left cut-50' style='width:70%;'>1학년 사회 통합사회(1-1, 1-2) 6차시 과제</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://img.rirodata.kr/Image/img/riroschool/new-icon.png align=absmiddle style='width:16px; height: 16px; margin: 0 3px 2px 0; vertical-align: middle;animation: bounce .3s;'>09.30까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='portfolio.php?action=list&db=1551&cate=2557&uid=0&t_doc=&num=1'><span class='m-new-li-left cut-50' style='width:70%;'>3학년 사회 창의경영 수행평가 및 학습자료</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.25까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='portfolio.php?action=list&db=1551&cate=2556&uid=0&t_doc=&num=2'><span class='m-new-li-left cut-50' style='width:70%;'>2학년 중국어 9월22일4교시중국어2_수업자료_제출자료_200922</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.22까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='portfolio.php?action=list&db=1551&cate=2555&uid=0&t_doc=&num=3'><span class='m-new-li-left cut-50' style='width:70%;'>2학년 기타 진로테마체험학습 1일차 보고서</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.24까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='portfolio.php?action=list&db=1551&cate=2554&uid=0&t_doc=&num=4'><span class='m-new-li-left cut-50' style='width:70%;'>전학년 기타 2020 2학기 ICPA 학교폭력예방교육(2학년)</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.21까지</span></li>
		</ul>	
		<ul class='home-box re_menucon_wrap'  >
			
			<li class='home-title re_menucon_li' onclick=location.href='portfolio.php?db=1502&action=idx'><img class='re_li_tit_icon' src="https://img.rirodata.kr/Image/img/new/a3.png"><span class='re_menucon_li_b' style='float:left;'>포트폴리오</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='portfolio.php?action=list&db=1502&cate=2527&uid=0&t_doc=&num=0'><span class='m-new-li-left cut-50' style='width:70%;'>1학년 자율 1학년8반 자율활동지 (진로탐색활동) 제출</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.23까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='portfolio.php?action=list&db=1502&cate=2463&uid=0&t_doc=&num=1'><span class='m-new-li-left cut-50' style='width:70%;'>1학년 자율 1학년 8반 부반장 선거</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>08.31까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='portfolio.php?action=list&db=1502&cate=2462&uid=0&t_doc=&num=2'><span class='m-new-li-left cut-50' style='width:70%;'>1학년 자율 1학년 8반 반장선거 결선투표</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>08.31까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='portfolio.php?action=list&db=1502&cate=2461&uid=0&t_doc=&num=3'><span class='m-new-li-left cut-50' style='width:70%;'>1학년 자율 1학년 8반 반장선거</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>08.31까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='portfolio.php?action=list&db=1502&cate=2443&uid=0&t_doc=&num=4'><span class='m-new-li-left cut-50' style='width:70%;'>1학년 독서 활동 보고서</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>08.30까지</span></li>
		</ul>	
		<ul class='home-box re_menucon_wrap' style='margin-left:1%;margin-right:1%;' >
			
			<li class='home-title re_menucon_li' onclick=location.href='portfolio.php?db=1552&action=idx'><img class='re_li_tit_icon' src="https://img.rirodata.kr/Image/img/new/a3.png"><span class='re_menucon_li_b' style='float:left;'>경시대회</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='portfolio.php?action=list&db=1552&cate=2558&uid=0&t_doc=&num=0'><span class='m-new-li-left cut-50' style='width:70%;'>1학년 교내 진로 독서 보고서</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://img.rirodata.kr/Image/img/riroschool/new-icon.png align=absmiddle style='width:16px; height: 16px; margin: 0 3px 2px 0; vertical-align: middle;animation: bounce .3s;'>10.07까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='portfolio.php?action=list&db=1552&cate=2491&uid=0&t_doc=&num=1'><span class='m-new-li-left cut-50' style='width:70%;'>전학년 교외 제17회 매경 NIE경진대회 안내</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.30까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='portfolio.php?action=list&db=1552&cate=2408&uid=0&t_doc=&num=2'><span class='m-new-li-left cut-50' style='width:70%;'>2학년 교외 인천 고등학생 토론대회 참가자 선발</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>08.14까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='portfolio.php?action=list&db=1552&cate=2399&uid=0&t_doc=&num=3'><span class='m-new-li-left cut-50' style='width:70%;'>전학년 교외 JA KOREA 청소년 실물창업 경연대회</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>07.31까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='portfolio.php?action=list&db=1552&cate=2382&uid=0&t_doc=&num=4'><span class='m-new-li-left cut-50' style='width:70%;'>전학년 교외 중앙선거관리위원회 강연 콘테스트 안내</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>07.28까지</span></li>
		</ul>	
		<ul class='home-box re_menucon_wrap'  >
			
			<li class='home-title re_menucon_li' onclick=location.href='board.php?db=1010&action=list'><img class='re_li_tit_icon' src="https://img.rirodata.kr/Image/img/new/a4.png"><span class='re_menucon_li_b' style='float:left;'>성적조회</span></li>
			<li style='text-align:center;padding-top:30px;padding-bottom:80px;border: none;'>데이터 없음.</li>
		</ul>	
		<ul class='home-box re_menucon_wrap'  >
			
			<li class='home-title re_menucon_li' onclick=location.href='lecture.php?db=1701&action=idx'><img class='re_li_tit_icon' src="https://img.rirodata.kr/Image/img/new/a13.png"><span class='re_menucon_li_b' style='float:left;'>방과후학교</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='lecture.php?action=list&db=1701&cate=134'><span class='m-new-li-left cut-50' style='width:70%;'><span class=riro-label style='border: 1px solid #0088cc;background:#FFFFFF;color: #0088cc;'>운영</span> 2020-2 2학년 가배지공</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>12.16까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='lecture.php?action=list&db=1701&cate=133'><span class='m-new-li-left cut-50' style='width:70%;'><span class=riro-label style='border: 1px solid #0088cc;background:#FFFFFF;color: #0088cc;'>운영</span> 2020년 빅데이터 수업</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>12.31까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='lecture.php?action=list&db=1701&cate=132'><span class='m-new-li-left cut-50' style='width:70%;'><span class=riro-label style='border: 1px solid #0088cc;background:#FFFFFF;color: #0088cc;'>운영</span> 2020-2 1차 3학년 방과후학교</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>11.20까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='lecture.php?action=list&db=1701&cate=131'><span class='m-new-li-left cut-50' style='width:70%;'><span class=riro-label style='border: 1px solid #0088cc;background:#FFFFFF;color: #0088cc;'>운영</span> 2020-2 토요S&amp;A</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>12.19까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='lecture.php?action=list&db=1701&cate=130'><span class='m-new-li-left cut-50' style='width:70%;'><span class=riro-label style='border: 1px solid #0088cc;background:#FFFFFF;color: #0088cc;'>운영</span> 2020-2 1차 1,2학년 방과후학교</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>10.23까지</span></li>
		</ul>	
		<ul class='home-box re_menucon_wrap' style='margin-left:1%;margin-right:1%;' >
			
			<li class='home-title re_menucon_li' onclick=location.href='lecture.php?db=1702&action=idx'><img class='re_li_tit_icon' src="https://img.rirodata.kr/Image/img/new/a6.png"><span class='re_menucon_li_b' style='float:left;'>자기주도학습</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='lecture.php?action=list&db=1702&cate=60'><span class='m-new-li-left cut-50' style='width:70%;'><span class=riro-label style='border: 1px solid #777777;background:#FFFFFF;color: #777777;'>준비</span> 2020-2 2학년 자기주도학습</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>10.12부터</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='lecture.php?action=list&db=1702&cate=58'><span class='m-new-li-left cut-50' style='width:70%;'><span class=riro-label style='border: 1px solid #f3f3f3;background:#f3f3f3;color: #666666;'>종료</span> 2019년 1학년 겨울방학 자기주도학습</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>01.22까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='lecture.php?action=list&db=1702&cate=57'><span class='m-new-li-left cut-50' style='width:70%;'><span class=riro-label style='border: 1px solid #f3f3f3;background:#f3f3f3;color: #666666;'>종료</span> 2019년 1학년 2학기 자기주도학습(2차)</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>01.30까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='lecture.php?action=list&db=1702&cate=56'><span class='m-new-li-left cut-50' style='width:70%;'><span class=riro-label style='border: 1px solid #f3f3f3;background:#f3f3f3;color: #666666;'>종료</span> 2019년 2학년 2학기 2차 자기주도학습 (10/25~)</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>02.29까지</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='lecture.php?action=list&db=1702&cate=55'><span class='m-new-li-left cut-50' style='width:70%;'><span class=riro-label style='border: 1px solid #f3f3f3;background:#f3f3f3;color: #666666;'>종료</span> 2019년 수능전 마지막 3학년 자기주도학습</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>11.13까지</span></li>
		</ul>	
		<ul class='home-box re_menucon_wrap'  >
			
			<li class='home-title re_menucon_li' onclick=location.href='board.php?db=1111&action=list'><img class='re_li_tit_icon' src="https://img.rirodata.kr/Image/img/new/a9.png"><span class='re_menucon_li_b' style='float:left;'>대입 종합정보</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board.php?action=view&db=1111&cate=0&uid=400&num=0'><span class='m-new-li-left cut-50' style='width:70%;'>국민대학교 2020 학생부종합전형 박람회 개최 안...</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.21</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board.php?action=view&db=1111&cate=0&uid=399&num=1'><span class='m-new-li-left cut-50' style='width:70%;'>2021수시대비 유튜브 실시간 진로진학 설명회 안...</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.11</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board.php?action=view&db=1111&cate=0&uid=398&num=2'><span class='m-new-li-left cut-50' style='width:70%;'>2020년 하반기 KAIST IP영재기업인교육원 ...</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>09.01</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board.php?action=view&db=1111&cate=0&uid=397&num=3'><span class='m-new-li-left cut-50' style='width:70%;'>2021수시대비 유튜브 실시간 진로진학 설명회 안...</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>08.31</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board.php?action=view&db=1111&cate=0&uid=396&num=4'><span class='m-new-li-left cut-50' style='width:70%;'>2020년 Dream Package(찾아오는 전형...</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>08.07</span></li>
		</ul>	
		<ul class='home-box re_menucon_wrap'  >
			
			<li class='home-title re_menucon_li' onclick=location.href='board.php?db=1001&action=list'><img class='re_li_tit_icon' src="https://img.rirodata.kr/Image/img/new/a9.png"><span class='re_menucon_li_b' style='float:left;'>미디어 클리핑</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board.php?action=view&db=1001&cate=&uid=360&num=0'><span class='m-new-li-left cut-50' style='width:70%;'>수능 D-100 전략(발췌)</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>08.27</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board.php?action=view&db=1001&cate=&uid=359&num=1'><span class='m-new-li-left cut-50' style='width:70%;'>2021 대입에서도 여전히 중요한 자기소개서[한국...</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>06.26</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board.php?action=view&db=1001&cate=&uid=358&num=2'><span class='m-new-li-left cut-50' style='width:70%;'>[서울대 아로리] 서울대 지원자들이 가장 많이 읽...</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>06.26</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board.php?action=view&db=1001&cate=&uid=357&num=3'><span class='m-new-li-left cut-50' style='width:70%;'>2021학년도 수능, 12월3일(기사발췌)</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>04.01</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board.php?action=view&db=1001&cate=&uid=356&num=4'><span class='m-new-li-left cut-50' style='width:70%;'>수능 D-7 전략과 수능 당일 점검 사항</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>11.08</span></li>
		</ul>	
		<ul class='home-box re_menucon_wrap' style='margin-left:1%;margin-right:1%;' >
			
			<li class='home-title re_menucon_li' onclick=location.href='board.php?db=1013&action=list'><img class='re_li_tit_icon' src="https://img.rirodata.kr/Image/img/new/a9.png"><span class='re_menucon_li_b' style='float:left;'>온라인 학습도움교실</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board.php?action=view&db=1013&cate=0&uid=58&num=0'><span class='m-new-li-left cut-50' style='width:70%;'>3학년 논술 참고 기사</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>07.17</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board.php?action=view&db=1013&cate=0&uid=57&num=1'><span class='m-new-li-left cut-50' style='width:70%;'>세계문제 활동 자료</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>07.17</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board.php?action=view&db=1013&cate=0&uid=56&num=2'><span class='m-new-li-left cut-50' style='width:70%;'>통합사회 학습지 파일 (자연재해) _ 1학년 7반...</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>06.19</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board.php?action=view&db=1013&cate=0&uid=54&num=3'><span class='m-new-li-left cut-50' style='width:70%;'>통합사회 학습지 파일 (1학년7반, 8반)</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>06.10</span></li>
			<li class='re_menucon_li_body m-new-li' onclick=location.href='board.php?action=view&db=1013&cate=0&uid=53&num=4'><span class='m-new-li-left cut-50' style='width:70%;'>통합사회 학습지 '자연환경과 인간' (건조기후~온...</span><span class='m-new-li-right home-date' style='width:30%;'> <img src=https://app.riroschool.kr/img/new/re_new.png align=absmiddle style='width:15px; height: 0px; vertical-align: middle;'>05.29</span></li>
		</ul>	
<a href='http://icpa.icehs.kr/' target='_blank'>
<ul class='home-box re_menucon_wrap' style='cursor: pointer;'>
    <li class='re_menucon_li_rinktitle'>
        <span class='re_menucon_li_rinktitle_b' style='float:left;'>인천포스코고 홈페이지</span>
        <span class="re_menucon_li_rink" style="float:right;">바로가기&nbsp;&nbsp;<i class="fas fa-chevron-right"></i></span>
    </li>
    <div class="re_menucon_img">
    </div>
</ul>
</a><div class='container_link'><div class='re_link'><a href=https://www.adiga.kr><img src=include/banner1.jpg width=160px></a></div></div>
    <script>
        var wdayChk=showChk='';
        function show_id(div, tab, num){// 레이어 보이기, 감추기
            for(var i=1; i<=10; i++){
                if(document.getElementById(div+i)){
                    if(num==i) {
                        document.getElementById(tab+i).className='active';
                        document.getElementById(div+i).style.display='';
                    }
                    else {
                        document.getElementById(tab+i).className='';
                        document.getElementById(div+i).style.display='none';
                    }
                }
            }
        }
        function show_time(wd){
            if(!wd){
                if(showChk) return;
                else showChk=1;
            }
            if(wdayChk) var cookieLecture=wdayChk;
            else var cookieLecture='';
            if(wd) {
                cookieLecture += '&wd='+wd;
                wdayChk=cookieLecture;
            }
            document.getElementById('show_time_div').style.display='';
            $.ajax({
                url:'lecture.php?action=timetable&db='+cookieLecture,
                type:'post',
                data:{
                    method : 'ajax'
                },
                success:function(data){
                    if(data) {
                        $('#show_time_frame').html(data);
                    }
                    else {
                    }
                }
            })
       }
        $(document).ready(function () {
            $('.main-btn').click(function(){
                $('.show-time-con').toggleClass('active');
            });
        });
    </script>
    <div class='show-time-con'>
        <div id=show_time_div class='show-con' style='width:0px;height:0px;'>
            <div class='show-con-frame' id=show_time_frame></div>
        </div>
        <div class='main-btn' onclick='show_time()'></div>
    </div>
</div></div>
                <center>
		<div class='re_footer_wrap' style=''>
			<div style='width:100%;min-width:1000px;_width:1000px;display:inline-block;margin:auto;'>
				<div class='re_footer_container'>
					<div class='re_footer_logo'><a href=./ target=_top><img src='include/logo.png' width=160px style='filter:gray(Opacity=0.7);-webkit-filter:grayscale(100%);'></a></div>
					<div class='re_footer_text'>
						<a href=javascript:policy('privacy');>개인정보보호</a> |
						<a href=javascript:policy('mail');>이메일 무단 수집 거부</a> |
						<a href=javascript:policy('auth');>지적재산 보호</a>
						<!--div class='re_footer_text'>인천포스코고등학교 진로진학사이트</div-->
					</div>
				</div>
			</div>
		</div>
<div style='margin-top: 20px'>&nbsp;</div></center>
                
				<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","licenseKey":"a653bfb5fd","applicationID":"313827782","transactionName":"NFVbYkAAWxZQWxJRDQ0fbERbTl0KXF1ISAoT","queueTime":0,"applicationTime":48,"atts":"GBJYFAgaSBg=","errorBeacon":"bam.nr-data.net","agent":""}</script></body><!-- 0.05 -->
                
				
                
			</html>	