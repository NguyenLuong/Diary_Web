<?php
session_start();
include '../model/diary_model.php';
include '../model/comment_model.php';
include '../model/notify_model.php';
include '../model/user_model.php';
include '../model/like_model.php';
include '../model/friend_model.php';
    $f=new FriendModel();
    $l=new LikeModel();
    $t=new DIaryModel();
    $diary=array(array());
    $diary=$t->getDiaryOfUserfriend($_SESSION['id']);
    $c=new CommentModel();
    $n=new NotifyModel();
    $m=new NotifyModel();
    $u2=new UserModel(); 
    $u=new UserModel();
    $typeseach=$_GET['type'];

?>
  <?php
//include_once 'header.php';
  ?>
  <!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>My Diary</title>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/datepicker.css">
  <script src="../js/bootstrap-datepicker.js"></script>
  <link href="../bootstrap/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
    
    
    <body style="background-image: url(../images/clover.jpg)">

    
<div class="container">
  <div  >
    <img src="../images/header2.png" width="1140" height="150" > 
  </div> 
 
  <div>
      
      <nav class="navbar navbar-inverse thu">
  <div class="container-fluid">
    <div>
      <ul class="nav navbar-nav">
        <li><a href="home_page.php">Home</a></li>
         <li><a href="trangcanhan.php">Trang cá nhân</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Tìm kiếm <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="timkiem.php?type=1">Bạn bè</a></li>
            <li><a href="timkiem.php?type=2">Bài đăng theo chủ đề</a></li>
            <li><a href="timkiem.php?type=3">Bài đăng theo thời gian</a></li>
          </ul>
        </li>
       
      </ul>
     <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php 
        $tp=$m->countNotifyNotRead($_SESSION['id']);
        if($tp==0)echo "";
        else echo $tp;

        ?> Thông báo<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php 
            $tp=$m->getNotifyNotRead($_SESSION['id']);
            if(empty($tp[0]))echo '<li>Không có thông báo mới</a></li>';
            $t1="comment";$t2="like";$t3="addfriend";
            foreach ($tp as $tp1) {
              if(!empty($tp1)){
                 // $t4=$tp1['content'];
                  if(strpos($tp1['content'], $t1)||strpos($tp1['content'], $t2)){
                      echo '<li><a href="notify_views.php?page_id='; echo $tp1['page_id']; echo '&notify_type=1&id_nf=';
                      echo $tp1['idnf'];
                      echo' ">'.$tp1['username1'].' '.$tp1['content'].' bai viet cua ban</a></li>';
                 //  echo '<li>dskjbkfdjb</li>';
                  }
                  if(strpos($tp1['content'], $t3)){
                      echo '<li><a href="notify_views.php?page_id='; echo $tp1['id_from']; echo '&notify_type=2&id_nf=';
                      echo $tp1['idnf'];
                      echo' ">'.$tp1['username1'].' '.$tp1['content'].' ban</a></li>';
                  }
                  
              }
            }
          ?>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Setting<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
                <a href="profile.php">
                    <i class="fa fa-fw fa-user"></i>
                    Profile
                </a>
            </li>
            <li>
               <a href="../controler/logout_controler.php">
                    <i class="fa fa-fw fa-power-off"></i>
                   Logout
               </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
          


</div>

    
    <?php 
      if($typeseach==1)
        include 'search_user.php';
    else {
      if($typeseach==2){
        include 'search_diary_by_subject.php';
      }
      else{
          if($typeseach==3){
              include 'search_diary_by_time.php';   
          }
          else {
                include'../404.php';
          }
      }
    }
    ?>
  </div>
    

</body>
</html>