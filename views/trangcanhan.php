<?php
session_start();

?>
<?php
include '../model/diary_model.php';
include '../model/comment_model.php';
include '../model/notify_model.php';
include '../model/user_model.php';
include_once '../model/friend_model.php';
include_once '../model/like_model.php';
$l=new LikeModel();
$t= new DiaryModel();
$u2=new UserModel();
$c=new CommentModel();
$n=new NotifyModel();
$m=new NotifyModel();
$f=new FriendModel();

$diary=$t->getDiaryOfUser($_SESSION['id']);
$userid=$_SESSION['id'];
$user2=$u2->getUser($userid);

    if(isset($_POST['submit'])){
        if(isset($_POST['subject'])){
            $temp['subject']=$_POST['subject'];
        }
        if($_POST['content']){
            $temp['content']=$_POST['content'];
        }
        if($_POST['sharewith']){
            $temp['type']=$_POST['sharewith'];
        }
        $temp['user_id']=$userid;
        $t->create($temp);
        header('Location: trangcanhan.php'); 
    }
   

?>

     <?php include_once 'header.php';?>
  <div class="row well">
   
      <div class="col-sm-4 ">
      <?php
     include 'infor_user.php';
      ?>
       
      </div>
      <div class="col-sm-8 well">
          <div class="panel panel-success">
                <div class="panel-heading">
                    <h3><p class="glyphicon glyphicon-pencil" style="color: #0000cc"><b>  Viết bài mới</b></p></h3>
                </div>
                <div class="panel-body">
                        <form role="form" method="post" enctype="multipart/form-data">
                                <div>
                                        <h3><label class="col-lg-3"><b>Subject: </b></label></h3>
                                        <textarea class="form-control" row="3" name="subject" 
                                                placeholder="Chủ đề bài viết"></textarea>
                                <br><br>
                                </div>
                                        <textarea class="content" name="content" row="8" placeholder="Nội dung bài viết"></textarea>
                                
                                <div class="form-group">
                                    <h3><label class="col-lg-3"><b>Chia sẻ: </b></label></h3>
                                    <select class="form-control" id="share" name="sharewith">
                                      <option value=3>Mọi người</option>
                                      <option value=2>Bạn bè</option>
                                      <option value=1>Chỉ mình tôi</option>
                                    </select>
                                </div>
                                <br><br>
                                <div class="col-lg-3">
                                        <button type="submit" class="btn btn-default btn-success" name="submit">Create</button>
                                </div>
                        </form>
                </div>
        </div>
          
        <?php
          
              //include 'show_comment.php';
              $url='trangcanhan.php';
              $i=0; $page='';
              foreach ($diary as $temp) {
                  if($temp!=NULL){
                      include 'get_list_diary.php';
                  }
    
            }
        ?>
      </div>
       
  </div>      
</div>

</body>
</html>
