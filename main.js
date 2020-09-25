if (!String.prototype.repeat) {
    String.prototype.repeat = function(count) {
        'use strict';
        if (this == null) {
            throw new TypeError('can\'t convert ' + this + ' to object');
        }
        var str = '' + this;
        count = +count;
        if (count != count) {
            count = 0;
        }
        if (count < 0) {
            throw new RangeError('repeat count must be non-negative');
        }
        if (count == Infinity) {
            throw new RangeError('repeat count must be less than infinity');
        }
        count = Math.floor(count);
        if (str.length == 0 || count == 0) {
            return '';
        }
        // Ensuring count is a 31-bit integer allows us to heavily optimize the
        // main part. But anyway, most current (August 2014) browsers can't handle
        // strings 1 << 28 chars or longer, so:
        if (str.length * count >= 1 << 28) {
            throw new RangeError('repeat count must not overflow maximum string size');
        }
        var maxCount = str.length * count;
        count = Math.floor(Math.log(count) / Math.log(2));
        while (count) {
            str += str;
            count--;
        }
        str += str.substring(0, maxCount - str.length);
        return str;
    }
}
const vapidPublicKey = 'BB0iMwlmG_G3gRDjlgVWNENE0Ib5tQki-Aijz8YKqFOz8sazgABzP8viqKqEr4vdvCGZcy0ZBQTQwJqdiirMRfI';
const convertedVPkey = urlB64ToUint8Array(vapidPublicKey);
function urlB64ToUint8Array(base64String)
{
    const padding = '='.repeat((4 - base64String.length % 4) % 4);
    const base64 = (base64String + padding)
    .replace(/\-/g, '+')
    .replace(/_/g, '/');
    const rawData = window.atob(base64);
    const outputArray = new Uint8Array(rawData.length);
    for (let i = 0; i < rawData.length; ++i)
        outputArray[i] = rawData.charCodeAt(i);
    return outputArray;
}

/**
 *
 * @param siteId
 * @param service
 *  seviceId : {
 *      etc ...
 *  }
 *
 * @param callback
 */


function setService(siteId, service, callback) {
    $.ajax({
        type: 'POST',
        url: 'https://crm.rirosoft.com/api/v2/service',
        headers: {
            'client-id': '6IzcPfMuu6CYCHftl9SbI89bnkd31Pey0Nm1sUfby9s='
        },
        data: {
            siteId: siteId,
            etc: service
        },
        cache: false,
        success: callback
    })
}

var webDeviceUid
// $(document).ready( function () {
//     if ('serviceWorker' in navigator && 'PushManager' in window )
//     {
//         // Register serviceWorker
//         navigator.serviceWorker.register('/sw.js').then(function(swReg) {
//             $.ajax({
//                        method : 'GET',
//                        url : 'http://localhost:4000/api/device',
//                        dataType : 'json',
//                        data : {
//                            type: 'web',
//                            siteId: 'beta',
//                            id: 'id',
//                            parent: '',
//                        }
//                    }).done( function (res){
//                 console.log(res);
//                 webDeviceUid = res.data.uid
//             }).fail( function (err) {
//                 console.log(err);
//             });
//
//             // Registration was successful
//             console.log('ServiceWorker registration successful with scope: ', swReg.scope);
//             // Add Button Listener
//             $("#notification").on("updateBtn", function (e, isSub) {
//                 if (Notification.permission === 'denied')
//                     return $(this).html("Denied");
//                 if( isSub ) {
//                     $(this).attr("data-next-action", "unsub")
//                     $(this).addClass('fa-bell')
//                     $(this).removeClass('fa-bell-slash')
//                 } else {
//                     $(this).attr("data-next-action", "sub")
//                     $(this).addClass('fa-bell-slash')
//                     $(this).removeClass('fa-bell')
//                 }
//                 $(this).removeAttr("disabled");
//             }).on("click", function (e) {
//                 //Disabled Button until user response..
//                 $(this).attr("disabled", true);
//                 if( $(this).attr("data-next-action") == "sub" )
//                 { // Subscribing...
//                     swReg.pushManager.subscribe({
//                                                     userVisibleOnly: true,
//                                                     applicationServerKey: convertedVPkey
//                                                 })
//                          .then(function(subscription) {
//                              if(!webDeviceUid) {
//                                  $.ajax({
//                                             method: 'PUT',
//                                             url: 'http://localhost:4000/api/device',
//                                             dataType: 'json',
//                                             data: {
//                                                 type: 'web',
//                                                 siteId: 'beta',
//                                                 id: 'id',
//                                                 parent: '',
//                                                 subscription: JSON.parse(JSON.stringify(subscription))
//                                             }
//                                         }).done(function (res) {
//                                      console.log(res);
//                                      webDeviceUid = res.data.uid
//                                  }).fail(function (err) {
//                                      console.log(err);
//                                  });
//                              }
//                              $("#notification").trigger("updateBtn",[true]);
//                          })
//                          .catch(function(err) {
//                              console.log('Failed to subscribe the user: ', err);
//                              $("#notification").trigger("updateBtn",[false]);
//                          });
//                 }
//                 else
//                 { // Unsubscribing..
//                     swReg.pushManager.getSubscription().then(function(subscription) {
//                              if (subscription) {
//                                  $.ajax({
//                                             method : 'DELETE',
//                                             url : 'http://localhost:4000/api/device?uid=' + webDeviceUid,
//                                         }).done( function (res){
//                                      console.log(res);
//                                      webDeviceUid = null
//                                  }).fail( function (err) {
//                                      console.log(err);
//                                  });
//
//                                  return subscription.unsubscribe();
//                              }
//                          })
//                          .catch(function(error) {
//                              console.log('Error unsubscribing', error);
//                              $("#notification").trigger("updateBtn",[true]);
//                          })
//                          .then(function() {
//                              console.log('User is unsubscribed.');
//                              $("#notification").trigger("updateBtn",[false]);
//                          });
//                 }
//             });
//             // Check Subscribe > and Update Button
//             swReg.pushManager.getSubscription().then( function(subscription) {
//                 isSubscribed = !(subscription === null);
//                 //Update Button
//                 $("#notification").trigger("updateBtn", [isSubscribed]);
//                 if (isSubscribed)
//                     console.log('User is subscribed.');
//                 else
//                     console.log('User is NOT subscribed.');
//             });
//         }).catch(function(err) {
//             // registration failed :(
//             console.log('ServiceWorker registration failed: ', err);
//         });
//     }
// });


var imgUrl = "https://img.rirodata.kr/Image";
//var imgUrl="https://app.riroschool.kr/img";
//var _imgurl = "http://img.rirodata.kr/img";
var term=0;
var screenHeight=screen.availHeight;
var screenWidth=screen.availWidth;
var contextMenu=true;
var selectStart=true;
function bg(obj,col) { obj.style.background=col; }
var isMenu=getCookie('cookie_menu');

// ios 13 에서 confirm 동작 문제 발생 ==> 2019.11.22 우회 개발 추가 stony
function riroConfirm(text, cb){
    var body = document.getElementsByTagName('body')[0];
    var overlay = document.createElement('div');
    overlay.className = 'confirmWin';
    var box = document.createElement('div');
    var p = document.createElement('p');
    p.appendChild(document.createTextNode(text));
    box.appendChild(p);

    // Create yes and no button
    var noButton = document.createElement('button');
    var yesButton = document.createElement('button');
    noButton.appendChild(document.createTextNode('취소'));
    noButton.addEventListener('click', function(){ cb(false); body.removeChild(overlay); }, false);
    yesButton.appendChild(document.createTextNode('확인'));
    yesButton.addEventListener('click', function(){ cb(true); body.removeChild(overlay); }, false);

    // Append the buttons to the box
    box.appendChild(noButton);
    box.appendChild(yesButton);
    overlay.appendChild(box);
    body.appendChild(overlay);
}

function M_openlayer(mouse){
    var obj=document.getElementById('left_pannel');
    if(isMenu=='closed') {
        if(mouse=='over'){
            obj.style.display='block';
            obj.style.backgroundColor ='white';
            obj.style.position='absolute';
            obj.style.border='1px solid #bbbbbb';
            obj.style.marginTop='-20px';
            obj.style.zIndex='1000';
            obj.style.boxShadow='4px 4px 2px #dddddd';
        }
        else if(mouse=='out'){
            obj.style.display='none';
            obj.style.backgroundColor='';
            obj.style.position='relative';
            obj.style.border='';
            obj.style.marginTop='';
            obj.style.boxShadow='';
        }
    }
}
function menu_show(device){
    var obj=document.getElementById('left_pannel');
    var obj2=document.getElementById('main_content');
    if(isMenu=='closed') {
        obj.style.display='block';
        if(device=='app'){
            obj.style.position='fixed';
            obj.style.top='0px';
            obj.style.height='100%';
            //obj.style.z-index='999';
        }
        else{
            obj.style.position='relative';
            obj2.style.width='948px';
            obj.style.backgroundColor='';
            obj.style.border='';
            obj.style.marginTop='';
            obj.style.boxShadow='';
        }
        isMenu='';
    }
    else {
        obj.style.display='none';
        obj.style.position='absolute';
        if(device != 'app') obj2.style.width='1200px';
        isMenu='closed';
    }
    saveCookie('cookie_menu', isMenu, 10);
}
function bgImg(obj,img){
    if(img && !obj.value) obj.style.backgroundImage = "url('" + img + "')";
    else obj.style.backgroundImage = '';
}
function d(d_key) {
    var d_key=String(d_key);
    var left=screen.availWidth-410;
    var dic='http://krdic.naver.com/small_search.nhn?query=';
    var is_word_test='';
    if(!is_word_test){
        if(!d_key) var d_key='index';
        else {
            if(d_key.charCodeAt(1)<128){ dic='http://endic.naver.com/popManager.nhn?m=search&query=';}
            else var d_key=encodeURI(d_key);	window.open('board.php?action=dic&club=$club&db=$db&uid=$uid&test_name=$additional_title&key='+d_key,'dic','width=405,height=500,resizable=yes,scrollbars=no,left='+left+', top=30');
        }
        var DICWIN=window.open(dic+d_key,'dic','width=405,height=500,resizable=yes,scrollbars=no,left='+left+', top=30');DICWIN.focus();
    }
}
function error(msg,opt){
    if(msg=="login") msg="로그인 후에 이용하세요!!";
    else if(msg=="permit") {
        msg="죄송합니다. 이용권한이 없습니다!";
        if(opt) msg=msg+"\n\n이 기능은 '"+opt+"' 이상만 이용할 수 있습니다.";
    }
    else if(msg=="password") msg="비밀번호가 일치하지 않습니다!";
    else if(msg=="input") {
        msg="입력할 내용이 다 채워지지 않았습니다!";
        if(opt) msg=msg+"\n\n'"+opt+"'를 입력하세요.";
    }
    if(msg=="register") {
        if(confirm("회원으로 등록해야 이용할 수 있습니다.\n지금 등록하시겠습니까?")) mL('reg2','');
    }
    else alert(msg);
    return false;
}
function policy(p){
    Pwin=window.open('policy.php?p='+p,'policy','width=500,height=350,resizable=yes,scrollbars=yes');
    Pwin.focus();
}
function mL(type,opt,opt1,opt2,opt3){
    var mLstr=mLStr(type,opt,opt1,opt2,opt3);
    if(mLstr.match('&newwin=new')){
        newwin(mLstr);
    }
    else if(mLstr.match('&newwin=win')){
        win(mLstr);
    }
    else if(mLstr.match('&newwin=mod')){
        modwin(mLstr);
    }
    else if(mLstr.match('&newwin=open')){
        window.open(mLstr, 'modwin', 'toolbar=yes');
    }
    else if(mLstr.match('&newwin=stat')){
        stat_win(mLstr);
    }
    else if(mLstr.match('&newwin=full')){
        full_win(mLstr);
    }
    else{location.href=mLstr;}
}
function mLStr(type,opt,opt1,opt2,opt3){
    var retStr='';
    if(opt1=='undefined') opt1='';
    if(type=='reg') retStr='user.php?club='+opt+'&action=register_form';
    else if(type=='reg2') retStr='user.php?club='+opt+'&action=register_club';
    else if(type=='reg3') retStr='user.php?club='+opt+'&action=unregister_club';
    else if(type=='download') retStr='download.php?club='+opt+'&path='+opt1;
    else if(type=='ftp') retStr='ftp.php?club='+opt+'';
    else if(type=='mem') retStr='member.php?club='+opt+'';
    else if(type=='my_list') retStr='stat.php?club='+opt+'&action=my_list';
    else if(type=='my_date') retStr='stat.php?club='+opt+'&action=my_date';
    else if(type=='my_month') retStr='stat.php?club='+opt+'&action=my_month';
    else if(type=='exam') retStr='stat.php?club='+opt+'&action=exam';
    else if(type=='admin') retStr='member.php?club='+opt+'&action=list';
    else if(type=='qlist') retStr='itempool.php?club='+opt+'&db='+opt1;
    else if(type=='random') retStr='itempool.php?club='+opt+'&action=random'+'&db='+opt1;
    else if(type=='idx') retStr='board.php?club='+opt+'&action=all&idx_type='+opt1;
    else if(type=='list') retStr='board.php?club='+opt+'&action=list&db='+opt1+'&cate='+opt2;
    else if(type=='send'){
        if(opt3) opt3=encodeURIComponent(opt3);
        retStr='sms.php?club='+opt+'&action='+opt1+'&test='+opt2+'&app_link='+opt3;

    }
    else if(type=='meal') {
        if(opt3) retStr='meal.php?club='+opt+'&action='+opt1+'&db='+opt2+'&uid='+opt3;
        else retStr='meal.php?club='+opt+'&action='+opt1+'&db='+opt2;
    }
    else if(type=='10') retStr='portfolio.php?club='+opt+'&action=idx&db='+opt1;
    else if(type=='3') retStr='word.php?club='+opt+'&action=list&db='+opt1;
    else if(type=='4') retStr='portfolio.php?club='+opt+'&action=idx&db='+opt1;
    else if(type=='5') {
        if(opt2=='undefined'||!opt2) opt2='list';
        if(opt2=='poll') retStr='poll.php?club='+opt+'&db='+opt1+'&action='+opt2+'&cate='+opt3;
        else if(opt2=='certify') retStr='certify.php?club='+opt+'&db='+opt1+'&action='+opt2+'&act='+opt3;
        else if(opt2=='bill'||opt2=='apply'||opt2=='certificate'||opt2=='comment'||opt2=='multi_account') retStr='lecture.php?club='+opt+'&db='+opt1+'&action='+opt2+'&cate='+opt3+'&newwin=new';
        else if(opt3=='send') retStr='lecture.php?club='+opt+'&db='+opt1+'&action='+opt2+'&cate=send&newwin=new';
        else retStr='lecture.php?club='+opt+'&db='+opt1+'&action='+opt2+'&cate='+opt3;
    }
    else if(type=='11') {
        if(opt2=='undefined'||!opt2) opt2='list';
        if(opt2=='poll') retStr='poll.php?club='+opt+'&db='+opt1+'&action='+opt2+'&cate='+opt3;
        else if(opt2=='certify') retStr='certify.php?club='+opt+'&db='+opt1+'&action='+opt2+'&act='+opt3;
        else if(opt2=='bill'||opt2=='apply'||opt2=='certificate'||opt2=='comment'||opt2=='multi_account') retStr='freesem.php?club='+opt+'&db='+opt1+'&action='+opt2+'&cate='+opt3+'&newwin=new';
        else if(opt3=='send') retStr='freesem.php?club='+opt+'&db='+opt1+'&action='+opt2+'&cate=send&newwin=new';
        else retStr='freesem.php?club='+opt+'&db='+opt1+'&action='+opt2+'&cate='+opt3;
    }
    else if(type=='6') {
        if(opt2=='undefined'||!opt2) opt2='list';
        retStr='record.php?club='+opt+'&db='+opt1+'&action='+opt2+'&cate='+opt3;
    }
    else if(type=='7') {
        if(opt2=='undefined'||!opt2) opt2='list';
        retStr='univ.php?club='+opt+'&db='+opt1+'&action='+opt2+'&cate='+opt3;
    }
    else if(type=='8') {
        if(opt2=='undefined'||!opt2) opt2='list';
        retStr='photo.php?club='+opt+'&action=list&db='+opt1+'&'+opt2+'='+opt3;
    }
    else if(type=='9') {
        if(opt2=='undefined'||!opt2) opt2='list';
        if(opt1>1950&&opt1<=1960) retStr='meal.php?club='+opt+'&action=list&db='+opt1+'&'+opt2+'='+opt3;
        //else if(opt1.match('1905')) retStr='board.php?club='+opt+'&action=list&db='+opt1;
        else if(opt1<=1950)retStr='board_msg.php?club='+opt+'&action=list&db='+opt1+'&'+opt2+'='+opt3;
        else if(opt1>1960)retStr='reserve.php?club='+opt+'&action=list&db='+opt1+'&'+opt2+'='+opt3;
    }
    else if(type<3) retStr='board.php?club='+opt+'&action=list&db='+opt1+'&'+opt2+'='+opt3;
    else if(type=='rank') retStr='stat.php?club='+opt+'';
    else if(type=='rank2') retStr='stat.php?club='+opt+'&action=view_rank&date='+opt1;
    else if(type=='my_note') retStr='stat.php?club='+opt+'&action=my_note';
    else if(type=='dic') retStr='stat.php?club='+opt+'&action=my_dic';
    else if(type=='my_data') retStr='stat.php?club='+opt+'&action=my_data';
    else if(type=='cnt') retStr='stat.php?club='+opt+'&action=counter';
    else if(type=='logout') retStr='user.php?club='+opt+'&action=logout';
    else if(type=='login') retStr='user.php?club='+opt+'&action=login_form';
    else if(type=='my_info') retStr='user.php?club='+opt+'&action=modify_form';
    else if(type=='lost') retStr='user.php?club='+opt+'&action=lost_pass';
    else if(type=='mail') retStr='member.php?action=mailto&address='+opt+'&title='+opt1+'&memo='+opt2+'&newwin=win';
    else if(type=='sms') retStr='sms.php?club='+opt+'&action=list&num='+opt1+'&receiver_mode='+opt2+'&newwin=mod';
    else if(type=='uni2') retStr='user.php?club='+opt+'&action=union&add_url='+opt;
    else if(type=='uni') retStr='./'+opt+'&newwin=open';
    else if(type=='popup') retStr='board.php?action=view&mode=wide&popup=1&club='+opt+'&db='+opt1+'&uid='+opt2+'&newwin=stat';
    else if(type=='stat_all')retStr='board.php?action=stat_all&mode=&popup=1&club='+opt+'&db='+opt1+'&my_id='+opt2+'&newwin=stat';
    else if(type=='plan') retStr='univ.php?action=plan&mode=&popup=1&club='+opt+'&db='+opt1+'&my_id='+opt2+'&newwin=full';
    else if(type=='skin') retStr='admin.php?club='+opt+'&action=skin_form';
    else if(type=='board') retStr='admin.php?club='+opt+'&action=board_form';
    else if(type=='edit_board') retStr='admin.php?club='+opt+'&action=db_edit&new_db='+opt1;
    else if(type=='member') retStr='member.php?club='+opt;
    else if(type=='counsel') retStr='counsel.php?club='+opt+'&act='+opt1+'&'+opt2+'='+opt3;
    else if(type=='cumulative') retStr='cumulative.php?club='+opt+'&act='+opt1+'&'+opt2+'='+opt3+'&newwin=stat';
    else if(type=='certify') retStr='certify.php?club='+opt+'&act='+opt1+'&'+opt2+'='+opt3;
    else if(type=='record') {
        if(!opt1) opt1='list';
        if(!opt2) opt2='record';
        retStr='record.php?club='+opt+'&action='+opt1+'&db='+opt2+'&mode='+opt3;
    }
    else if(type=='board_msg') retStr='board_msg.php?club='+opt+'&action=list&db='+opt1;
    else if(type=='work') retStr='admin.php?club='+opt+'&action=work&sub=list';
    else {
        retStr=type+'.php?club='+opt+'&action='+opt1+'&act='+opt2+'&db='+opt3;
    }
    return retStr;
}
function sizeDown(obj) {
    obj.rows += 3;
}
function sizeUp(obj) {
    if(obj.rows>3) obj.rows -= 3;
}
function onA(t){term=t;setMessage();}
function setMessage(){
    window.status='환영합니다.';
    if(term) window.setTimeout(setMessage(),200);
}
function win(URL){
    var WIN2=window.open(URL, 'win', 'toolbar=no, scrollbars=yes, resizable=yes, top=30, width=350, height=300');
    WIN2.focus();
}
function newwin(URL){
    var height=screenHeight - 61;
    var width=screenWidth - 11;
    if(width>1440) width=1440;
    if(URL.match('timetable')) {
        var num = Math.floor(Math.random() * 1000000);
        var winname = 'new' + num;
    }
    else winname='newwin';
    var WIN=window.open(URL, winname, 'toolbar=no,fullscreen=no,scrollbars=yes, resizable=yes, left=0, top=0, width='+width+', height='+height);
    WIN.focus();
}
function modwin(URL){
    var WIN3=window.open(URL, 'modwin', 'toolbar=no, scrollbars=yes, resizable=yes, top=30, width=800, height=300');
    WIN3.focus();
}
function stat_win(URL){
    var height=screenHeight - 61;
    var width=screenWidth - 11;
    if(width>1440) width=1440;
    var WIN=window.open(URL, 'stat_win', 'toolbar=no, scrollbars=yes, resizable=yes, left=0, top=0, width='+width+', height='+height);
    WIN.focus();
}
function full_win(URL){
    var height=screenHeight - 61;
    var width=screenWidth - 11;
    if(width>1440) width=1440;
    var WIN=window.open(URL, 'full_win', 'toolbar=no, scrollbars=yes, resizable=yes, left=0, top=0, width='+width+', height='+height);
    WIN.focus();
}
function openEditor(obj){
    //sel = document.selection.createRange();
    if (NS) {
        sel = document.getSelection();
    } else {
        sel = document.selection.createRange();
    }
    var editWin=window.open('include/WebEditor/?object='+obj+'&text=','editor','width=600,height=500,resizable=yes,scrollbars=yes');
    editWin.focus();
}
function han(obj){
    if(obj.style.fontFamily=='한컴돋움') obj.style.fontFamily='굴림';
    else obj.style.fontFamily='한컴돋움';
}
function editorButton(obj,opt){
    if(opt!=2) {
        document.write("<img src="+imgUrl+"/btn/btn_editor.gif border=0 style='cursor:pointer' align=absmiddle onClick=openEditor('"+obj+"'); alt='편집기로 입력하기'> ");
        //document.write("<img src="+imgUrl+"/btn/btn_old_letter.gif border=0 style='cursor:pointer' align=absmiddle onClick=han(document.form1."+obj+"); alt='옛한글 전환'> ");
    }
    document.write("<img src="+imgUrl+"/btn/btn_row_plus.gif border=0 align=absmiddle onclick='sizeDown(document.form1."+obj+")' alt='글상자 키우기' style='cursor:pointer'> ");
    document.write("<img src="+imgUrl+"/btn/btn_row_minus.gif border=0 align=absmiddle onclick='sizeUp(document.form1."+obj+")' alt='글상자 줄이기' style='cursor:pointer'>");
}
function play(CLUB,DB,MEDIA,OPT1,OPT2,OPT3){
    var RS='no';
    var WinName='mediawin';
    if(OPT3=='wmv') WinName='ment_frame0';
    else if(OPT3=='swf'||MEDIA=='R_sound1') RS='yes';
    if(!DB) DB='22D6F312';
    var URL='board.php?club='+CLUB+'&action=mediaplayer&db='+DB+'&media='+MEDIA+'&opt1='+OPT1+'&opt2='+OPT2+'&db='+DB;
    var MDWIN=window.open(URL,WinName, 'toolbar=no, scrollbars=no, resizable='+RS+', top=0, width=384, height=225');
    MDWIN.focus();
}
function sound(CLUB,DB,MEDIA){
    hidden.location.href('board.php?club='+CLUB+'&action=soundplayer&mode=hidden&auto_start=1&media='+MEDIA);
}
function msg(URL){
    var MSG=window.open(URL, 'msg', 'toolbar=no, scrollbars=yes, resizable=no, top=30, width=600, height=300');
    MSG.focus();
}
// 20190715 테이블리스트에서 체크박스 방향 추가
function clickArrow(formAndCheckBoxId, dir, index) {
    var obj=eval('document.' + formAndCheckBoxId);
    var bool = !obj[index].checked
    if (dir == 'up') {
        for(var i=index;i>=0;i--){
            obj[i].checked = bool
        }
    } else if (dir == 'down') {
        for(var i=index;i<=obj.length-1;i++){
            obj[i].checked = bool
        }
    }
}
function select_all(obj) {
    var df=document.form1;
    if( typeof df.elements=='undefined' ) df = df[df.length-1].elements;
    else df = df.elements;
    if(!df.num_id.length) df.num_id.checked=obj.checked;
    else {
        for(i=0;i<df.num_id.length;i++){	df.num_id[i].checked=obj.checked;}
    }
}
function select_chk(type) {
    var df=document.form1;
    if( typeof df.elements=='undefined' ) df = df[df.length-1].elements;
    else df = df.elements;
    if(!df.dump.value) {alert('원하는 작업을 선택하세요.');return false;}
    var selected_chk=0;
    if(!df.num_id.length) {
        if(df.num_id.checked==true) selected_chk++;
    }
    else {
        for(i=0;i<df.num_id.length;i++){	if(df.num_id[i].checked==true) selected_chk++;}
    }
    if(selected_chk<1) {
        if(type==2) alert("선택된 회원이 한 명도 없습니다.\n\n원하는 회원을 체크한 후에 다시 시도하세요.");
        else alert("선택된 문제가 하나도 없습니다.\n\n원하는 문제번호를 체크한 후에 다시 시도하세요.");
        return false;
    }
    else {
        if(type==2) modwin('');
        else newwin('');
        return true;
    }
    return true;
}
function getCookie(name) {
    var arg = name + "=";
    var alen = arg.length;
    var clen = document.cookie.length;
    var i = 0;
    while(i< clen) {
        var j = i + alen;
        if(document.cookie.substring(i,j)==arg){
            var end = document.cookie.indexOf(";",j);
            if(end == -1) end = document.cookie.length;
            return unescape(document.cookie.substring(j,end));
        }
        i=document.cookie.indexOf(" ",i)+1;
        if (i==0) break;
    }
    return null;
}
function saveCookie(name, value, expire){
    var eDate=new Date();
    eDate.setDate(eDate.getDate() + expire);
    document.cookie=name + "=" + value + "; expires=" +  eDate.toGMTString()+ "; path=/";
}
function scaleFont(val,name) {
    var lineHeight;
    var fontSize=Math.abs(getCookie(name));
    if(!fontSize||fontSize==null||fontSize==NaN) fontSize=11;
    if(val){
        if(fontSize>18) val*=3;
        if(fontSize>50) val*=5;
    }
    fontSize = fontSize + val;
    if(fontSize<6) fontSize=6;
    else if(fontSize>100) fontSize=100;
    lineHeight = Math.abs(fontSize)+8;
    if(!eval(name).length) {eval(name).style.fontSize = fontSize + 'pt';eval(name).style.lineHeight = lineHeight + 'pt';}
    else {for(i=0;i<eval(name).length;i++){eval(name)[i].style.fontSize = fontSize + 'pt';eval(name)[i].style.lineHeight = lineHeight + 'pt';}}
    var mydate = new Date;
    mydate.setDate(mydate.getDate()+3600*24*365);
    document.cookie=name + '=' + escape(fontSize) + ' ; expires=' + mydate.toGMTString();
}
function viewImage(imgObj,imgSrc,imgWidth, imgHeight) {
    var myImg=eval(imgObj);
    myImg.src=imgSrc;
    if(imgWidth) myImg.width=imgWidth;
    if(imgHeight) myImg.height=imgHeight;
}
var NS=(navigator.appName=='Netscape')?1:0;
if (NS) document.captureEvents(Event.DBLCLICK);
//document.ondblclick = search; 더블클릭 시 네이버 사전 검색
//		document.write("<div id=preview style='left:0px;top:0px;width:300px;height:50px;position:absolute;visibility:hidden;'><p></p></div>");
var __ttDiv = document.createElement('div');
__ttDiv.setAttribute('id', 'preview');
__ttDiv.setAttribute('style', 'left:0px;top:0px;width:300px;height:50px;position:absolute;visibility:hidden;');
__ttDiv.appendChild( document.createElement('p') );
// 아직 body가 생성이 안된상태일 수 있으므로 document가 ready 되었을 때 넣어야 하지만,
// main.js에서 그것을 다룰 수 없으므로 임시로 0.5초 후에 body에 append하도록 하였다.
setTimeout( function() {document.body.appendChild(__ttDiv)}, 100);//document.body IE에서 null 오류 발생-> 점검이 필요함 20150315
var x=0;
var y=0;
var type=0;
var marginWidth=20;
var marginHeight=20;
var width=300;
var height=50;
function qV(text,type) {
    //alert(text);
    if(text!=undefined){
        document.onmousemove=mouseMove;
        var txt=text.split('<br>');
        var height2=50;
        for(var i=0;i<txt.length;i++){
            height2+=18;
            if(txt[i].length>30) height2+=18;
        }
        height=height2;
        if(document.all['preview']) {
            document.all['preview'].innerHTML = "<table width=100% cellpadding=5 cellspacing=0 border=0 bgcolor=white><tr><td style='border-style:solid;border-width:1px;border-color:#444444;color:#444444'>"+text+"</td></tr></table>";
            moveTo(x+marginWidth,y+marginHeight);
            preview.style.visibility = 'visible';
        }
    }
}
function mouseMove(e) {
    var usera = window.navigator.userAgent;
    if(( usera.indexOf('MSIE') > 0 || usera.indexOf('Trident') > 0 )){
        //x=event.clientX + document.body.scrollLeft;
        //y=event.clientY + document.body.scrollTop;
        //if (x+width+50-document.body.scrollLeft > document.body.clientWidth) x=x-width-30;
        //if (y+height+100-document.body.scrollTop > document.body.clientHeight) y=y-height;
        x=event.clientX;
        y=event.clientY;
        moveTo(x+marginWidth,y+marginHeight);
    }
    else {
        var obj = document.getElementById("preview");
        if(obj) {
            //var scrollTop = document.body.scrollTop;
            //var scrollLeft = document.body.scrollLeft;
            //obj.style.top = scrollTop + e.clientY + 10 + "px";
            //obj.style.left = scrollLeft + e.clientY + 10 + "px";
            obj.style.top = e.clientY + 10 + "px";
            obj.style.left = e.clientX + 10 + "px";
        }
    }
}
function hide() {
    var preview = document.getElementById("preview");
    if(preview) {
        preview.innerHTML='';
        preview.style.visibility='hidden';
        preview.style.position='fixed';
    }
}
function moveTo(Left,Top) {preview.style.left=Left+'px'; preview.style.top=Top+'px';}
function M_Layers(obj,stl) {
    if(!stl) stl='hidden';
    else {	document.onmousemove='';stl='visible';}
    eval(obj).style.visibility=stl;
}
function search() {
    if (NS) {
        txt = document.getSelection();
    } else {
        txt = document.selection.createRange();
        txt = txt.text
    }
    if (!NS) document.selection.empty();
    if (txt > '') {
        d(txt);
    }
}
function OpenSound(id) {
    var url = "http://endic.naver.com/sound.php?id=" + id;
    if(navigator.appName == 'Netscape')
        window.open(url,"sound","width=164,height=66,resizable=yes,scrollbars=no");
    else
        window.open(url,"sound","width=308,height=56,resizable=yes,scrollbars=no");
}
function saveText(obj){
    var val=eval('document.all.'+obj);
    val.focus();
    val.select();
    var therange=val.createTextRange();
    therange.execCommand('Copy');
}
function Mplay(url){
    var objmediaP = "<object id='MPlayer' name='MPlayer' width=322 height=315  classid='CLSID:22D6f312-B0F6-11D0-94AB-0080C74C7E95' codebase='http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701' standby='Loading Microsoft Windows Media Player components...' type='application/x-oleobject' style='filter:gray();'>" ;
    objmediaP = objmediaP + "<param name='AUTOSTART' value='1'>";
    objmediaP = objmediaP + "<param name='FileName' value='"+url+"'>";
    objmediaP = objmediaP + "<param name='SHOWSTATUSBAR' value='1'>";
    objmediaP = objmediaP + "<param name='TRANSPARENTATSTART' value='1'> "  ;
    objmediaP = objmediaP + "<param name='UIMODE' value='FULL'>";
    objmediaP = objmediaP + "<param name='displaybackcolor' value='0'>";
    objmediaP = objmediaP + "<param name='EnableContextMenu' value='0'>";
    objmediaP = objmediaP + "<embed id='MPlyer' type='application/x-mplayer2' pluginspage = 'http://www.microsoft.com/windows/mediaplayer/' src='"+url+"' name='mediaplayer1' width=332 height=315 autostart=true></embed>";
    objmediaP = objmediaP + "</object>";
    document.write(objmediaP);
}
function calendar(div, obj, y,m) {
    if(!y) {
        var dy=new Date();
        y=dy.getFullYear();
    }
    if(!m) m=1;
    y=y*1;
    m=m*1;
    var text = '<table class=riro-calendar style="width:241px;"><tr><td style="">';
    text += '<table class=table_trans cellspacing=1 cellpadding=8px bgcolor="#fefefe"><tr><span class="close-btn" onclick="document.all.'+div+'.innerHTML = \'\'"><i class="fal fa-times"></i></span><td colspan=7 style="text-align:center;    padding: 8px 0;" nowrap>';
    text += '<span class="cal-arrow" style="cursor:pointer;color:gray" onclick="calendar(\''+div+'\',\''+obj+'\','+(y-1)+','+m+')"><span width=8px height=8px onmouseover="this.style.color=\'orange\';" onmouseout="this.style.color=\'gray\';"><b><i class="fal fa-chevron-left"></i></b> </span></span><span class="ntf cal-text">' + y + '년</span><span class="cal-arrow" style="cursor:pointer;color:gray" onclick="calendar(\''+div+'\',\''+obj+'\','+(y+1)+','+m+')"><span width=8px height=8px onmouseover="this.style.color=\'orange\';" onmouseout="this.style.color=\'gray\';"> <b><i class="fal fa-chevron-right"></i></b></span></span> &nbsp; ';
    text +='<span class="cal-arrow" style="cursor:pointer;color:gray;" onclick="calendar(\''+div+'\',\''+obj+'\','+(m==1?(y-1)+','+12:y+','+(m-1))+')"><span width=8px height=8px onmouseover="this.style.color=\'orange\';" onmouseout="this.style.color=\'gray\';"><b><i class="fal fa-chevron-left"></i></b> </span></span><span class="ntf cal-text">' + ((m < 10) ? ('0' + m) : m) + '월</span><span class="cal-arrow" style="cursor:pointer;color:gray" onclick="calendar(\''+div+'\',\''+obj+'\','+(m==12?(y+1)+','+1:y+','+(m+1))+')"><span width=8px height=8px onmouseover="this.style.color=\'orange\';" onmouseout="this.style.color=\'gray\';"> <b><i class="fal fa-chevron-right"></i></b></span></span>';
    text += ' <!--<img src='+imgUrl+'/btn_delbar.png align="absmiddle" style="cursor:pointer;margin-left:20px;width:10px" onclick="document.all.'+div+'.innerHTML = \'\'">--!></td></tr>\n<tr align=center><td style="color:red;">일</td><td>월</td><td>화</td><td>수</td><td>목</td><td>금</td><td style="color:#0088cc;">토</td>';
    var d1 = d2 = (y+(y-y%4)/4-(y-y%100)/100+(y-y%400)/400 +m*2+(m*5-m*5%9)/9-(m<3?y%4||y%100==0&&y%400?2:3:4))%7;
    for (i = 0; i < 42; i++) {
        if (i%7==0) text += '</tr>\n<tr align=right>';
        if (i < d1 || i >= d1+(m*9-m*9%8)/8%2+(m==2?y%4||y%100==0&&y%400?28:29:30)) text += '<td> </td>';
        else 	{
            var d2 = i+1-d1;
            //var date2=date.substring(0,4);
            //if(m<10) d3 += '-0'+m;
            //else d3 += '-'+m;
            //if(d2<10) d3 += '-0'+d2;
            //else d3 += '-'+d2;
            text += '<td class=\'cal-date\'';
            if(obj) {
                text += 'onclick="document.all.'+obj+'.value=\''+y+'-'+ ((m < 10) ? ('0' + m) : m) +'-'+ ((d2 < 10) ? ('0' + d2) : d2) +'\';document.all.'+obj+'.focus();document.all.'+div+'.innerHTML = \'\'"';
            }
            text +=' style="cursor:pointer;' + (i%7 ? '' : 'color:red;') + '">' + d2 + '</td>';
        }
    }
    document.getElementById(div).innerHTML = text + '</tr>\n</table></td></tr></table>';
}
function dCalendar(div, obj, y,m) {
    if(!y) {
        var dy=new Date();
        y=dy.getFullYear();
    }
    if(!m) m=1;
    y=y*1;
    m=m*1;
    var text = '<table class="riro-calendar" style="width:241px;"><tr><td style="">';
    text += '<table class=table_trans cellspacing=8px cellpadding=8px bgcolor="#fefefe"><tr><span class="close-btn" onclick="document.all.'+div+'.innerHTML = \'\'"><i class="fal fa-times"></i></span><td colspan=7 style="text-align:center;padding:8px 0;" nowrap>';
    text += '<span class="cal-arrow" style="cursor:pointer;color:gray;" onclick="calendar(\''+div+'\',\''+obj+'\','+(y-1)+','+m+')"><span width=8px height=8px onmouseover="this.style.color=\'orange\';" onmouseout="this.style.color=\'gray\';"><i class="fal fa-chevron-left"></i>  </span></span><span class="ntf cal-text">' + y + '년</span><span class="cal-arrow" style="cursor:pointer;color:gray" onclick="calendar(\''+div+'\',\''+obj+'\','+(y+1)+','+m+')"><span width=8px height=8px onmouseover="this.style.color=\'orange\';" onmouseout="this.style.color=\'gray\';">  <i class="fal fa-chevron-right"></i></span></span> &nbsp; ';
    text +='<span class="cal-arrow" style="cursor:pointer;color:gray" onclick="calendar(\''+div+'\',\''+obj+'\','+(m==1?(y-1)+','+12:y+','+(m-1))+')"><span width=8px height=8px onmouseover="this.style.color=\'orange\';" onmouseout="this.style.color=\'gray\';"><i class="fal fa-chevron-left"></i>  </span></span><span class="ntf cal-text">' + ((m < 10) ? ('0' + m) : m) + '월</span><span class="cal-arrow" style="cursor:pointer;color:gray" onclick="calendar(\''+div+'\',\''+obj+'\','+(m==12?(y+1)+','+1:y+','+(m+1))+')"><span width=8px height=8px onmouseover="this.style.color=\'orange\';" onmouseout="this.style.color=\'gray\';">  <i class="fal fa-chevron-right"></i></span></span>';
    text += '<!--<img src='+imgUrl+'/btn_delbar.png align="absmiddle" style="cursor:pointer;margin-left:20px;width:10px" onclick="document.all.'+div+'.innerHTML = \'\'">--!></td></tr>\n<tr align=center><td style="color:red;">일</td><td>월</td><td>화</td><td>수</td><td>목</td><td>금</td><td style="color:#0088cc;">토</td>';
    var d1 = d2 = (y+(y-y%4)/4-(y-y%100)/100+(y-y%400)/400 +m*2+(m*5-m*5%9)/9-(m<3?y%4||y%100==0&&y%400?2:3:4))%7;
    for (i = 0; i < 42; i++) {
        if (i%7==0) text += '</tr>\n<tr align=right>';
        if (i < d1 || i >= d1+(m*9-m*9%8)/8%2+(m==2?y%4||y%100==0&&y%400?28:29:30)) text += '<td> </td>';
        else 	{
            var d2 = i+1-d1;
            //var date2=date.substring(0,4);
            //if(m<10) d3 += '-0'+m;
            //else d3 += '-'+m;
            //if(d2<10) d3 += '-0'+d2;
            //else d3 += '-'+d2;
            text += '<td class=\'cal-date\'';
            if(obj) {
                text += 'onclick="document.all.'+obj+'.value=\''+y+'-'+ ((m < 10) ? ('0' + m) : m) +'-'+ ((d2 < 10) ? ('0' + d2) : d2) +'\';document.all.'+obj+'.focus();document.all.'+div+'.innerHTML = \'\'"';
            }
            text +=' style="cursor:pointer;' + (i%7 ? '' : 'color:red;') + '">' + d2 + '</td>';
        }
    }
    document.getElementById(div).innerHTML = text + '</tr>\n</table></td></tr></table>';
}
function hourmin(div, obj, h) {
    if(!h) h=0;
    var text = '<table bgcolor="white" style="border:none;-webkit-box-shadow: 1px 1px 10px #b6b6b6;box-shadow: 1px 1px 10px #b6b6b6;border-radius: 6px;"><tr><td style="border: none;">';
    text += '<table class="table_trans re_popup_table2" cellspacing=1 cellpadding=1 bgcolor="#fefefe">';
    text += '<tr><td align=right style="border: none;"><img src='+imgUrl+'/btn_delbar.png style="cursor:pointer;padding:3px;margin:1px;width:10px;margin-top: 7px;" align="absmiddl" border="0" onclick="document.all.'+div+'.innerHTML = \'\'"></td></tr>';
    for (var i = 7; i <=23; i++) {
        var h2=i;
        if(h2<10) h2='0' + h2;
        text += '<tr><td class="re_popup_table2_con" nowrap style="border: none;">'+h2+'시';
        for(var i2=0; i2<6; i2++){
            var m2=i2*10;
            if(m2<10) m2='0'+m2;
            var hm=h2+':'+m2;
            text += '<a style="cursor:pointer;" onclick="document.all.'+obj+'.value=\''+ hm +'\';document.all.'+div+'.innerHTML = \'\'">'+ m2  +'</a>';
        }
        text += '</td></tr>';
    }
    text += '</table></td></tr></table>';
    document.getElementById(div).innerHTML = text;
}
function hour(div, obj, h) {
    if(!h) h=0;
    var text = '<table><tr><td style="border:none;padding:0px;background:white;">';
    text += '<table class=table_box_vw bgcolor="#fefefe" style="margin:5px;"><tr><td nowrap style="padding:10px;">';
    for (i = 0; i <=23; i++) {
        var h2=i%25;
        if(h2<10) h2='0' + h2;
        if (i && i<=24) text += ' ';
        if(i==6) text += ' <span class=\'close-btn\' onclick="document.all.'+div+'.innerHTML = \'\'"><i class=\'fal fa-times\'></i></span><!--<img src='+imgUrl+'/btn_hide.gif style="cursor:pointer;margin:5px;" align="absmiddl" border="0" onclick="document.all.'+div+'.innerHTML = \'\'">--!></td></tr><tr><td nowrap style="padding:10px;">';
        if(i==12||i==18) text +='</td></tr><tr><td nowrap style="padding:10px;">';
        text += '<a style="cursor:pointer;" onclick="document.all.'+obj+'.value=\''+ h2  +'\';document.all.'+div+'.innerHTML = \'\'" class="riro-btn white md">'+ h2 +'시</a>';
    }
    document.getElementById(div).innerHTML = text + '</td></tr>\n</table></td></tr>\n</table>';
}
function minute(div, obj, m) {
    if(!m) m=0;
    var text = '<table><tr><td style="border:none;padding:0px;background:white;">';
    text += '<table class=table_box_vw bgcolor="#fefefe" style="margin:5px;"><tr><td nowrap style="padding:10px;">';
    for (i = 0; i <12; i++) {
        var m2=i*5;
        if(m2<10) m2='0' + m2;
        if (i && i<=12) text += ' ';
        if(i==6) text += ' <span class=\'close-btn\' onclick="document.all.'+div+'.innerHTML = \'\'"><i class=\'fal fa-times\'></i></span><!--<img src='+imgUrl+'/btn_hide.gif style="cursor:pointer;margin:5px;" align="absmiddl" border="0" onclick="document.all.'+div+'.innerHTML = \'\'">--!></td></tr><tr><td nowrap style="padding:10px;">';
        text += '<a style="cursor:pointer;" onclick="document.all.'+obj+'.value=\''+ m2  +'\';document.all.'+div+'.innerHTML = \'\'">'+ m2 +'분</a>';
    }
    document.getElementById(div).innerHTML = text + '</td></tr>\n</table></td></tr></table>';
}
/*
 * 날짜 계산 함수.
 * iYear : 연도 계산, 음수를 넣을 경우 마이너스 계산.
 * iDay : 월 계산, 음수를 넣을 경우 마이너스 계산.
 * iDay : 일 계산, 음수를 넣을 경우 마이너스 계산.
 * seperator : 연도를 표시할 구분자
*/
function getCalculatedDate(iYear, iMonth, iDay, seperator){
    //현재 날짜 객체를 얻어옴.
    var gdCurDate = new Date();
    //현재 날짜에 날짜 게산.
    gdCurDate.setYear( gdCurDate.getFullYear() + iYear );
    gdCurDate.setMonth( gdCurDate.getMonth() + iMonth );
    gdCurDate.setDate( gdCurDate.getDate() + iDay );

    //실제 사용할 연, 월, 일 변수 받기.
    var giYear = gdCurDate.getFullYear();
    var giMonth = gdCurDate.getMonth()+1;
    var giDay = gdCurDate.getDate();
    //월, 일의 자릿수를 2자리로 맞춘다.
    giMonth = "0" + giMonth;
    giMonth = giMonth.substring(giMonth.length-2,giMonth.length);
    giDay   = "0" + giDay;
    giDay   = giDay.substring(giDay.length-2,giDay.length);
    //display 형태 맞추기.
    return giYear + seperator + giMonth + seperator +  giDay;
}
function Q_date(obj,stl) {
    if(!stl) {
        stl='hidden';
        eval(obj).style.visibility=stl;
    }
    else {
        var now = new Date();
        var wday = now.getDay();
        var yy = now.getFullYear();
        var mm = now.getMonth()+1;
        if(mm<3) yy = yy-1;
        var yy1 = yy + 1;
        var yy_1 = yy - 1;
        var yy_2 = yy - 2;
        var last_sun_ = -1*wday;
        if(last_sun_ == 0) var last_sun_ = -7;
        var last_mon_ = last_sun_ - 6;
        var this_mon_ = last_sun_ + 1;
        var this_sun_ = last_sun_ + 6;
        var today=getCalculatedDate(0,0,0, "-");
        var ago1=getCalculatedDate(0,0,-1, "-");
        var ago2=getCalculatedDate(0,0,-2, "-");
        var ago3=getCalculatedDate(0,0,-3, "-");
        var last_mon=getCalculatedDate(0,0,last_mon_, "-");
        var last_sun=getCalculatedDate(0,0,last_sun_, "-");
        var this_mon=getCalculatedDate(0,0,this_mon_, "-");
        var this_sun=getCalculatedDate(0,0,this_sun_, "-");
        var m_color='dddddd';
        //if(now){alert(yy+'-'+mm+'|'+wday+'/'+today+'/'+ago3);now="";}
        var txt="<table class='re_hover_cal' cellspacing='0' cellpadding='0' border=0 width=150>";
        txt +="<tr><td valign=top bgcolor=white>";
        txt +="	<table width=250 border=0 cellspacing=0 cellpadding=1 style='' class='re_hover_tit'><tr align=center><td width=50 nowrap rowspan=2 class='re_tit_td'>최근</td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+today+today+"');>오늘</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+ago1+ago1+"');>어제</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+ago2+ago2+"');>그제</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+ago3+ago3+"');>그끄제</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+this_mon+this_sun+"');>이번주</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+last_mon+last_sun+"');>지난주</a></td></tr></table>";
        txt +="	<table width=250 border=0 cellspacing=0 cellpadding=1 style='' class='re_hover_tit'><tr align=center><td width=50 nowrap rowspan=3 class='re_tit_td'>월별</td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd' onmouseout=this.style.background='' style='cursor:pointer' onclick=bL('date','"+yy+"-01-01"+yy+"-01-31') width=35>01</td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy+"-02-01"+yy+"-02-31') width=35>02</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy+"-03-01"+yy+"-03-31') width=35>03</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy+"-04-01"+yy+"-04-31') width=35>04</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy+"-05-01"+yy+"-05-31') width=35>05</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy+"-06-01"+yy+"-06-31') width=35>06</a></td></tr><tr align=center>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy+"-07-01"+yy+"-07-31')>07</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy+"-08-01"+yy+"-08-31')>08</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy+"-09-01"+yy+"-09-31')>09</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy+"-10-01"+yy+"-10-31')>10</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy+"-11-01"+yy+"-11-31')>11</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy+"-12-01"+yy+"-12-31')>12</a></td></tr><tr align=center>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy1+"-01-01"+yy1+"-01-31')>01</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy1+"-02-01"+yy1+"-02-31')>02</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy+"-03-01"+yy+"-08-31') colspan=2>"+yy+"-1학기</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy+"-09-01"+yy1+"-02-31') colspan=2>"+yy+"-2학기</a></td>";
        txt +="	</tr></table>";
        txt +="	<table width=250 border=0 cellspacing=0 cellpadding=1 style='' class='re_hover_tit'><tr align=center><td width=40 nowrap class='re_tit_td'>기타</td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy+"-03-01"+yy1+"-02-31')>"+yy+"년</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy_1+"-03-01"+yy+"-02-31')>"+yy_1+"년</a></td>";
        txt +="	<td nowrap onmouseover=this.style.background='#ddd'; onmouseout=this.style.background=''; style='cursor:pointer' onclick=bL('date','"+yy_2+"-03-01"+yy_1+"-02-31')>"+yy_2+"년</a></td>";
        txt +="	</tr></table>";
        txt +="</td></tr></table>";
        document.onmousemove='';
        stl='visible';
        eval(obj).innerHTML=txt;
        eval(obj).style.visibility=stl;
    }
}
function select(div, obj, vObj, list) {
    if(!list) return false;
    lists=list.split("//");
    var text = '<table border="1" cellspacing="0" cellpadding="2" bgcolor="white" bordercolordark="white" bordercolorlight="#cccccc"><tr><td>';
    text += '<table border=0 cellspacing=1 cellpadding=1 bgcolor="#fefefe"><tr><td nowrap>';
    text += '<img onmouseout=alert(1); src='+imgUrl+'/btn_hide.gif border="0" align="absmiddle" style="cursor:pointer" onclick="document.all.'+div+'.innerHTML = \'\'">';
    for (i = 0; i <lists.length; i++) {
        var opt=lists[i].split("/");
        text += (i%1 ? '' : '</td></tr><tr><td nowrap>') + '<a style="cursor:pointer;" onclick="document.all.'+obj+'.value=\''+ opt[1]  +'\';document.all.'+vObj+'.innerHTML=\''+ opt[0]  +'\';document.all.'+div+'.innerHTML = \'\'">'+ opt[0]  +'</a>';
    }
    document.getElementById(div).innerHTML = text + '</td></tr>\n</table></td></tr></table>';
}
function postposition(fullName, mymsg) {
    var double="남궁,황보,제갈,사공,선우,독고,서문,동방,장곡,어금,강전,소봉,망절";
    var PlainLetter="2459가갸거겨고교구규그기개걔게계과괘궈궤괴귀긔까꺄꺼껴꼬꾜꾸뀨끄끼깨꺠께꼐꽈꽤꿔꿰꾀뀌끠나냐너녀노뇨누뉴느니내냬네녜놔놰눠눼뇌뉘늬다댜더뎌도됴두듀드디대댸데뎨돠돼둬뒈되뒤듸따땨떠뗘또뚀뚜뜌뜨띠때떄떼뗴똬뙈뚸뛔뙤뛰띄라랴러려로료루류르리래럐레례롸뢔뤄뤠뢰뤼릐마먀머며모묘무뮤므미매먜메몌뫄뫠뭐뭬뫼뮈믜바뱌버벼보뵤부뷰브비배뱨베볘봐봬붜붸뵈뷔븨빠뺘뻐뼈뽀뾰뿌쀼쁘삐빼뺴뻬뼤뽜뽸뿨쀄뾔쀠쁴사샤서셔소쇼수슈스시새섀세셰솨쇄숴쉐쇠쉬싀싸쌰써쎠쏘쑈쑤쓔쓰씨쌔썌쎄쎼쏴쐐쒀쒜쐬쒸씌아야어여오요우유으이애얘에예와왜워웨외위의자쟈저져조죠주쥬즈지재쟤제졔좌좨줘줴죄쥐즤짜쨔쩌쪄쪼쬬쭈쮸쯔찌째쨰쩨쪠쫘쫴쭤쮀쬐쮜쯰차챠처쳐초쵸추츄츠치채챼체쳬촤쵀춰췌최취츼카캬커켜코쿄쿠큐크키캐컈케켸콰쾌쿼퀘쾨퀴킈타탸터텨토툐투튜트티태턔테톄톼퇘퉈퉤퇴튀틔파퍄퍼펴포표푸퓨프피패퍠페폐퐈퐤풔풰푀퓌픠하햐허혀호효후휴흐히해햬헤혜화홰훠훼회휘희";
    var realName=fullName.slice(1);
    var last=fullName.slice(-1);
    if(PlainLetter.match(last)) {var plus='야'; var plus2=''; var plus3='는'; var plus4='와'; var plus5='를';}
    else {var plus='아'; var plus2='이'; var plus3='이는'; var plus4='이와'; var plus5='이를';}
    mymsg=mymsg.replace(/\{성명\}/gi,fullName);
    mymsg=mymsg.replace(/\{이름\}이/gi,realName+plus2);
    mymsg=mymsg.replace(/\{이름\}아버/gi,realName+plus2+'아버');
    mymsg=mymsg.replace(/\{이름\} 아버/gi,realName+plus2+' 아버');
    mymsg=mymsg.replace(/\{이름\}아/gi,realName+plus);
    mymsg=mymsg.replace(/\{이름\}은/gi,realName+plus3);
    mymsg=mymsg.replace(/\{이름\}과/gi,realName+plus4);
    mymsg=mymsg.replace(/\{이름\}을/gi,realName+plus5);
    mymsg=mymsg.replace(/\{이름\}/gi,realName);
    return(mymsg);
}
function _openwin(url){
    openwin = window.open(url);
    if(!openwin){
        alert('팝업 차단기능 혹은 팝업 프로그램이 동작중입니다.\n팝업 차단 기능을 해제한 후 다시 시도해주세요.');
    }else{
        openwin.focus();
    }
}
function ajax_start(str){
    $('div#msgalertbox div.contents').html(str);
    $('div#msgalertbox_bg,div#msgalertbox').show();
    $('span.close-msgalertbox').on('click',function(){
        ajax_stop();
    });
}
function ajax_stop(){
    $('div#msgalertbox_bg,div#msgalertbox').hide();
    $('div#msgalertbox div.contents').html('');
}
function refreshpage(){
    location.reload();
}
