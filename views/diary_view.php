<?php
	session_start();
      //show bai viet, nhan vao la diary_id
        
include '../model/diary_model.php';
include '../model/comment_model.php';
include '../model/notify_model.php';
include '../model/user_model.php';
include '../model/like_model.php';
include '../model/friend_model.php';
    $f=new FriendModel();
    $l=new LikeModel();
    $t=new DIaryModel();
    $c=new CommentModel();
    $n=new NotifyModel();
    $m=new NotifyModel();
    $u=new userModel();
?>
<?php
$diary_id=$_GET['diary_id'];
$diary=$t->getDiarybyid($diary_id);
?>
<?php
include 'header.php';
$i=0;
?>
  </div>
  </div>
    <div class="container">
  		<?php
            if($diary==NULL){  
              echo '<div class="well">';echo 'bai dang khong hop le </div>';
                }
                else{
                   //dem so comment
               	$user=$u->getUser($_SESSION['id']); 

                
                $submit='submit'.$i;
                if(isset($_POST[$submit])){
                    if(isset($_POST['comment'])){
                        
                        $comment['user_id']=$_SESSION['id'];
                        $comment['diary_id']=$diary['id'];
                        $comment['content']=nl2br($_POST['comment']);
                        $c->create($comment);
                       //header('Location: baidang.php'); 
                    } 
                     }

                      $dem=$c->countComment($diary['id']);
               
  echo '
  <div class="well">';
       $anh='../images/'.$user['img'];
       echo "<img src=$anh width=\"40px\" height=\"40\" />";
       
      if($user['id']==$_SESSION['id']){
           echo '<a href=trangcanhan.php><i class=" icon-pencil icon-2x"></i><b>'.' '.$user['username'].'</a>';
       }
       else {
           /////
         if($f->checkUserId($_SESSION['id'],$user['id'])){
             echo '<a href=page_user.php?user_id=';echo $user['id'];
                $a=$f->getFlagFriend($_SESSION['id'],$user['id']);
                $flag['flag']=$a['flag'];
                echo '&friend='; echo $flag['flag']; echo '><i class=" icon-pencil icon-2x"></i><b>'.' '.$user['username'].'</b></a>';
              }
         if($f->checkUserId($user['id'],$_SESSION['id'])){
             $b=$f->getFlagFriend($user['id'],$_SESSION['id']);
             if($b['flag']==2){
             $flag['flag']=3;
            echo '<a href=page_user.php?user_id=';echo $user['id'];
            echo '&friend=3><i class=" icon-pencil icon-2x"></i><b>'.' '.$user['username'].'</b></a>';
             }

            }
         if((!$f->checkUserId($_SESSION['id'],$user['id']))&&(!$f->checkUserId($user['id'],$_SESSION['id']))){
             echo '<a href=page_user.php?user_id=';echo $user['id'];
                $flag['flag']=0;
                echo '&friend='; echo $flag['flag']; echo '><i class=" icon-pencil icon-2x"></i><b>'.' '.$user['username'].'</b></a>';
              }
       }
         
       $temp=$diary;
       include '../controler/edit_controler.php';
       
            
      /////////////////  
       echo'  <form role="form" method="post" action="baidang.php?diary_id='; echo $diary_id; echo '">';
       echo '
      
       <div class="row">
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">';
        
              if($l->checkUserLike($diary['id'], $_SESSION['id'])){
                  $click_like='onclick="this.disabled=true"';
                  $like_name='Đã thích';
              }else {
                  $click_like='';
                  $like_name='Thích';
              }
              
             $like=$l->countLike($diary['id']);  //so like cua bai dang
             $href='collapase'.$i;
              echo $dem.'
                <a data-toggle="collapse" href=#'.$href.'>Comment</a>
                <button type="submit" class="btn btn-success" name="';echo $button_like ;
                echo '"'; echo $click_like; echo '>';echo $like_name; echo '</button>';
                echo ' '.$like;
                echo'
              </h4>
            </div>';
              
              
            echo '
            <div id='.$href.' class="panel-collapse collapse in">
              <ul class="list-group"> ';
            
               
               $comment=$t->getCommentOfDiary($diary['id']);
                
               foreach ($comment as $value) {
                   if($value!=NULL){
                      
                       $user2=$u->getUser($value['user_id']);
                       include '../views/comment_views.php';
                   }
               }
               
                echo '
                <li class="list-group-item">
                    
                    <div>
                     <div class="form-group">
                       <label for="comment">Comment:</label>
                       <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                     </div>
                     <div>
                         <button type="submit" class="btn btn-default" name='.$submit.' >Submit</button>
                     </div>
                   </div>
                </li>
              </ul>
            </div>
          </div>
    </div>
    </div>
      </form>
  </div> ';
      }
        
	
  ?>  
  
</div>

</body>
</html>