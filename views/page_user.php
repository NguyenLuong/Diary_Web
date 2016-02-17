<?php
session_start();
include_once '../model/comment_model.php';
include_once '../model/diary_model.php';
include_once '../model/user_model.php';
include_once '../model/notify_model.php';
include_once '../model/friend_model.php';
include_once '../model/like_model.php';
$l=new LikeModel();
$t=new DiaryModel();
$c=new CommentModel();
$u=new UserModel();
$n=new NotifyModel();
$m=new NotifyModel();
$f=new FriendModel();
$button=''; $p=0; $onclick1='';

$user_page=$u->getUser($_GET['user_id']);


if($f->checkUserId($_SESSION['id'],$user_page['id'])){
             
        $a=$f->getFlagFriend($_SESSION['id'],$user_page['id']);
        $flag['flag']=$a['flag'];
      }
 if($f->checkUserId($user_page['id'],$_SESSION['id'])){
     $b=$f->getFlagFriend($user_page['id'],$_SESSION['id']);
     if($b['flag']==2){
     $flag['flag']=3;
     }

    }
 if((!$f->checkUserId($_SESSION['id'],$user_page['id']))&&(!$f->checkUserId($user_page['id'],$_SESSION['id']))){

        $flag['flag']=0;

      }
   if($_GET['friend']!=$flag['flag']){
       header('Location: ../404.php');
   }


 if($_GET['friend']==0){ //chua ket ban
    $button='Add Friend';
        $onclick1='';
        $loimoikb=0;
    }
    if($_GET['friend']==2){     //da gui loi moi ket ban
        $button='Đã gửi lời mời';
         $onclick1='onclick="this.disabled=true"';
         $p=1;
    }
    if($_GET['friend']==1){ //da la ban be
        $button='Friend';
        $onclick1='onclick="this.disabled=true"';
        $p=2;
        //$loimoikb=1;
    }
     if($_GET['friend']==3){ //da dk gui loi moi ket ban
        $button='Chấp nhận lời mời kết bạn';
        $onclick1='';
        $loimoikb=2;
    }

if(isset($_POST['addfriend'])){


   // add if vao bang friend

       if($loimoikb==0){        //gui loi moi ket ban
        ////chua check
        $notify['id_from']=$_SESSION['id'];
        $notify['id_to']=$user_page['id'];
        $notify['content']=" addfriend";
        $notify['page_id']=$user_page['id'];
        $n->create($notify);
        
        $flag['flag']=2;
        if($f->create($_SESSION['id'], $user_page['id'],2)){
        $onclick1='onclick="this.disabled=true"';
        $button='Đã gửi lời mời';
        //$p=1;
         
        }
        $url='page_user.php?user_id='.$user_page['id'].'&friend=2';
        header('Location:'.$url);
       }
       if($loimoikb==2){        //chap nhan loi moi ket ban

        $flag['flag']=1;
        $f->create($_SESSION['id'], $user_page['id'], 1);
        $f->update($user_page['id'], $_SESSION['id'],1);
        $onclick1='onclick="this.disabled=true"';
        $button='Friend';
        //$p=2;
        $url='page_user.php?user_id='.$user_page['id'].'&friend=1';
        header('Location:'.$url);

       }

   }


?>
<?php   //lay thong tin, diary cua user_page
    $check_friend=$_GET['friend'];
         if($check_friend==1){
             $diary=$t->getDiaryOfUserfriend($_GET['user_id']);
             $friend=$f->getIfFriend($_GET['user_id']);
         }else{
             $diary=$t->getDiaryOfOtherUser($_GET['user_id']);
             $friend=$u->getIfOtherUser($_GET['user_id']);
         }
?>
    <?php include_once 'header.php';?>

 <div class="well row">
    
     <div class="col-sm-4">
         <?php
         
         include '../controler/infor_other_user_controler.php';   //lay thong tin user page
         ?>
     </div>
     <div class="col-sm-8">
         <div class="row">
             <!---->
              <form action="page_user.php?user_id=<?php echo $user_page['id'] ?>&friend=<?php echo $flag['flag']?>" method="post">
                <div class="col-sm-9">
                   <?php
                    if($p==1){
                    echo '</br><div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                             <strong>Đã gửi lời mời kết bạn</strong>
                       </div>';
                   }
                   if($p==2){
                        echo '</br><div class="alert alert-info">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                             <strong>We are friend!</strong>
                       </div>';
                   }
                   ?>
                </div>
                <div class="col-sm-3">

                    </br><button type="submit" class="btn btn-info" name="addfriend" <?php echo $onclick1;?> >
                        <b id="demo"><?php echo $button;?></b></button></br></br>
                </div>
             </form>
         </div>
         <?php
         
         
         include_once '../controler/diary_other_user_controler.php';  //lay diary user page
           //$user=$user_page; $url='page_user.php?user_id='.$user['id'].'&friend='.$flag['flag'];
            //include '../controler/get_list_diary.php';
         ?>
     </div>
    
 </div>
     
 
</div>

</body>
</html>



