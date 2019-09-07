<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Back Office!</title>

    <!-- Bootstrap -->
    <link href="/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="form1" action="" method="post" onsubmit="return false;" data-parsley-validate>
              <h1>Login Form</h1>
              <div>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="required" />
              </div>
              <div>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="required" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
              </div>

              <div class="clearfix"></div>
            </form>
          </section>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="/admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Parsley -->
    <script src="/admin/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/admin/build/js/main.js"></script>

    <script type="text/javascript">
      function submit() {
        $.post("/admin/portal.php?loginAdmin",
        $("#form1").serialize(),
        function(data){
            if(data==1){
                window.location = "/admin/tables_users.php";
            } else {
              alert("Username หรือ Password ไม่ถูกต้อง");
              var username = document.getElementById('username');
              var password = document.getElementById('password');
              username.value = "";
              password.value = "";
              username.focus();
            }
        });
      }
    </script>
  </body>
</html>
