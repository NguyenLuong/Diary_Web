<?php
    include '../model/diary_model.php';
    $d=new DiaryModel();
    $did=$_GET['did'];
    if($d->delete($did)){
        $back=$_SERVER['HTTP_REFERER'];
        header('Location: '.$back);
        exit();
    }
?>
