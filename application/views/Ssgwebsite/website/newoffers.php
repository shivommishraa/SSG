

    <div class="header">Thanks for visiting! Please click any box for order, offer, and mart location.</div>
    <div class="container">
        <a href="<?php echo base_url(); ?>Website/Website_controller/ordernow" class="box order">
            <i class="fas fa-shopping-cart icon"></i>
            Click for Order
            <div class="star tl"></div>
            <div class="star tr"></div>
            <div class="star bl"></div>
            <div class="star br"></div>
        </a>
        <a href="<?php echo base_url(); ?>Website/Website_controller/newoffers" class="box offer">
            <i class="fas fa-tag icon"></i>
            Click for Offer
            <div class="star tl"></div>
            <div class="star tr"></div>
            <div class="star bl"></div>
            <div class="star br"></div>
        </a>
        <a href="#" class="box location">
            <i class="fas fa-map-marker-alt icon"></i>
            Click for Location
            <div class="star tl"></div>
            <div class="star tr"></div>
            <div class="star bl"></div>
            <div class="star br"></div>
        </a>
    </div>

<style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }
        .header {
            font-size: 22px;
            font-weight: bold;
            color: #ff4500;
            margin-bottom: 20px;
            text-align: center;
            animation: blink 1s infinite alternate;
        }
        @keyframes blink {
            from { opacity: 1; }
            to { opacity: 0.5; }
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .box {
            width: 200px;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            color: white;
            text-align: center;
            position: relative;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
            text-decoration: none;
            border-radius: 10px;
        }
        .box:hover {
            transform: scale(1.1);
        }
        .order { background: linear-gradient(45deg, #ff4e50, #fc913a); }
        .offer { background: linear-gradient(45deg, #42e695, #3bb2b8); }
        .location { background: linear-gradient(45deg, #4776e6, #8e54e9); }
        
        .star {
            width: 20px;
            height: 20px;
            position: absolute;
            background: white;
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
            animation: rotate 2s linear infinite;
        }
        .star.tl { top: 5px; left: 5px; }
        .star.tr { top: 5px; right: 5px; }
        .star.bl { bottom: 5px; left: 5px; }
        .star.br { bottom: 5px; right: 5px; }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .icon {
            font-size: 40px;
            margin-bottom: 10px;
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>