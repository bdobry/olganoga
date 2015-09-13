<?php
if($_POST)
{
    $to_email       = "foto@olganoga.com"; //Recipient email, Replace with own email here
   
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
       
        $output = json_encode(array( //create JSON data
            'type'=>'error',
            'text' => 'Sorry Request must be Ajax POST'
        ));
        die($output); //exit script outputting json data
    }
   
    //Sanitize input data using PHP filter_var().
    $name      = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email     = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phone     = filter_var($_POST["phone"], FILTER_SANITIZE_NUMBER_INT);
    $subject        = "Nowa wiadomość z olganoga.com!";
    $message        = filter_var($_POST["message"], FILTER_SANITIZE_STRING);
//   $success = 'true';
//    echo json_encode($success);
    
    //additional php validation
    if(strlen($name)<3){ // If length is less than 4 it will output JSON error.
        $output = array("info" => "Podane imię jest zbyt krótkie.", "success" => false);
        print (json_encode($output));
        die;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //email validation
        $output = array("info" => "Wygląda na to, że adres e-mail jest nieprawidłowy. Nie będę wiedziała komu odpisać :(", "success" => false);
        print (json_encode($output));
        die;
    }
    if(!filter_var($phone, FILTER_SANITIZE_NUMBER_FLOAT)){ //check for valid numbers in phone number field
        $output = array("info" => "Numer telefonu wygląda na nieprawidłowt", "success" => false);
        print (json_encode($output));
        die;
    }
    if(strlen($message)<20){ //check emtpy message
        $output = array("info" => "Wiadomość jest zbyt krótka byśmy mogli się lepiej poznać. Może napiszesz swój ulubiony kawał na rozluźnienie?", "success" => false);
        print (json_encode($output));
        die;
    }
   
    //email body
    $message_body = "Treść wiadomości: ".$message."\r\n\r\nImię: ".$name."\r\nWysłano z: ".$email."\r\nNumer telefonu: ".$phone;
   
    //proceed with PHP email.
    $headers = 'From: '.$name.'' . "\r\n" .
    'Reply-To: '.$email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
   
    $send_mail = mail($to_email, $subject, $message_body, $headers);
   
    if(!$send_mail)
    {
        //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
        $output = array("info" => "Wystąpił wewnętrzny problem, nie można wysłać maila. Może spróbuj skrobnąć ze bezpośrednio swojej poczty na foto@olganoga.com?", "success" => false);
        print (json_encode($output));
        die;
    }else{
        $output = array("text" => "Cześć <b>$name</b>, miło cię poznać! Odezwę się już niebawem.", "info" => "Wiadomość została poprawnie przesłana!", "success" => true);
        print (json_encode($output));
        die;
    }
}
?>

    <!DOCTYPE html>
    <html lang="pl">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="description" content="">
        <meta name="author" content="ilugrafia.pl">
        <title>Olga Noga Fotografia</title>
        <meta name="description" content="Olga Noga professional wedding photography, fashion photoshoot and other in the area of Pszczyna, Bielsko and Katowice.">
        <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico" />

        <!-- Bootstrap Core CSS -->
        <link href="css/styles.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/new-file.css" rel="stylesheet">
        <link rel="stylesheet" href="css/magnific-popup.css">

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
                    <a class="navbar-brand left" data-scroll href="http://olganoga.com/project.php"><img src="img/ONlogoHW.png" alt="" class="logo">
                    </a>
                    <ul class="nav navbar-nav visible-lg-block visible-md-block">
                        <li><a data-scroll href="#about">O MNIE</a>
                        </li>
                        <li><a data-scroll href="#portfolio">PORTFOLIO</a>
                        </li>
                        <li><a data-scroll href="#contact">KONTAKT</a>
                        </li>
                    </ul>

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
                    <span class="beginning">Chcesz</span> 
                    <span class="cd-words-wrapper waiting">
                        <b class="is-visible">sesję komercyjną?</b>
                        <b>sesję ślubną?</b>
                        <b>glamour?</b>
                    </span>
                </h1>
                    </div>
                    <h2>Jesteś tylko parę kroków, od<br /> uzyskania swojej najlepszej sesji</h2>
                </section>
                <!-- cd-intro -->

                <a data-scroll href="#about"> Dowiedz się więcej </a>

                <section class="scrollDown">
                    <p class="scrollInside">zjedź niżej</p>
                </section>


            </div>
        </div>

        <!-- Swiper -->
        <div class="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-3 opis">
                        <h2 id="about" class="imie">nazywam się <span class="olganoga"><img src="img/olgaON.png" alt=""></span></h2>
                        <!--                    <h2 id="about" class="imie">nazywam się <span class="olganoga2"><b>OLGANOGA</b></span></h2>-->


                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <ul class="badges">
                            <li class="badge"><img src="img/lips22.png" alt="">
                                <h5>glamour / fashion</h5></li>
                            <li class="badge">
                                <img src="img/head2.png" alt="">
                                <h5>portret</h5>
                            </li>
                            <li class="badge">
                                <img src="img/circ2.png" alt="">
                                <h5>oraz inne</h5></li>
                            <h3>dla agencji oraz osób prywatnych</h3>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 hidden-xs">
                        <img class="selfie" src="img/selfie.png" alt="">
                    </div>
                    <div class="col-md-2 col-sm-1"></div>
                    <div class="col-md-6 col-sm-7 col-xs-12">

                        <p class="omnie">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <hr>
                        <p class="sprzet">PRACUJĘ Z CANONEM 500D | 50MM 1.4 | 70-200MM 2.8</p>
                        <ul>
                            <li>25 sesji</li>
                            <li>2345 zdjęć</li>
                            <li>24 followersów</li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="cite">Do what you like. When you start doing what you really like, you'll never have to work a single day.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="container portfolio">
            <h2 id="portfolio" class="imie">moje <span class="olganoga"><img src="img/portfo.png" alt=""></span></h2>
            <div class="row">
                <div class="col-xs-6 col-md-4 grid">
                    <figure class="effect-lily">
                        <img src="img/portfolio/judyramateusz2.jpg" alt="Olga Noga session" />
                        <figcaption>
                            <h3>Judyta& <span>Mateusz</span></h3>
                            <p>Wedding session</p>
                            <a data-links="img/judytamateusz/judyramateusz1.jpg,img/judytamateusz/judyramateusz2.jpg, img/judytamateusz/judyramateusz3.jpg, img/judytamateusz/judyramateusz4.jpg, img/judytamateusz/judyramateusz5.jpg, img/judytamateusz/judyramateusz6.jpg, img/judytamateusz/judyramateusz7.jpg" , class="magnific-gallery"></a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xs-6 col-md-4 grid">
                    <figure class="effect-lily">
                        <img src="img/portfolio/weronika-janosz1.jpg" alt="Olga Noga with Weronika" />
                        <figcaption>
                            <h3>Weronika <span>Janosz</span></h3>
                            <p>Fashion photoshoot</p>
                            <a data-links="img/wera/weronika-janosz1.jpg, img/wera/weronika-janosz2.jpg, img/wera/weronika-janosz3.jpg, img/wera/weronika-janosz4.jpg, img/wera/weronika-janosz5.jpg, img/wera/weronika-janosz6.jpg" , class="magnific-gallery"></a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xs-6 col-md-4 grid">
                    <figure class="effect-lily">
                        <img src="img/portfolio/agata-malkiewicz3.jpg" alt="Olga Noga with Agata" />
                        <figcaption>
                            <h3>Agata <span>Małkiewicz</span></h3>
                            <p>Fashion photoshoot</p>
                            <a data-links="img/agata/agata-malkiewicz2.jpg, img/agata/agata-malkiewicz3.jpg, img/agata/agata-malkiewicz4.jpg, img/agata/agata-malkiewicz55.jpg, img/agata/agata-malkiewicz6.jpg" , class="magnific-gallery"></a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xs-6 col-md-4 grid">
                    <figure class="effect-lily">
                        <img src="img/portfolio/dominika-ryszka2.jpg" alt="Olga Noga photography Dominika" />
                        <figcaption>
                            <h3>Dominika <span>Ryszka</span></h3>
                            <p>Fashion photoshoot</p>
                            <a data-links="img/dominika/dominika-ryszka1.jpg, img/dominika/dominika-ryszka3.jpg, img/dominika/dominika-ryszka4.jpg, img/dominika/dominika-ryszka5.jpg, img/dominika/dominika-ryszka2.jpg" , class="magnific-gallery"></a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xs-6 col-md-4 grid">
                    <figure class="effect-lily">
                        <img src="img/portfolio/magdalena-szyjka7.jpg" alt="Olga Noga with Magdalena Szyjka" />
                        <figcaption>
                            <h3>Magdalena <span>Szyjka</span></h3>
                            <p>Commercial session</p>
                            <a data-links="img/magdalena/magdalena-szyjka2.jpg, img/magdalena/magdalena-szyjka1.jpg, img/magdalena/magdalena-szyjka3.jpg, img/magdalena/magdalena-szyjka4.jpg, img/magdalena/magdalena-szyjka5.jpg" , class="magnific-gallery"></a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xs-6 col-md-4 grid">
                    <figure class="effect-lily">
                        <img src="img/portfolio/magdalena-zawila7.jpg" alt="Magdalena Zawiła & Olga Noga" />
                        <figcaption>
                            <h3>Magdalena <span>Zawiła</span></h3>
                            <p>Fashion photoshoot</p>
                            <a data-links="img/magdalenazawia/magdalena-zawila1.JPG, img/magdalenazawia/magdalena-zawila2.JPG, img/magdalenazawia/magdalena-zawila3.JPG, img/magdalenazawia/magdalena-zawila4.JPG, img/magdalenazawia/magdalena-zawila5.JPG" , class="magnific-gallery"></a>
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
                            <a data-links="img/zofiacekiera/zofia-cekiera1.jpg, img/zofiacekiera/zofia-cekiera2.jpg, img/zofiacekiera/zofia-cekiera3.jpg, img/zofiacekiera/zofia-cekiera4.jpg, img/zofiacekiera/zofia-cekiera5.jpg" , class="magnific-gallery"></a>
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
            <!--        <h2 id="contact">Contact</h2>-->
            <article class="row">
                <div class="col-md-12 kontakt2">
                    <h2 id="contact"><span>Poniżej możesz się ze mną <b>skontaktować</b>.</span></h2>
                    <p>e-mail | <b>kontakt@olganoga.com</b></p>
                    <p>dostępność | pon-pt pomiędzy 8:00 a 16:00.</p>
                    <a class="fb" target="_blank" href="https://www.facebook.com/OlgaNogaPhotography"><img src="img/fb2.png" alt="">
                    </a>
                    <a class="ig" target="_blank" href="https://instagram.com/olganoga/"><img src="img/IG.png" alt="">
                    </a>

                </div>
            </article>
            <article class="row">
                <div class="col-md-12">
                    <div class="hello">Cześć, tutaj możesz do mnie skrobnąć.</div>
                </div>
                <div class="col-md-12 kontakt">
                    <!--
                <div class="alert">Hello</div>
                <div class="hello">Cześć.</div>
-->
                    <form id="form" class="myForm" action="mail.php" method="POST">
                        <div class="myFormColumn">
                            <div class="col-md-4">

                                <input class="inputField" type="text" id="name" name="name" placeholder="Imię">
                            </div>
                            <div class="col-md-4">

                                <input class="inputField" type="email" id="email" name="email" placeholder="Adres e-mail">
                            </div>
                            <div class="col-md-4">

                                <input class="inputField" type="number_format" id="phone" name="phone" placeholder="Numer telefonu">
                            </div>
                            <div class="col-md-12">

                                <textarea id="message" name="message" placeholder="Twoja wiadomość na razie jest pusta, ale nie musi taka być"></textarea>
                            </div>
                        </div>
                        <div class="submitForm">
                            <input class="submit" type="submit" value="Wyślij wiadomość">
                        </div>
                    </form>
                </div>


            </article>
        </div>


        <footer>
            <p>Handcrafted by Ilugrafia.pl</p>
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
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/main.js"></script>
        <script type="text/javascript" src="js/mail.js"></script>
        <script src="js/jquery.magnific-popup.js"></script>


        <script>
            $('.magnific-gallery').each(function (index, value) {
                var gallery = $(this);
                var galleryImages = $(this).data('links').split(',');
                var items = [];
                for (var i = 0; i < galleryImages.length; i++) {
                    items.push({
                        src: galleryImages[i],
                        title: ''
                    });
                }
                gallery.magnificPopup({
                    mainClass: 'mfp-fade',
                    items: items,
                    gallery: {
                        enabled: true,
                        tPrev: $(this).data('prev-text'),
                        tNext: $(this).data('next-text')
                    },
                    type: 'image'
                });
            });
        </script>
        <!-- Resource jQuery -->
    </body>
    </html>
