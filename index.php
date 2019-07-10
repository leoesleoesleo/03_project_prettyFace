<!DOCTYPE html>
<html lang="en" itemId="http://35.196.148.49/prettyFace" itemScope="true" class="story" xmlns:og="http://opengraphprotocol.org/schema/">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pretty Face</title>

  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- https://www.flaticon.es/packs/social-media-logos-2 -->
  <link rel="shortcut icon" type="image/x-icon" href="http://35.196.148.49/prettyFace/img/logo.png">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- jquery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
  
  <link rel="stylesheet" href="font.css">
  <link rel="stylesheet" href="main.css">
  
  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative.min.css" rel="stylesheet">

  <!-- Facebook 
  http://ogp.me/#types
  -->

  <?php 
    function img(){
      $img = utf8_decode($_POST['img']);
      print_r($img);die();
      $foto = utf8_decode($_POST['foto']);
    }

    $var = 'prettyhead.png';

  ?>

  <meta property="og:url"                content="http://35.196.148.49/prettyFace/" />
  <meta property="og:type"               content="article" />
  <meta property="og:title"              content="PrettyFace ha clasificado esta foto como perfecta para compartir" />
  <meta property="og:description"        content="Pretty Face es la inteligencia artificial que te recomienda que fotos quedas bien y merece ser publicadas. http://www.prettyface.ga/" />
  <meta property="og:image"              content="http://35.196.148.49/prettyFace/img/prettyhead.png" />
  <!--<meta property="og:image:width"        content="200" />
  <meta property="og:image:height"       content="200" />
  <meta property="fb:app_id"             content="200" />-->
  <meta property="fb: app_id" content = "572689073220571" />   
  
  <style type="text/css">

    #ico{
       width:40px;
       height:40px;
       position:absolute; z-index:1;
    }

    #resp{
       width:65px;
       height:65px;
       float:right;
       position:relative; z-index:1;
       margin-top:-20px;
       margin-right: 9%;
    }

    #logosimbolo{
       width:165px;
       height:56px;
       float:left;
       position:relative; z-index:1;
       margin-top: -15px;
       margin-left: 8%;
    }


    #output {
       outline: 15px solid #fff;
       height:200px;
       padding:0px;
       margin-top:30px;
       margin-bottom: -40px;
       filter: drop-shadow(5px 5px 10px #444);
       border-bottom: 70px solid #fff;
    }

    #loading {
       position: absolute;
       top: 75%;
       left: 43%;
       margin-top: -75px;
       margin-left: -75px;
       position:absolute; z-index:10;
    }
  
    .sticky-container{
    padding:0px;
    margin:0px;
    position:fixed;
    right:-130px;
    top:230px;
    width:210px;
    z-index: 1100;
    }
    .sticky li{
        list-style-type:none;
        background-color:#fff;
        color:#efefef;
        height:43px;
        padding:0px;
        margin:0px 0px 1px 0px;
        -webkit-transition:all 0.25s ease-in-out;
        -moz-transition:all 0.25s ease-in-out;
        -o-transition:all 0.25s ease-in-out;
        transition:all 0.25s ease-in-out;
        cursor:pointer;
    }
    .sticky li:hover{
        margin-left:-115px;
    }
    .sticky li img{
        float:left;
        margin:5px 4px;
        margin-right:5px;
    }
    .sticky li p{
        padding-top:5px;
        margin:0px;
        line-height:16px;
        font-size:11px;
    }
    .sticky li p a{
        text-decoration:none;
        color:#2C3539;
    }
    .sticky li p a:hover{
        text-decoration:underline;
    }

    #img_res{
        -webkit-box-shadow: 1px -4px 55px -8px rgba(0,0,0,0.8);
        -moz-box-shadow: 1px -4px 55px -8px rgba(0,0,0,0.8);
         box-shadow: 1px -4px 55px -8px rgba(0,0,0,0.8);border-radius: 280px 280px 280px 280px;
        -moz-border-radius: 280px 280px 280px 280px;
        -webkit-border-radius: 280px 280px 280px 280px;
        border: 0px solid #000000;
    }

  </style>

  <script type="text/javascript">


     function cargar(){
      var barra = document.getElementById('barra')
      barra.value +=10
    }
    
    function hide_borderDemo() {
      $("#borderDemo").hide('slow', function(){
    });
    }

    function show_borderDemo() {
      $("#borderDemo").show('fast', function(){
      });
    } 
    

    function hide_Loading() {
      document.getElementById('oculto').style.display = 'block';
    }

    function show_Loading() {
      document.getElementById('oculto').style.display = 'none';
    }  

    function hide_alert() {
      document.getElementById('alert').style.display = 'block';
    } 

    function hide_alert_2() {
      document.getElementById('alert_2').style.display = 'block';
    } 

    function show_alert() {
      document.getElementById('alert').style.display = 'none';
    } 

    function reload() {
      location.reload();  
    }

    function clasificar_galeria() {
      document.querySelector("#images_galeria").click()
    }

    function clasificar_camara() {    
      document.querySelector("#images_camara").click() 
    }

    function clasificar() {
        var elem = document.getElementById("myBar");   
        var width = 0;
        var id = setInterval(frame, 100);
        function frame() {
          if (width >= 100) {
            clearInterval(id);
            //document.getElementById("myP").className = "w3-text-green w3-animate-opacity";
            //document.getElementById("myP").innerHTML = "Clasificando foto ...";
          } else {
            width++; 
            elem.style.width = width + '%'; 
            var num = width * 1 / 10;
            num = num.toFixed(0)
            document.getElementById("demo").innerHTML = num;
          }
        } 
    }

    function clasificar_click() {
      var images_galeria=$('input#images_galeria').val();
      var images_camara=$('input#images_camara').val();

      if (images_galeria=='' && images_camara=='' ){
            alert('ERROR; debe seleccionar una imagen');
            hide_Loading()
            return;
          }
      show_borderDemo();    
      document.querySelector("#clasificar").click() 
    }

    var openFile = function(event) {
      var input = event.target;
      var reader = new FileReader();
      reader.onload = function(){
        var dataURL = reader.result;
        var output = document.getElementById('output');
        output.src = dataURL;
        show_borderDemo()
      };
      reader.readAsDataURL(input.files[0]);    
    };

  function tensorflow () {
      $.ajax({
              url: 'res.php',
              // data: {'id_requerimiento':id_requerimiento},
              type: "post",
              /*beforeSend: function () {
                        $("div#contenido").html("Procesando, espere por favor...");
                },*/
              dataType: "html", 
              success: function(res){      
                $('div#contenido').html(res);            
              //alert("Registro Eliminado Correctamente");  
              //hide_Loading();  
              }
       });
  }

  function param_img(){
    var img = $('input#img_res_').val();
    var foto = $('input#foto_').val();
    $.ajax({
            url: 'img',
            data: {'img':img,'foto':foto},
            type: "get",
            dataType: "text", 
              
       });
  }

  </script>

  

</head>

<body id="page-top">

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2&appId=572689073220571&autoLogAppEvents=1"></script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '572689073220571',
      cookie     : true,
      xfbml      : true,
      version    : '3.2'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

//Token de acceso facebook
  FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
    console.log(response.authResponse.accessToken);
  }
  });

  FB.api('/me', function(response) {
    console.log(JSON.stringify(response));
  });

</script>
  
  <!-- Navigation 
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>-->

  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h2 class="text-uppercase text-white font-weight-bold">Pretty Face</h2>
          <p class="text-white-50 mb-4">Inteligencia Artificial que te recomienda si publicar y compartir tus fotos.</p>  
          <h3>Aún me encuentro en Desarrollo !</h3> 
          <hr class="divider my-4">

        </div>
        <div class="col-lg-8 align-self-baseline">
          <!--<p class="text-white-75 font-weight-light mb-5">Te hago una recomendación con la foto que me compartas!</p>-->
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#service">Iniciar</a>
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="service">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 text-center">
          <!--<h2 class="text-white mt-0">Iniciar</h2>-->

          <div class="fb-login-button" data-width="800" data-size="medium" data-button-type="continue_with" data-auto-logout-link="false" data-use-continue-as="true"></div>

          <hr class="divider light my-4">
          <!--<button onclick="hide_Loading();clasificar()">mostrar</button>
          <button onclick="show_Loading()">ocultar</button>
          <button onclick="reiniciar_progreso()">reiniciar</button>-->
          

          <p class="text-white-50 mb-4">Sube la foto que quieres compartir ! Elige si tomar una selfie o ir a galeria. </p>          
          <a href="#service" title="Selfie" onclick="clasificar_camara();"><span class="fa fa-camera" style="color:#fff; font-size:100px;padding-right:20px;"></span></a>
          <a href="#service" title="Galeria" onclick="clasificar_galeria();"><span class="fa fa-image" style="color:#fff; font-size:100px;padding-right:20px;"></span></a>          
          <!--<center style="margin:0 auto;" ><img style="margin:0 auto; display:none;" id="loading" src="img/loader.gif" alt="" height="100"/></center>-->

          <center>
            <br>
            <div>
              <div style="display:none;" id="borderDemo" class="col-sm-12 col-md-8 text-center"> 
                <div class="panel-body textoPanelBody">
                  <img style="width:100%;height:100%;" id='output' name="output" class="img-fluid">
                  <!--<img id="resp" src="img/res/m/m_3.png" class="img-fluid">-->
                  <img id="logosimbolo" src="img/pretty_face.png" class="img-fluid">
                  
                  <!--<p id="res_" style="position:absolute; z-index:1; font-family:Curlz MT,garamond,aria-label;font-size:30px;">Good</p>-->
                </div> 
              </div>
            </div>
          </center>


          <br>
          <br>
          <br>

           <!--
          <div class="sticky-container">
              <ul class="sticky">
                  <li>
                      <img src="img/redessocial/facebook.png" width="32" height="32">
                      <p><a href="https://www.facebook.com/programacionnet" target="_blank">Like Us on<br>Facebook</a></p>
                  </li>
                 <li>
                      <img src="images/twitter-circle.png" width="32" height="32">
                      <p><a href="https://twitter.com/noprog" target="_blank">Follow Us on<br>Twitter</a></p>
                  </li>
                  <li>
                      <img src="images/gplus-circle.png" width="32" height="32">
                      <p><a href="https://plus.google.com/programacionnet" target="_blank">Follow Us on<br>Google+</a></p>
                  </li>
                  <li>
                      <img src="images/linkedin-circle.png" width="32" height="32">
                      <p><a href="https://www.linkedin.com/company/programacionnet" target="_blank">Follow Us on<br>LinkedIn</a></p>
                  </li>
                  <li>
                      <img src="images/youtube-circle.png" width="32" height="32">
                      <p><a href="http://www.youtube.com/programacionnet" target="_blank">Subscribe on<br>YouYube</a></p>
                  </li>
                  <li>
                      <img src="images/pin-circle.png" width="32" height="32">
                      <p><a href="https://www.pinterest.com/programacionnet" target="_blank">Follow Us on<br>Pinterest</a></p>
                  </li>
              </ul>
          </div>-->

          <div class="social-bar">
            <a href="https://www.facebook.com/DevCode.la" class="icon icon-facebook" target="_blank"></a>
            <a href="https://twitter.com/DevCodela" class="icon icon-twitter" target="_blank"></a>
            <a href="https://www.youtube.com/c/devcodela" class="icon icon-youtube" target="_blank"></a>
            <a href="https://www.instagram.com/devcodela/" class="icon icon-instagram" target="_blank"></a>
          </div>

           
          <div id="oculto" style="display:none;">
	          <div class="progress">
	            <div id="myBar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="height:24px;width:0"></div>
	          </div>
	          <p id="myP" class="text-white-50 mb-4">Clasificando imagen <span id="demo"></span>0% de 100%</p>
          </div>

          <br>
          <button onclick="clasificar_click();" class="btn btn-light btn-xl js-scroll-trigger">Pretty Face</button>
          <br>
          <br>
          <div id="resultado_model"></div>
          <div id="contenido"></div>          
          <!--<button onclick="tensorflow()">ir</button>-->

        </div>
        
        <form action="upload.php" method="post" enctype="multipart/form-data" name="img_" onchange='openFile(event)'>
	        <input style="display:none;" type="file" name="images" id="images_galeria" accept="image/*">
	        <input style="display:none;" type="file" name="images" id="images_camara" accept="image/*" capture="camera">
	        <input style="display:none;" type="submit" id="clasificar" class="boton">
	    </form>
	    
	    <!--
	    <div class="progress">
	        <div class="bar"></div >
	        <div class="percent">0%</div >
	    </div>
	    
	    <div id="status"></div>
		-->

	    <!--
	    <form action="optimizar_img.php" method="post" class="formulario" enctype="multipart/form-data" name="img_" onchange='openFile(event)'>
	      <div class="formulario-grupo">
	        <input style="display:none;" type="file" name="images" id="images_galeria" accept="image/*"> <br>
	        <input style="display:none;" type="file" name="images" id="images_camara" accept="image/*" capture="camera">
	      </div>
	      <div class="formulario-grupo">
	        <input style="display:none;" id="clasificar" type="submit" value="clasificar" class="boton">
	      </div>
	    </form>
		-->

      </div>
    </div>
  </section>

  <!-- Services Section 
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">At Your Service</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
            <h3 class="h4 mb-2">Sturdy Themes</h3>
            <p class="text-muted mb-0">Our themes are updated regularly to keep them bug free!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
            <h3 class="h4 mb-2">Up to Date</h3>
            <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
            <h3 class="h4 mb-2">Ready to Publish</h3>
            <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
            <h3 class="h4 mb-2">Made with Love</h3>
            <p class="text-muted mb-0">Is it really open source if it's not made with love?</p>
          </div>
        </div>
      </div>
    </div>
  </section>-->

  <!-- Portfolio Section 
  <section id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/4.png">
            <img class="img-fluid" src="img/portfolio/thumbnails/4.png" alt="" style="width: 500px; height: 500px;">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Ver
              </div>
              <div class="project-name">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/5.png">
            <img class="img-fluid" src="img/portfolio/thumbnails/5.png" alt="" style="width: 500px; height: 500px;">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Ver
              </div>
              <div class="project-name">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/2.png">
            <img class="img-fluid" src="img/portfolio/thumbnails/2.png" alt="" style="width: 500px; height: 500px;">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Ver
              </div>
              <div class="project-name">
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  -->

  <!-- Call to Action Section  -->
  <section class="page-section bg-primary">
    <div class="container text-center">
      <h2 class="mb-4">Comentarios</h2>

      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2&appId=572689073220571&autoLogAppEvents=1"></script>

      <!-- Me gusta -->
      <center>
      <div class="fb-like" data-href="http://35.196.148.49/prettyFace/" data-width="1000" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
      </center>

      <!-- comentarios -->
      <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="10"></div>

      <!--<a class="btn btn-light btn-xl" href="https://startbootstrap.com/themes/creative/">Download Now!</a>-->
    </div>
  </section>

  <!-- Contact Section 
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Contacto</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Esta aplicación es mia</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>3004971594</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>

          <a class="d-block" href="mailto:contact@yourwebsite.com">leoesleo1111@gmail.com</a>
        </div>
      </div>
    </div>
  </section>-->



  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright Creado por: Leonardo Patiño Rodriguez &copy; 2019</div>
      <a href="http://35.196.148.49/prettyFace/politica_provacidad.html">nuestra política de privacidad</a>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>


	<script src="jquery.form.js"></script>
	<script>
	(function() 
	{	    
		var bar = $('.bar');
		var percent = $('.percent');
		var status = $('#status');
		   
		$('form').ajaxForm({
		    beforeSend: function() {
		        //status.empty();
		        //var percentVal = '0%';
		        //bar.width(percentVal)
		        //percent.html(percentVal);
		        hide_Loading();
      			clasificar();	
		    },
        dataType: "html", 
		    uploadProgress: function() { //event, position, total, percentComplete
		        //var percentVal = percentComplete + '%';
		        //bar.width(percentVal)
		        //percent.html(percentVal);
				//console.log(percentVal, position, total);
		    },
		    success: function(res) {
		        //var percentVal = '100%';
		        //bar.width(percentVal)
		        //percent.html(percentVal);
            $('div#resultado_model').html(res); 
		        tensorflow();
		    },
			complete: function(xhr) {
				//status.html(xhr.responseText);
				show_Loading();

			}
		}); 
	})();       
	</script>

</body>

</html>


