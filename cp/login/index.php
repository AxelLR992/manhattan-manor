<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/signin.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="../js/html5shiv.min.js"></script>
      <script src="../js/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">

    function verify(form) {


        for (var intCtr = 0; intCtr <= (form.elements.length - 2) ; ++intCtr) {
            var temp = form.elements[intCtr];
            if ((temp.type == "text" && temp.value == "") || (temp.type == "password" && temp.value == "")) {
                alert("Please enter all required information !");
                temp.focus();
                return false;
            }
        }

        return true;
    }

</script>
    <link rel="icon" type="image/png" href="http://www.planetm.us/favicon.png" />
</head>
<body>
   <div class="container" style="text-align: center;">

      <form class="form-signin" action="../login/process.php" method="post" onsubmit="return verify(this);" >
          <img src="../img/logo_admin.png" style="margin-bottom: 10px"/><br />
        <label for="input_user" class="sr-only">User</label>
        <input type="text" id="input_user" name="input_user" class="form-control" placeholder="User name">
        <label for="input_password" class="sr-only">Password</label>
        <input type="password" id="input_password" name="input_password" class="form-control" placeholder="Password">
        <!--<div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>-->
        <button class="btn btn-lg btn-danger btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
