$(document).ready(function(){

    /****** 隱藏、出現 ******/
    /* 隱藏 - 預設值 */
    $('#btn-hide1').click(function(){
        $('#div-hideshow1').hide();
    });
    
    /* 出現 - 預設值 */
    $('#btn-show1').click(function(){
        $('#div-hideshow1').show();
    });
    
    /* 隱藏 - 速度參數 */
    $('#btn-hide2').click(function(){
        $('#div-hideshow2').hide(3000);
    });
    
    /* 出現 - 速度參數 */
    $('#btn-show2').click(function(){
        $('#div-hideshow2').show(3000);
    });
    
    /* 隱藏 - 速度參數+執行函數 */
    $('#btn-hide3').click(function(){
        $('#div-hideshow3').hide(3000, msghide3);
    });
    /* 當hide(3000) 以後執行以下程序 msghide3 */
    function msghide3() {
        alert ('我被隱藏了');
    }
    
    /* 出現 - 速度參數+執行函數 */
    $('#btn-show3').click(function(){
        $('#div-hideshow3').show(3000, msgshow3);
    });
    /* 當show(3000) 以後執行以下程序 msgshow3 */
    function msgshow3() {
        alert ('我又出現了');
    }
    
    /****** 淡出、淡入 ******/
    /* 淡出 - 預設值 */
    $('#btn-fadeOut1').click(function(){
        $('#div-fadeOutIn1').fadeOut();
    });
    
    /* 淡入 - 預設值 */
    $('#btn-fadeIn1').click(function(){
        $('#div-fadeOutIn1').fadeIn();
    });
    
    /* 淡出 - 速度參數 */
    $('#btn-fadeOut2').click(function(){
        $('#div-fadeOutIn2').fadeOut(3000);
    });
    
    /* 淡入 - 速度參數 */
    $('#btn-fadeIn2').click(function(){
        $('#div-fadeOutIn2').fadeIn(3000);
    });
    
    /* 淡出 - 速度參數+執行函數 */
    $('#btn-fadeOut3').click(function(){
        $('#div-fadeOutIn3').fadeOut(3000, msgfadeOut3);
    });
    /* 當fadeOut(3000) 以後執行以下程序 msgfadeOut3 */
    function msgfadeOut3() {
        alert ('我被淡出了');
    }
    
    /* 淡入 - 速度參數+執行函數 */
    $('#btn-fadeIn3').click(function(){
        $('#div-fadeOutIn3').fadeIn(3000, msgfadeIn3);
    });
    /* 當fadeIn(3000) 以後執行以下程序 msgfadeIn3 */
    function msgfadeIn3() {
        alert ('我又淡入了');
    }
    
    /* 移動 - 預設值 */
    $('#btn-animateON').click(function(){
        $('#animateDiv').animate({top:"300px"}); 
    });
    $('#btn-animateOFF').click(function(){
        $('#animateDiv').animate({top:"-300px"}); 
    });
    
    /* 增加、移除 CSS */
    $("#addrecss").mouseover(function(){
        $('#addrecss').addClass('addCss1');
    });
    $("#addrecss").mouseout(function(){
        $('#addrecss').removeClass('addCss1');
    });
    
    /* 首頁連結圖片 */
    $('.tab4s-himg').addClass('tab4s-addHide');
    $('.tab4s-himg').addClass('tab4s-addCSS1');
    $('.tab4s').each(function(){
        $(this).mouseover(function(){
            $(this).find('.tab4s-tit').stop().fadeOut(1000);
            $(this).find('.tab4s-img').stop().animate({top:'-100'}, 300);
            $(this).find('.tab4s-img').addClass('tab4s-addCSS2');
            $(this).find('.tab4s-himg').removeClass('tab4s-addHide');
        });
        $(this).mouseout(function(){
            $(this).find('.tab4s-tit').stop().fadeIn(1000);
            $(this).find('.tab4s-img').stop().animate({top:'0'}, 300);
            $(this).find('.tab4s-img').removeClass('tab4s-addCSS2');
            $(this).find('.tab4s-himg').addClass('tab4s-addHide');
        });
    });
    /* 首頁連結小圖片 */
    $('.tab4s-himg').each(function(){
        $(this).mouseover(function(){
            $(this).removeClass('tab4s-addCSS1');
        });
        $(this).mouseout(function(){
            $(this).addClass('tab4s-addCSS1');
        });
    });
    
    /* 版頭按鈕列 - 固定、解除 Part2 */
    $(window).scroll(function(){
        var headH=$('.headArea').height();
        var scrollH=$(window).scrollTop();
        if (scrollH>headH) { 		
            $('.headBtnArea').addClass('headbtn-fixed');
            $('#totop').show(); 
        } else {		
            $('.headBtnArea').removeClass('headbtn-fixed');
            $('#totop').hide(); 
        }
    });
    /* 置頂按鈕點擊 */
    $('#totop').click(function(){ 
        $('html,body').animate({scrollTop: '0px'}, 800); 
    }); 
    
    /* 下拉式選單 */
    $('.headBtn li').each(function(){
        $(this).find('.btn1').addClass('headbtnTxt1');
        $(this).mouseover(function(){ 
            $(this).find('.headBtn-items').stop().slideDown(200);
            $(this).find('.btn1').addClass('headbtnBg');
            $(this).find('.btn1').addClass('headbtnTxt2');
        });
        $(this).mouseout(function(){ 
            $(this).find('.headBtn-items').stop().slideUp(200);
            $(this).find('.btn1').removeClass('headbtnBg');
            $(this).find('.btn1').removeClass('headbtnTxt2');
        });
    });
    
    //End
    });
    
    
    /* 表單點擊狀態 */
    $('.formsty').ready(function(){
    //表單載入時狀態
        $('input[type="text"], input[type="password"], input[type="file"], select, textarea').css("background-color","#F6F6F6");
    
    //游標進入欄位時狀態
        $('input[type="text"], input[type="password"], input[type="file"], select, textarea').focus(function(e) { $(this).css("background-color","#FCE6F2"); });
    
    //游標離開欄位時狀態
        $('input[type="text"], input[type="password"], input[type="file"], select, textarea').blur(function(e){ $(this).css("background-color","#F6F6F6"); });
    });
    
    
    /* 全屏背景開啟 */
    function MsgAlertOn() { 
        $('#MsgBg').fadeIn(500); //背景淡入
        $("#MsgAlert").show(500); //訊息視窗展開
    };
    
    /* 全屏背景關閉 */
    function MsgAlertOff() { 
        $('#MsgBg').fadeOut(500); //背景淡出
        $("#MsgAlert").hide(500); //訊息視窗收回
    };
    
    $(document).ready(function(){
    /* 把表單依指定欄位加入預設CSS */
        $('form input, select, textarea').each(function() {
            $(this).addClass('MsgDefBorder');
        });
    /* 當 id="SendBtn" 這個按鈕點擊之後執行 function 中的程序 */
        $('#SendBtn').click(function (){
    /* 把表單依指定欄位還原預設CSS */
        $('form input, select, textarea').each(function() {
            $(this).removeClass('MsgErrBorder');
        });
    /* 檢查每個 class="chkval" 是否有數據 */
            $('.chkval').each(function() {
    /* 取得目前游標欄位的值 */
                var cval= $(this).val(); 
    /* 如果為空白欄位，執行以下程序 */
                if (cval=='') { 
    /* 未符合檢測原則，加入紅色框色 */
                $(this).addClass('MsgErrBorder');
    /* 延遟300毫秒後，全屏背景開啟，並指定給訊息視窗文字 */
                    setTimeout(function(){
                        MsgAlertOn(); $('.MsgTxt').text('資料尚未填寫齊全...'); 
                    }, 300);
    /* 將游標停在目前欄位 */
                    $(this).focus();
    /* 將視窗緩慢移動到距離頂點150px的位置 */
                    $('html,body').animate({scrollTop:$(this).offset().top-150}, 800); 
                    err='1'; return false; } else {
    
    /****** 從以下開始為欄位數據檢測 ******/
    /* 判斷這個class是否含有isTel ==> 電話檢測 */
    if ($(this).hasClass('chktel')) {
        var isTel=/^([\+][0-9]{1,3}[ \.\-])?([\(]{1}[0-9]{2,6}[\)])?([0-9 \.\-\/]{3,20})((x|ext|extension)[ ]?[0-9]{1,4})?$/;
        var istel=$(this).val();
        if (!isTel.test(istel)) {
            MsgAlertOn(); $('.MsgTxt').text('您填寫的電話號碼格式有誤。'); 
            $('html,body').animate({scrollTop:$(this).offset().top-150}, 800);
            $(this).focus(); $(this).addClass('MsgErrBorder'); err='1'; return false; }
    }
    
    /* 判斷這個class是否含有chkmail ==> 電子郵件檢測 */
    if ($(this).hasClass('chkmail')) {
        var isMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var ismail = $(this).val();
        if (!isMail.test(ismail)) {
            MsgAlertOn(); $('.MsgTxt').text('您填寫的電子郵件格式有誤。'); 
            $('html,body').animate({scrollTop:$(this).offset().top-150}, 800);
            $(this).focus(); $(this).addClass('MsgErrBorder'); err='1'; return false; }
    }
    
    /* 判斷字串最小長度，請於表單欄位中加入 minlength="字元長度，例如：2" */
    if ($(this).attr('minlength')) {
        var minNum=$(this).attr('minlength');
        var minchr=$(this).val().length;
        if(minNum>minchr){
            var errMsg='您填寫的字元不足'+minNum+'碼。';
            MsgAlertOn(); $('.MsgTxt').text('您填寫的字元最少要有 '+minNum+' 碼。'); 
            $('html,body').animate({scrollTop:$(this).offset().top-150}, 800);
            $(this).focus(); $(this).addClass('MsgErrBorder'); err='1'; return false; }
    }
    
    /* 限數字，不包含小數點 */
    if ($(this).hasClass('chkolnynum')) {
        var isOnlynum = /^[0-9]*$/;
        var olnynum = $(this).val();
        if (!isOnlynum.test(olnynum)) {
            MsgAlertOn(); $('.MsgTxt').text('您填寫的格式有誤，只限數字 0~9。'); 
            $('html,body').animate({scrollTop:$(this).offset().top-150}, 800);
            $(this).focus(); $(this).addClass('MsgErrBorder'); err='1'; return false; }
    }
    
    /* 限數字，包含小數點 */
    if ($(this).hasClass('chknum')) {
        var isNum = /^[0-9]*[1-9][0-9]*(\.?[0-9]*)$/;
        var Num = $(this).val();
        if (!isNum.test(Num)) {
            MsgAlertOn(); $('.MsgTxt').text('您填寫的格式有誤，只限數字 0~9及小數點。'); 
            $('html,body').animate({scrollTop:$(this).offset().top-150}, 800);
            $(this).focus(); $(this).addClass('MsgErrBorder'); err='1'; return false; }
    }
    
    /* 限英文大小寫及數字 */
    if ($(this).hasClass('chkennum')) {
        var isEnnum = /^[0-9a-zA-Z]+$/;
        var Ennum = $(this).val();
        if (!isEnnum.test(Ennum)) {
            MsgAlertOn(); $('.MsgTxt').text('您填寫的格式有誤，只限英文大小寫及數字。'); 
            $('html,body').animate({scrollTop:$(this).offset().top-150}, 800);
            $(this).focus(); $(this).addClass('MsgErrBorder'); err='1'; return false; }
    }
    
    /* 限英文大小寫 */
    if ($(this).hasClass('chken')) {
        var isEn = /^[a-zA-Z\ \']+$/;
        var En = $(this).val();
        if (!isEn.test(En)) {
            MsgAlertOn(); $('.MsgTxt').text('您填寫的格式有誤，只限英文大小寫。'); 
            $('html,body').animate({scrollTop:$(this).offset().top-150}, 800);
            $(this).focus(); $(this).addClass('MsgErrBorder'); err='1'; return false; }
    }
    
    /* 限英文大寫 */
    if ($(this).hasClass('chkenb')) {
        var isEnb = /^[A-Z]+$/;
        var Enb = $(this).val();
        if (!isEnb.test(Enb)) {
            MsgAlertOn(); $('.MsgTxt').text('您填寫的格式有誤，只限英文大寫。'); 
            $('html,body').animate({scrollTop:$(this).offset().top-150}, 800);
            $(this).focus(); $(this).addClass('MsgErrBorder'); err='1'; return false; }
    }
    
    /* 限英文小寫 */
    if ($(this).hasClass('chkens')) {
        var isEns = /^[a-z]+$/;
        var Ens = $(this).val();
        if (!isEns.test(Ens)) {
            MsgAlertOn(); $('.MsgTxt').text('您填寫的格式有誤，只限英文小寫。'); 
            $('html,body').animate({scrollTop:$(this).offset().top-150}, 800);
            $(this).focus(); $(this).addClass('MsgErrBorder'); err='1'; return false; }
    }
                    err='0'; }
            });
    /* 如果發現有指定欄位未填寫，則停止程式執行 ：「^[A-Z]+$」 */
            if (err==1) { return false; } return true;
        });
    });
    
    
    
    