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
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <?= include 'common/new.php'?>
        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
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
                                    <center>Order</center>
                                </h3>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="users-list"
                                            class="table border table-striped table-bordered text-nowrap"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>product image</th>
                                                    <th>product name</th>
                                                    <th>selling price</th>
                                                    <th>Quantity</th>
                                                    <th> Total price</th>
                                                    <!-- <th>Status</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php 
                                                    echo count($daata);
                                                    $id = 1;
                                                    foreach($daata as $row){
                                                        $discount = $row[0]->discount/100*$row[0]->main_price;  $sallingprice = $row[0]->main_price - $discount;
                                                        $a = base64_encode($row[0]->id);
                                                    foreach($cart as $car){
                                                        if($car[0]->prod_id == $row[0]->id && $car[0]->user_id == $this->session->userdata('id')) {
                                                            $total =  $car[0]->pro_qty * round($sallingprice);
                                                    ?>
                                                    <td><?=$id?></td>
                                                    <td><img src="<?=base_url('uploads/').$row[0]->img_name?>"
                                                            alt="logo" style="width:50px;"></td>
                                                    <td><?=$row[0]->title?></td>
                                                    <td><?=round($sallingprice)?></td>
                                                    <td><?=$car[0]->pro_qty?></td>
                                                    <td><?=$total?></td>

                                                </tr>
                                                <?php $id++; } } }?>
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
        // $(document).ready(function() {
        //     $(".acpt").on("click", function() {
        //         var id = $(this).attr('id');
        //         $.ajax({
        //             type: 'post',
        //             url: '<?=base_url("order/acpt_order")?>',
        //             data: {
        //                 "id": id
        //             },
        //             dataType: 'JSON',
        //             success: function(data) {
        //                 if (data.result == "success") {
        //                     alert(data.msg);
        //                     location.reload();
        //                 } else {
        //                     alert(data.msg);
        //                 }
        //             }
        //         });
        //     });
        // });
        </script>



</body>

</html>