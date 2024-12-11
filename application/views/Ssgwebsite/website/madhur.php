<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>SSG MART</title>
                                <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
                                <style>body {
    background-color: #EBEAEF
}

.container {
    flex-wrap: wrap
}

.card {
    border: none;
    border-radius: 10px;
    background-color: #4270C8;
    width: 350px;
    margin-top: -60px
}

p.mb-1 {
    font-size: 25px;
    color: #9FB7FD
}

.btn-primary {
    border: none;
    background: #5777DE;
    margin-bottom: 60px
}

.btn-primary small {
    color: #9FB7FD
}

.btn-primary span {
    font-size: 13px
}

.card.two {
    border-top-right-radius: 60px;
    border-top-left-radius: 0
}

.form-group {
    position: relative;
    margin-bottom: 2rem
}

.form-control {
    border: none;
    border-radius: 0;
    outline: 0;
    border-bottom: 1.5px solid #E6EBEE
}

.form-control:focus {
    box-shadow: none;
    border-radius: 0;
    border-bottom: 2px solid #8A97A8
}

.form-control-placeholder {
    position: absolute;
    top: 15px;
    left: 10px;
    transition: all 200ms;
    opacity: 0.5;
    font-size: 80%
}

.form-control:focus+.form-control-placeholder,
.form-control:valid+.form-control-placeholder {
    font-size: 80%;
    transform: translate3d(0, -90%, 0);
    opacity: 1;
    top: 10px;
    color: #8B92AC
}

.btn-block {
    border: none;
    border-radius: 8px;
    background-color: #506CCF;
    padding: 10px 0 12px
}

.btn-block:focus {
    box-shadow: none
}

.btn-block span {
    font-size: 15px;
    color: #D0E6FF
}</style>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript'></script>
                            </head>
                            <body oncontextmenu='return false' class='snippet-body'>
                            <div class="container d-flex justify-content-center">
    <div class="d-flex flex-column justify-content-between">
        <div class="card mt-3 p-3">
            <div class="col-md-12 text-center">
                <div class="logo mb-3 "><img src="https://th.bing.com/th/id/R.0d8668241a57c05ca5aec606f07968e3?rik=hO29FZkqLknESA&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fgoddess-durga-maa-png-transparent-image-528.png&ehk=FvI7Au4EHp78a4JIWfY2Zsyxd3tpQ9Jl8XcXKSiXOoQ%3d&risl=&pid=ImgRaw&r=0" height="100px" width="100px">
                 <!-- <span class="mb-2 pl-3" style="font-size: 16px">WE ARE COMING SOON</span> --></div>
            </div>
            
            <div>
               
<p class="mb-1" style="font-size: 19px;text-align: center;">Our exciting new website is coming soon!!</p>

                <!-- <h4 class="mb-5 text-white">By :- Mahak  Mishra</h4> -->
            </div> <button class="btn btn-primary btn-lg" ><small>-: SSG MART :- <br/>at</small><br/><span id="blink" style=" font-size: 18px; text-align: center; font-weight: bold;">06 July 2023</span> 
              <p style="color: white; font-size: 10px; margin-top: 10px"><i class="fa fa-envelope" aria-hidden="true"></i>
 ssgmart9@gmail.com &nbsp; <i class="fa fa-mobile" aria-hidden="true"></i> 8178584340</p>
 <p style="color: white; font-size: 10px; margin-top: 1px";">Designed By:- S.S.G Group</p>
            </button>
        </div>

    <form method="POST" action="<?php echo base_url() ?>Website/Website_controller/hostinsert">
        <div class="card two bg-white px-5 py-4 mb-3 mt-1">
        	 <?php if(!empty($errormess)){?>
       					<span style="color: red; text-align: center; font-size: 12px"><?php echo $errormess; ?></span>
      		<?php } ?>
          <div class="form-group">
          <input type="text" name="user_name" class="form-control" id="mail" required><label class="form-control-placeholder" for="mail">User Name</label></div>
            <div class="form-group"><input type="password" name="password" class="form-control" id="password" required><label class="form-control-placeholder" for="password">Password</label></div>

             <button class="btn btn-primary btn-block btn-lg mt-1 mb-2"><span>Submit</span></button>
        </div>
    </div>
</div>

<p id="" style="color:white; text-align: center; padding-top: 5px;">Countdown Timer</p>
<p id="demo" style="color:white;"></p>
<div class="countdown-container container" style="margin-top: 160px">
<div class="clock row col-md-12 ">
<span></span>
<!-- days --> 
<div class=" clock-item clock-days countdown-time-value col-sm-3 col-md-3">
<div class="wrap">
<div class="inner">
<div id="canvas_days" class="clock-canvas"></div>
<div class="text">
<p class="val"id="type-days">0</p>
<p class="type-days type-time">DAYS</p>
</div>
</div>
</div>
</div>

<!-- hours --> 

<div class="clock-item clock-hours countdown-time-value col-sm-3 col-md-3">
<div class="wrap">
<div class="inner">
<div id="canvas_hours" class="clock-canvas"></div>
<div class="text">
<p class="val"id="type-hours">0</p>
<p class="type-hours type-time">HOURS</p>
</div>
</div>
</div>
</div>

<!-- minutes --> 
<div class="clock-item clock-minutes countdown-time-value col-sm-3 col-md-3">
<div class="wrap">
<div class="inner">
<div id="canvas_minutes" class="clock-canvas"></div>
<div class="text">
<p class="val"id="type-minutes">0</p>
<p class="type-minutes type-time">MINUTES</p>
</div>
</div>
</div>
</div>

<!-- seconds --> 
<div class="clock-item clock-seconds countdown-time-value col-sm-3 col-md-3">
<div class="wrap">
<div class="inner">
<div id="canvas_seconds" class="clock-canvas"></div>
<div class="text">
<p class="val" id="type-seconds">0</p>
<p class="type-seconds type-time">SECONDS</p>
</div>
</div>
</div>
</div>
</div>

</div>
                            </body>
                        </html>

   
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script> 
<script type="text/javascript" src="https://www.jqueryscript.net/demo/Modern-Circular-jQuery-Countdown-Timer-Plugin-Final-Countdown/js/kinetic.js"></script> 
<script type="text/javascript" src="https://www.jqueryscript.net/demo/Modern-Circular-jQuery-Countdown-Timer-Plugin-Final-Countdown/jquery.final-countdown.js"></script> 
<style type="text/css">
    html, body {
height: 100%;
}
html {/*
background-image: url('https://www.jqueryscript.net/demo/Modern-Circular-jQuery-Countdown-Timer-Plugin-Final-Countdown/img/sample.jpg');
background-position: center center;
background-repeat: no-repeat;
background-size: cover;
*/}
body {
background-color: rgba(44,62,80 , 0.6 );
background-image: url('https://www.jqueryscript.net/demo/Modern-Circular-jQuery-Countdown-Timer-Plugin-Final-Countdown/img/pattern.png');
background-position: center;
background-repeat: repeat;
font-family: 'Raleway', 'Arial', sans-serif;
}
.countdown-container {
position: relative;
top: 50%;
-webkit-transform: translateY(-50%);
-moz-transform: translateY(-50%);
transform: translateY(-50%);
}
.clock-item .inner {
height: 0px;
padding-bottom: 100%;
position: relative;
width: 100%;
}
.clock-canvas {
background-color: rgba(255, 255, 255, .1);
border-radius: 50%;
height: 0px;
padding-bottom: 100%;
}
.text {
color: #fff;
font-size: 30px;
font-weight: bold;
margin-top: -50px;
position: absolute;
top: 50%;
text-align: center;
text-shadow: 1px 1px 1px rgba(0, 0, 0, 1);
width: 100%;
}
.text .val {
font-size: 50px;
}
.text .type-time {
font-size: 20px;
}
 @media (min-width: 768px) and (max-width: 991px) {
.clock-item {
margin-bottom: 30px;
}
}
 @media (max-width: 767px) {
.clock-item {
margin: 0px 40px 40px 40px;
}
}
</style>
<script type="text/javascript">
        var blink = document.getElementById('blink');
        setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        }, 500);
    </script>


    <script>
// Set the date we're counting down to
var countDownDate = new Date("July 06, 2023").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("type-days").innerHTML = days;
  document.getElementById("type-hours").innerHTML = hours;
  document.getElementById("type-minutes").innerHTML = minutes;
  document.getElementById("type-seconds").innerHTML = seconds;
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("type-days").innerHTML = "Happy";
    document.getElementById("type-hours").innerHTML = "8th";
    document.getElementById("type-minutes").innerHTML = "Anniversary";
    document.getElementById("type-seconds").innerHTML = "To Maa";
  }
}, 1000);
</script>