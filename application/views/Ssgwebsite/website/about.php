<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url(); ?>ssgassests/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>About Us</h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo base_url(); ?>">Home</a>
                        <span>About Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- About Us Main Content Section -->
<div class="about-us spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-title">Welcome to SSG Hyper Mart</h2>
                <p class="section-description">SSG Hyper Mart is dedicated to providing the best quality grocery and everyday essentials at affordable prices. With a wide range of products and exceptional customer service, we aim to be your trusted partner in shopping.</p>
            </div>
        </div>
    </div>
</div>

<!-- Tabs Section (Mission, Team, Values) -->
<div class="tabs-container">
    <div class="tabs">
        <div class="tab" id="tab1" onclick="switchTab(1)">Our Mission</div>
        <div class="tab" id="tab2" onclick="switchTab(2)">Our Team</div>
        <div class="tab" id="tab3" onclick="switchTab(3)">Our Values</div>
    </div>

    <div class="tab-content" id="content">
        <div class="content" id="content1">
            <p>At SSG Hyper Mart, our mission is to provide customers with a wide range of high-quality grocery products, including refined soybean oil, wheat flour, rice flour, organic products, and more. We are committed to sustainability, ethical sourcing, and promoting local businesses through effective and timely delivery services.</p>
        </div>
        <div class="content" id="content2">
            <p>We are a diverse group of professionals with a passion for food and service. Our team includes experienced chefs, suppliers, logistics experts, and customer service specialists who work together to ensure that you have access to the best products and the highest quality shopping experience.</p>
        </div>
        <div class="content" id="content3">
            <p>Integrity, transparency, and customer-first approach are the values that guide everything we do. We believe in creating a supportive environment for our employees, fostering collaboration, and delivering excellence in all our services.</p>
        </div>
    </div>
</div>

<!-- Business Information Section Begin -->
<section class="business-info-section spad">
    <div class="container">
        <h2 class="section-title text-center">Our Business Information</h2>
        <div class="row">
            <div class="col-md-3 info-box animated">
                <h5>Nature of Business</h5>
                <p>Retailer</p>
            </div>
            <div class="col-md-3 info-box animated">
                <h5>GSTIN</h5>
                <p>09GKUPM8516D1ZJ</p>
            </div>
            <div class="col-md-3 info-box animated">
                <h5>Food License</h5>
                <p>Licensed and Approved</p>
            </div>
            <div class="col-md-3 info-box animated">
                <h5>Udyam Registration</h5>
                <p>Registered Business</p>
            </div>
        </div>
    </div>
</section>
<!-- Business Information Section End -->

<!-- Why Choose Us Section -->
<section class="why-choose-us-section spad">
    <div class="container">
        <h2 class="section-title text-center">Why Choose Us?</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="feature-item">
                    <h4>High-Quality Products</h4>
                    <p>We ensure that every product meets the highest quality standards for freshness, nutrition, and taste.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-item">
                    <h4>Affordable Prices</h4>
                    <p>We offer competitive prices on all products to make shopping easier for everyone.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-item colorful-animation">
                    <h4>Home Delivery in Under 1 km</h4>
                    <p>Enjoy fast and reliable delivery. <b>Terms and Conditions Apply</b>.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why Choose Us Section End -->

<!-- Testimonials Section -->
<div class="testimonials-section spad">
    <div class="container">
        <h2 class="section-title text-center">What Our Customers Say</h2>
        <div class="row testimonials-row">
            <div class="col-md-4 testimonial-item">
                <p>"SSG Hyper Mart always delivers the freshest products. Their customer service is top-notch!"</p>
                <h5>- Akshat</h5>
            </div>
            <div class="col-md-4 testimonial-item">
                <p>"I love the variety of organic products at SSG. I can trust them for all my grocery needs."</p>
                <h5>- Krishna</h5>
            </div>
            <div class="col-md-4 testimonial-item">
                <p>"Fast delivery, great prices, and excellent quality. Highly recommend SSG Hyper Mart!"</p>
                <h5>- Mohit</h5>
            </div>
            <div class="col-md-4">
                <div class="testimonial-item">
                    <p>"Great prices, and excellent service in SSG Hyper Mart!"</p>
                    <h5>- Lucky</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* General styles for the page */
.about-us, .business-info-section, .testimonials-section, .why-choose-us-section {
    padding: 50px 0;
    background-color: #f9f9f9;
}
.section-title {
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
}
.info-box, .feature-item, .testimonial-item {
    text-align: center;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}
.feature-item.h4 {
    font-size: 20px;
    margin-bottom: 10px;
}
.colorful-animation {
    animation: pulse 1.5s infinite alternate;
}
@keyframes pulse {
    from {
        transform: scale(1);
        background-color: #ffea00;
    }
    to {
        transform: scale(1.05);
        background-color: #ffc107;
    }
}
.animated {
    animation: fadeIn 1s ease-in-out;
}
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
</style>

<script>
function switchTab(tabNumber) {
    const tabs = document.querySelectorAll('.tab');
    const contents = document.querySelectorAll('.tab-content .content');
    tabs.forEach((tab, index) => {
        tab.classList.toggle('active', index + 1 === tabNumber);
        contents[index].classList.toggle('active', index + 1 === tabNumber);
    });
}
document.addEventListener('DOMContentLoaded', () => {
    switchTab(1);

    // Auto-swap testimonials
    const testimonials = document.querySelectorAll('.testimonial-item');
    let currentIndex = 0;

    setInterval(() => {
        testimonials.forEach((item, index) => {
            item.style.display = index === currentIndex ? 'block' : 'none';
        });
        currentIndex = (currentIndex + 1) % testimonials.length;
    }, 3000);
});
</script>
