<?php
//Start the session
session_start();
//Require the class
require('./formkey.class.php');
//Start the class
$formKey = new formKey();
$_SESSION["was"] = 0;

$error = 'No error';
?>
    <!DOCTYPE HTML>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Auton.kz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel='stylesheet' id='prettyphoto-css'  href="css/prettyPhoto.css" type='text/css' media='all'>
    <link href="./jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="./fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
    <link href="css/fontello.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--[if lt IE 7]>
            <link href="css/fontello-ie7.css" type="text/css" rel="stylesheet">  
        <![endif]-->
    <!-- Google Web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Fira+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=latin,cyrillic' rel='stylesheet' type='text/css'>    
    <style>
    body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
    }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!-- Favicon -->
    <link rel="shortcut icon" href="./img/icon.ico">
    <!-- JQuery -->
    <link href="./src/jquery.counter-analog.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="./src/jquery.counter-analog2.css" media="screen" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="./src/jquery.counter.js" type="text/javascript"></script>
    <!-- Load ScrollTo -->
    <script type="text/javascript" src="js/jquery.scrollTo-1.4.2-min.js"></script>
    <!-- Load LocalScroll -->
    <script type="text/javascript" src="js/jquery.localscroll-1.2.7-min.js"></script>
    <script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.js"></script>
    <!-- prettyPhoto Initialization -->
    <style>
.bx-wrapper .bx-pager {
  bottom: -95px;
}

.bx-wrapper .bx-pager a {
  border: solid #ccc 1px;
  display: block;
  margin: 0 5px;
  padding: 3px;
}

.bx-wrapper .bx-pager a:hover,
.bx-wrapper .bx-pager a.active {
  border: solid #5280DD 1px;
}

.bx-wrapper {
  margin-bottom: 120px;
}
</style>
    <script type="text/javascript" charset="utf-8">
          $(document).ready(function() {
            /* Using custom settings */
            $("a.inline").fancybox({
              'hideOnContentClick': true
            });

            /* Apply fancybox to multiple items */
            
            $("a.group").fancybox({
              'transitionIn'	:	'elastic',
              'transitionOut'	:	'elastic',
              'speedIn'		:	600, 
              'speedOut'		:	200, 
              'overlayShow'	:	false
            });
            
          });          
          
          $(document).ready(function(){
            $("a[rel^='prettyPhoto']").prettyPhoto();
          });
          
          $(function() {
            $('a[href*=#]:not([href=#])').click(function() {
              if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                  $('html,body').animate({
                    scrollTop: target.offset().top
                  }, 1000);
                  return false;
                }
              }
            });
          });     
          
          $(document).ready(function(){
            var slider = $('.bxslider').bxSlider({
              pagerLocation: 'top',
              infiniteLoop: false,
              hideControlOnEnd: true,
              controls: false
            }
            );
          });
          
        $('#truck').click(function(event){
          event.preventDefault();
          slider.goToSlide(1);
        });    
    </script>
    <script type="text/javascript">
    <!--
    function submit_form(button)
    {
        if (document.contact_form.yourname.value == "")
        {
          alert ("Пожалуйста укажи свое имя");
        } else if (document.contact_form.yourphone.value == ""){
            alert ("Пожалуйста укажи свой номер телефона");
        } else if (document.contact_form.youremail.value == ""){
            alert ("Пожалуйста укажи свой адрес");
        } else {
          if (button == 1)
          {
            document.contact_form.option.value = "take_yourself";
          }
          else if (button == 2)
          {
            document.contact_form.option.value = "bring_me";
          }
          document.contact_form.submit();
        }
    }
    //-->
    </script>
    </head>
    <body>
    <!--******************** NAVBAR ********************-->
    <div class="navbar-wrapper">
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
            <h1 class="brand"><a href="#top">auton.kz! (beta)</a></h1>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <nav class="pull-right nav-collapse collapse">
              <ul id="menu-main" class="nav">
                <li><a title="services" href="#services">Услуги</a></li>
                <li><a title="portfolio" href="#portfolio">Как это работает?</a></li>
                <li><a title="contact" href="#contacting">Контакты</a></li>
                <li><a title="buy" href="#buy1" class="zakaz">ЗАКАЗАТЬ</a></li>
              </ul>
            </nav>
          </div>
          <!-- /.container -->
        </div>
        <!-- /.navbar-inner -->
      </div>
      <!-- /.navbar -->
    </div>
    <!-- /.navbar-wrapper -->
    <div id="top"></div>
    <!-- ******************** HeaderWrap ********************-->
    <div id="headerwrap" style="background-color: #000000;">
      <table id="moto_box">
        <tr>
          <td style="width:50%">
            <span id="company_name"><img style="width:30%;" src="./img/logo.png"></span><br>
            <span id="company_moto">Полный уход за твоим авто с экономией 38 000 тг</span><br><br><br>
            <div style="text-align: left;">
            <ul id="company_desc">
              <li>* Мы объединили для Вас необходимые автоуслуги в одну дисконтную карту.</li>
              <li>* Автосервисы находятся поблизости.</li>
              <li>* Вы экономите 38000тг в год</li>
            </ul>
            </div>
        
          <a href="#explanation" class="button_next">Узнать больше</a><br><br><br>
          </td>
          <td style="width:50%">
            <center>
              <div class="order_form">
                <div id="form_title">Получи свою дисконтную карту всего за 4999тг</div>
                <div style="padding:30px;">
                <form action="" >
                  <input type="text" name="yourname" placeholder="Имя"  title="твое имя"><br>
                  <input type="text" name="yourphone" placeholder="Телефон"  title="твой телефон"><br>
                  <input type="text" name="youraddress" placeholder="Адрес"  title="твое адрес"><br><br>
                  <input type="submit" value="ЗАКАЗАТЬ">
                </form>
                </div>
              </div>
            </center>
          </td>
        </tr>
      </table>
    </div>
    <!--******************** Shadow ********************-->
    <div id="shadow"></div>
 
    <section id="explanation" class="single-page scrollblock">
      <h2></h2>
      <div class="container">
        <div style="width:100%; text-align:center;"><img src="./img/valeriyanka.png"></div><br>
        <div id="mistake_explain">Но вы же не делаете ошибок?! Существуют такие виды услуг автосервиса, которыми вы обязательно воспользуетесь в течение года для поддержания вашего авто в рабочем состоянии. Auton собрал именно эти сервисы в одной дисконтной карте. Согласитесь, годовое обслуживание вашего авто обходится вам в круглую сумму. Но если вы хотите тратить меньше, не упустите свою выгоду! Ведь с Auton вы сэкономите 38 000 тг в год.</div>
        <br>
        <div id="discount_explain">
          Вот где вы сможете сэкономить:<br><br>
          <ul>
            <li>Химчистка салона с разбором <b>(экономия: 3 000тг)</b></li>
            <li>Мойка автомобиля кузов+салон [12 раз] <b>(экономия: 6 000тг)</b></li>
            <li>Полировка кузова <b>(экономия: 5 000тг)</b></li>
            <li>Полная диагностика автомобиля [2 раза] <b>(экономия: 4 000тг)</b></li>
            <li>Замена воздушного фильтра <b>(экономия: 250тг)</b></li>
            <li>Замена масла в двигателе [2 раза] <b>(экономия: 1 000тг)</b></li>
            <li>Замена масла в коробке передач <b>(экономия: 5 000тг)</b></li>
            <li>Замена топливного фильтра <b>(экономия: 500тг)</b></li>
            <li>Геометрия колес [2 раза] <b>(экономия: 1 000тг)</b></li>
            <li>Шиномонтаж [2 раза] <b>(экономия: 3 000тг)</b></li>
            <li>Эвакуатор <b>(экономия: 5 000тг)</b></li>
            <li>Отогрев, завод машины <b>(экономия: 5 000тг)</b></li>
          </ul>
          ==================================================<br><br>
          <span class="red">Итого: 38 000тг</span>
        </div>
        <div style="width: 45%; float: left;">
          <center>
            <img src="./img/total_center.png" style="width: 60%;">
          </center>
        </div>
        <div id="counter_explain">
          Но поторопитесь. Это - очень ограниченное предложение.<br>
          И его срок истечет через:<br>
          <span class="counter counter-analog" data-direction="down" style="color:black; font-size: 50%;">2:0:18</span>
          <script>
          $('.counter').counter({});
          </script>
        </div>
        <div style="width: 100%; text-align:center; padding-top: 30px;">
          <center>
            <a href="#buy1" class="zakaz">ЗАКАЗАТЬ</a>                 
          </center>
        </div>
      </div>
    </section>
    <!--******************** Services Section ********************-->
    <section id="services" class="single-page scrollblock">
      <div class="container">
        <h1>Приобрети дисконтную карту и получи скидку 38 000 тенге на 12 самых необходимых услуг для твоего автомобиля. </h1>
        <h2>Мы считаем что каждый автомобилист заслуживает такой скидки!</h2><br>
            <!-- Column #1 -->
            <div class="coupon_col">
              <div class="coupon_title">
                Седан
              </div>            
              <div class="coupon_head" style="background: url('./img/sedan.png') no-repeat center; "></div>
              <br>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Химчистка салона с разбором (1 раз)<br></div>
                  <div class="coupon_row"><span class="cross">13 000тг</span> <span>10 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Мойка автомобиля кузов+салон (12 раз x1500тг)</div>
                  <div class="coupon_row"><span class="cross">18 000тг</span> <span>12 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Полировка кузова (1 раз)</div>
                  <div class="coupon_row"><span class="cross">20 000тг</span> <span>15 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Полная диагностика автомобиля (2 раза x4000тг)</div>
                  <div class="coupon_row"><span class="cross">8 000тг</span> <span>4 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Замена воздушного фильтра (1 раз)</div>
                  <div class="coupon_row"><span class="cross">500тг</span> <span>250тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Замена масла в двигателе (2 раз x1000тг)</div>
                  <div class="coupon_row"><span class="cross">2 000тг</span> <span>1 000тг</span></div>
                </div>
              </a> 
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Замена масла в коробке передач (1 раз)</div>
                  <div class="coupon_row"><span class="cross">15 000тг</span> <span>10 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Замена топливного фильтра (1 раз)</div>
                  <div class="coupon_row"><span class="cross">1 500тг</span> <span>1 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Геометрия колес (2 раза x1500тг)</div>
                  <div class="coupon_row"><span class="cross">3 000тг</span> <span>2 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Шиномонтаж (2 раза x4500тг)</div>
                  <div class="coupon_row"><span class="cross">9 000тг</span> <span>6 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Эвакуатор (1 раз)</div>
                  <div class="coupon_row"><span class="cross">15 000тг</span> <span>10 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Отогрев, завод машины (1 раз)</div>
                  <div class="coupon_row"><span class="cross">15 000тг</span> <span>10 000тг</span></div>
                </div>
              </a>              
            </div>
            
            <!-- Column #2 -->
            <div class="coupon_col">
              <div class="coupon_title">
                Внедорожник
              </div>
              <div class="coupon_head" style="background: url('./img/jeep.png') no-repeat center; "></div>
              <br>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Химчистка салона с разбором (1 раз)<br></div>
                  <div class="coupon_row"><span class="cross">13 000тг</span> <span>10 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Мойка автомобиля кузов+салон (12 раз x1500тг)</div>
                  <div class="coupon_row"><span class="cross">18 000тг</span> <span>12 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Полировка кузова (1 раз)</div>
                  <div class="coupon_row"><span class="cross">20 000тг</span> <span>15 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Полная диагностика автомобиля (2 раза x4000тг)</div>
                  <div class="coupon_row"><span class="cross">8 000тг</span> <span>4 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Замена воздушного фильтра (1 раз)</div>
                  <div class="coupon_row"><span class="cross">500тг</span> <span>250тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Замена масла в двигателе (2 раз x1000тг)</div>
                  <div class="coupon_row"><span class="cross">2 000тг</span> <span>1 000тг</span></div>
                </div>
              </a> 
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Замена масла в коробке передач (1 раз)</div>
                  <div class="coupon_row"><span class="cross">15 000тг</span> <span>10 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Замена топливного фильтра (1 раз)</div>
                  <div class="coupon_row"><span class="cross">1 500тг</span> <span>1 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Геометрия колес (2 раза x1500тг)</div>
                  <div class="coupon_row"><span class="cross">3 000тг</span> <span>2 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Шиномонтаж (2 раза x4500тг)</div>
                  <div class="coupon_row"><span class="cross">9 000тг</span> <span>6 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Эвакуатор (1 раз)</div>
                  <div class="coupon_row"><span class="cross">15 000тг</span> <span>10 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Отогрев, завод машины (1 раз)</div>
                  <div class="coupon_row"><span class="cross">15 000тг</span> <span>10 000тг</span></div>
                </div>
              </a>              
            </div>
            
            <!-- Column #3 -->
            <div class="coupon_col">
              <div class="coupon_title">
                Кроссовер
              </div>
              <div class="coupon_head" style="background: url('./img/crossover.png') no-repeat center; "></div>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Химчистка салона с разбором (1 раз)<br></div>
                  <div class="coupon_row"><span class="cross">13 000тг</span> <span>10 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Мойка автомобиля кузов+салон (12 раз x1500тг)</div>
                  <div class="coupon_row"><span class="cross">18 000тг</span> <span>12 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Полировка кузова (1 раз)</div>
                  <div class="coupon_row"><span class="cross">20 000тг</span> <span>15 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Полная диагностика автомобиля (2 раза x4000тг)</div>
                  <div class="coupon_row"><span class="cross">8 000тг</span> <span>4 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Замена воздушного фильтра (1 раз)</div>
                  <div class="coupon_row"><span class="cross">500тг</span> <span>250тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Замена масла в двигателе (2 раз x1000тг)</div>
                  <div class="coupon_row"><span class="cross">2 000тг</span> <span>1 000тг</span></div>
                </div>
              </a> 
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Замена масла в коробке передач (1 раз)</div>
                  <div class="coupon_row"><span class="cross">15 000тг</span> <span>10 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Замена топливного фильтра (1 раз)</div>
                  <div class="coupon_row"><span class="cross">1 500тг</span> <span>1 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Геометрия колес (2 раза x1500тг)</div>
                  <div class="coupon_row"><span class="cross">3 000тг</span> <span>2 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Шиномонтаж (2 раза x4500тг)</div>
                  <div class="coupon_row"><span class="cross">9 000тг</span> <span>6 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Эвакуатор (1 раз)</div>
                  <div class="coupon_row"><span class="cross">15 000тг</span> <span>10 000тг</span></div>
                </div>
              </a>
              <a class="inline" href="./services/chemical.html">
                <div class="coupon_box">
                  <div class="coupon_row">Отогрев, завод машины (1 раз)</div>
                  <div class="coupon_row"><span class="cross">15 000тг</span> <span>10 000тг</span></div>
                </div>
              </a>              
            </div>
            <center>
            <a href="#buy1" style="text-decoration: none; line-height:100px;"><span id="red_big"><b>всего за 4999 тг</b></span></a>
            </center>        
      </div>
    </section>
   <!-- Buy -->
    <section id="buy1" class="contact single-page scrollblock">
      <div class="container">
        <div class="row">
            <h2></h2>
            <h1 style="color: white; margin: 0px;">Получи свою купонную карту</h1>
            <h1 style="color: white; margin: 0px;">Закажи за 4999 тг</h1><br>
            <div class="cform" id="theme-form">
              <form name="contact_form" action="./request.php" method="post" class="cform-form" onsubmit="javascript: validate_form();">
              <center>
                <div class="row">
                  <div style="width:40%;"> 
                    <span class="your-name">
                    <input type="text" name="yourname" placeholder="Имя" class="cform-text" size="40" title="твое имя">
                    </span> 
                  </div>
                
                  
                </div>
                <div class="row">
                  <div style="width:40%;"> <span class="your-phone">
                    <input id="phone" type="text" name="yourphone" placeholder="Номер телефона" class="cform-text" size="40" title="твой телефон">
                    </span> 
                  </div>                
                </div>
                <div class="row">
                  <div style="width:40%;"> <span class="your-email">
                    <input id="email" type="text" name="youremail" placeholder="Адрес для доставки" class="cform-text" size="40" title="твой адрес">
                    </span> 
                  </div>                
                </div>                
                <br>
                <div style="margin-left: -20px;">
                  <center>
                    <div style="width:35%; background-color: #123;">
                      <a href="javascript: submit_form(1);" class="round-button"><div style="padding-top:60px;">Самовывоз</div></a>                 
                      <a href="javascript: submit_form(2);" class="round-button"><div style="padding-top:53px;">Доставка на дом (+300тг)</div></a>            
                    </div>     
                  </center>
                </div>
                <div class="cform-response-output"></div>
                </center>
                <?php $formKey->outputKey(); ?>
                <input type="hidden" name="option" value="">
              </form>
            </div>
          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!--******************** Portfolio Section ********************-->
    <section id="portfolio" class="single-page scrollblock">
      <div class="container">
        <h1 id="folio-headline">Два простых шага сэкономить...</h1>
        <div class="row">
          <center>
            <img style="width: 90%;" src="./img/howitworks.png">
            <div style="height: 50px;"></div>
          </center>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!--******************** News Section ********************-->
    <section id="news" class="single-page scrollblock">
      <div class="container">
        <h1>Почему нас выбирают?</h1>
        <!-- Three columns -->
        <div class="row">
          <article class="span4 post"> <img class="img-news" src="img/save.png" alt="">
            <div class="inside">
              <h2>Удобство и экономия</h2>
              <div class="entry-content">
                <p> * Мы обьединили для вас все необходимые автоуслуги. <br> * Вы получаете значительную скидку на все услуги</p>
            </div>
            <!-- /.inside -->
          </article>
          <!-- /.span4 -->
          
          <article class="span4 post"> <img class="img-news" src="img/best.png" alt="">
            <div class="inside">
              <h2>Лучшие услуги и товары</h2>
              <div class="entry-content">
                <p>Мы работаем только с теми партнерами, сервис которых мы готовы рекомендовать своим клиентам. Мы сотрудничаем не с каждым бизнесом, а только с теми, кому доверяем</p>
            </div>
            <!-- /.inside -->
          </article>
          
          <!-- /.span4 -->

          <article class="span4 post"> <img class="img-news" src="img/partner.png" alt="">
            <div class="inside">
              <h2>Партнеры и клиенты</h2>
              <div class="entry-content">
                <p>Мы ценим своих партнеров с которыми работаем. Мы убеждены, что тесное взаимосотрудничество принесет выгоду всем. Доверительные отношения с партнерами залог успеха всех сторон.</p>
            </div>
            <!-- /.inside -->
          </article>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!--******************** Contact Section ********************-->
    <section id="contacting" class="contact single-page scrollblock">
      <div class="container">
        <h1>Контакты</h1>
        <div class="row">
        <div style="float: left; width:400px;">
          Мы очень благодарны за проявленный вами интерес к нашему сервису.<br><br>
          Мы будем очень рады ответить на любые ваши вопросы. Пожалуйста, звоните!<br>
          +7 (707) 657 63 73<br>
          +7 (771) 103 05 55<br><br>

          <b>Казахстан</b><br>
          Астана<br>
        </div>
        <div style="float: left; width:300px;">
          <div style="height:500px;width:700px;">
            <style type="text/css" media="screen">
              .gm-style img {
                max-width: none;
                !important;
                background:none !important;
              }
              .gm-style-iw{
                height:auto !important;
                color:#000000;
                display:block;
                white-space:nowrap;
                width:auto !important;
                line-height:18px;
                overflow:hidden !important;
              }
            </style>
					<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
					<div style="overflow:hidden;height:400px;width:700px;">
						 <div id="gmap_canvas" style="height:400px;width:700px;"></div>
						 <style>
							  #gmap_canvas img {
									max-width: none!important;
									background: none!important;
                  z-index:20;
							  }
						 </style><a class="google-map-code" href="http://www.mapembed.com" id="get-map-data">stromvergleich</a>
					</div>
					<script type="text/javascript">
						 function init_map() {
							  var myOptions = {
									zoom: 16,
									center: new google.maps.LatLng(51.1602848, 71.48409279999998),
									mapTypeId: google.maps.MapTypeId.ROADMAP
							  };
							  map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
							  marker = new google.maps.Marker({
									map: map,
									position: new google.maps.LatLng(51.1602848, 71.48409279999998)
							  });
							  infowindow = new google.maps.InfoWindow({
								content: "<b>Auton</b><br/>"
							  });
							  google.maps.event.addListener(marker, "click", function () {
									infowindow.open(map, marker);
							  });
							  infowindow.open(map, marker);
						 }
						 google.maps.event.addDomListener(window, 'load', init_map);
					</script>
        </div>
          <!-- ./span12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <div class="footer-wrapper" style="background-color: rgb(221, 221, 221);">
      <div class="container">
        <footer>
          <div style="height: 40px; padding:20px;">2014 © auton.kz Все права защищены</div>
        </footer>
      </div>
      
      <!-- ./container -->
    </div>
<!-- Loading the javaScript at the end of the page -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/site.js"></script>
    
    <!--ANALYTICS CODE-->
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-29231762-1']);
	  _gaq.push(['_setDomainName', 'dzyngiri.com']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>    
    </body>
    </html>
