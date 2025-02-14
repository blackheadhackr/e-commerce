<!DOCTYPE html>
<html lang="zxx">
<?php $this->load->view('common/head')?>
<body>
    <?php $this->load->view('common/hamburgur'); ?>
    <?php $this->load->view('common/header'); ?>
    <!-- Hero Section Begin -->
    <?php $this->load->view('common/shopHead'); ?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?=base_url('externalfile/img/breadcrumb1.jpg');?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Your Desire Product</h2>
                        <div class="breadcrumb__option">
                            <a href="<?=base_url()?>">Home</a>
                            <span>Desire</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Product Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <?php //echo "<pre>"; print_r($data); ?>
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Product</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php foreach($dataa as $row){
                     $discount = $row[0]->discount/100*$row[0]->main_price;  $sallingprice = $row[0]->main_price - $discount;
                     $a = base64_encode($row[0]->id);
                    ?>

                    <div class="col-lg-3 col-md-4 col-sm-3">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg"
                            data-setbg="<?=base_url('ecomadmin/uploads/').$row[0]->img_name?>">
                            <ul class="featured__item__pic__hover">
                                <!-- <li><a href="<?=base_url('wish_list/add_wish/').$a?>"><i class="fa fa-heart heart"></i></a></li> -->
                                <li class="addtofav" id="<?=$row[0]->id?>"><a><i class="fa fa-heart text-danger" id="<?=$row[0]->id?>"></i></a></li>
                                <li class="addtocart" id="<?=$row[0]->id?>"><a><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="<?=base_url('details/index/').$a?>"><?=$row[0]->title?></a></h6>
                            <h5><i class="fa fa-rupee"> </i><?=round($sallingprice)?></h5>
                        </div>
                    </div>
                </div>

                <?php }?>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    <!-- footer start -->
    <?php $this->load->view('common/footer') ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(function(){ 
        $(".addtofav").click(function(){
           var id = $(this).attr("id");
            Swal.fire({
                title: 'really you want to remove this product ?',
                text: "to add again go to home search and add again Thankyou!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:"<?=base_url('Wish_list/del_wish')?>",
                        type:'post',
                        data:{"id":id},
                        dataType:'JSON',
                        success:function(data){
                            if(data.result = "success"){
                            // alert(data.msg);
                            // location.reload();
                            setTimeout(location.reload.bind(location), 800);
                            }else{
                            alert(data.msg);
                            }
                        }
                    });
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            }); 
        });
    });

    $(document).ready(function(){
        $(".addtocart").click(function(){
           var id = $(this).attr("id");
            $.ajax({
                url:"<?=base_url('Loadhome/add_to_cart')?>",
                type:'post',
                data:{"id":id},
                dataType:'JSON',
                success:function(data){
                    if(data.result = "success"){
                    alert(data.msg);
                    }else{
                    alert(data.msg);
                    }
                }
            });
        });
    });
</script>
</body>

</html>