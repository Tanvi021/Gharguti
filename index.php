<?php
include('functions/userfunctions.php');
include('includes/header.php');
include('includes/slider.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="fw-bold">What our customers like to eat!</h3>
                <div class="underlinee mb-2"></div>
                <br>
                <div class="owl-carousel">
                    <?php
                        $trendingProducts = getAllTrending();
                        if(mysqli_num_rows($trendingProducts) > 0)
                        {
                            foreach ($trendingProducts as $item) {
                                ?>
                                    <div class="item">
                                        <a href="product-view.php?product=<?= $item['slug']; ?>">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                                    <h6 class="text-center"><?= $item['name']; ?></h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        } 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="fw-bold">About Us</h3>
                <div class="underline mb-2"></div>
                <br>
                <h5>
                We are a bunch of people who are extremely passionate about food. We love to eat and feed just as well.
                On a serious note, at #Gharguti, we believe that meals shouldn't only be affordable and convenient but also fresh, fun and delicious.
                And what could be better than home-cooked food served at your disposal. 
                </h5>
    
                <h5>
                #Gharguti brings to you sumptuous yet nutritious meals prepared by very talented Home chefs. 
                It is cooked at home kitchen keeping quality as our top priority and delivered to your doorstep with unswerving promptness. 
                And the best bit is its affordable prices.
                <br>
                In  a city like Mumbai, finding authentic home cooked food is more difficult than finding a job. 
                We ensure that you get it at your office or home on time.
                </h5>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-white">#Gharguti</h4>
                <div class="underline mb-2"></div>
                <a href="index.php" class="text-white"> <i class="fa fa-angle-right"></i> Home</a> <br>
                <a href="#" class="text-white"> <i class="fa fa-angle-right"></i> About Us</a> <br>
                <a href="cart.php" class="text-white"> <i class="fa fa-angle-right"></i> My Cart</a> <br>
                <a href="my-orders.php" class="text-white"> <i class="fa fa-angle-right"></i> My Orders</a> <br>
                <a href="menu.php" class="text-white"> <i class="fa fa-angle-right"></i> Our Menu</a>
            </div>
            <div class="col-md-3">
                <h4 class="text-white">Address</h4>
                <p class="text-white">
                Shop no 1, Riddhi-Siddhi Palace <br>
                near balmitra gym kalher Mumbai, <br>
                Navi Mumbai, Maharashtra, India.
                </p>
                <a href="tel:+918594035960" class="text-white"> <i class="fa fa-phone"></i> +91 8594035960 </a> <br>
                <a href="mailto:ghargutiii@gmail.com" class="text-white"> <i class="fa fa-envelope"></i> ghargutiii@gmail.com</a>
            </div>
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60268.873727933846!2d72.94860853125002!3d19.247345499999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7bd6da4e0111d%3A0x6b5944b8716f6b7c!2zI0doYXJndXRpICgj4KSY4KSw4KSX4KWB4KSk4KWAIOCkuOCljeCkteCkuOCljeCkpCDgpJbgpL4g4KSu4KS44KWN4KSkIOCksOCkueCkvik!5e0!3m2!1sen!2sin!4v1676648892975!5m2!1sen!2sin" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="py-2 bg-danger">
    <div class="text-center">
        <p class="mb-0 text-white">All rights reserved. Copyright @ <a href="index.php" class="text-white" target="_blank"> #Gharguti</a> - <?= date('Y') ?></p>
    </div>
</div>

<?php include('includes/footer.php'); ?>
<script>

$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
});
</script>

    