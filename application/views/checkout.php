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
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="<?=base_url()?>">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div> -->
            
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form id="check_out">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Full Name<span>*</span></p>
                                        <input type="text" name="full_Name" id="name"placeholder="Tour name">
                                        <p id="nameer" class="text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>House no.<span>*</span></p>
                                <input type="text" placeholder="Building no." name="house_no">
                                <p id="add" class="text-danger"></p>
                            </div>
                            <div class="checkout__input">
                                <p>Area<span>*</span></p>
                                <input type="text" placeholder="your area name" name="area">
                                <p id="Area" class="text-danger"></p>
                            </div>
                            <div class="checkout__input">
                                <p>Landmark<span>*</span></p>
                                <input type="text"placeholder="Near by area name" name="Landmark">
                                <p id="Landmark" class="text-danger"></p>
                            </div>
                            <div class="checkout__input">
                                <p>City<span>*</span></p>
                                <input type="text" placeholder="Your city name" name="City">
                                <p id="City" class="text-danger"></p>
                            </div>
                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <input type="text" placeholder="Delhi, Bihar, Uttarpradesh" name="State">
                                <p id="State" class="text-danger"></p>
                            </div>
                            <div class="checkout__input">
                                <p>Pin code / Zip code<span>*</span></p>
                                <input type="number" placeholder="Delhi, Bihar, Uttarpradesh" name="pincode">
                                <p id="pincode" class="text-danger"></p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                    <p>Phone Number<span>*</span></p>
                                <input type="number" name="cust_no" id="cust_no" placeholder="Phone no.">
                                <p id="Phone" class="text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="email" placeholder="Your official email id">
                                        <p id="Email" class="text-danger"></p>
                                    </div>
                                </div>
                                    <input type="hidden" name="price" id="number"value="0">
                            </div>
                            
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total Price</span></div>
                                <?php 
                                    
                                    foreach($cart_data as $row){
                                        $discount = $row[0]->discount/100*$row[0]->main_price;  $sallingprice = $row[0]->main_price - $discount;
                                        $a = base64_encode($row[0]->id);
                                        foreach($dat as $car){ 
                                            if($car->prod_id == $row[0]->id && $car->user_id == $this->session->userdata('id') && $car->order_status == '') {
                                              $total =  $car->pro_qty * round($sallingprice);
                                             
                                        ?>
                                <ul><input type="hidden" name="id[]" value="<?=$car->prod_id?>">
                                <ul><input type="hidden" name="mid[]" value="<?=$car->id?>">
                                    <li><?=$row[0]->title?><span id="price"><input type="number" value="<?=$total?>" class="tot" name="total[]" disabled></span></li><br>
                                </ul>
                                <?php } } }?>
                                <div class="checkout__order__subtotal">Subtotal <span id="sub_t">0</span></div>
                                <div class="checkout__order__total">Total <span id="tamount">0</span></div>
                               
                                
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <?php $this->load->view('common/footer')?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function(){
            var p_amt = 0;
            $(".tot").each(function () {
                var totamt = parseInt($(this).val());
                p_amt += totamt;
            });
            $('#sub_t').html(p_amt);
            $('#tamount').html(p_amt);
            $('#number').val(p_amt);

            // form sumbit for order comfirm
            
            $("#check_out").submit(function(e){
                e.preventDefault();
                var formdata = $("#check_out").serialize()
                $.ajax({
                    type:'post',
                    url:'<?=base_url('Checkout/order')?>',
                    dataType:'JSON',
                    data:formdata,
                    success:function(data){
                        if(data.result == "error"){
                            $("#nameer").html(data.nameerror);
                            $("#add").html(data.houseerror);
                            $("#Area").html(data.areaerror);
                            $("#Landmark").html(data.Landmark);
                            $("#City").html(data.Cityerror);
                            $("#State").html(data.Stateerror);
                            $("#pincode").html(data.pincodeerror);
                            $("#Phone").html(data.phoneerror);
                            $("#Email").html(data.email);
                        }else{
                            alert("your order is confirmed click ok to continue your shoping........")
                            window.location.href = "<?=base_url('Loadhome')?>";
                        }
                    }
                });

            });
        });

        
        
    </script>

</body>

</html>