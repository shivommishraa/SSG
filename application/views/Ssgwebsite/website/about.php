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
            <h2>Our Mission</h2>
            <p>At SSG Hyper Mart, our mission is to provide customers with a wide range of high-quality grocery products, including refined soybean oil, wheat flour, rice flour, organic products, and more. We are committed to sustainability, ethical sourcing, and promoting local businesses through effective and timely delivery services.</p>
        </div>
        <div class="content" id="content2">
            <h2>Our Team</h2>
            <p>We are a diverse group of professionals with a passion for food and service. Our team includes experienced chefs, suppliers, logistics experts, and customer service specialists who work together to ensure that you have access to the best products and the highest quality shopping experience.</p>
        </div>
        <div class="content" id="content3">
            <h2>Our Values</h2>
            <p>Integrity, transparency, and customer-first approach are the values that guide everything we do. We believe in creating a supportive environment for our employees, fostering collaboration, and delivering excellence in all our services.</p>
        </div>
    </div>
</div>

<!-- Testimonials Section (Optional) -->
<div class="testimonials-section spad">
    <div class="container">
        <h2 class="section-title text-center">What Our Customers Say</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="testimonial-item">
                    <p>"SSG Hyper Mart always delivers the freshest products. Their customer service is top-notch!"</p>
                    <h5>- Sarah M.</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-item">
                    <p>"I love the variety of organic products at SSG. I can trust them for all my grocery needs."</p>
                    <h5>- John D.</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-item">
                    <p>"Fast delivery, great prices, and excellent quality. Highly recommend SSG Hyper Mart!"</p>
                    <h5>- Emily R.</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* General styles for the page */
.about-us {
  padding: 50px 0;
  background-color: #f9f9f9;
}

.section-title {
  font-size: 32px;
  font-weight: bold;
  margin-bottom: 20px;
}

.section-description {
  font-size: 18px;
  color: #555;
  line-height: 1.6;
  max-width: 800px;
  margin: 0 auto;
}

.tabs-container {
  max-width: 1000px;
  margin: 50px auto;
  padding: 20px;
  background: white;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}

.tabs {
  display: flex;
  justify-content: space-around;
  border-bottom: 2px solid #ddd;
}

.tab {
  flex: 1;
  text-align: center;
  padding: 12px;
  cursor: pointer;
  font-weight: bold;
  transition: background 0.3s, color 0.3s;
}

.tab:hover {
  background-color: #008cba;
  color: white;
}

.tab.active {
  color: white;
  background-color: #008cba;
  border-radius: 5px 5px 0 0;
}

.tab-content {
  padding: 20px;
  animation: fadeIn 0.5s ease-in-out;
}

.content {
  display: none;
}

.content h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

.content p {
  font-size: 16px;
  line-height: 1.6;
}

/* Animation for tab content */
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.testimonials-section {
  padding: 50px 0;
  background-color: #e9e9e9;
}

.testimonial-item {
  background: white;
  padding: 20px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
  text-align: center;
  border-radius: 8px;
}

.testimonial-item p {
  font-style: italic;
  font-size: 16px;
  color: #555;
}

.testimonial-item h5 {
  margin-top: 10px;
  font-size: 18px;
  font-weight: bold;
  color: #333;
}

@media (max-width: 768px) {
  .tabs {
    flex-direction: column;
  }

  .tab {
    margin: 5px 0;
  }
}
</style>

<script>
// JavaScript for handling the tab switch
function switchTab(tabNumber) {
  // Remove active class from all tabs and content
  const tabs = document.querySelectorAll('.tab');
  const contents = document.querySelectorAll('.content');
  
  tabs.forEach(tab => tab.classList.remove('active'));
  contents.forEach(content => content.style.display = 'none');
  
  // Add active class to the clicked tab
  document.getElementById('tab' + tabNumber).classList.add('active');
  
  // Show the corresponding content
  document.getElementById('content' + tabNumber).style.display = 'block';
}

// Set default tab (first one) on page load
document.addEventListener('DOMContentLoaded', () => {
  switchTab(1);
});
</script>
