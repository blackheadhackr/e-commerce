 <!-- Header Section Begin -->
 <header class="header">
     <div class="header__top">
         <div class="container">
             <div class="row">
                 <div class="col-lg-8 col-md-8">
                     <div class="header__top__left">
                         <ul>
                             <li><i class="fa fa-envelope"></i> <a
                                     href="mailto:welcome.careovista@gmail.com">welcome.careovista@gmail.com</a></li>
                             <li><i class="fa fa-home"></i> wz-472, raja park, near charkhamba chowk, delhi-110034</li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-4">
                     <div class="header__top__right">
                         <div class="header__top__right__social">
                             <a href="https://www.facebook.com/profile.php?id=100094155933322&mibextid=ZbWKwL"><i
                                     class="fa fa-facebook"></i></a>
                             <a href="https://instagram.com/pocketdealovista?igshid=MzNlNGNkZWQ4Mg=="><i
                                     class="fa fa-instagram"></i></a>
                             <a href="https://www.indiamart.com/tradefiesta/"><i
                                     class="fa fa-linkedin"></i></a>
                             <a href="https://www.youtube.com/@Ovista2"><i
                                     class="fa fa-youtube"></i></a>
                         </div>

                         <div class="header__top__right__auth">
                             <a href="<?=base_url('login');?>"><i class="fa fa-user"></i> Login</a>
                         </div> &nbsp &nbsp &nbsp
                         <div class="header__top__right__auth">
                             <a href="<?=base_url('login/myorder');?>"><i class="fa fa-user"></i>My-order</a>
                         </div> &nbsp &nbsp
                         <div class="header__top__right__auth">
                             <a href="<?=base_url('login/logout');?>">
                                <i class="fa fa-sign-out" style="font-size:16px"></i></a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="container">
         <div class="row">
             <div class="col-lg-3">
                 <div class="header__logo">
                     <a href="<?=base_url('Loadhome');?>"><img src="<?=base_url('externalfile/img/logo.png');?>"
                             alt=""></a>
                 </div>
             </div>
             <div class="col-lg-6">
                 <nav class="header__menu">
                     <ul>
                         <li><a href="<?=base_url('Loadhome');?>">Home</a></li>
                         <li><a href="<?=base_url('shop');?>">Shop</a></li>
                         
                         <li><a href="<?=base_url('contact');?>">Contact</a></li>
                     </ul>
                 </nav>
             </div>
             <div class="col-lg-3">
                 <div class="header__cart">
                     <ul> 
                         <li><a href="<?=base_url('wish_list')?>"><i class="fa fa-heart text-primary"></i></a></li>
                         <li><a href="<?=base_url('shoping_cart')?>"><i class="fa fa-shopping-bag"></i></a></li>
                     </ul>
                     <!-- <div class="header__cart__price">item: <span>$150.00</span></div> -->
                 </div>
             </div>
         </div>
         <div class="humberger__open">
             <i class="fa fa-bars"></i>
         </div>
     </div>
 </header>
 <!-- Header Section End -->