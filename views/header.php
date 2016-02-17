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
  

<script type="text/javascript" src="../bootstrap/js/jquery-1.11.0.js"></script>
<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/check_ajax.js"></script>
<!-- Bootstrap Core JavaScript -->
<!--Fscript type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script type="text/javascript" src="../bootstrap/js/plugins/morris/raphael.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/plugins/morris/morris-data.js"></script>
<script type="text/javascript" src="../bootstrap/tinymce/tinymce.min.js" ></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea.content",
        theme: "modern",
        plugins: [
             "advlist autolink link image lists charmap preview hr anchor pagebreak spellchecker",
             "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
             "save table contextmenu directionality emoticons template paste textcolor"
       ],
       content_css: "css/content.css",
       toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons", 
       style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ]
     }); 
</script>
<!-- Bootstrap Core CSS -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="../bootstrap/css/sb-admin.css" rel="stylesheet">
<link href="../bootstrap/css/damvc.css" rel="stylesheet">
<!-- Morris Charts CSS -->
<link href="../bootstrap/css/plugins/morris.css" rel="stylesheet">
<!-- //   <link rel="stylesheet" type="text/css" href="bootstrap/css/full-site.css"> -->
<!-- Custom Fonts -->
<link href="../bootstrap/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <!--link rel="stylesheet" type="text/css" href="header.css"/-->

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
            if(empty($tp[0]))echo '<li> Không có thông báo mới </a></li>';
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
          