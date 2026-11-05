<?php
include('header.php'); ?>
<!-- CAROUSEL -->
<main>


    <section>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./assets/images/1.jpg" alt="First slide" id="c_images">
                    <div class="text-block">
                        <h6 style="color:  orange; font-weight:bold;">Nature's First Alphonso Mango Pulp is made with the finest alphonso mango.<br>
                            Now get the taste of the real king of Indian mangoes. It is a real, natural, healthy mango crush that helps you make<br>
                            refreshing drinks. Satisfy your thirst with this delectable pulp. It is a perfect drink for your summer. <br>
                            It is perfect for parties, get-to-gathers, etc. This crush can be used to make jam, milkshakes, ice cream or fresh creame.</h6>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/images/2.jpg" id="c_images">
                    <div class="text-block">
                        <h6 style="color:  rgb(174, 6, 174); font-weight:bold;">Jamun is a powerful natural remedy for high blood sugar.<br>
                            Jamun has a high source of vitamin A and vitamin C. Black Plum vinegar is good to reduce enlargement of Spleen,<br>
                            Diarrhea and those that have urine retention problems. Natureland's Organic Jamun Juice is loaded with <br>
                            antioxidants and essential for a healthy body and mind. The Jamun is known to relieve stomach pain, carminative,<br>
                            anti-scorbutic and diuretic.</h6>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/images/3.jpg" id="c_images">
                    <div class="text-block">
                        <h6 style="color:  rgb(58, 1, 58); font-weight:bold;">Kokum Agal meaning pure fruit extract of the kokum fruit<br>
                            from the Konkan region which is used to add a tangy flavour to dishes. Kokum Agal is extracted from a fruit <br>
                            which has a tangy-sweet flavour and has no added preservatives, sugar or salt making it the purest kokum juice..</h6>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/images/4.jpg" id="c_images">
                    <div class="text-block">
                        <h6 style="color: greenyellow; font-weight:bold;">Kairi Panhe is a delicious, healthy and refreshing raw mango drink.<br>
                            This soothing drink not only quenches your thirst but also serves as a cool satisfying drink.</h6>
                    </div>
                </div>
            </div>
        </div>
        <!--Cart-->

    </section>



    <?php include('category_list.php');
    ?>






    <div class="container py-5">
        <h2 class="text-center mb-4 section-title-orange">🛍️ Latest Products</h2>
        <!-- <div class="row"> -->
        <div class="product-container">
            <?php
            include('connection.php');
            $query = "SELECT * FROM products ORDER BY id DESC LIMIT 9";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $imgPath = './admin/uploads/products/' . $row['id'] . '/' . $row['product_image'];

            ?>
                <div class="product-card">
                    <img src="./admin/uploads/products/<?php echo $row['id']; ?>/<?php echo $row['product_image']; ?>">
                    <h2 class="product-title"><?php echo htmlspecialchars($row['product_name']); ?></h2>
                    <span class="product-price">Rs <?php echo number_format($row['price'], 2); ?></span><br>
                    <div class="buttons">
                        <button class="cart-btn" onclick="addToCart(<?php echo $user_id; ?>,<?php echo $row['id'] ?>)">Add to Cart</button>
                        <button class="wishlist-btn" onclick="addToWishlist(<?php echo $user_id; ?>,<?php echo $row['id'] ?>)">Add to Wishlist</button>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- </div> -->

        <div class="text-center mt-4">
            <a href="shop.php" class="btn btn-lg btn-outline-dark rounded-pill px-4">View All Products</a>
        </div>
    </div>

    <!-- <style>
    .section-title-orange {
        color: #ff6f00;
        font-weight: bold;
    }

    .shop-card-custom {
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .shop-card-custom:hover {
        transform: translateY(-5px);
    }

    .shop-card-img-wrapper {
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f7f7f7;
    }

    .shop-card-img-wrapper img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .shop-card-custom:hover img {
        transform: scale(1.05);
    }

    .shop-card-body {
        padding: 15px;
    }

    .shop-card-title {
        font-size: 15px;
        font-weight: 500;
        margin-bottom: 8px;
        min-height: 40px;
    }

    .shop-card-price {
        color: #e53935;
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .shop-card-btn-group .btn {
        margin: 0 3px;
    }

    .shop-btn-cart {
        background-color: #ff9800;
        color: white;
        border: none;
    }

    .shop-btn-cart:hover {
        background-color: #fb8c00;
    }

    .shop-btn-wishlist {
        border: 1px solid #e53935;
        color: #e53935;
    }

    .shop-btn-wishlist:hover {
        background-color: #e53935;
        color: #fff;
    }
</style> -->

</main>

<?php include('footer.php'); ?>