<?php

    $img = utf8_decode($_POST['img']);
    $foto = utf8_decode($_POST['foto']);

    $data['img'] = $img;
    $data['foto'] = $foto;

    return $data;
	  

?>