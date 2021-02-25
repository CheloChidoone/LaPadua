<?php 
session_start();

require "PHP/Template.php";

include 'LIB/signIn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/bootstrap.min.css"> 
      
    <?php include "INC/headMeta.inc";?>
    
    <link rel="stylesheet" href="CSS/jquery.mb.YTPlayer.css">
    <link rel="stylesheet" href="CSS/modal-video.min.css">
    <link rel="stylesheet" href="CSS/styleIndex.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
    
    
    <script src="JS/jquery-3.3.1.min.js"></script>
    
    <script src="JS/bootstrap.min.js"></script>
    
    <script src="JS/isotope.pkgd.min.js"></script>
    
    <script src="JS/jquery.mb.YTPlayer.js"></script>
    
    <script src="JS/float-panel.js"></script>
    
    <script src="JS/modal-video.js"></script>

</head>
<body>
    
    <!-- The Modal -->
    <div id="myModal" class="modal">
           <div id="backmodal"></div>
        <!-- The Close Button -->
        <span class="close">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01">

        <!-- Modal Caption (Image Text) -->
        <div id="caption"></div>
    </div>  
        
    <?php include "INC/header.inc";?>    
        
    <section id="home" class="anchor">
        <a name="ahome">&nbsp;</a>
        <div id="carrusel">
            <div id="carouselIndicators" class="carousel slide" data-ride="carousel" data-interval="5000" data-pause="false">
              <ol class="carousel-indicators">
                <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselIndicators" data-slide-to="1"></li>
                <li data-target="#carouselIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="imagenesSlider" id="primeraimagen"></div>
                  <div class="carousel-caption">
                      <h1 class="TituloMainSlider">Bienvenido a La Padua Pizzeria!</h1>
                      <p class="SecondTitleMainSlider">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. "</p>
                      <a class="btn butonSlider" href="menu.php">¡Ordena Ahora</a>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="imagenesSlider" id="segundaimagen"></div>
                  <div class="carousel-caption">
                      <h1 class="TituloMainSlider">Bienvenido a La Padua Pizzeria!</h1>
                      <p class="SecondTitleMainSlider">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. "</p>
                      <a class="btn butonSlider" href="menu.php">¡Ordena Ahora</a>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="imagenesSlider" id="terceraimagen"></div>
                  <div class="carousel-caption">
                      <h1 class="TituloMainSlider">Bienvenido a La Padua Pizzeria!</h1>
                      <p class="SecondTitleMainSlider">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. "</p>
                      <a class="btn butonSlider" href="menu.php">¡Ordena Ahora</a>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>
    </section>
    
    <section id="sobre" class="anchor">
        <a name="asobre">&nbsp;</a>
        
        <?php 
            $profile = new Template("TEMP/titulo_Section.temp");
            $profile->set("titulo", "Sobre");
            echo $profile->output();
        ?>
        
        <div class="wrapperSobre">
            <div class="containerSVG">
              <svg class="stretchSVG" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 100" preserveAspectRatio="none">
                <path class="cls-1" d="M 0 0 0 100 200 100 120 0 Z"/>
              </svg>
            </div>
            <div class="textSobre slideanim">
                <h3>Mision</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, autem eos quo nulla dolore! Nesciunt reiciendis saepe, eaque sunt! Tenetur laborum error cum, libero ad eligendi soluta unde, non natus.</p>
            </div>
        </div>
        <div class="wrapperSobre">
           <div class="textSobre slideanim">
                <h3>Vision</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, autem eos quo nulla dolore! Nesciunt reiciendis saepe, eaque sunt! Tenetur laborum error cum, libero ad eligendi soluta unde, non natus.</p>
            </div>
            <div class="containerSVG">
              <svg class="stretchSVG" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 100" preserveAspectRatio="none">
                <path class="cls-2" d="M 200 0 200 100 0 100 80 0 Z"/>
              </svg>
            </div>
        </div>
        <div class="wrapperSobre">
            <div class="containerSVG">
              <svg class="stretchSVG" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 100" preserveAspectRatio="none">
                <path class="cls-3" d="M 0 0 0 100 200 100 120 0 Z"/>
              </svg>
            </div>
            <div class="textSobre slideanim">
                <h3>Meta</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, autem eos quo nulla dolore! Nesciunt reiciendis saepe, eaque sunt! Tenetur laborum error cum, libero ad eligendi soluta unde, non natus.</p>
            </div>
        </div>
    </section>
    
    <section id="galeria" class="anchor">
        <a name="agaleria">&nbsp;</a>
        
        <?php 
            $profile = new Template("TEMP/titulo_Section.temp");
            $profile->set("titulo", "Galeria");
            echo $profile->output();
        ?>
        
        <div class="wraper">
            <div class="iso-nav">
                <ul>
                    <li class="active" data-filter="*">Todos</li>
                    <li data-filter=".pizzas">Pizzas</li>
                    <li data-filter=".hamburgesas">Hamburgesas</li>
                    <li data-filter=".hotdogs">Hot-Dogs</li>
                    <li data-filter=".botanas">Botanas</li>
                    <li data-filter=".bebidas">Bebidas</li>
                    <li data-filter=".cervezas">Cervezas</li>
                    <li data-filter=".postres">Postres</li>
                </ul>
            </div>
            <div class="main-iso">
                <div class="item pizzas">
                   <div class="imgFilter2 videoModal" data-video-id="o7isWuT-IXw">
                        <figure><img data-video-id="2tJIgwdhRjE" alt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus reiciendis ipsa perspiciatis quam fugit voluptatibus qui, tenetur quod adipisci voluptate velit recusandae impedit ea, repellendus nostrum. Accusamus sit aliquam, ducimus." src="https://img.youtube.com/vi/o7isWuT-IXw/hqdefault.jpg" ></figure>
                   </div>
                </div>
                <div class="item pizzas">
                   <div class="imgFilter">
                       <figure><img class="imagenModal" alt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima blanditiis quis laudantium veritatis, voluptatibus fugit facilis doloribus eaque eum asperiores velit, soluta incidunt molestiae veniam vero animi consectetur dolore officiis?" src="IMG/1.jpg" ></figure>
                   </div>
                </div>
                <div class="item pizzas">
                   <div class="imgFilter">
                       <figure><img class="imagenModal" alt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic repudiandae tempore ea, minima labore culpa sapiente dignissimos, dicta eveniet sit esse earum praesentium, quos repellendus velit perspiciatis repellat! Eius, suscipit!" src="IMG/2.jpg" ></figure>
                   </div>
                </div>
                <div class="item pizzas">
                   <div class="imgFilter">
                       <figure><img class="imagenModal" alt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur asperiores soluta cupiditate ex animi perferendis natus cumque autem, esse non amet nisi sint est, nobis ad maxime corrupti. Nesciunt, error." src="IMG/3.jpg" ></figure>
                   </div>
                </div>
                <div class="item hamburgesas">
                   <div class="imgFilter">
                       <figure><img class="imagenModal" alt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam animi possimus aliquid eius nihil, sit, pariatur repudiandae sequi earum exercitationem eum delectus non blanditiis voluptate debitis cum beatae soluta, voluptas." src="IMG/4.jpg" ></figure>
                   </div>
                </div>
                <div class="item hamburgesas">
                   <div class="imgFilter">
                      <figure><img class="imagenModal" alt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus omnis sed alias repudiandae architecto doloremque esse. Totam, obcaecati culpa et incidunt quas earum quia minima laboriosam qui dolor ab nobis?" src="IMG/5.jpg" ></figure>
                   </div>
                </div>
                <div class="item bebidas">
                    <div class="imgFilter">
                       <figure><img class="imagenModal" alt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum cumque provident ad illum numquam perspiciatis minus quaerat, odit libero quo quod, a omnis. Quisquam provident, illo facilis, libero incidunt debitis!" src="IMG/6.jpg" ></figure>
                   </div>
                </div>
                <div class="item botanas">
                    <div class="imgFilter">
                       <figure><img class="imagenModal" alt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores rerum optio aspernatur quaerat quidem similique quibusdam consequatur ut a! Sequi, nostrum ab? Et sed ratione distinctio, eveniet dolores nobis accusantium." src="IMG/7.jpg" ></figure>
                   </div>
                </div>    
                <div class="item hotdogs">
                    <div class="imgFilter">
                       <figure><img class="imagenModal" alt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum earum velit odio repudiandae vitae, consectetur nam, quaerat assumenda sapiente in quam praesentium possimus, nihil voluptatibus harum. Quia eligendi reprehenderit, tenetur." src="IMG/8.jpg" ></figure>
                   </div>
                </div>
                <div class="item cervezas">
                    <div class="imgFilter">
                       <figure><img class="imagenModal" alt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores totam omnis accusamus id veritatis animi aspernatur laudantium magni aut, non nihil facilis fugiat illum molestias nulla perspiciatis similique, amet quas." src="IMG/9.jpg" ></figure>
                   </div>
                </div>
                <div class="item postres">
                    <div class="imgFilter">
                       <figure><img class="imagenModal" alt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam velit molestiae doloremque nesciunt quae architecto reprehenderit, distinctio, laudantium error, porro veritatis? Amet rerum ex magnam saepe, nesciunt distinctio ad excepturi." src="IMG/10.jpg" ></figure>
                   </div>
                </div>                                     
            </div>
        </div>
    </section>
    
    <section id="siguenos" class="anchor">
        <a name="asiguenos">&nbsp;</a>
        <div id="siguenosFondo"></div>
        <div id="wrapperSiguenos">
            <?php 
                $profile = new Template("TEMP/titulo_Section.temp");
                $profile->set("titulo", "Siguenos");
                echo $profile->output();
            ?>
            <!--SECCION REDES SOCIALES   -->
            <div id="redesSociales">
                <a href="https://www.facebook.com"></a>
                <a href="https://www.instagram.com"></a>
                <a href="https://www.youtube.com"></a>
            </div> 
        </div>
    </section>
    
    <section id="contacto" class="anchor">
        <a name="acontacto">&nbsp;</a>
                  <!-- division para la animacion del home -->
        <div class="animation">
            <div id="particles-js"></div>
        </div> 
        <?php 
            $profile = new Template("TEMP/titulo_Section.temp");
            $profile->set("titulo", "Contacto");
            echo $profile->output();
        ?>
        <div id="wrapperContacto">
            <p>Mantente en Contacto con Nosotros. Marcanos a nuestro telefono o escríbenos un mensaje comentanos tus dudas o sugerencias y nos comunicaremos contigo a la brevedad.</p>
            <p id="nuestroTel">Nuestro Teléfono: 
                <a href="tel:999-352-2085">9999999999</a>
            </p>
            <div id="formularioCont">
                <form id="formulario" action="PHP/contact.php" method="POST">
                    <div id="soloInputs">
                        <div class="formCampo">
                        <label for="nombre">Nombre:</label>
                        <input name="nombre" type="text" placeholder="Tu Nombre Completo" required>
                        </div>
                        <div class="formCampo">
                            <label for="correo">Correo:</label>
                            <input name="correo" type="email" placeholder="Tu Correo" required>
                        </div>
                        <div class="formCampo">
                            <label for="telefono">Teléfono:</label>
                            <input name="telefono" type="tel" placeholder="Tu telefono" required>
                        </div>
                    </div>
                    <div class="formCampo">
                        <label for="mensaje">Mensaje:</label>
                        <textarea name="mensaje" placeholder="Tu mensaje" cols="30" rows="7" required></textarea>
                    </div>
                    <div class="formCampo">
                        <input name="enviar" type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <?php include "INC/footer.inc";?>  
    
    <script src="JS/servicesScript.js" ></script>   
    <script src="JS/imagesloaded.pkgd.js" ></script>
    <script src="JS/scriptIndex.js"></script>
    <script src="JS/header.js"></script>
    <script src="JS/slowScroll.js"></script>
    <script src="JS/modal.js"></script>
    <script src="JS/particles.js"></script>
	<script src="JS/app.js"></script>
	<script src="JS/videoIntro.js"> </script>
    <script src="JS/videoModalOptions.js"></script>
    <script src="JS/cookies.js"></script>
    <script src="JS/scriptCarritoItems.js"></script>

</body>
</html>   