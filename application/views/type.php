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
                        <h2>Product Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="<?=base_url()?>">Home</a>
                            <span>Shop</span>
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
                

                <?php foreach($data as $row){
                     $discount = $row->discount/100*$row->main_price;  $sallingprice = $row->main_price - $discount;
                     $a = base64_encode($row->id);
                ?>
                <div class="col-lg-3 col-md-4 col-sm-3">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg"
                            data-setbg="<?=base_url('ecomadmin/uploads/').$row->img_name?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart" id="<?=$row->id?>"></i></a></li>
                                <li class="addtocart" id="<?=$row->id?>"><a><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="<?=base_url('details/index/').$a?>"><?=$row->title?></a></h6>
                            <h5><i class="fa fa-rupee"> </i><?=round($sallingprice)?></h5>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    <?php $this->load->view('common/footer') ?>
    <script>
    $(document).ready(function(){ 
        $(".fa-heart").click(function(){
           var id = $(this).attr("id");
            
            $.ajax({
                url:"<?=base_url('Wish_list/add_wish')?>",
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
        })
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