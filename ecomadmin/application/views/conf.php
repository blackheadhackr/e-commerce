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
            <div class="container-fluid">


                <div class="container-fluid">
                    <?=$this->session->flashdata('not');?>
                    <!-- order table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <h3 class="my-3">
                                    <center>Confirmed order But not Diliver</center>
                                </h3>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="users-list"
                                            class="table border table-striped table-bordered text-nowrap"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Order Id</th>
                                                    <th>Person Name</th>
                                                    <th>Email</th>
                                                    <th>Phone no.</th>
                                                    <th>Address</th>
                                                    <th>Amount</th>
                                                    <th>Order Date</th>
                                                    <th>Status</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php 
                                                    $id = 1;
                                                    foreach($son as $row){$iid =  base64_encode($row->id);?>
                                                    <td><?=$id?></td>
                                                    <td><?=$row->id?></td>
                                                    <td><?=$row->name?></td>
                                                    <td><?=$row->email?></td>
                                                    <td><?=$row->phone?></td>
                                                    <td><?=$row->house_no?>, <?=$row->area?>, near-<?=$row->landmark?> ,
                                                        <?=$row->city?>, <?=$row->state?> <?=$row->pincode?></td>
                                                    <td><?=$row->amount?></td>
                                                    <td><?=$row->date?></td>
                                                    <td><a href="<?=base_url('Confirm_order/checkorder/').$iid?>"
                                                            class="btn btn-primary">check Order</a> / <a
                                                            class="btn btn-success orderacpt" id="<?=$row->id?>">Dilivered</a></td>
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
            </div>
            <?php $this->load->view('common/footer')?>

        </div>




        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        $(document).ready(function() {
            $('#users-list').DataTable();
        });
        $(document).ready(function() {
            $(".orderacpt").on("click", function() {
                var id = $(this).attr('id');
                Swal.fire({
                    title: "Really you have dilivered this product to customer ?",
                    text: "you won't be able to change it again think before confirm",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes it's diliver"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'post',
                            url: '<?=base_url("Confirm_order/accept_order")?>',
                            data: {
                                "id": id
                            },
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.result == "success") {
                                    Swal.fire({
                                        title: "dilivered !",
                                        text: "Your product Updated as delivered.",
                                        icon: "success"
                                    });
                                    setTimeout(location.reload.bind(location),1000);
                                }else{alert(data.msg);}
                            }
                        });
                    }
                });
            });
        });
        </script>



</body>

</html>