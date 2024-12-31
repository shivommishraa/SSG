<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url(); ?>ssgassests/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Login</h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo base_url(); ?>">Home</a>
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Tab Buttons -->
<div class="tabs-container text-center my-4">
    <button id="loginTab" class="tab-button active" onclick="showLogin()">Login</button>
    <button id="registerTab" class="tab-button" onclick="showRegister()">Register</button>
</div>

<!-- Login Form Begin -->
<div id="loginForm" class="tab-content">
    <div class="login-form mt-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <form id="login-form" action="<?php echo base_url(); ?>Website/Website_controller/customer_login_valid" method="POST">
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Enter your email or username" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <div class="text-center mb-3">
                            <a href="#" class="text-decoration-none">Forgot password?</a>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- <div class="social-login text-center mt-4">
                            <span>Sign in with:</span>
                            <div class="d-flex justify-content-center gap-3 mt-2">
                                <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fab fa-facebook"></i> Facebook</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fab fa-google"></i> Google</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fab fa-twitter"></i> Twitter</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fab fa-github"></i> GitHub</a>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Form End -->

<!-- Register Form Begin -->
<div id="registerForm" class="tab-content" style="display: none;">
    <div class="register-form mt-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <form id="register-form" action="<?php echo base_url(); ?>Website/Website_controller/registercustomer" method="POST" onsubmit="return validatePasswords()">
                        <div class="form-group mb-3">
                            <label for="username" class="form-label">Name</label>
                            <input type="text" id="username" name="name" class="form-control" placeholder="Enter your username" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Create a password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" id="confirmPassword" name="confirmpassword" class="form-control" placeholder="Confirm Password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Register Form End -->

<script>
    function showLogin() {
        document.getElementById("loginForm").style.display = "block";
        document.getElementById("registerForm").style.display = "none";
        document.getElementById("loginTab").classList.add("active");
        document.getElementById("registerTab").classList.remove("active");
    }

    function showRegister() {
        document.getElementById("loginForm").style.display = "none";
        document.getElementById("registerForm").style.display = "block";
        document.getElementById("registerTab").classList.add("active");
        document.getElementById("loginTab").classList.remove("active");
    }

    function validatePasswords() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        
        if (password != confirmPassword) {
            alert('Passwords do not match. Please try again.');
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
</script>

<style>
    .tab-button {
        padding: 10px 20px;
        border: none;
        background: #f0f0f0;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .tab-button.active {
        background: #d6e4fd;
        color: #0044cc;
    }

    .tab-button:not(.active):hover {
        background: #e0e0e0;
    }

    .tab-content {
        margin-top: 20px;
    }
</style>
