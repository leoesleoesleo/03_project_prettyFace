<?php                


    //comprobamos que sea una petición ajax
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        


        /*
        //obtenemos el archivo a subir
        $files = $_FILES['archivo']['name'];
     
         $i = 0;
        //comprobamos si el archivo ha subido
        foreach($files as $file)
        {
            if (move_uploaded_file($_FILES['archivo']['tmp_name'][$i],"files/".$_FILES['archivo']['name'][$i]))
            {
                echo "EL archivo " . $_FILES['archivo']['name'][$i] . " ha subido correctamente<br>";
                $i++;
            }
        }
        */

            // Desactivar toda notificación de error
    error_reporting(0);

    if(isset($_FILES['images'])){

    //Funciones optimizar imagenes

    //Ruta de la carpeta donde se guardarán las imagenes
    $patch='files';

    //Parámetros optimización, resolución máxima permitida
    $max_ancho = 8000;
    $max_alto = 7000;


    if($_FILES['images']['type']=='image/png' || $_FILES['images']['type']=='image/jpeg' || $_FILES['images']['type']=='image/gif'){
      
    $medidasimagen= getimagesize($_FILES['images']['tmp_name']);

    //Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
      if($medidasimagen[0] < 5000 && $_FILES['images']['size'] < 8509354){
      /*
      print_r("img aceptables <br>");
      print($medidasimagen[0]); 
      print_r($_FILES['images']['size']);die();
      */

      $nombrearchivo=$_FILES['images']['name'];
      move_uploaded_file($_FILES['images']['tmp_name'], $patch.'/'.$nombrearchivo);      
    }
    //Si no, se generan nuevas imagenes optimizadas
    else {
    
    /*
    print_r("Imag optimizadas");die();  
    print($medidasimagen[0]); 
    print_r($_FILES['images']['size']);die();
    */

    $nombrearchivo=$_FILES['images']['name'];

    //Redimensionar
    $rtOriginal=$_FILES['images']['tmp_name'];

    if($_FILES['images']['type']=='image/jpeg'){
    $original = imagecreatefromjpeg($rtOriginal);
    }
    else if($_FILES['images']['type']=='image/png'){
    $original = imagecreatefrompng($rtOriginal);
    }
    else if($_FILES['images']['type']=='image/gif'){
    $original = imagecreatefromgif($rtOriginal);
    }
     
    list($ancho,$alto)=getimagesize($rtOriginal);

    $x_ratio = $max_ancho / $ancho;
    $y_ratio = $max_alto / $alto;


    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
        $ancho_final = $ancho;
        $alto_final = $alto;
    }
    elseif (($x_ratio * $alto) < $max_alto){
        $alto_final = ceil($x_ratio * $alto);
        $ancho_final = $max_ancho;
    }
    else{
        $ancho_final = ceil($y_ratio * $ancho);
        $alto_final = $max_alto;
    }

    $lienzo=imagecreatetruecolor($ancho_final,$alto_final); 

    imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
     
    imagedestroy($original);
     
    $cal=8;

    if($_FILES['images']['type']=='image/jpeg'){
    imagejpeg($lienzo,$patch."/".$nombrearchivo);
    }
    else if($_FILES['images']['type']=='image/png'){
    imagepng($lienzo,$patch."/".$nombrearchivo);
    }
    else if($_FILES['images']['type']=='image/gif'){
    imagegif($lienzo,$patch."/".$nombrearchivo);
    }

    }

      }
      else 
      echo "Error";
      //print_r('Error! Imagen no soportada.');  
    }

    // Ejecutar Modelo

    $path = str_replace('/upload.php', '', $_SERVER['SCRIPT_FILENAME']);  
    $dir_subida  = $path.'/files/';
    $fichero_subido = $dir_subida.$nombrearchivo;
    $salida= array(); 
    
    $ruta = "C:\Users\drait_tech\Miniconda3\\envs\drait\python C:\\xampp\htdocs\prettyFace\py\\prettyface_model\scripts\label_image.py --graph=C:\\xampp\htdocs\prettyFace\py\\prettyface_model\\tf_files\\retrained_graph.pb --image=".$fichero_subido; 

    exec($ruta,$salida); // escupe la linea  


//V1
    /*
    if($salida) {
        
            $time     = $salida[1];
            $v_cat1   = strtok($salida[3], " \n\t");
            $v_cat2   = strtok($salida[4], " \n\t");

            if ($v_cat1 == 'lindas'){
                $lindas = substr($salida[3],-8,7);
                $feas   = substr($salida[4],-8,7);
            } elseif ($v_cat1 == 'feas') {
                $feas   = substr($salida[3],-8,7);
                $lindas = substr($salida[4],-8,7);
            }


            if ($lindas >= 0.99) {
                $res_model = 'uhlala';
            } elseif ($lindas >= 0.95) {
                $res_model = 'hot';
            } elseif ($lindas >= 0.80) {
                $res_model = 'like';
            } elseif ($lindas >= 0.60) {
                $res_model = 'humm';
            } elseif ($lindas >= 0.30) {
                $res_model = 'good';
            } elseif ($lindas < 0.30) {
                $res_model = 'nahh';            
            } else {
                $res_model = 'No se reconoce ninguna cara !';
            }
            */

            
    if($salida) {
        
            $time     = $salida[1];
            $v_cat1   = strtok($salida[3], " \n\t");
            $v_cat2   = strtok($salida[4], " \n\t");
            $v_cat3   = strtok($salida[5], " \n\t");

            if ($v_cat1 == 'lindas' && $v_cat2 == 'feas' && $v_cat3 == 'otros'){
                $lindas = substr($salida[3],-8,7);
                $feas   = substr($salida[4],-8,7);
                $otros  = substr($salida[5],-8,7);
            } elseif ($v_cat1 == 'lindas' && $v_cat2 == 'otros' && $v_cat3 == 'feas') {
                $lindas   = substr($salida[3],-8,7);
                $otros = substr($salida[4],-8,7);
                $feas  = substr($salida[5],-8,7);
            } elseif ($v_cat1 == 'feas' && $v_cat2 == 'lindas' && $v_cat3 == 'otros') {
                $feas   = substr($salida[3],-8,7);
                $lindas = substr($salida[4],-8,7);
                $otros  = substr($salida[5],-8,7);
            } elseif ($v_cat1 == 'feas' && $v_cat2 == 'otros' && $v_cat3 == 'lindas') {
                $feas   = substr($salida[3],-8,7);
                $otros = substr($salida[4],-8,7);
                $lindas  = substr($salida[5],-8,7);
            }elseif ($v_cat1 == 'otros' && $v_cat2 == 'feas' && $v_cat3 == 'lindas') {
                $otros   = substr($salida[3],-8,7);
                $feas = substr($salida[4],-8,7);
                $lindas  = substr($salida[5],-8,7);
            } elseif ($v_cat1 == 'otros' && $v_cat2 == 'lindas' && $v_cat3 == 'feas') {
                $otros   = substr($salida[3],-8,7);
                $lindas = substr($salida[4],-8,7);
                $feas  = substr($salida[5],-8,7);
            }

            print_r("Otros: ".$otros);
            print_r("Lindas: ".$lindas);
            print_r("Feas: ".$feas);


            if ($lindas >= 0.99) {
                $res_model = 'uhlala';
            } elseif ($lindas >= 0.95) {
                $res_model = 'hot';
            } elseif ($lindas >= 0.85) {
                $res_model = 'like';
            } elseif ($feas >= 0.99) {
                $res_model = 'nahh';
            } elseif ($feas >= 0.90) {
                $res_model = 'good';
            } elseif ($feas >= 0.85) {
                $res_model = 'Humm';   
            } elseif ($otros >= 0.85) {
                $res_model = 'No se reconoce ninguna cara !';             
            } else {
                $res_model = 'No se reconoce ninguna cara !';
            }            

            //echo $res_model;
            

            ?>
            <br>
            <?php print_r($salida); ?>
            <br>
            <?php print_r($res_model);die(); ?>

            <!--<h3>Felicitaciones !!</h3>-->

            <section id="portfolio">
              <div class="container-fluid p-0">
                <div class="row no-gutters">
                  <div class="col-lg-12 col-sm-12">
                    <img id="img_res" width="500px" height="500px" class="img-fluid" src="img/res/p/<?php echo $res_model ?>.png" alt="" >
                    <div class="portfolio-box-caption">
                      <div class="project-category text-white-50">
                      </div>
                      <div class="project-name">
                      </div>
                    </div>
                  </div>          
                </div>
              </div>  
            </section>
            <input style="display:none;" id="foto_" type="text" value="files/<?php echo $nombrearchivo ?>">
            <input style="display:none;" id="img_res_" type="text" value="img/res/p/<?php echo $res_model ?>">
            <br>

            <?php

            switch ($res_model) {
                case 'uhlala':
                    echo "<p class='text-white-50 mb-4'>UH LA LA: Felicitaciones tienes el resultado más alto; la inteligencia artificial de Pretty Face te recomienda compartir esta foto.</p>";
                    break;
                case 'hot':
                    echo "<p class='text-white-50 mb-4'>HOT: Buen resultado !! La inteligencia artificial Pretty Face te recomienda compartir esta foto.</p>";
                    break;
                case 'like':
                    echo "<p class='text-white-50 mb-4'>LIKE: Tu resultado no está mal pero puede ser mejor; Pretty Face te recomienda compartir esta foto.</p>";
                    break;
                case 'humm':
                    echo "<p class='text-white-50 mb-4'>HUMM: Intenta reirte o enfocar mejor tu cara para tener un mejor resultado, la inteligencia artificial de Pretty Face te invita a seguir intentando.</p>";
                    break;
                case 'nahh':
                    echo "<p class='text-white-50 mb-4'>NAHH: No te desanimes intenta reirte o enfocar mejor tu cara para tener un mejor resultado, la inteligencia artificial de Pretty Face te invita a seguir intentando.</p>";
                    break;        
            }

            ?>
            <h3></h3>  

            <?php

        } else {
            $res = 'Imagen no admitida !';
        }



    }else{
         echo "Error"; 
         print_r('Error! Imagen no soportada');
    }




?> 