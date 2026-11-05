<!--Footer-->
<style>
    /* Footer Custom Enhancements */
    .footer-distributed {
        background-color: #211e24 !important;
        padding: 50px 40px 40px 40px !important;
    }

    .footer-distributed .footer-center > div {
        display: flex;
        align-items: center;
        margin-bottom: 18px;
    }

    .footer-distributed .footer-center .footer-icon-circle {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 42px !important;
        height: 42px !important;
        min-width: 42px !important;
        border-radius: 50% !important;
        background-color: #38353d !important;
        color: #ffa726 !important;
        margin: 0 14px 0 0 !important;
        box-shadow: 0 2px 5px rgba(0,0,0,0.25);
    }

    .footer-distributed .footer-center .footer-icon-circle svg {
        width: 18px;
        height: 18px;
        fill: #ffa726;
    }

    .footer-distributed .footer-center p {
        margin: 0 !important;
        color: #e0e0e0 !important;
        font-size: 15px !important;
        line-height: 1.4 !important;
    }

    .footer-distributed .footer-center p a {
        color: #ffffff !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        text-decoration: none !important;
        transition: color 0.2s;
    }

    .footer-distributed .footer-center p a:hover {
        color: #ffa726 !important;
        text-decoration: underline !important;
    }

    /* Social Icons under About Konkan Meva */
    .footer-distributed .footer-icons {
        margin-top: 20px !important;
        display: flex !important;
        align-items: center !important;
        flex-wrap: wrap !important;
        gap: 10px !important;
    }

    .footer-distributed .footer-icons .social-btn {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 40px !important;
        height: 40px !important;
        border-radius: 8px !important;
        background-color: #38353d !important;
        color: #ffffff !important;
        text-decoration: none !important;
        box-shadow: 0 2px 6px rgba(0,0,0,0.3) !important;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
    }

    .footer-distributed .footer-icons .social-btn svg {
        width: 20px !important;
        height: 20px !important;
        fill: #ffffff !important;
        transition: transform 0.2s ease !important;
    }

    .footer-distributed .footer-icons .social-btn:hover {
        transform: translateY(-3px) scale(1.08) !important;
    }

    .footer-distributed .footer-icons .social-btn.fb:hover {
        background-color: #1877F2 !important;
    }

    .footer-distributed .footer-icons .social-btn.insta:hover {
        background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%) !important;
    }

    .footer-distributed .footer-icons .social-btn.in:hover {
        background-color: #0A66C2 !important;
    }

    .footer-distributed .footer-icons .social-btn.tw:hover {
        background-color: #000000 !important;
    }

    .footer-distributed .footer-icons .social-btn.yt:hover {
        background-color: #FF0000 !important;
    }
</style>

<footer class="footer-distributed" style="position: relative;">

    <div class="footer-left">
        <h3>Konkan <span>Mewa</span></h3>

        <p class="footer-links">
            <a href="index.php">Home</a> |
            <a href="shop.php">Shop</a> |
            <a href="webproduct.php?category=1">Konkani Fruits</a> |
            <a href="about.php">About</a> |
            <a href="Traditons.php">Traditions</a> |
            <a href="contact.php">Contact</a>
        </p>

        <p class="footer-company-name">Copyright &copy; <?php echo date('Y'); ?> <strong>Konkan Mewa</strong>. All rights reserved.</p>
        <p class="text-muted" style="font-size: 13px; margin-top: 5px;">Authentic agricultural &amp; gourmet specialties from coastal Maharashtra.</p>
    </div>

    <div class="footer-center">
        <!-- Location -->
        <div>
            <span class="footer-icon-circle">
                <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            </span>
            <p><span>Ratnagiri &amp; Sindhudurg</span> Maharashtra, India</p>
        </div>

        <!-- Phone -->
        <div>
            <span class="footer-icon-circle">
                <svg viewBox="0 0 24 24"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
            </span>
            <p><a href="tel:+919836543624">+91 9836543624</a></p>
        </div>

        <!-- Email -->
        <div>
            <span class="footer-icon-circle">
                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
            </span>
            <p><a href="mailto:konkanmewa@gmail.com">konkanmewa@gmail.com</a></p>
        </div>
    </div>

    <div class="footer-right">
        <p class="footer-company-about">
            <span>About Konkan Mewa</span>
            Rooted along the scenic Konkan coastline, <strong>Konkan Mewa</strong> brings you 100% natural Alphonso mangoes, hand-crafted syrups, traditional kokum agal, pickles, flours, and regional delicacies directly from farmer groves.
        </p>

        <!-- Social Media Icons (Clearly visible SVG icons with hover effects) -->
        <div class="footer-icons">
            <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" title="Facebook" class="social-btn fb">
                <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </a>
            <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" title="Instagram" class="social-btn insta">
                <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </a>
            <a href="https://in.linkedin.com/" target="_blank" rel="noopener noreferrer" title="LinkedIn" class="social-btn in">
                <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
            </a>
            <a href="https://twitter.com/" target="_blank" rel="noopener noreferrer" title="Twitter / X" class="social-btn tw">
                <svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
            </a>
            <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer" title="YouTube" class="social-btn yt">
                <svg viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
            </a>
        </div>
    </div>

</footer>

<!-- Customer Login Modal -->
<div id="loginModal" class="login-modal">
    <div class="login-modal-content">
        <span class="login-model-close">&times;</span>

        <h2>Customer Login</h2>
        <form action="UserLoginBackend.php" method="POST" class="form">
            <div class="input-box">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password" required>
            </div>
            <button type="submit">Login</button>

            <p style="margin-top: 15px;">New customer? <a href="register.php">Create an Account</a>.</p>
        </form>
    </div>
</div>

<!-- Scripts (jQuery, Popper, Bootstrap in correct dependency order) -->
<script src="./assets/js/jquery-3.6.0.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>

<script>
    // Login Modal Handler
    document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById("loginModal");
        const btns = document.getElementsByClassName("openLoginModal");
        const span = document.getElementsByClassName("login-model-close")[0];

        if (btns && modal) {
            for (let i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function(e) {
                    e.preventDefault();
                    modal.style.display = "block";
                });
            }
        }

        if (span && modal) {
            span.onclick = function() {
                modal.style.display = "none";
            };
        }

        window.onclick = function(event) {
            if (modal && event.target === modal) {
                modal.style.display = "none";
            }
        };
    });

    // Cart and Wishlist operations
    const currentUserId = <?php echo isset($user_id) ? (int)$user_id : 0; ?>;

    function addToCart(userId, productId) {
        const uid = (userId && userId > 0) ? userId : currentUserId;
        if (!uid || uid === 0) {
            alert("Please log in to add items to your cart.");
            const modal = document.getElementById("loginModal");
            if (modal) modal.style.display = "block";
            return;
        }

        $.ajax({
            url: "add_to_cart.php",
            type: "POST",
            data: {
                user_id: uid,
                product_id: productId
            },
            success: function(response) {
                alert(response.trim() || "Item added to cart!");
            },
            error: function() {
                alert("Could not add item to cart. Please try again.");
            }
        });
    }

    function addToWishlist(userId, productId) {
        const uid = (userId && userId > 0) ? userId : currentUserId;
        if (!uid || uid === 0) {
            alert("Please log in to add items to your wishlist.");
            const modal = document.getElementById("loginModal");
            if (modal) modal.style.display = "block";
            return;
        }

        $.ajax({
            url: "add_to_wishlist.php",
            type: "POST",
            data: {
                user_id: uid,
                product_id: productId
            },
            success: function(response) {
                alert(response.trim() || "Item added to wishlist!");
            },
            error: function() {
                alert("Could not add item to wishlist. Please try again.");
            }
        });
    }

    // Live Product Search with robust null checks
    document.addEventListener("DOMContentLoaded", function() {
        const searchBox = document.getElementById('search-box');
        const resultsBox = document.getElementById('search-results');

        if (searchBox && resultsBox) {
            searchBox.addEventListener('keyup', function() {
                const query = this.value.trim();

                if (query.length > 1) {
                    fetch('search_products.php?q=' + encodeURIComponent(query))
                        .then(res => res.json())
                        .then(data => {
                            resultsBox.innerHTML = '';

                            if (data && data.length > 0) {
                                data.forEach(product => {
                                    const li = document.createElement('li');
                                    li.className = 'list-group-item list-group-item-action d-flex justify-content-between align-items-center';
                                    li.textContent = product.product_name;
                                    li.style.cursor = 'pointer';
                                    li.onclick = () => {
                                        window.location.href = 'product_detail.php?id=' + product.id;
                                    };
                                    resultsBox.appendChild(li);
                                });
                            } else {
                                resultsBox.innerHTML = '<li class="list-group-item text-muted">No products found</li>';
                            }
                        })
                        .catch(err => {
                            console.error('Search error:', err);
                        });
                } else {
                    resultsBox.innerHTML = '';
                }
            });

            // Hide results when clicking outside
            document.addEventListener('click', function(e) {
                const formInline = document.querySelector('.form-inline');
                if (formInline && !formInline.contains(e.target)) {
                    resultsBox.innerHTML = '';
                }
            });
        }
    });
</script>

<?php
if (isset($_SESSION['message'])) {
    echo '<script>alert(' . json_encode($_SESSION['message']) . ');</script>';
    unset($_SESSION['message']);
}
?>

</body>
</html>
