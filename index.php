<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>สูตรเฮียบอล</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style_main.css">
</head>
<body>
    <div class="container">
        <div class="wrapper" style="height: 500px">
            <div class="youtube_index">
                <!-- <iframe width="340" height="200" src="https://www.youtube.com/embed/RSjdWR3ifIQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
            </div>

            <?php
            if(isset($_SESSION['bacara_logined_user'])) { 
                $loginedUser = $_SESSION['bacara_logined_user'];
                $fullName = $loginedUser['full_name'];
            ?>
                <div id="facebook_logined">
                    <div class="facebook_display">
                        <?=$fullName?>
                    </div>
                    <div class="facebook_name">
                        #111111111
                    </div>
                    <div class="facebook_logined_credit">
                        ยอดคงเหลือ : 
                        <span class="credit_num">
                            <?php if(isset($_SESSION['bacara_user_credit'])) { 
                                $userCredit = $_SESSION['bacara_user_credit']; ?>
                                <?=$userCredit['credit']?>
                            <?php } ?>
                        </span>
                        /
                        <a class="facebook_logout" onclick="location.href='logout.php'">ออกจากระบบ</a>
                    </div>
                </div>
            <?php } else { ?>
                <div id="panel_login">
                    <form name="form1" id="form1" method="post" action="" onsubmit="return onSubmit()">
                        <div class="input">
                            <input name="username" id="username" type="text" placeholder="Username" required/>
                        </div>
                        <div class="input">
                            <input name="password" id="password" type="password" placeholder="Password" required/>
                        </div>
                        <div class="buttons">
                            <div class="button register">
                                <input name="register" id="register" type="button" onclick="window.location='register.php'" />
                            </div>
                            <div class="button login">
                                <input name="login" id="login" type="submit" value="" />
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>

            <div id="panel_line">
                <div class="btn_line" alt="สมัครใช้งาน ติดต่อไลน์ไอดี @HEARHEAR" onclick="window.open('https://line.me/R/ti/p/%40hearhear')"></div>
            </div>

            <?php if(isset($_SESSION['bacara_logined_user'])) { ?>
                <div class="resultChipPanel">
                    <div id="main_body_col1_player"></div>
                    <div id="main_body_col1_tie"></div>
                    <div id="main_body_col1_banker"></div>
                    <div id="result_player"></div>
                    <div id="result_banker"></div>
                </div>

                <div id="panel_table">
                    <div class="btn_clear" onclick="location.reload();"></div>
                    <div class="panel_table_in">
                        <table cellspacing="0" border="0" cellpadding="0">
                            <tbody>
                            <?php 
                                for($row=0;$row<10;$row++) { ?>
                                    <tr>
                                    <?php for($col=0;$col<16;$col++) { ?>
                                        <td id="<?=$row+1?>-<?=$col+1?>"></td>
                                    <?php } ?>
                                    </tr>
                                <?php }
                            ?>
                        </tbody></table>
                    </div>

                    <div class="panel_control">
                        <div class="btn_player" id="clkPlayer"></div>
                        <div class="btn_tie" id="clkTie"></div>
                        <div class="btn_banker" id="clkBanker"></div>
                    </div>
                </div>
            <?php }  ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/assets/js/facebook.js"></script>
    <script defer src="/assets/js/ui_script.js"></script>
    <script defer src="/assets/js/control.js"></script>
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function onSubmit() {
            var username = document.getElementById('username');
            var password = document.getElementById('password');
            if (username.value == "") {
                alert("กรุณากรอก Username");
                return false;
            }
            if (password.value == "") {
                alert("กรุณากรอก Password");
                return false;
            }

            $.post("./portal.php?login",
            $("#form1").serialize(),
            function(data){
                console.log(data);
                if(data==1){
                    window.location = "/";
                } else {
                    alert("Username หรือ Password ไม่ถูกต้อง");
                    username.value = "";
                    password.value = "";
                    username.focus();
                }
            });

            return false;
        }
    </script>
</body>

</html>