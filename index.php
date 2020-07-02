<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GPT - Gatos para todos</title>
    <!-- BOOTSTRAP STYLES -->   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- OWN STYLES -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="LineIcons/style.css">
    <!-- ICOMOON --> 

    <!-- ANIMATE.CSS -->

    <!-- GOOGLEFONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100&family=Sirin+Stencil&display=swap" rel="stylesheet">
    <!-- SLIDESHOW RESOURCES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald:500" rel="stylesheet">
    <!-- BOOTSTRAP SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
    <!-- FAVICON -->
    <link rel="shortcut icon" href="Imagenes/logo.svg" type="image/x-icon">



    <!-- SCRIPTS -->
    <script>!function(e){"undefined"==typeof module?this.charming=e:module.exports=e}(function(e,n){"use strict";n=n||{};var t=n.tagName||"span",o=null!=n.classPrefix?n.classPrefix:"char",r=1,a=function(e){for(var n=e.parentNode,a=e.nodeValue,c=a.length,l=-1;++l<c;){var d=document.createElement(t);o&&(d.className=o+r,r++),d.appendChild(document.createTextNode(a[l])),n.insertBefore(d,e)}n.removeChild(e)};return function c(e){for(var n=[].slice.call(e.childNodes),t=n.length,o=-1;++o<t;)c(n[o]);e.nodeType===Node.TEXT_NODE&&a(e)}(e),e}); </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
</head>
<body>
    <!-- BARRA DE NAVEGACION -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand logo" href="index.php">
                <img class="navimg" src="Imagenes/logo.svg" alt="">     
                G.P.T
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <!-- DROPDOWN PRUEBAS -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal"><span class="icon-key"></span> Log In</a>
                        <!-- TEST MODAL WINDOW -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="document" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel"> Acceder a<img src="Imagenes/logo.svg" width="50px"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="includes/login.php" method="POST"> 
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <h4>Usuario:</h4>
                                                <input type="text" name="user" class="form-control" placeholder="Escribe tu Nombre de usuario" required>
                                            </div>
                                            <div class="form-group">
                                                <h4>Contraseña:</h4>
                                                <input type="password" name="pass" class="form-control" placeholder="Escribe tu contraseña" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar <span class="icon-hazardous"></span></button>
                                            <button type="Submit" class="btn btn-outline-danger" name="login">Iniciar Sesion <span class="icon-heart"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class="swiper-container slideshow">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <div class="slide-image" style="background-image: url(Imagenes/slide1.jpg)"></div>
                    <span class="slide-title t-b"></span>
                </div>            
                <div class="swiper-slide slide">
                    <div class="slide-image" style="background-image: url(Imagenes/slide2.jpg)"></div>
                    <span class="slide-title t-b"></span>
                </div>            
                <div class="swiper-slide slide">
                    <div class="slide-image" style="background-image: url(Imagenes/slide3.jpg)"></div>
                    <span class="slide-title t-b"></span>
                </div>
                <div class="swiper-slide slide">
                    <div class="slide-image" style="background-image: url(Imagenes/slide4.jpg)"></div>
                    <span class="slide-title t-b"></span>
                </div>
            </div>
            <div class="slideshow-pagination"></div>
            <div class="slideshow-navigation">
                <div class="slideshow-navigation-button prev"><span class="fas fa-chevron-left"></span></div>
                <div class="slideshow-navigation-button next"><span class="fas fa-chevron-right"></span></div>
            </div>
        </div>
    </section>
    <script src="js/Slideshow.js"></script>
</body>
</html>
