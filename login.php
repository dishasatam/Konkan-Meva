<!-- <link rel="stylesheet" href="./assets/css/style.css">

<style>
    .login-modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .login-modal-content {
        /* background-color: #fff; */
        margin: 10% auto;
        padding: 20px;
        /* border: 1px solid #888; */
        width: 30%;
        /* box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); */
    }

    .login-model-close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }
</style>

<button id="openLoginModal">Login</button>
<div id="loginModal" class="login-modal">
    <div class="login-modal-content">
        <span class="login-model-close">&times;</span>
        <section class="User">
            <header>Login Form</header>
            <form action="UserLoginBackend.php" method="POST" class="form">
                <div class="input-box">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter email address" required>
                </div>
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="password" required>
                </div>
                <button type="submit">Submit</button>
                <div class="container signin">
                    <p>Already have an account? <a href="register.php">Register Now</a>.</p>
                </div>
            </form>
        </section>
    </div>
</div>
<script>
    var modal = document.getElementById("loginModal");
    var btn = document.getElementById("openLoginModal");
    var span = document.getElementsByClassName("login-model-close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script> -->