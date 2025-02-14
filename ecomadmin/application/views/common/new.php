<?php
if($this->session->userdata('name')==false)
  { 
   redirect(base_url('Login')); 
 }
 ?>
 <header class="topbar top-0" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-lg">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <!-- Logo icon -->
                <a href="<?=base_url("homepage")?>">
                    <img src="<?= base_url("application/ADMIN-DOWNLOAD/assets/images/ovista.png")?>" alt=""
                        class="img-fluid mr-3" width="200" height="200">
                    <!-- <h2>Ovista</h2> -->
                </a>
            </div>

            
            <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="ti-more"></i>
            </a>
        </div>
        
        <div class="navbar-collapse collapse" id="navbarSupportedContent">

            <ul class="navbar-nav float-left me-auto ms-3 ps-1">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)" id="bell"
                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><i data-feather="bell" class="fab fa-playstation"></i>Confirm & Diliver</span>

                    </a>
                    <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                        <ul class="list-style-none">
                            <li>
                                <div class="message-center notifications position-relative">

                                    <a href="<?=base_url("Confirm_order")?>"
                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <div class="btn btn-danger rounded-circle btn-circle"><i
                                                class=" fas fa-shipping-fast"></i></div>
                                        <div class="w-75 d-inline-block v-middle ps-2">
                                            <h6 class="message-title mb-0 mt-1">Confirmed Order</h6>
                                        </div>
                                    </a>


                                </div>
                            </li>
                            <li>
                                <div class="message-center notifications position-relative">

                                    <a href="<?=base_url("Confirm_order/dilivered")?>"
                                        class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                        <div class="btn btn-danger rounded-circle btn-circle"><i
                                                class=" fas fa-truck-moving"></i></div>
                                        <div class="w-75 d-inline-block v-middle ps-2">
                                            <h6 class="message-title mb-0 mt-1">Dilivered Order</h6>
                                        </div>
                                    </a>


                                </div>
                            </li>
                            
                            

                        </ul>
                    </div>
                </li>

                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="settings" class="svg-icon"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> -->


            </ul>

            <ul class="navbar-nav float-end">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="<?= base_url("application/ADMIN-DOWNLOAD/assets/images/users/profile-pic.png") ?>"
                            alt="user" class="rounded-circle" width="40">
                        <span class="ms-2 d-none d-lg-inline-block"><span>Ram Ram</span> <span
                                class="text-dark"><?=$this->session->userdata('name')?></span> <i
                                data-feather="chevron-down" class="svg-icon"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">

                        <a class="dropdown-item" href="<?=base_url('login/logout')?>"><i data-feather="power"
                                class="svg-icon me-2 ms-1"></i>
                            Logout</a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</header>


<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?=base_url("homepage")?>"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="list-divider"></li>
                
                    <li class="nav-small-cap "><span class="hide-menu">Add Product</span></li>

                    <li class="sidebar-item"> <a class="sidebar-link" href="<?=base_url("homepage/add_category")?>"
                            aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                class="hide-menu">Add category</span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link" href="<?=base_url("homepage/add_product")?>"
                            aria-expanded="false"><i class="fa fa-box-open"></i><span
                                class="hide-menu">Add product</span></a>
                    </li>
                    <li class="list-divider"></li>
                    <li class="sidebar-item"> <a class="sidebar-link" href="<?=base_url("order")?>"
                            aria-expanded="false"><i data-feather="box" class="feather-icon"></i><span
                                class="hide-menu">Order</span></a>
                    </li>
                    <li class="list-divider"></li>
            </ul>
        </nav>
    </div>

</aside>


<script src="<?= base_url("application/ADMIN-DOWNLOAD/assets/libs/jquery/dist/jquery.min.js")?>"></script>
<script src="<?= base_url("application/ADMIN-DOWNLOAD/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js")?>">
</script>
<!-- apps -->
<!-- apps -->
<script src="<?= base_url("application/ADMIN-DOWNLOAD/dist/js/app-style-switcher.js")?>"></script>
<script src="<?= base_url("application/ADMIN-DOWNLOAD/dist/js/feather.min.js")?>"></script>
<script
    src="<?= base_url("application/ADMIN-DOWNLOAD/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js")?>">
</script>
<script src="<?= base_url("application/ADMIN-DOWNLOAD/dist/js/sidebarmenu.js")?>"></script>
<!--Custom JavaScript -->
<script src="<?= base_url("application/ADMIN-DOWNLOAD/dist/js/custom.min.js")?>"></script>
<!--This page JavaScript -->
<script src="<?= base_url("application/ADMIN-DOWNLOAD/assets/extra-libs/c3/d3.min.js")?>"></script>
<script src="<?= base_url("application/ADMIN-DOWNLOAD/assets/extra-libs/c3/c3.min.js")?>"></script>
<script src="<?= base_url("application/ADMIN-DOWNLOAD/assets/libs/chartist/dist/chartist.min.js")?>"></script>
<script
    src="<?= base_url("application/ADMIN-DOWNLOAD/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js")?>">
</script>
<script src="<?= base_url("application/ADMIN-DOWNLOAD/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js")?>">
</script>
<script src="<?= base_url("application/ADMIN-DOWNLOAD/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js")?>">
</script>
<script src="<?= base_url("application/ADMIN-DOWNLOAD/dist/js/pages/dashboards/dashboard1.min.js")?>"></script>