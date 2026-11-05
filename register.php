<link rel="stylesheet" href="./assets/css/style.css">


<div class="registration">
    <section class="User">
        <header>Registration Form</header>

        <form action="UserBackend.php" method="POST" class="form">
            <div class="input-box">
                <label>First Name</label>
                <input type="text" name="first_name" placeholder="Enter first name" required>
            </div>
            <div class="input-box">
                <label>Last Name</label>
                <input type="text" name="last_name" placeholder="Enter last name" required>
            </div>
            <div class="input-box">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Enter email address" required>
            </div>
            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" placeholder="password" required>
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" placeholder="Enter phone number" pattern="[0-9]{10}" required>
                </div>
                <div class="input-box">
                    <label>Birth Date</label>
                    <input type="date" name="birthdate" required>
                </div>
            </div>
            <div class="gender-box">
                <label>Gender</label>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="male" name="gender" value="Male">
                        <label for="male">Male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="female" name="gender" value="Female">
                        <label for="female">Female</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="other" name="gender" value="Other">
                        <label for="other">Prefer not to say</label>
                    </div>
                </div>
            </div>
            <div class="input-box address">
                <label>Address</label>
                <input type="text" name="address" placeholder="Enter street address" required>
                <input type="text" name="address2" placeholder="Enter street address line 2">
                <div class="column">
                    <div class="select-box">
                        <select name="country" required>
                            <option hidden>Country</option>
                            <option>India</option>
                            <option>United States</option>
                            <option>United Kingdom</option>
                            <option>Canada</option>
                            <option>Australia</option>
                        </select>
                    </div>
                    <input type="text" name="city" placeholder="Enter your city" required>
                </div>
                <div class="column">
                    <input type="text" name="region" placeholder="Enter your region" required>
                    <input type="text" name="postal" placeholder="Enter postal code" required>
                </div>
            </div>
            <button type="submit">Submit</button>
            <div class="container signin">
                <p>Already have an account? <a href="./"> Login Now </a>.</p>
            </div>
        </form>
    </section>
</div>