<script src="public/js/scroll/jquery.mCustomScrollbar.js"></script>
<link href="public/js/scroll/jquery.mCustomScrollbar.css" rel="stylesheet">
<style>
    body {
        background-image: url(public/images/back.jpg);
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    #main {
        width: 100%;
        /*background: rgba(0, 0, 0, 0.5);*/
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: yekan;
    }

    @media only screen and (max-width: 1470px) {

    }

    @media only screen and (min-width: 1470px) {

    }


    .main_tag .top {
        width: 100%;
        height: 85px;
        position: relative;
        border-bottom: 1px solid #5f5f5f;
    }

    .main_tag .top > div {
        width: 94%;
        height: 76px;
        position: absolute;
        color: #ea0a0abf;
    }

    .main_tag .top > div p {
        text-align: center;
        line-height: 0;
        font-size: 27pt;
    }

    .main_pad {
        padding: 5px;
        background: #5f5f5f;
        width: 80%;
        margin: 0 auto;
        box-shadow: 0 0 5px 6px #898787;
        border-radius: 7px;
    }

    .main_tag {
        width: 98.5%;
        height: 700px;
        background: #e0e0e0;
        margin: 0 auto;
        overflow: hidden;
        overflow-y: auto;
        padding-right: 19px;
    }

    .main_tag .bottom {
        width: 100%;
    }

    .main_tag .bottom .row {
        width: 98%;
        height: 50px;
        border-radius: 1rem;
        margin-top: 15px;
        background: #c5c5c5;
        border-bottom: 1px solid #ccc;
    }

    .main_tag .bottom .row .left {
        width: 5%;
        height: 100%;
        float: left;
    }

    .main_tag .bottom .row .left > div {
        width: 24px;
        height: 24px;
        margin: 7px auto;
        cursor: pointer;
    }

    .main_tag .bottom .row .left .show {
        background: url(public/images/Show.png) no-repeat;
        margin-top: 12px;
    }

    .main_tag .bottom .row .right {
        float: right;
        width: 90%;
        height: 100%;
    }

    .main_tag .bottom .row .right > div {
        width: 43%;
        padding: 10px;
        height: 30%;
        float: right;
    }

    .alertShow {
        display: none;
        position: absolute;
        z-index: 10;
        left: 0;
        right: 0;
        bottom: 0;
        margin: 0 auto;
        animation: animatebottom 0.4s;
        width: 320px;
    }

    @keyframes animatebottom {
        from {
            bottom: -300px;
            opacity: 0
        }
        to {
            bottom: 0;
            opacity: 1
        }
    }

    .close {

        position: relative;
        top: 0;
        right: -11px;
        float: right;
        font-size: 21px;
        font-weight: 700;
        line-height: 1;
        color: #000;
        text-shadow: 0 1px 0 #fff;
        filter: alpha(opacity=20);
        opacity: .2;
    }

    .close:hover {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        filter: alpha(opacity=50);
        opacity: .5;
    }

    .alert-info {
        color: #31708f;
        background-color: #d9edf7;
        border-color: #bce8f1;
    }

    .alert {
        position: relative;
        padding: 0.75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
        box-shadow: 1px 1px 8px;
    }

    .main_tag .bottom .row .right .title {
        width: 15%;
    }

    .main_tag .bottom .row .right .status {
        width: 15%;
    }

    .main_tag .bottom .row .right .point {
        width: 15%;
    }
    .edit_set,.ques_set,.afzodan_set{
        z-index: 1000;
    }


</style>
<?php
$user = $data['user'];
?>
<div id="main">

    <div class="main_pad">
        <div class="alertShow"></div>
        <div class="main_tag">

            <div class="top">
                <div>
                    <p>
                        بازی های اخیر
                    </p>
                </div>
            </div>

            <div class="bottom">
                <?php
                $baziha = $data['user'];
                print_r($baziha);
                foreach ($baziha as $row){
                ?>

                    <div data-id="" class="row">

                        <div class="right">
                            <div class="title">موضوع:<?= $row['category'] ?></div>
                            <div class="point">
                                امتیاز:<?php
                                if ($row['end_status']==0){
                                    echo 10;
                                }else if ($row['end_status']==1){
                                    echo 5;
                                }else if ($row['end_status']==2){
                                    echo 0;
                                }
                                ?>
                            </div>
                            <div class="status">وضعیت:<?php
                                if ($row['end_status']==0){
                                    echo 'بردید';
                                }else if ($row['end_status']==1){
                                    echo 'باختید';
                                }else if ($row['end_status']==2){
                                    echo 'مساوی شدید';
                                }
                                ?></div>
                            <div class="text">نام حریف:<?= $row['harif'] ?> </div>
                        </div>
                        <div class="left">
                                <div onclick="doShow(this)" data-show="" class="show"></div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>

</div>

<script>

    function doShow(ta) {
        var attr = $(ta).attr('data-show');
        var url = 'question/show/' + attr;
        var data = {};
        $.post(url, data, function (msg) {
            if (msg['status'] == 1) {
                $('.ques_set .text').html(msg['text']);
                $('.ques_set .answers').html('');
                $('.ques_set').css('display', 'block');

                $.each(msg['answer'], function (index, value) {
                    var check = value['status'];
                    var ok = '';
                    if (check == 'g_true') {
                        ok = 'dorost';
                    }
                    var id = value['id'];
                    var title = value['title'];
                    var tag = '<div class="ans ' + ok + '"><p>' + title + '</p></div>';
                    $('.ques_set .answers').append(tag);
                });
            }
        }, 'json');
    }

    function delAsk() {
        $('.asker').html('');
        $('.asker').css('display', 'none');
    }

    function delQues(id) {
        var url = 'question/delQues/' + id;
        var data = {};
        $.post(url, data, function (msg) {
            var tag = $('.row');
            $.each(tag, function (index, value) {
                var attr = $(value).attr('data-id');
                if (id == attr) {
                    $(value).remove();
                }
            });
            var taiid = msg['taiid'];
            var rad = msg['rad'];
            var entezar = msg['entezar'];
            var tedad = msg['tedad'];

            var tag2 = '<div class="sabt_shode">ثبت شده:' + taiid + '</div><div class="entezar">در انتظار:' + entezar + '</div><div class="rad_shode">رد شده:' + rad + '</div><div class="all">همه سوالات:' + tedad + '</div><div onclick="afzodan()" class="afzodan">افزودن سوال</div>';
            $('.top').html(tag2);
        }, 'json');
        var tag = '<div class="alert alert-info alert-dismissible"><a class="close" onclick="delAlert(this)">&times;</a>سوال مورد نظر پاک شد.</div>';
        $('.alertShow').html(tag);
        $('.alertShow').css('display', 'block');
        $('.alertShow').css('width', '140px');
    }

    function getQues() {
        var url = 'question/getQues/';
        var data = {};
        $.post(url, data, function (msg) {
            var soal = msg['soal'];
            var taiid = msg['taiid'];
            var rad = msg['rad'];
            var entezar = msg['entezar'];
            var tedad = msg['tedad'];
            var stat = soal['status'];
            $('.main_tag .bottom').html('');
            $.each(soal, function (index, value) {
                var ok = '';
                var stat = '';
                var status = value['status'];
                if (status == 0) {
                    ok = 'در انتظار';
                    stat = '<div onclick="doEdit(this)" data-edit="' + value['id'] + '" class="edit"></div>';
                } else if (status == 1) {
                    ok = 'تایید شده';
                    stat = '<div data-show="' + value['id'] + '" class="show"></div>';
                } else if (status == 2) {
                    ok = 'رد شده';
                    stat = '<div onclick="doEdit(this)" data-edit="' + value['id'] + '" class="edit"></div>';
                }
                var tag = '<div data-id="' + value['id'] + '" class="row"><div class="right"><div class="title">موضوع:' + value['game'] + '</div><div class="point">امتیاز:' + value['coin'] + '</div><div class="status">وضعیت:' + ok + '</div><div class="tedad_pasokh_dorost">تعداد کسانی که به این سوال پاسخ دادهاند:' + value['num'] + '</div><div class="text">متن سوال:     ' + value['text'] + '</div></div><div class="left"><div onclick="doDelete(this)" data-clicker="' + value['id'] + '" class="delete"></div>' + stat + '</div></div>';
                $('.main_tag .bottom').append(tag);
            });
            var tag2 = '<div class="sabt_shode">ثبت شده:' + taiid + '</div><div class="entezar">در انتظار:' + entezar + '</div><div class="rad_shode">رد شده:' + rad + '</div><div class="all">همه سوالات:' + tedad + '</div><div  onclick="afzodan()" class="afzodan">افزودن سوال</div>';
            $('.top').html(tag2);
        }, 'json');
    }

    function delAlert(tag) {
        $(tag).parent('.alert-dismissible').remove();
        $('.alertShow').css('display', 'none');
    }

    function afzodan() {
        $('.afzodan_set').css('display', 'block');
    }

    function closeTag() {
        $('.edit_set').css('display', 'none');
        $('.ques_set').css('display', 'none');
        $('.afzodan_set').css('display', 'none');
    }

    function doDorost(tag) {
        $('.edited').removeClass('dorost');
        $('.afz').removeClass('dorost');
        $(tag).addClass('dorost');
    }

    function doEdit(ta) {
        var attr = $(ta).attr('data-edit');
        var url = 'question/edit/' + attr;
        var data = {};
        $.post(url, data, function (msg) {
            if (msg['status'] == 1) {

            } else {
                $('.edit_set .text').val(msg['text']);
                $('.edit_set .answers').html('');
                $('.edit_set').css('display', 'block');
                $('.edit_set').attr('data-id', msg['id']);

                $.each(msg['answer'], function (index, value) {
                    var check = value['status'];
                    var ok = '';
                    if (check == 'g_true') {
                        ok = 'dorost';
                    }
                    var id = value['id'];
                    var title = value['title'];
                    var tag = '<div data-ans="' + value['id'] + '" onclick="doDorost(this)" class="ans edited ' + ok + '"><input data-ans="' + value['id'] + '" value="' + title + '"></div>';
                    $('.edit_set .answers').append(tag);
                });
            }
        }, 'json');
    }

    function sabt_afz() {
        var dorost = $('.afzodan_set .afz.dorost').attr('data-ans');
        var title = $('.afzodan_set .text').val();
        var ans = $('.afzodan_set .afz input');
        var cat = $('.cat').find(":selected").val();
        var arr = [];
        var ok=0;
        $.each(ans, function (index, value) {
            var val = $(value).val();
            if (val.length==0){
                ok=1;
            }
            arr.push(val);
        });

        if ($('.afzodan_set .afz').hasClass('dorost')) {
            if (title.length==0){
                var tag = '<div class="alert alert-info alert-dismissible"><a class="close" onclick="delAlert(this)">&times;</a>لطفا صورت سوال را بنویسید.</div>';
                $('.alertShow').html(tag);
                $('.alertShow').css('display', 'block');
                $('.alertShow').css('width', '320px');
            }else {
                if (cat=='set'){
                    var tag = '<div class="alert alert-info alert-dismissible"><a class="close" onclick="delAlert(this)">&times;</a>لطفا موضوع مورد نظر خود را انتخاب کنید.</div>';
                    $('.alertShow').html(tag);
                    $('.alertShow').css('display', 'block');
                    $('.alertShow').css('width', '320px');
                }else {
                    if (ok==0){
                        var url = 'question/afzodan/' + title + '/' + dorost + '/' + arr + '/' + cat;
                        var data = {};
                        $.post(url, data, function (msg) {
                            var tag = '<div class="alert alert-info alert-dismissible"><a class="close" onclick="delAlert(this)">&times;</a>سوال با موفقیت ثبت شد!منتظر بمانید تا سوال شما تایید شود.</div>';
                            $('.alertShow').html(tag);
                            $('.alertShow').css('display', 'block');
                            $('.alertShow').css('width', '320px');
                            $('.afzodan_set').css('display', 'none');
                            $('.afzodan_set .bottom .ques input').val('');
                            var ok= $('.afzodan_set .bottom .answers .ans input');
                            $('.ans.afz.dorost').removeClass('dorost');
                            $.each(ok, function (index, value) {
                                $(value).val('');
                            });
                            $('.cat option[value="set"]').attr('selected', 'selected');
                            getQues();
                        }, 'json');
                    }else {
                        var tag = '<div class="alert alert-info alert-dismissible"><a class="close" onclick="delAlert(this)">&times;</a>لطفا تمام گزینه ها را پر کنید.</div>';
                        $('.alertShow').html(tag);
                        $('.alertShow').css('display', 'block');
                        $('.alertShow').css('width', '320px');
                    }
                }
            }
        } else {
            var tag = '<div class="alert alert-info alert-dismissible"><a class="close" onclick="delAlert(this)">&times;</a>گزینه درست مورد نظر خود را وارد کنید.</div>';
            $('.alertShow').html(tag);
            $('.alertShow').css('display', 'block');
            $('.alertShow').css('width', '320px');
        }

    }

    function sabt_edit() {
        var title = $('.edit_set .text').val();
        var ans = $('.edit_set .edited input');
        var dorost = $('.edit_set .edited.dorost').attr('data-ans');
        var id = $('.edit_set').attr('data-id');
        var arr = [];

        var ok=0;
        $.each(ans, function (index, value) {
            var val = $(value).val();
            if (val.length==0){
                ok=1;
            }
            arr.push(val);
        });

        if ($('.edit_set .edited').hasClass('dorost')) {
            if (title.length==0){
                var tag = '<div class="alert alert-info alert-dismissible"><a class="close" onclick="delAlert(this)">&times;</a>لطفا صورت سوال را بنویسید.</div>';
                $('.alertShow').html(tag);
                $('.alertShow').css('display', 'block');
                $('.alertShow').css('width', '320px');
            }else {
                if (ok==0){
                    var url = 'question/editQues/' + title + '/' + dorost + '/' + arr + '/' + id;
                    var data = {};
                    $.post(url, data, function (msg) {
                        var tag = '<div class="alert alert-info alert-dismissible"><a class="close" onclick="delAlert(this)">&times;</a>تغییرات با موفقیت ثبت شد.</div>';
                        $('.alertShow').html(tag);
                        $('.alertShow').css('display', 'block');
                        $('.alertShow').css('width', '320px');
                        $('.edit_set').css('display', 'none');
                    }, 'json');
                }else {
                    var tag = '<div class="alert alert-info alert-dismissible"><a class="close" onclick="delAlert(this)">&times;</a>لطفا تمام گزینه ها را پر کنید.</div>';
                    $('.alertShow').html(tag);
                    $('.alertShow').css('display', 'block');
                    $('.alertShow').css('width', '320px');
                }

            }
        } else {
            var tag = '<div class="alert alert-info alert-dismissible"><a class="close" onclick="delAlert(this)">&times;</a>گزینه درست مورد نظر خود را وارد کنید.</div>';
            $('.alertShow').html(tag);
            $('.alertShow').css('display', 'block');
            $('.alertShow').css('width', '320px');
        }

    }

    $(".main_tag").mCustomScrollbar({
        setWidth: false,
        setHeight: false,
        setTop: 0,
        setLeft: 0,
        axis: "y",
        scrollbarPosition: "inside",
        scrollInertia: 950,
        autoDraggerLength: true,
        autoHideScrollbar: false,
        autoExpandScrollbar: false,
        alwaysShowScrollbar: 0,
        snapAmount: null,
        snapOffset: 0,
        mouseWheel: {
            enable: true,
            scrollAmount: "auto",
            axis: "y",
            preventDefault: false,
            deltaFactor: "auto",
            normalizeDelta: false,
            invert: false,
            disableOver: ["select", "option", "keygen", "datalist", "textarea"]
        },
        scrollButtons: {
            enable: true,
            scrollType: "stepless",
            scrollAmount: "auto"
        },
        keyboard: {
            enable: true,
            scrollType: "stepless",
            scrollAmount: "auto"
        },
        contentTouchScroll: 25,
        advanced: {
            autoExpandHorizontalScroll: false,
            autoScrollOnFocus: "input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",
            updateOnContentResize: true,
            updateOnImageLoad: true,
            updateOnSelectorChange: false,
            releaseDraggableSelectors: false
        },
        theme: "dark",

        callbacks: {
            onInit: false,
            onScrollStart: false,
            onScroll: false,
            onTotalScroll: false,
            onTotalScrollBack: false,
            whileScrolling: false,
            onTotalScrollOffset: 0,
            onTotalScrollBackOffset: 0,
            alwaysTriggerOffsets: true,
            onOverflowY: false,
            onOverflowX: false,
            onOverflowYNone: false,
            onOverflowXNone: false
        },
        live: false,
        liveSelector: null

    });
</script>