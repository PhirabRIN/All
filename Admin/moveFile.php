<?php 
    function moveFile($name){
        $profile=rand(1,10000).'_'.$_FILES[$name]['name'];
        $tmp_name=$_FILES[$name]['tmp_name'];
        $path='../Image/'.$profile;
        move_uploaded_file($tmp_name,$path);
        return $profile;
    }
