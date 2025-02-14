<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?= base_url("application/ADMIN-DOWNLOAD/assets/images/ovista1.png")?>">
    <title>Ovista</title>

    <!-- Custom CSS -->
    <?= include 'common/onlycss.php'?>

</head>

<body>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->


        <?= include 'common/new.php'?>




        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <!-- <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Ram Ram
                            <a class="btn btn-primary rounded-pill font-15 "><?=$this->session->userdata('name')?></a>
                        </h3> -->
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="<?=base_url("homepage")?>">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- ******************************** ******************************* -->
                <div class="row">

                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium"><?=count($data)?></h2>
                                            <span
                                                class="badge bg-primary font-12 text-white font-weight-medium rounded-pill ms-2 d-lg-block d-md-none">Product listed</span>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Till <?=date("d-M-y")?>
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i
                                                class="fas fa-truck-moving fs-1"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium"><?=count($order)?></h2><a href="<?=base_url('Order')?>">
                                            <span
                                                class="badge bg-primary font-12 text-white font-weight-medium rounded-pill ms-2 d-lg-block d-md-none">Panding Order Item</span></a>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Till <?=date("d-M-y")?>
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i
                                                class="fas fa-box fs-1"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium"><?=count($danta)?></h2>
                                            <a href="<?=base_url('Confirm_order')?>">
                                            <span
                                                class="badge bg-danger font-12 text-white font-weight-medium rounded-pill ms-2 d-md-none d-lg-block">Confirmed Order</span></a>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Till <?=date("d-M-y")?>
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i class="fas fa-check fs-1"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border-end ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium"><?=count($dazxta)?></h2>
                                            <a href="<?=base_url('Confirm_order')?>">
                                            <span
                                                class="badge bg-danger font-12 text-white font-weight-medium rounded-pill ms-2 d-md-none d-lg-block">Diliver Order</span></a>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Till <?=date("d-M-y")?>
                                        </h6>
                                    </div>
                                    <div class="ms-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i class="fas fa-shipping-fast fs-1"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="container-fluid">
                    <?=$this->session->flashdata('not');?>
                    <!-- order table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <h3 class="my-3">
                                    <center>Total closing stock</center>
                                </h3>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="users-list"
                                            class="table border table-striped table-bordered text-nowrap"
                                            style="width:100%" >
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>title</th>
                                                    <th>main_price</th>
                                                    <th>discount</th>
                                                    <th>warranty</th>
                                                    <th>stockqunt</th>
                                                    <th>color</th>
                                                    <th>brand_name</th>
                                                    <th>model_name</th>
                                                    <th>warrentysum</th>
                                                    <th>warrentycover</th>
                                                    <th>warrentna</th>
                                                    <th>type</th>
                                                    <th>discription</th>
                                                    <!-- <th>Status</th> -->

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <?php 
                                                    $id = 1;
                                                    foreach($data as $row){?>
                                                    <td><?=$id?></td>
                                                    <td><?=$row->title?></td>
                                                    <td><?=$row->main_price?></td>
                                                    <td><?=$row->discount?></td>
                                                    <td><?=$row->warranty?></td>
                                                    <td><?=$row->stockqunt?></td>
                                                    <td><?=$row->color?></td>
                                                    <td><?=$row->brand_name?></td>
                                                    <td><?=$row->model_name ?></td>
                                                    <td><?=$row->warrentysum ?></td>
                                                    <td><?=$row->warrentycover ?></td>
                                                    <td><?=$row->warrentna ?> </dh>
                                                    <td><?=$row->type ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-lg btn-danger"
                                                            data-bs-toggle="popover" title="Discription"
                                                            data-bs-content="<?=$row->discription ?>">check
                                                            discription</button>

                                                    </td>
                                                    <!-- <td><i class="fa fa-edit text-success"></i> / <i
                                                            class="fa fa-trash text-danger"></i></td> -->
                                                </tr>
                                                <?php $id++; } ?>




                                            <tbody>


                                                </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Updation Form</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                            </div>
                        </div>
                    </div>
                </div>



                <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->
            </div>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php $this->load->view('common/footer')?>

        </div>




        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        $(document).ready(function() {
            $('#users-list').DataTable();
        });
        </script>



</body>

</html>