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
                <?php 
                if(count($dataa) >=1){
                    foreach($dataa as $row){
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
   
                   <?php }
                }else{
                    echo '<div class="container px-5" style="max-width:750px;"><div class="card text-center">
                    <div class="card-header text-danger">
                      Sorry! &#128546;
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">we are unable to find your intreasted product. </h5>
                      <p class="card-text">We will improve our product and provide you as soon as possible. </p>
                        <!--<blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>-->
                      <a href="'.base_url("shop").'" class="btn btn-primary">Go to shop</a>
                    </div>
                    
                  </div></div>';
                }?>
                
                
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    <!-- footer start -->
    <?php $this->load->view('common/footer') ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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