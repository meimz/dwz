<?php
/**
 * Created by PhpStorm.
 * User: mrcong
 * Date: 2019-10-24
 * Time: 14:08
 */

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="wap-font-scale" content="no">
    <meta name="full-screen" content="yes">
    <meta name="x5-fullscreen" content="true">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="csrf-token" content="" />
    <title> 小葱短网址</title>
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>
    <script type="text/javascript" src="/common.js"></script>
    <script type="text/javascript" src="https://unpkg.com/vue"></script>
</head>
<body>
<style>
    @media all{
        button,input{color:inherit;font:inherit;margin:0;}
        button{overflow:visible;}
        button{text-transform:none;}
        button{-webkit-appearance:button;cursor:pointer;}
        button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0;}
        input{line-height:normal;}
        @media print{
            *,*:before,*:after{background:transparent!important;color:#000!important;box-shadow:none!important;text-shadow:none!important;}
            p{orphans:3;widows:3;}
        }
        *{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
        *:before,*:after{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
        input,button{font-family:inherit;font-size:inherit;line-height:inherit;}
        p{margin:0 0 10px;}
        .text-left{text-align:left;}
        .col-sm-3,.col-sm-9{position:relative;min-height:1px;padding-left:15px;padding-right:15px;}
        @media (min-width: 768px){
            .col-sm-3,.col-sm-9{float:left;}
            .col-sm-9{width:75%;}
            .col-sm-3{width:25%;}
        }
        .btn{display:inline-block;margin-bottom:0;font-weight:normal;text-align:center;vertical-align:middle;touch-action:manipulation;cursor:pointer;background-image:none;border:1px solid transparent;white-space:nowrap;padding:6px 12px;font-size:14px;line-height:1.42857143;border-radius:4px;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;}
        .btn:focus,.btn:active:focus{outline:thin dotted;outline:5px auto -webkit-focus-ring-color;outline-offset:-2px;}
        .btn:hover,.btn:focus{color:#333333;text-decoration:none;}
        .btn:active{outline:0;background-image:none;-webkit-box-shadow:inset 0 3px 5px rgba(0, 0, 0, 0.125);box-shadow:inset 0 3px 5px rgba(0, 0, 0, 0.125);}
    }
    @media all{
        *,p{margin:0;padding:0;}
        p{margin-bottom:1.85714286em;}
        .type--uppercase{text-transform:uppercase;}
        [data-overlay] *:not(.container):not(.background-image-holder){z-index:2;}
        .imagebg:not(.image--light) p{color:#fff;}
        .imagebg:not(.image--light) .bg--white p{color:#666666;}
        .btn{font-family:'Open Sans','Helvetica Neue',Helvetica,Arial,Arial,STHeiti,'Hiragino Sans GB','Microsoft Yahei','\5FAE\8F6F\96C5\9ED1',SimHei,sans-serif;transition:0.1s linear;-webkit-transition:0.1s linear;-moz-transition:0.1s linear;border-radius:6px;padding-top:0.46428571em;padding-bottom:0.46428571em;padding-right:2.78571429em;padding-left:2.78571429em;border:1px solid #252525;border-width:1px;font-size:inherit;line-height:1.85714286em;}
        .btn:active{box-shadow:none;-webkit-box-shadow:none;}
        .btn:first-child{margin-left:0;}
        .btn:last-child{margin-right:0;}
        .btn--primary,.btn--primary:visited{background:#4a90e2;border-color:#4a90e2;}
        .btn--primary:hover{background:#609de6;}
        .btn--primary:active{background:#3483de;}
        form{max-width:100%;}
        form:before,form:after{content:".";display:block;height:0;overflow:hidden;}
        form:after{clear:both;}
        input[type]{-webkit-appearance:none;background:#fcfcfc;padding:0.46428571em;border-radius:6px;border:1px solid #ececec;}
        input[type]:focus{outline:none;}
        input[type]:active{outline:none;}
        input[type]::-webkit-input-placeholder{color:#b3b3b3;font-size:1.14285714em;}
        input[type]:-moz-placeholder{color:#b3b3b3;font-size:1.14285714em;}
        input[type]::-moz-placeholder{color:#b3b3b3;font-size:1.14285714em;}
        input[type]:-ms-input-placeholder{color:#b3b3b3;font-size:1.14285714em;}
        button{background:none;}
        button:focus{outline:none!important;}
        .boxed{position:relative;overflow:hidden;padding:1.85714286em;margin-bottom:30px;}
        .boxed.boxed--lg{padding:2.78571429em;}
        @media all and (max-width: 767px){
            .boxed{padding:1.23809524em;margin-bottom:15px;}
            .boxed.boxed--lg{padding:1.23809524em;}
            .boxed div[class*='col-']:not(.boxed){padding:0;}
            .boxed:last-child{margin-bottom:15px;}
        }
        .bg--white{background:#fff;}
        .bg--white p{color:#666666;}
        .imagebg:not(.image--light) .bg--white p{color:#666666;}
        [class*='imagebg']:not(.image--light) p{opacity:.9;}
        p:last-child{margin-bottom:0;}
        .btn{position:relative;}
        .btn.type--uppercase{letter-spacing:.5px;}
        .btn:hover{transform:translate3d(0, -2px, 0);-webkit-transform:translate3d(0, -2px, 0);}
        .boxed{border-radius:6px;}
        .boxed:before{border-radius:6px;}
        .cover .lead + .boxed{margin-top:3.71428571em;}
        .imagebg:not(.image--light) input{color:#666666;}
        form{position:relative;}
        form > div[class*='col-']:not(:last-child){margin-bottom:0.92857143em;}
        @media all and (min-width: 768px){
            form.form--horizontal > div[class*='col-']{margin:0;}
        }
        button{height:3.25000000000001em;}
        button.btn{font-size:0.85714286em;font-weight:700;padding-left:0;padding-right:0;}
        button.btn.btn--primary{color:#fff;}
        button.btn.type--uppercase{letter-spacing:.5px;margin-right:-0.5px;}
        input{height:2.78571429em;}
        input{transition:0.3s ease;-webkit-transition:0.3s ease;-moz-transition:0.3s ease;}
        input:not([class*='col-']),button[type="submit"]:not([class*='col-']){width:100%;}
        input[type]{padding-left:0.92857143em;}
        input[type]:focus{border-color:#76abe9;}
    }
    .res {
        text-align: center;
        padding: 20px;
        color: #F00;
    }

</style>
<div class="res">

</div>
<div class="boxed boxed--lg bg--white text-left">
    <form class="form--horizontal" method="post" action="" id="index-form">
        <input type="hidden" name="__HASH__" value="">
        <div class="col-sm-9"> <input type="text" name="url" id="url" placeholder="粘贴需要缩短的网址" autocomplete="off"> </div>
        <div class="col-sm-3 js-add-to" > <button type="submit" id="shorten" class="btn type--uppercase btn--primary">缩短</button> </div>
    </form>
    <p style="font-size: 12px;color: #9c9797;padding: 5px 0 0 15px;">
        提示：发布的链接仅供短时间测试使用，如需稳定服务，请联系站长。本站支持 http 以及 https<br/> prowerBy <a href="https://m2a.co">m2a.co</a></p>
</div>
<div>

</div>
<script>
    $(document).ready(function(){
        $('.js-add-to').click(function () {
            $('.res').empty();
            T.post('add.php',{'url':$('#url').val()},function (res) {
                if(res.err==1){
                    alert(res.msg);
                }else{
                    $('.res').append('您的短网址为 https://m2a.co/'+res.data.code)
                }
            });
            return false;
        });

    });


</script>
</body>

</html>