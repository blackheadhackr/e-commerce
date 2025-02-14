<!DOCTYPE html>
<html lang="zxx">

<?php $this->load->view('common/head')?>

<body>
    <?php $this->load->view('common/header'); ?>
    <?php $this->load->view('common/hamburgur'); ?>

    <!-- Hero Section Begin -->

    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <?php $this->load->view('common/homecateg')?>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="<?=base_url('searchdata')?>" method="POST">
                                <input type="text" placeholder="What do you need?" name="catname">
                                <button type="submit" class="site-btn"  >SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5><a href="tel:7827557588">7827557588</a></h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="<?=base_url('externalfile/img/hero/mm.png')?>">
                        <div class="hero__text">
                            <span>ULTRA PREMIUM</span>
                            <h2> 100% <BR />ORIGINAL</h2>
                            <p> Free Pickup and Delivery Available</p>
                            <!-- <p>Free Pickup and Delivery Available</p> -->
                            <a href="<?=base_url('shop')?>" class="primary-btn">SHOP NOW </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title1">
                        <h2>Category</h2>
                    </div>

                </div>
                <div class="categories__slider owl-carousel border border-secoundry p-2 rounded">
                    <?php 
                // this is slider loop
                // echo "<pre>"; print_r($type_pro);
                    foreach($type_pro as $kuchh){
                        $pro_type = base64_encode($kuchh->type);
                        ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg"
                            data-setbg="<?=base_url('ecomadmin/uploads/').$kuchh->img_name?>">
                            <h5><a href="<?=base_url('Type/index/').$pro_type?>"><?=$kuchh->type?></a></h5>
                        </div>
                    </div>
                    <?php  }
                ?>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
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
                                data-setbg="<?=base_url('ecomadmin/uploads/').$row->img_name ?>">
                                <ul class="featured__item__pic__hover">
                                    <li><a><i class="fa fa-heart" id="<?=$row->id?>"></i></a></li>
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
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?=base_url('externalfile/img/banner/banner-1.jpg')?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?=base_url('externalfile/img/banner/banner-2.jpg')?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <!-- <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Our Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item border border-dark">
                                <?php foreach($btw_data as $row){
                                    $discount = $row->discount/100*$row->main_price;  $sallingprice = $row->main_price - $discount;
                                    $a = base64_encode($row->id);?>

                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="<?=base_url('externalfile/img/latest-product/lp-1.jpg')?>" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>Crab Pool Security</h6>
                                            <span>$30.00</span>
                                        </div>
                                    </a>

                                <?php } ?>

                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-2.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-3.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-1.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-2.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-3.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-1.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-2.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-3.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-1.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-2.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-3.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-1.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-2.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-3.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-1.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-2.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?=base_url('externalfile/img/latest-product/lp-3.jpg')?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <!-- <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?=base_url('externalfile/img/blog/blog-1.jpg')?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?=base_url('externalfile/img/blog/blog-2.jpg')?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?=base_url('externalfile/img/blog/blog-3.jpg')?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Blog Section End -->
    <?php $this->load->view('common/footer'); ?>
    <script>
    $(document).ready(function() {
        $(".fa-heart").click(function() {
            var id = $(this).attr("id");

            $.ajax({
                url: "<?=base_url('Wish_list/add_wish')?>",
                type: 'post',
                data: {
                    "id": id
                },
                dataType: 'JSON',
                success: function(data) {
                    if (data.result = "success") {
                        alert(data.msg);
                    } else {
                        alert(data.msg);
                    }
                }
            });
        })
    });
    $(document).ready(function() {
        $(".addtocart").click(function() {
            var id = $(this).attr("id");
            $.ajax({
                url: "<?=base_url('Loadhome/add_to_cart')?>",
                type: 'post',
                data: {
                    "id": id
                },
                dataType: 'JSON',
                success: function(data) {
                    if (data.result = "success") {
                        alert(data.msg);
                    } else {
                        alert(data.msg);
                    }
                }
            });
        })
    });
    
    </script>
</body>

</html>