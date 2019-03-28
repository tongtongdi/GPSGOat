<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/js/common.js"></script>
    <title>登录页面</title>
</head>
<body>
<?php
   $name="";
?>
<div id="main">
    <div id="login">
        <label class="log">GPS定位系统</label>
        <form class="form" method="post">
        <input class="input" type="text" name="name" id="name" placeholder="请输入用户名"><br>
        <input class="input" type="password" name="password" id="password" placeholder="密码"><br>
            <input id="submit" class="button" type="button" onclick="submitLogin();" value="登录" ><br>
            <input id="zhuce" class="button" type="button" value="注册" ><a class="a" href="login.php" name="findPassword">找回密码</a>
        </form>
    </div>
    <div id="signIn">
        <label class="log">用户注册</label>
        <form class="form" action="" method="post">
            <input class="input" type="text" name="submitName" id="submitName" placeholder="请输入用户名"><br>
            <input class="input" type="password" name="password1" id="newPassword" placeholder="用户密码"><br>
            <input class="input" type="password" name="password2" id="password2" placeholder="确认密码"><br>
            <input id="submit1" class="button" type="button" onclick="registIn();" value="确认注册" ><br>
            <button id="zhuce1" class="button" >去登录</button>
    </div>
</div>
</body>
<script>
    $("#signIn").hide();
    $(document).ready(function () {
        //跳转到注册
        $("#zhuce").click(function () {
            $("#login").hide();
            $("#signIn").show();
        });
        //跳转到登录
        $("#zhuce1").click(function () {
            $("#login").show();
            $("#signIn").hide();
        });
    });

    function submitLogin() {
        var name = $("#name").val();
        var password = $("#password").val();
        if(common.isEmpty(name)){
            alert("请输入用户名！");
            return false;
        }
        if(common.isEmpty(password)){
            alert("请输入密码！");
            return false;
        }
        var param = {
            username:name,
            password:password
        }
        common.jsonAjax("/php/login_check.php",param,function (data) {
            if(data==1){
                window.location = "../../../index.php";
            }else if(data==2){
                alert("用户名或密码错误！");
            }else{
                alert("登录失败！");
            }
        })
    };
    function registIn() {
        var name = $("#submitName").val();
        var password = $("#newPassword").val();
        var password2 = $("#password2").val();
        if(password!=password2){
            alert("两次密码不一致！");
            return false;
        };
        var param = {
            name:name,
            password:password
        };
    }

</script>
</html>