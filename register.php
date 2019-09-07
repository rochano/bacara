<?php 
	session_start();

    if(isset($_SESSION['bacara_logined_user'])) { 
    	$_SESSION['bacara_register'] = $_SESSION['bacara_logined_user'];

    	$_SESSION['bacara_logined_user'] = null;
    	unset($_SESSION['bacara_logined_user']);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>สูตรเฮียบอล</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style_main.css">
</head>
<body>
    <div class="container">
        <div class="wrapper">
        	<div id="panel_register">
        		<form name="form1" id="form1" method="post" action="" onsubmit="return onSubmit()">
                    <div class="input">
                        <input name="username" id="username" type="text" placeholder="Username" required/>
                    </div>
                    <div class="input">
                        <input name="password" id="password" type="password" placeholder="Password" required/>
                    </div>
                    <div class="input">
                        <input name="fullname" id="fullname" type="text" placeholder="ชื่อ - นามสกุล" required/>
                    </div>
	        		<div class="input">
	        			<input name="mobilePhone" id="mobilePhone" type="tel" placeholder="เบอร์โทร" required/>
	        		</div>
	        		<div class="input">
	        			<input name="email" id="email" type="email" placeholder="Email" required/>
	        		</div>
                    <div class="input">
                        <input name="lineId" id="lineId" type="text" placeholder="ID Line" required/>
                    </div>
	        		<div class="button">
	        			<input name="submit" id="submit" type="submit" value="" />
	        		</div>
        		</form>
        	</div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function onSubmit() {
        	var mobilePhone = document.getElementById('mobilePhone');
        	var email = document.getElementById('email');
        	if (mobilePhone.value == "") {
        		alert("กรุณากรอก เบอร์โทร");
        		return false;
        	}
        	if (email.value == "") {
        		alert("กรุณากรอก Email");
        		return false;
        	}

			$.post("./portal.php?register",
            $("#form1").serialize(),
            function(data){
                console.log(data);
                if(data==1){
                    window.location = "/";
                }
            });

        	return false;
        }
    </script>
</body>

</html>