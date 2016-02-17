<?php
session_start();
include '../model/notify_model.php';
include '../model/diary_model.php';
$m=new NotifyModel();
$d=new DiaryModel();
include '../views/header.php';
$did=$_GET['did'];


$return=0;
if(isset($_POST['submit'])){
    if(isset($_POST['subject'])){
        $temp['subject']=$_POST['subject'];
    }
    if(isset($_POST['content'])){
    $temp['content']=$_POST['content'];
    }else $temp['content']=$diary['content'];
    if(isset($_POST['sharewith'])){
    $temp['type']=$_POST['sharewith'];
    }else $temp['type']=$diary['type'];
    if($d->edit($temp, $did)){
        $return=1;
    }else $return=0;
}
$diary=$d->getDiarybyid($did);
?>
<div class="well">
    <h3><p class="glyphicon glyphicon-edit" style="color: #0000ff"><b>  Chỉnh sửa bài viết</b></p></h3>
    <?php
        if($return==1){
             echo '<div class="alert alert-info">
                                 <strong>Success!</strong> Thay đổi thành công!
                            </div>';
        }
    ?>
      <form role="form" method="post">
           <div class="form-group">
            <label for="usr">Subject:</label>
            <textarea class="form-control" row="3" name="subject"
                  placeholder="Chủ đề bài viết"><?php echo $diary['subject'];?></textarea>
            </div>
         
         <textarea class="content" name="content" row="6" placeholder="Nội dung bài viết">
             <?php echo $diary['content'];?></textarea><br>
        
          <b>Chia sẻ bài viết với ai?<b><br><br>
         <div class="form-group">
            <select class="form-control" id="share" name="sharewith" value="<?php echo$diary['type'];?>">
              <option value=3>Mọi người</option>
              <option value=2>Bạn bè</option>
              <option value=1>Chỉ mình tôi</option>
            </select>
      </div>
          
        <div>
            <button type="submit" name="submit" class="btn btn-default">Đăng bài</button>
        </div>
          
      </form>  
      </div>

</div>

</body>
</html>