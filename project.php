<?php

# request sent using HTTP_X_REQUESTED_WITH
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ){
	if (isset($_POST['name']) AND isset($_POST['email']) AND isset($_POST['message'])) {
		$to = 'foto@olganoga.com';

		$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$subject = 'new message';
		$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
		$sent = email($to, $email, $name, $subject, $message);
		if ($sent) {
			echo 'Message sent!';
		} else {
			echo 'Message couldn\'t sent!';
		}
	}
	else {
		echo 'All Fields are required';
	}
	return;
}

/**
 * email function
 *
 * @return bool | void
 **/
function email($to, $from_mail, $from_name, $subject, $message){
	$header = array();
	$header[] = "MIME-Version: 1.0";
	$header[] = "From: {$from_name}<{$from_mail}>";
	/* Set message content type HTML*/
	$header[] = "Content-type:text/html; charset=iso-8859-1";
	$header[] = "Content-Transfer-Encoding: 7bit";
	if( mail($to, $subject, $message, implode("\r\n", $header)) ) return true; 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Olga Noga Fotografia</title>
    <meta name="description" content="Olga Noga professional wedding photography, fashion photoshoot and other in the area of Pszczyna, Bielsko and Katowice.">
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico" />

    <!-- Bootstrap Core CSS -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">

    <script src="js/smooth-scroll.min.js"></script>
    <script src="js/modernizr.js"></script>
    <!-- Modernizr -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand left" data-scroll href="http://olganoga.com/project.php"><img class="logo" src="img/ONlogoHW.png" alt="">
                </a>
                <ul class="nav navbar-nav visible-lg-block visible-md-block">
                    <li><a data-scroll href="#about">ABOUT</a>
                    </li>
                    <li><a data-scroll href="#portfolio">PORTFOLIO</a>
                    </li>
                    <li><a data-scroll href="#contact">CONTACT</a>
                    </li>
                </ul>
                <!--                <a href="" class="headerName">This header name</a>-->
                <a class="navbar-brand right" target="_blank" href="https://www.facebook.com/OlgaNogaPhotography"><img src="img/fb.png" alt="">
                </a>
            </div>
        </div>
    </nav>
    <!-- Navigation -->
    
    
    <div class="cover">
        <div class="container">

            <section class="cd-intro main">
                <div class="outer">
                    <h1 class="cd-headline slide">
                    <span class="beginning">Need a</span> 
                    <span class="cd-words-wrapper waiting">
                        <b class="is-visible">Wedding Photographer?</b>
                        <b>Commercial Session?</b>
                        <b>Fashion Photoshoot?</b>
                    </span>
                </h1>
                </div>
                <h2>You're just one step ahead from <br /> getting your best photo session ever</h2>
            </section>
            <!-- cd-intro -->

            <a data-scroll href="#about"> Learn more </a>

            <section class="scrollDown">
                <p class="scrollInside">scroll down</p>
            </section>


        </div>
    </div>

    <!-- Swiper -->
    <div class="container about">
        <h2 id="about">About me</h2>
        <div class="row">
            <div class="swiper col-md-12">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="img/whatIcon.png" alt="icon">
                            <br />
                            <h3>What I do</h3>
                            <p> I can do congeneric photo session for you. <br /> Wedding photography, fashion, exclusive and <br /> commercial sessions.
                            </p>
                            
                        </div>
                        <div class="swiper-slide">
                            <img src="img/whoIcon.png" alt="icon">
                            <br />
                            <h3>Who I am </h3>
                            <p>
                                I'm a creative photographer. I feel in love with <br /> photography few years ago and <br /> I don't regret any minute of it.
                            </p>
                            
                        </div>
                        <div class="swiper-slide">
                            <img src="img/howicon.png" alt="icon">
                            <br />
                            <h3>How I work</h3>
                            <p>
                                When you explain your idea to me I can start <br /> organizing things. I will hatch a plan, prepare <br />the right equpiment and set everything up. <br /> I work with secresy, so don't worry <br /> about anything.
                            </p>
                        
                        </div>
                    </div>
                   
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                 <div class="col-xs-4 col-md-2 col-centered"><button onclick="location.href='http://olganoga.com/about.html'"> Read more </button></div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
      <div class="container about"> 
        <h2 id="offer">Offer</h2>
        <div class="offer row">
           <div class="col-md-4 meno">
                <h3>Wedding photography</h3>
                <p>Your wedding date is coming but you're still missing a good photograper? I don't have big experience in that area, but I believe my creativity and open mind will make that day even more precious for you. I can offer you: </p>
            </div>
            <div class="col-md-4 meno">
                <h3>Fashion photoshoot</h3>
                <p>If you hesitate, you've never stood in front of the camera but you dream about professinal photo session then you're in the right place! I am a photographer who knows how to talk with the people and coach during the session.</p>
            </div>
            <div class="col-md-4 meno">
                <h3>Commercial sessions</h3>
                    <p>If you wonder how to sell your products better then leave it to me. I will organize original session giving new fresh to your products.</p>
            </div>
        </div>
        <p class="white">You customize your own offer: Number of images, DVDs or Blu-rays, Posters, Photo books, Pre wedding session, Making up the session</p>
        </div>
        </div>

    <div class="container portfolio">
        <h2 id="portfolio">Portfolio - sessions</h2>
        <div class="row">
            <div class="col-xs-6 col-md-4 grid">
                <figure class="effect-lily">
                    <img src="img/portfolio/judyramateusz2.jpg" alt="Olga Noga session" />
                    <figcaption>
                        <h3>Judyta& <span>Mateusz</span></h3>
                        <p>Wedding session</p>
                         <a href="http://www.olganoga.com/session7.html"></a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-xs-6 col-md-4 grid">
                <figure class="effect-lily">
                    <img src="img/portfolio/weronika-janosz1.jpg" alt="Olga Noga with Weronika" />
                    <figcaption>
                        <h3>Weronika <span>Janosz</span></h3>
                        <p>Fashion photoshoot</p>
                        <a href="http://www.olganoga.com/session1.html"></a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-xs-6 col-md-4 grid">
                <figure class="effect-lily">
                    <img src="img/portfolio/agata-malkiewicz3.jpg" alt="Olga Noga with Agata" />
                    <figcaption>
                        <h3>Agata <span>Małkiewicz</span></h3>
                        <p>Fashion photoshoot</p>
                        <a href="http://www.olganoga.com/session2.html"></a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-xs-6 col-md-4 grid">
                <figure class="effect-lily">
                    <img src="img/portfolio/dominika-ryszka2.jpg" alt="Olga Noga photography Dominika" />
                    <figcaption>
                        <h3>Dominika <span>Ryszka</span></h3>
                        <p>Fashion photoshoot</p>
                        <a href="http://www.olganoga.com/session3.html"></a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-xs-6 col-md-4 grid">
                <figure class="effect-lily">
                    <img src="img/portfolio/magdalena-szyjka7.jpg" alt="Olga Noga with Magdalena Szyjka" />
                    <figcaption>
                        <h3>Magdalena <span>Szyjka</span></h3>
                        <p>Commercial session</p>
                        <a href="http://www.olganoga.com/session4.html"></a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-xs-6 col-md-4 grid">
                <figure class="effect-lily">
                    <img src="img/portfolio/magdalena-zawila7.jpg" alt="Magdalena Zawiła & Olga Noga" />
                    <figcaption>
                        <h3>Magdalena <span>Zawiła</span></h3>
                        <p>Fashion photoshoot</p>
                        <a href="http://www.olganoga.com/session5.html"></a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-xs-6 col-md-4 grid">
                <figure class="effect-lily">
                    <img src="img/portfolio/zofia-cekiera4.jpg" alt="Zofia Cekiera and Olga Noga" />
                    <figcaption>
                        <h3>Zofia <span>Cekiera</span></h3>
                        <p>Fashion photoshoot</p>
                        <a href="http://www.olganoga.com/session6.html"></a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-xs-6 col-md-4 grid">
                <figure class="effect-lily">
                    <img src="img/portfolio/judyramateusz3.jpg" alt="Olga Noga photography session" />
                    <figcaption>
                        <h3>Your session<span>here?</span></h3>
                        <p>Let's talk about your next session</p>
                        <a data-scroll href="#contact"></a>
                    </figcaption>
                </figure>
            </div>


        </div>
    </div>

    <div class="container contact">
        <h2 id="contact">Contact</h2>
        <article class="row">
            <div class="col-md-6 kontakt2">
                <h3>You can easily find me here </h3>
                <p>E-mail: letstalk@olganoga.com</p>
                <p>Available: Mon-Fri between 8:00 and 16:00</p>
                <a class="fb" target="_blank" href="https://www.facebook.com/OlgaNogaPhotography"><img src="img/fb2.png" alt="">
                </a>
                <a class="ig" target="_blank" href="https://instagram.com/olganoga/"><img src="img/IG.png" alt="">
                </a>

            </div>
            <div class="col-md-6 kontakt">
               <div class="alert">Hello</div>
               <div class="hello">Hello.</div>
                <form id="form" class="myForm" action="mail.php" method="POST">
                    <div class="myFormColumn">

                        <p class="form">What's your name?</p>
                        <input class="inputField" type="text" id="name" name="name" placeholder="Kasia">
                        <p class="form">What's your e-mail?</p>
                        <input class="inputField" type="email" id="email" name="email" placeholder="my@email.com">
                        <p class="form">Message</p>
                        <textarea id="message" name="message" placeholder="Your message is empty but it doesn't have to be!"></textarea>
                    </div>
                    <div class="submitForm">
                        <input class="submit" type="submit" value="Send the message">
                    </div>
                </form>
            </div>


        </article>
    </div>

   
    <footer>
        <p>All rights reserved Olga Noga 2015</p>
    </footer>



    <!-- Navigation -->
    <div id="wrap">
        <div id="push"></div>
    </div>
    <!-- end wrap -->
    <nav class="navbar navbar-default navbar-fixed-bottom center-menu visible-xs-block visible-sm-block">
        <div class="container">
            <div class="bottomMenu">
                <a data-scroll href="#"> HOME </a>
                <a data-scroll href="#about"> ABOUT </a>
                <a data-scroll href="#portfolio"> PORTFOLIO </a>
                <a data-scroll href="#contact"> CONTACT </a>
            </div>
        </div>
    </nav>
    <!-- Navigation -->

    <script>
        smoothScroll.init({
            speed: 800,
            easing: 'easeInOutCubic',
            updateURL: false,
            offset: 70,
        });
    </script>


    <!-- Swiper JS -->
    <script src="js/swiper.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            paginationClickable: '.swiper-pagination',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            paginationClickable: true,
            spaceBetween: 30,
            loop: true,
            autoplay: 7500
        });
    </script>

    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/mail.js"></script>
    <!-- Resource jQuery -->
</body>

</html>