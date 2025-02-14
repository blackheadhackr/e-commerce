<!DOCTYPE html>
<html lang="zxx">
<?php $this->load->view('common/head')?>

<body>
    <?php $this->load->view('common/hamburgur'); ?>
    <?php $this->load->view('common/header'); ?>




    <!-- Hero Section Begin -->
    <?php $this->load->view('common/shopHead'); ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?=base_url('externalfile/img/breadcrumb1.jpg');?> ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="<?=base_url()?>">Home</a>
                            <span>Shopping Cart</span>
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
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                foreach($cart_data as $row){
                                    $discount = $row[0]->discount/100*$row[0]->main_price;  $sallingprice = $row[0]->main_price - $discount;
                                    $a = base64_encode($row[0]->id);
                                    foreach($dat as $car){ 
                                        if($car->prod_id == $row[0]->id && $car->user_id == $this->session->userdata('id') && $car->order_status == '') {
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
                                        <input type="number" value="<?=round($sallingprice)?>" class="price" name="price[]" disabled>
                                        
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                        <input type="number" value="<?=$car->pro_qty?>" class="inpu" id="<?=$row[0]->id?>" name="qty[]">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <!-- <i class="fa fa-rupee"></i> <span class="tot" id="<?=$total?>"><?=$total?></span> -->
                                        <input type="number" value="<?=$total?>" class="tot" name="total[]" disabled>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close" id="<?=$row[0]->id?>"></span>
                                        
                                    </td>
                                </tr>
                                            
                                <?php } } }?>

                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
               <div class="col-lg-6">
                    <div class="shoping__continue">
                        
                    </div>
                </div>
                <?php 
                                    
                    foreach($cart_data as $row){
                        $discount = $row[0]->discount/100*$row[0]->main_price;  $sallingprice = $row[0]->main_price - $discount;
                        $a = base64_encode($row[0]->id);
                        foreach($dat as $car){ 
                            if($car->prod_id == $row[0]->id && $car->user_id == $this->session->userdata('id') && $car->order_status == '') {
                                $total =  $car->pro_qty * round($sallingprice);
                                $total_money =$total + $total;
                    ?>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span id="sub_t">0</span></li>
                            <li>Total <span id="tamount">0</span></li>
                            <li class="text-warning bg-danger text-center "><i class="fa fa-warning"></i> Courier / Dilivery charges will be incluede as per distance</li>
                        </ul>
                            <a href="<?=base_url('Checkout')?>" class="btn primary-btn">PROCEED TO CHECKOUT <a>
                    </div>
                </div>
                <?php } } }?>

            </div>
        </div>
    </section>
    <?php $this->load->view('common/footer') ?>


    <script>
    // on click and on change function to get price and delete product function
    $(document).ready(function() {
         var p_amt = 0;
            $(".tot").each(function () {
                var totamt = parseInt($(this).val());
                
                p_amt += totamt;
            });
            $('#sub_t').html(p_amt);
            $('#tamount').html(p_amt);

        $(document).on("click", ".qtybtn", function() {
            var quantity = $(this).closest("div.pro-qty").find("input[class='inpu']").val();
            var pro_id = $(this).closest("div.pro-qty").find("input[class='inpu']").attr("id");
            var price =  $(this).closest("tr").find("input[class='price']").val();
            var tot_price = price * quantity;
            var total =  $(this).closest("tr").find("input[class='tot']").val(tot_price);
            if(total){
                    var tot_price = 0;
                        $(".tot").each(function () {
                        var totamt = parseInt($(this).val());
                
                        tot_price += totamt;
                        });
                        $('#sub_t').html(tot_price);
                        $('#tamount').html(tot_price);
                
                }
            $.ajax({
                url:"<?=base_url('Shoping_cart/up_qty')?>",
                type:'post',
                data:{"qty":quantity,"id":pro_id},
                // dataType:'JSON',
                success:function(data){
                    
                }
            });
          
        });
        $(".inpu").keyup(function() {
            var quantity = $(this).closest("div.pro-qty").find("input[class='inpu']").val();
            var pro_id = $(this).closest("div.pro-qty").find("input[class='inpu']").attr("id");
            var price =  $(this).closest("tr").find("input[class='price']").val();
            var tot_price = price * quantity;
            var total =  $(this).closest("tr").find("input[class='tot']").val(tot_price);
            if(total){
                    var tot_price = 0;
                        $(".tot").each(function () {
                        var totamt = parseInt($(this).val());
                
                        tot_price += totamt;
                        });
                        $('#sub_t').html(tot_price);
                        $('#tamount').html(tot_price);
                
                }
            $.ajax({
                url:"<?=base_url('Shoping_cart/up_qty')?>",
                type:'post',
                data:{"qty":quantity,"id":pro_id},
                // dataType:'JSON',
                success:function(data){
                    
                }
            });
          
        });
        $(".icon_close").click(function(){
            var quantity = $(this).closest("div.pro-qty").find("input[class='inpu']").val();
            var price =  $(this).closest("tr").find("input[class='price']").val();
            var tot_price = price * quantity;
            var total =  $(this).closest("tr").find("input[class='tot']").val();
            
                if(total){
                    var tot_price = 0;
                        $(".tot").each(function () {
                        var totamt = parseInt($(this).val());
                
                        tot_price += totamt;
                        });
                        var min= tot_price - total;
                        $('#sub_t').html(min);
                        $('#tamount').html(min);
                
                }
            var a = $(this).closest("tr").remove();
            var id = $(this).attr("id");
            
            $.ajax({
                type:"post",
                url:"<?=base_url('Shoping_cart/del_item')?>",
                data:{"id":id},
                dataType:'JSON',
                success:function(data){
                    if(data.result == "error"){
                        alert(data.msg);
                    }
                }
           });
        });
    })
 
    </script>
</body>

</html>