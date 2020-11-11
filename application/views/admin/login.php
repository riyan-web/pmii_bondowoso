<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/backend/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/backend/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/backend/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/backend/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/backend/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-primary">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form role="form" method="POST" action="<?= base_url('login'); ?>">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                            <?= form_error('username', ' <small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder=" Masukkan Password">
                            <?= form_error('password', ' <small class="text-danger pl-2">', '</small>'); ?>
                        </div>
                        <div class="checkbox">

                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/backend/vendors/jquery/dist/jquery.min.js"></script>
    <script src="assets/backend/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/backend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>