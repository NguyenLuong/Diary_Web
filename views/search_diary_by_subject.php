
<div class="well" align="center">
    <h3 align="center">seach diary </h3>
    <form role="form" class="form-inline" method="post" action="timkiem.php?type= <?php echo $typeseach; ?>">
      <div class="form-group">
        <label>input subject : </label>
        <input type="text" class="form-control" name="seachDiary" >
      </div>
        <button type="submit" name="seach" class="btn btn-primary">seach</button>
    </form>
  </div>
<?php
if(isset($_POST['seach'])){
    $seachUser=$_POST['seachDiary'];
    if($seachUser!=NULL){
    //$diary=array(array());
    $diary=$t->getDiarySeachSub($seachUser,$_SESSION['id']);
    if($diary[0]==NULL){
       
        echo '<div class="well"><h4>Không tìm thấy diary phù hợp</h4></div>';
    }
    else{
        $i=0;$page='';
        foreach ($diary as $temp) {
            $i++;
            $user=$u2->getUser($temp['user_id']);
            $url='diary_view.php?diary_id='.$temp['id'];
            include 'get_list_diary.php';
            
        }
      //include  '../controler/diary_other_user_controler.php';
      
        }
        }
        //$subject=$_POST['seachDiary'];
    }
   // $subject='';
    ?>