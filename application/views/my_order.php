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
                        <h2>My Order </h2>
                        <div class="breadcrumb__option">
                            <a href="<?=base_url()?>">Home</a>
                            <span>My Order </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <?php // print_r($dat)?>
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table id="data-ord">
                            <thead>
                                <tr>
                                    <th class="shoping__product"><i>Products</i></th>
                                    <th><i>Price</i></th>
                                    <th><i>Quantity</i></th>
                                    <th><i>Total price</i></th>
                                    <th><i>Status</i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                foreach($cart_data as $row){
                                    $discount = $row[0]->discount/100*$row[0]->main_price;  $sallingprice = $row[0]->main_price - $discount;
                                    $a = base64_encode($row[0]->id);
                                    foreach($dat as $car){ 
                                        if($car->prod_id == $row[0]->id && $car->user_id == $this->session->userdata('id') && $car->order_status == 'order') {
                                          $total =  $car->pro_qty * round($sallingprice);
                                          $total_money =$total + $total;
                                    ?>
                                <tr id="<?=$row[0]->id?>">
                                    <td class="shoping__cart__item">
                                        <img src="<?=base_url('ecomadmin/uploads/').$row[0]->img_name?>"
                                            style="width:50px;">
                                        <h5><?=$row[0]->title?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <!-- <h6 class="sell_p" id="<?=round($sallingprice)?>"><?=round($sallingprice)?></h6> -->
                                        <i class="fa fa-rupee px-1"></i><?=round($sallingprice)?>
                                        
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <b><?=$car->pro_qty?></b>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <i class="fa fa-rupee px-1"></i><?=$total?>
                                    </td>
                                    
                                </tr>
                                            
                                <?php } } } 
                                    
                                foreach($cart_data as $row){
                                    $discount = $row[0]->discount/100*$row[0]->main_price;  $sallingprice = $row[0]->main_price - $discount;
                                    $a = base64_encode($row[0]->id);
                                    foreach($dat as $car){ 
                                        if($car->prod_id == $row[0]->id && $car->user_id == $this->session->userdata('id') && $car->order_status == 'confirmed') {
                                          $total =  $car->pro_qty * round($sallingprice);
                                          $total_money =$total + $total;
                                    ?>
                                <tr id="<?=$row[0]->id?>">
                                    <td class="shoping__cart__item">
                                        <img src="<?=base_url('ecomadmin/uploads/').$row[0]->img_name?>"
                                            style="width:50px;">
                                        <h5><?=$row[0]->title?></h5> 
                                        <div class="conf">
                                        <img src="<?=base_url('externalfile/img/banner/conf.webp')?>" alt=""style=" width:100px;">
                                        </div>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <!-- <h6 class="sell_p" id="<?=round($sallingprice)?>"><?=round($sallingprice)?></h6> -->
                                        <i class="fa fa-rupee px-1"></i><?=round($sallingprice)?>
                                        
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <b><?=$car->pro_qty?></b>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <i class="fa fa-rupee px-1"></i><?=$total?>
                                    </td>
                                    
                                </tr>
                                            
                                <?php } } }

                                foreach($cart_data as $row){
                                    $discount = $row[0]->discount/100*$row[0]->main_price;  $sallingprice = $row[0]->main_price - $discount;
                                    $a = base64_encode($row[0]->id);
                                    foreach($dat as $car){ 
                                        if($car->prod_id == $row[0]->id && $car->user_id == $this->session->userdata('id') && $car->order_status == 'dilivered') {
                                          $total =  $car->pro_qty * round($sallingprice);
                                          $total_money =$total + $total;
                                    ?>
                                <tr id="<?=$row[0]->id?>">
                                    <td class="shoping__cart__item">
                                        <img src="<?=base_url('ecomadmin/uploads/').$row[0]->img_name?>"
                                            style="width:50px;">
                                        <h5><?=$row[0]->title?></h5> 
                                        <div class="conf">
                                        <img src="<?=base_url('externalfile/img/banner/dil.png')?>" alt=""style=" width:70px;">
                                        </div>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <!-- <h6 class="sell_p" id="<?=round($sallingprice)?>"><?=round($sallingprice)?></h6> -->
                                        <i class="fa fa-rupee px-1"></i><?=round($sallingprice)?>
                                        
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <b><?=$car->pro_qty?></b>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <i class="fa fa-rupee px-1"></i><?=$total?>
                                    </td>
                                    
                                </tr>
                                            
                                <?php } } }?>

                                
                            </tbody>
                        </table>
                       
                        <?php if(count($dat) <= 0){
                            echo "<p class='text-center my-3 blockquote'>You haven't placed an order yet Thankyou!</p>";
                           
                        }?>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <?php $this->load->view('common/footer') ?>

    
</body>

</html>