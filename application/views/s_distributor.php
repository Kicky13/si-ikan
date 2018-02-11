<!DOCTYPE html>
<html lang="en-us">

<!-- Mirrored from www.thusbox.com/adminhero/table-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Apr 2017 16:23:32 GMT -->
<head>
    <!-- Web config-->

    <!-- TABLE OF CONTENTS.
    Use search to find needed section.
    ===================================================================
    | 01. #CSS               | All CSS links and file paths           |
    | 02. #FAVICONS          | Favicon icon, app icons                |
    | 03. #BODY              | Body tag                               |
    | 04. #SIDEMENU          | Dashboard panel & left navigation      |
    | 05. #MAIN              | Dashboard right wrapper                |
    | 06. #VIEW              | Dashboard right wrapper inner wrapper  |
    | 07. #TOP               | Top header navigation                  |
    | 08. #TOP NAV           | Top header right navigation            |
    | 09. #RIGHT BLOCK       | Right slide panel                      |
    | 10. #PAGE HEADER       | Page top                               |
    | 11. #TABLE             | Bootstrap tables                       |
    | 12. #PLUGINS           | All scripts and plugins                |
    |                        |                                        |
    |                        |                                        |
    ===================================================================

    -->


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Supplier</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <!-- lib-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="<?php echo base_url().'assets/'; ?>stylesheets/sweetalert.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">
    <!--
    link(rel='stylesheet' href='assets/stylesheets/ionicons.css')
    link(rel='stylesheet' href='assets/stylesheets/font-awesome.css')
    link(rel='stylesheet' href='assets/stylesheets/weather-icons.min.css')
    link(rel='stylesheet' href='assets/stylesheets/animate.css')
    link(rel='stylesheet' href='assets/stylesheets/glyphicon.css')

    -->

    <!--
    plugin
    link(rel='stylesheet' href='assets/stylesheets/plugin/bootstrap-table.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/nifty-modal.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/jquery.bootstrap-touchspin.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/select2.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/multi-select.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/ladda.min.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/daterangepicker.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/jquery.timepicker.css')
    link(rel="stylesheet" href="assets/stylesheets/plugin/jqvmap.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-submenu.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/code.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/jquery.dataTables.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/dataTables.bootstrap.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/jquery.gridster.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/summernote.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-markdown.min.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-select.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/asColorPicker.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-datepicker.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/jquery-labelauty.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/owl.carousel.min.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/owl.theme.default.min.css")

    -->

    <!-- Theme-->
    <!-- Concat all lib & plugins css-->
    <link id="mainstyle" rel="stylesheet" href="<?php echo base_url().'assets/'; ?>stylesheets/theme-libs-plugins.css">
    <link id="mainstyle" rel="stylesheet" href="<?php echo base_url().'assets/'; ?>stylesheets/skin.css">

    <!-- Demo only-->
    <link id="mainstyle" rel="stylesheet" href="<?php echo base_url().'assets/'; ?>stylesheets/demo.css">

    <!-- This page only-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]>
    <script src="<?php echo base_url().'assets/'; ?>scripts/lib/html5shiv.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>scripts/lib/respond.js"></script><![endif]-->
    <script src="<?php echo base_url().'assets/'; ?>scripts/lib/modernizr-custom.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>scripts/lib/respond.js"></script>
    <!-- Possible Classes
    ** Gradient style:
    * orchid
    * cadetblue
    * joomla
    * influenza
    * moss
    * mirage
    * stellar
    * servquick

    ** Flat style:
    * f-dark
    * f-dark-blue
    * f-blue
    * f-green

    ** Layout control
    * minibar
    * layout-drawer (changed the var on top)

    e.g
    <body class="moss layout-drawer">
    -->
</head>

<body class="orchid  ">

<!-- #SIDEMENU-->
<?php $this->load->view('topbar/navbar'); ?>

<!-- #MAIN-->
<div class="main-wrapper">

    <!-- VIEW WRAPPER-->
    <div class="view-wrapper">

        <!-- TOP WRAPPER-->
        <div class="topbar-wrapper">

            <!-- NAV FOR MOBILE-->
            <div class="topbar-wrapper-mobile-nav"><a class="topbar-togger js-minibar-toggler" href="#"><i class="icon ion-ios-arrow-back hidden-md-down"></i><i class="icon ion-navicon-round hidden-lg-up"></i></a><a class="topbar-togger pull-xs-right hidden-lg-up js-nav-toggler" href="#"><i class="icon ion-android-person"></i></a>

                <!-- ADD YOUR LOGO HEREText logo: a.topbar-wrapper-logo(href="#") AdminHero
                --><a class="topbar-wrapper-logo demo-logo" href="index-2.html">Supplier</a>
            </div>
            <!-- END NAV FOR MOBILE-->

            <!-- SEARCH-->
            <div class="topbar-wrapper-search">
                <form>
                    <input class="form-control" type="search" placeholder="Search"><a class="topbar-togger topbar-togger-search js-close-search" href="#"><i class="icon ion-close"></i></a>
                </form>
            </div>
            <!-- END SEARCH-->

            <!-- TOP RIGHT MENU-->
            <?php $this->load->view('topbar/sidebar'); ?>
        </div>
        <!--END TOP WRAPPER-->
        <!-- PAGE CONTENT HERE-->
        <!-- #PAGE HEADER-->
        <!-- PAGE HEADER-->
        <div class="page-header">
            <div class="row">
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-body">
                            <div class="display-6">Tabel<b>Data Konsumen</b></div>
                            <p class="small text-muted">Tabel data Distributor</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="pull-xs-right" role="toolbar"><a class="btn btn-icon icon-only"></a><a class="btn btn-icon icon-only"></a><a class="btn btn-info" href="<?php echo base_url('index.php/distributor/form'); ?>" >Tambah Distributor</a></div>
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER-->

        <div class="container-fluid">
            <div class="panel-wrapper">

                <!-- #TABLE-->
                <div class="container-fluid">
                    <div class="panel-wrapper">
                        <div class="panel">
                            <div class="panel-body">
                                <table class="table" data-plugin="DataTable">
                                    <thead>
                                    <tr>
                                        <th>NAMA DISTRIBUTOR</th>
<!--                                        <th>ALAMAT DISTRIBUTOR</th>-->
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data as $row){ ?>
                                    <tr>
                                        <td><?php echo $row->nama_distributor; ?></td>
<!--                                        <td>--><?php //echo $row->alamat_distributor; ?><!--</td>-->
                                        <td>
                                            <?php echo '<a href="'.base_url('index.php/distributor/formEdit/'.$row->id_distributor).'" type="button" class="btn m-b-2 btn-whatsapp"><i class="fa icon fa-pencil-square-o"></i></a>'; ?>
                                            <?php echo '<button onclick="hapus(\'Anda Yakin ingin menghapus distributor ini ?\', \' '.base_url('index.php/distributor/deleteDistributor/'.$row->id_distributor).'\')" class="btn m-b-2 btn-youtube" type="button"><i class="fa icon fa-trash"></i></button>'; ?>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT-->

            </div>
            <!-- END VIEW WAPPER-->

        </div>
        <!-- END MAIN WRAPPER-->


        <!-- WEB PERLOAD-->
        <div id="preload">
            <ul class="loading">
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>



        <!-- Lib-->
        <script src="<?php echo base_url().'assets/'; ?>scripts/lib/jquery-1.11.3.min.js"></script>
        <script src="<?php echo base_url().'assets/'; ?>scripts/lib/jquery-ui.js"></script>
        <script src="<?php echo base_url().'assets/'; ?>scripts/lib/tether.min.js"></script>
        <script src="<?php echo base_url().'assets/'; ?>sweetalert.min.js"></script>
        <script>
            function hapus(pesan,url) {
                swal({
                        title: "Are you sure?",
                        text: pesan,
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Ya, Hapus konsumen ini",
                        cancelButtonText: "Tidak",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            //swal("Deleted!", "Your imaginary file has been deleted.", "success");
                            window.location = url;
                        } else {
                            swal("Dibatalkan", "Konsumen tidak dihapus :)", "error");
                        }
                    });
            }
        </script>
        <!-- Bootstrap js-->
        <!-- script(src="assets/bootstrap/js/bootstrap.min.js")-->

        <!-- Cookie js-->
        <!-- script(src="assets/scripts/plugins/js.cookie.js")-->

        <!-- Moment: Full featured date library for parsing, validating, manipulating, and formatting dates.-->
        <!-- script(src="assets/scripts/plugins/moment.min.js")-->

        <!-- Fastclick: Polyfill to remove click delays on browsers with touch UIs.-->
        <!-- script(src="assets/scripts/plugins/fastclick.js")-->

        <!-- Masonry: Grid layout library.-->
        <!-- script(src="assets/scripts/plugins/masonry.pkgd.min.js")-->

        <!-- Peity: is a simple jQuery plugin that converts an element's content into a simple <svg>.-->
        <!-- script(src="assets/scripts/plugins/jquery.peity.min.js")-->

        <!-- imagesloaded: Detect when images have been loaded.-->
        <!-- script(src="assets/scripts/plugins/imagesloaded.pkgd.js")-->

        <!-- MatchHeight: A responsive equal heights-->
        <!-- script(src="assets/scripts/plugins/jquery.matchHeight.js")-->

        <!-- Select2: JQuery based replacement for select boxes-->
        <!-- script(src="assets/scripts/plugins/select2.full.min.js")-->

        <!-- jQuery multiselect: jQuery plugin which is a drop-in replacement for the standard <select> element-->
        <!-- script(src="assets/scripts/plugins/jquery.multi-select.js")-->

        <!-- Bootstrap-tagsinput: jQuery tags input plugin based on Twitter Bootstrap.-->
        <!-- script(src="assets/scripts/plugins/bootstrap-tagsinput.js")-->

        <!-- Bootstrap-maxlength: Display the maximum lenght of the field-->
        <!-- script(src="assets/scripts/plugins/bootstrap-maxlength.min.js")-->

        <!-- Chartjs: Simple HTML5 Charts using the canvas element-->
        <!-- script(src="assets/scripts/plugins/Chart.min.js")-->
        <!-- script(src="assets/scripts/plugins/Chart.config.js")-->

        <!-- Bootstrap-touchspin: A mobile and touch friendly input spinner component for Bootstrap 3.-->
        <!-- script(src="assets/scripts/plugins/jquery.bootstrap-touchspin.min.js")-->

        <!-- Date Range Picker: A JavaScript component for choosing date ranges.-->
        <!-- script(src="assets/scripts/plugins/daterangepicker.js")-->

        <!-- jquery.timepicker: A lightweight, customizable javascript timepicker plugin.-->
        <!-- script(src="assets/scripts/plugins/jquery.timepicker.js")-->

        <!-- Bootstrap-submenu-->
        <!-- script(src="assets/scripts/plugins/bootstrap-submenu.js")-->

        <!-- Prismjs: Code syntax highlighting library-->
        <!-- script(src="assets/scripts/plugins/prism.js")-->

        <!-- bootstrap-table: An extended Bootstrap table-->
        <!-- script(src="assets/scripts/plugins/bootstrap-table.min.js")-->

        <!-- Grid layout-->
        <!-- script(src="assets/scripts/plugins/jquery.gridster.js")-->

        <!-- super simple slider-->
        <!-- script(src="assets/scripts/plugins/sss.min.js")-->

        <!-- Easy-pie-chart: Lightweight  pie charts-->
        <!-- script(src="assets/scripts/plugins/jquery.easypiechart.min.js")-->

        <!-- Summernote: Lightweight html5 editor-->
        <!-- script(src="assets/scripts/plugins/summernote.min.js")-->

        <!-- Bootstrap plugin for markdown editing-->
        <!-- script(src="assets/scripts/plugins/behave.js")-->
        <!-- script(src="assets/scripts/plugins/markdown.js")-->
        <!-- script(src="assets/scripts/plugins/to_markdown.js")-->
        <!-- script(src="assets/scripts/plugins/bootstrap-markdown.js")-->

        <!-- DataTables: It is a highly flexible HTML table.-->
        <!-- script(src="assets/scripts/plugins/jquery.dataTables.min.js")-->
        <!-- script(src="assets/scripts/plugins/dataTables.bootstrap.js")-->

        <!-- Ladda: Buttons with built-in loading indicators.-->
        <!-- script(src="assets/scripts/plugins/spin.min.js")-->
        <!-- script(src="assets/scripts/plugins/ladda.min.js")-->

        <!-- Counterup: Counts up to a targeted number when the number becomes visible.-->
        <!-- script(src="assets/scripts/plugins/waypoints.min.js")-->
        <!-- script(src="assets/scripts/plugins/jquery.counterup.min.js")-->

        <!-- Bootstrap-select: Bootstrap's dropdown.js to style and bring additional functionality to normal select boxes.-->
        <!-- script(src="assets/scripts/plugins/bootstrap-select.js")-->

        <!-- Bootstrap-select: Bootstrap's dropdown.js to style and bring additional functionality to normal select boxes.-->
        <!-- script(src="assets/scripts/plugins/bootstrap-datepicker.js")-->

        <!-- jQuery asColorPicker-->
        <!-- script(src="assets/scripts/plugins/jquery-asColor.js")-->
        <!-- script(src="assets/scripts/plugins/jquery-asGradient.js")-->
        <!-- script(src="assets/scripts/plugins/jquery-asColorPicker.js")-->

        <!-- Labelauty jQuery Plugin: checkboxes and radio buttons-->
        <!-- script(src="assets/scripts/plugins/jquery-labelauty.js")-->

        <!-- Simple upload ui-->
        <!-- script(src="assets/scripts/plugins/upload.js")-->

        <!-- parsleyjs: the ultimate JavaScript form validation library-->
        <!-- script(src="assets/scripts/plugins/parsley.min.js")-->

        <!-- Owl Carousel 2: Touch enabled jQuery plugin that lets you create a beautiful responsive carousel slider.-->
        <!-- script(src="assets/scripts/plugins/owl.carousel.js")-->

        <!-- Theme js-->
        <!-- Concat all plugins js-->
        <script src="<?php echo base_url().'assets/'; ?>scripts/theme/theme-plugins.js"></script>
        <script src="<?php echo base_url().'assets/'; ?>scripts/theme/main.js"></script>
        <!-- Below js just for this demo only-->
        <script src="<?php echo base_url().'assets/'; ?>scripts/demo/demo-skin.js"></script>
        <script src="<?php echo base_url().'assets/'; ?>scripts/demo/bar-chart-menublock.js"></script>

        <!-- Below js just for this page only-->
</body>

<!-- Mirrored from www.thusbox.com/adminhero/table-bootstrap.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Apr 2017 16:23:32 GMT -->
</html>