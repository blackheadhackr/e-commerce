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
                        <h2>Organi Shop</h2>
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
    <section class="product spad">
        <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                                <div class="product__discount__slider owl-carousel">
                            <?php 
                            // print_r($type_pro);
                            foreach($type_pro as $data ){ $discount = $data->discount/100*$data->main_price;  $sallingprice = $data->main_price - $discount;
                                $a = base64_encode($data->id);?>
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="<?=base_url('ecomadmin/uploads/').$data->img_name?>">
                                                <div class="product__discount__percent">-<?=$data->discount?></div>
                                                <ul class="product__item__pic__hover">
                                                    <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> -->
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span><?=$data->type?></span>
                                                <h5><a href="<?=base_url('details/index/').$a?>"><?=$data->title?></a></h5>
                                                <div class="product__item__price"><?=$sallingprice?><span><?=$data->main_price ?></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <?php } ?>
                                </div>
                            
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                        
                        </div>
                    </div>
                    <div class="row">
                        <?php  
                        foreach($all_data as $row ){ $discount = $row->discount/100*$row->main_price;  $sallingprice = $row->main_price - $discount;
                            $a = base64_encode($row->id); ?> 
                            <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?=base_url('ecomadmin/uploads/').$row->img_name?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart" id="<?=$row->id?>"></i></a></li>
                                        <!-- <li><a href="#"><i class="fa fa-info"></i></a></li> -->
                                        <li class="addtocart" id="<?=$row->id?>"><a><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                <h6><a href="<?=base_url('details/index/').$a?>"><?=$row->title?></a></h6>
                                <div class="product__details__price"><i class="fa fa-rupee"></i><?=round($sallingprice)?> &nbsp; &nbsp;&nbsp; <del><i
                                    class="fa fa-rupee"></i><?=$row->main_price?></del></div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                        
                    </div>
                    <!-- <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div> -->
                </div>
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