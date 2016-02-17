
<?php
session_start();
include '../model/diary_model.php';
include '../model/comment_model.php';
include '../model/notify_model.php';
include '../model/user_model.php';
include_once '../model/friend_model.php';
include_once '../model/like_model.php';
    $l=new LikeModel();
    $t=new DIaryModel();
    $diary=array(array());
    
    $diary=$t->getDiaryOfHomePage($_SESSION['id']);
    $c=new CommentModel();
    $n=new NotifyModel();
    $m=new NotifyModel();
    $f=new FriendModel();
?>
  <?php
include_once 'header.php';
  ?>
  </div>
  <?php
        $url='home_page.php';
        //include 'show_comment.php';
        $i=0; $page='';
        foreach ($diary as $temp) {
            if($temp!=NULL){
                include 'get_list_diary.php';
            }
        }
        
  ?>
  </div>
    

</body>
</html>


