<div class="sidebar-wrapper">
    <div>
        <?php if($this->session->userdata('level') == 1): ?>
        <div class="logo-wrapper"><a href="<?= site_url('admin/Dashboard')?>"><img class="img-fluid for-light" src="<?= base_url()?>assets/admin/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="<?= base_url()?>assets/admin/images/logo/logo_dark.png" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="<?= base_url()?>assets/admin/images/logo/logo-icon.png" alt=""></a></div>
            <nav class="sidebar-main">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="sidebar-menu">
                    <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="index.html"><img class="img-fluid" src="<?= base_url()?>assets/admin/images/logo/logo-icon.png" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title link-nav" href="<?= site_url('admin/Dashboard')?>"><i data-feather="home"></i><span >Dashboard</span></a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="<?= site_url('admin/barang')?>">
                        <i data-feather="box"></i><span>Barang</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        
                        <a class="sidebar-link sidebar-title link-nav" href="<?= site_url('admin/request')?>">
                        <i data-feather="link"></i><span>Request</span>
                        </a>
                        <?php foreach($requestg as $r): ?>
                            <?php if($r['status'] == 1): ?>
                                <label class="badge badge-danger"><i class="fa fa-bell"></i></label>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </li>
                    <?php if($this->session->userdata('level') == 1) {?>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="<?= site_url('admin/User')?>">
                        <i data-feather="users"></i><span>Users</span>
                        </a>
                    </li>
                    <?php }?>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="<?= site_url('Auth/logout')?>" onclick="return confirm('Apakah anda yakin ingin keluar ?')">
                        <i data-feather="log-out"></i><span>Logout</span>
                        </a>
                    </li>
                    </ul>
                </div>
                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
        </div>
        <?php elseif($this->session->userdata('level') == 2): ?>
        <div class="logo-wrapper"><a href="<?= site_url('staff/Dashboard')?>"><img class="img-fluid for-light" src="<?= base_url()?>assets/admin/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="<?= base_url()?>assets/admin/images/logo/logo_dark.png" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="<?= base_url()?>assets/admin/images/logo/logo-icon.png" alt=""></a></div>
            <nav class="sidebar-main">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="sidebar-menu">
                    <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="index.html"><img class="img-fluid" src="<?= base_url()?>assets/admin/images/logo/logo-icon.png" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title link-nav" href="<?= site_url('staff/Dashboard')?>"><i data-feather="home"></i><span >Dashboard</span></a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="<?= site_url('Auth/logout')?>" onclick="return confirm('Apakah anda yakin ingin keluar ?')">
                        <i data-feather="log-out"></i><span>Logout</span>
                        </a>
                    </li>
                    </ul>
                </div>
                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
        </div>
        <?php endif; ?>
    </div>