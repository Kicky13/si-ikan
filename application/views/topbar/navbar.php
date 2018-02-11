<div class="mainmenu-block">
    <!-- SITE MAINMENU-->
    <nav class="menu-block">
        <ul class="nav">
            <li class="nav-item mainmenu-user-profile"><a href="user-profile.html">
                    <div class="circle-box"><img src="<?php echo base_url().'assets/'; ?>images/face/1.jpg" alt="">
                        <div class="dot dot-success"></div>
                    </div>
                    <div class="menu-block-label"><b><?php echo $_SESSION['nama']; ?></b><br><?php echo $_SESSION['jenis']; ?></div></a></li>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/home'); ?>"><i class="icon ion-home"></i>
                    <div class="menu-block-label">Dashboard</div></a></li>
            <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-grid"></i>
                    <div class="menu-block-label">Data Master</div></a>
                <ul class="nav menu-block-sub">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/konsumen'); ?>">Data Konsumen</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/stok/stoksupplier'); ?>">Data Ikan</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/distributor'); ?>">Data Distributor</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/kualitas'); ?>">Data Kualitas</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/pemesanan'); ?>"><i class="icon ion-ios-list-outline"></i>
                    <div class="menu-block-label">Pemesanan</div></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/rekap'); ?>"><i class="icon ion-monitor"></i>
                    <div class="menu-block-label">Rekap Penjualan</div></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/drp'); ?>"><i class="icon ion-ios-paper"></i>
                    <div class="menu-block-label">DRP</div></a></li>
        </ul>
        <!-- END SITE MAINMENU-->
    </nav>
</div>