<!DOCTYPE html>
<html lang="zxx">

<?php $this->load->view('common/head') ?>

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
                        <h2>Product Details</h2>
                        <div class="breadcrumb__option">
                            <a href="<?=base_url()?>">Home</a>
                            <a href="<?=base_url()?>">Ovista</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <?php 
                    //print_r($pro_data);
                foreach($pro_data as $product)
                    $discount = $product->discount/100*$product->main_price; $sallingprice = $product->main_price - $discount;
                    {?>
                <div class="col-lg-6 col-md-6">

                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="<?=base_url('ecomadmin/uploads/').$product->img_name?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <?php foreach($data as $row){?>
                            <img data-imgbigurl="<?=base_url('ecomadmin/uploads/').$row->img_name?>"
                                src="<?=base_url('ecomadmin/uploads/').$row->img_name?>" alt="">
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?=$product->title?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <b>Special price</b>
                        <div class="product__details__price"><i class="fa fa-rupee"></i><?=round($sallingprice)?> <del><i
                                    class="fa fa-rupee"></i><?=$product->main_price?></del> <em><?=$product->discount?>% off</em></div>
                        <ol style="list-style:none; margin-bottom:20px;">
                            <li><b>Warranty</b> : <em><?=$product->warranty?></em></li>
                            <li><b>Availability</b> : <em><?=$product->stockqunt?></em></li>
                            <li><b>Brand</b> : <em><?=$product->brand_name?></em></li>
                            <li><b>Model Name</b> : <em><?=$product->model_name?></em></li>
                            <li><b>Product Type</b> : <em><?=$product->type?></em></li>
                            <li><b>Colour</b> : <em><?=$product->color?></em></li>
                            <!-- <li><b>Connectivity Technology</b> : <em><?=$product->warrentysum?></em></li> -->
                            <li><b>Warranty Summary</b> : <em><?=$product->warrentysum?></em></li>
                            <li><b>Covered in Warranty</b> : <em><?=$product->warrentycover?></em></li>
                            <li><b>Not Covered in Warranty</b> : <em><?=$product->warrentna?></em></li>

                        </ol>

                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" class="qty" name="qty">
                                </div>
                            </div>
                        </div>
                        <a class="primary-btn text-light addtocart" id="<?=$product->id?>">ADD TO CARD</a>
                        <a class="heart-icon"><i class="fa fa-heart" id="<?=$product->id?>"></i></a>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h4>dispciption</h4>
                        </div>
                        <div class="col-md-9">
                            <p><?=$product->discription?></p>
                        </div>
                    </div>

                </div>
                <!-- <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                        suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                        vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                        accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                        pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                        elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                        et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                        vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                        Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                        porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                        sed sit amet dui. Proin eget tortor risus.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2> 
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                // print_r($releted_pro);
                foreach($releted_pro as $relet){ 
                    $discount = $relet->discount/100*$relet->main_price;  $sallingprice = $relet->main_price - $discount; 
                    $a = base64_encode($relet->id);   
                ?> 
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                            data-setbg="<?=base_url('ecomadmin/uploads/').$relet->img_name?>">
                            <ul class="product__item__pic__hover">
                                <li><a><i class="fa fa-heart" id="<?=$relet->id ?>"></i></a></li>
                                <!-- <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->
                                <li class="addtocart" id="<?=$relet->id?>"><a><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="<?=base_url('details/index/').$a?>"><?=$relet->title?></a></h6>
                            <div class="product__details__price"><i class="fa fa-rupee"></i><?=round($sallingprice)?> &nbsp; &nbsp;&nbsp; <del><i
                                    class="fa fa-rupee"></i><?=$product->main_price?></del></div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
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
           var qty = $(".qty").val();
            $.ajax({
                url:"<?=base_url('Loadhome/add_to_cart_shop')?>",
                type:'post',
                data:{"id":id,"qty":qty},
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