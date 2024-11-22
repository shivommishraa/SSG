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

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
           <!--  <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div> -->
           SSG Mart provides you the best range of refined soybean oil, wheat flour, hair shampoo, fruit drink, organic wheat flour & rice flour with effective & timely delivery.

        </div>
    </div>


  <style>
    /* General styles for the page */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f9;
      color: #333;
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

    /* Responsive styles */
    @media (max-width: 768px) {
      .tabs {
        flex-direction: column;
      }

      .tab {
        margin: 5px 0;
      }
    }
  </style>
</head>
<body>

  <div class="tabs-container">
    <div class="tabs">
      <div class="tab" id="tab1" onclick="switchTab(1)">Our Mission</div>
      <div class="tab" id="tab2" onclick="switchTab(2)">Our Team</div>
      <div class="tab" id="tab3" onclick="switchTab(3)">Our Values</div>
    </div>

    <div class="tab-content" id="content">
      <div class="content" id="content1">
        <h2>Our Mission</h2>
        <p>We strive to deliver the best products with a focus on sustainability and innovation. Our mission is to empower communities through education, technology, and entrepreneurship.</p>
      </div>
      <div class="content" id="content2">
        <h2>Our Team</h2>
        <p>We are a diverse team of passionate professionals, each bringing unique skills and perspectives. Together, we work towards creating impactful solutions that help people and businesses grow.</p>
      </div>
      <div class="content" id="content3">
        <h2>Our Values</h2>
        <p>Integrity, transparency, and collaboration are the core values that guide everything we do. We believe in making a positive difference in the world and creating a supportive environment for growth.</p>
      </div>
    </div>
  </div>

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


