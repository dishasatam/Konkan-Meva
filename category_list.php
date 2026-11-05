<style>
    .categorySwiper .card {
        border: 2px solid #ffa726;
        border-radius: 12px;
        background-color: #fff8ef;
        transition: transform 0.3s ease;
        height: 180px;
    }

    .swiper-slide a:hover {
        text-decoration: none;
    }

    .categorySwiper .card-title {
        font-size: 14px;
        color: #e65100;
    }

    .categorySwiper .card-img-top {
        max-height: 100px;
    }

    .categorySwiper .card-body {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
</style>






<section style="padding: 20px 0;">
    <div class="container-fluid my-4">
        <div class="swiper categorySwiper">
            <div class="swiper-wrapper">
                <?php
                include('connection.php');
                $query = "SELECT * FROM category_master";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $imgPath = './admin/uploads/category/' . $row['id'] . '/' . $row['category_image'];
                    $categoryName = htmlspecialchars($row['category_name']);
                ?>
                    <div class="swiper-slide">
                        <a href="webproduct.php?category=<?php echo $row['id'] ?>">
                            <div class="card text-center p-2">
                                <img src="<?php echo $imgPath; ?>" class="card-img-top img-fluid" style="height: 100px; object-fit: contain;" alt="<?php echo $categoryName; ?>">
                                <div class="card-body p-2">
                                    <h6 class="card-title mb-0"><?php echo $categoryName; ?></h6>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<script>
    var swiper = new Swiper(".categorySwiper", {
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        speed: 600,
        spaceBetween: 20,
        breakpoints: {
            0: {
                slidesPerView: 1
            },
            480: {
                slidesPerView: 2
            },
            768: {
                slidesPerView: 3
            },
            992: {
                slidesPerView: 4
            },
            1200: {
                slidesPerView: 5
            }
        }
    });
</script>








<!--End Category-->