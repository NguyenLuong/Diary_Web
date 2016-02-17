<?php
if($user2['id']!=$_SESSION['id']){
              include '../controler/check_friend.php';
       }


$anh2='../images/'.$user2['img'];
    echo '
     <li class="list-group-item">';
    echo "<img src=$anh2 width=\"40px\" height=\"40\" />";
    if($value['user_id']==$_SESSION['id']){
       echo '<a href=trangcanhan.php';
       echo '><i class=" icon-pencil icon-2x"></i><b>'.' '.$user2['username'].'</b></a>';
    }else{
      echo '<a href="page_user.php?user_id=';echo $value['user_id'];
      echo '&friend=';echo $flag['flag']; echo '"><i class=" icon-pencil icon-2x"></i><b>'.' '.$user2['username'].'</b></a>'; 
    }

    echo '</br>'.$value['time_on'].'</br></br>'.' '.' '.$value['content'];
    echo '</li>';
?>
