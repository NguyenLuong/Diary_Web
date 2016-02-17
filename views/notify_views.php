<?php
include_once '../model/notify_model.php';

 $m=new NotifyModel();
$notyfy_type=$_GET['notify_type'];
$page_id=$_GET['page_id'];
$id_nf=$_GET['id_nf'];
$flag['flag']=3;
$m->notifyReed($id_nf);
if($notyfy_type==1){
    $url='baidang.php?diary_id='.$page_id.'&id_nf='.$id_nf;
}
if($notyfy_type==2){
    $user2=$page_id;
    //include '../controler/check_friend';
    $url='page_user.php?user_id='.$page_id.'&friend='.$flag['flag'];
}
header('Location:'.$url);
?>
