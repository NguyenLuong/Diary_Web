<?php 
if($_SESSION['id']==$temp['user_id']){
    
        echo '<h3 color="blue">'.$temp['subject'].'</h3>';
        echo $temp['time_on'].'</br>';
        echo  $temp['content'].'<br><br>';
        ?>
     <a href="edit_diary.php?did=<?php echo $temp['id'];?>"><i class="glyphicon glyphicon-edit"> </i></a>
     <a href="delete_diary.php?did=<?php echo $temp['id'];?>"><i class="glyphicon glyphicon-trash"> </i></a><br><br>

        <?php    
       }else{
           echo '<h3 color="blue">'.$temp['subject'].'</h3>';
        echo $temp['time_on'].'</br>';
        echo  $temp['content'];
  }?>