<?php
echo '
<div class="well" align="center">
    <h3 align="center">tim user </h3>
    <form role="form" class="form-inline" method="post" action="timkiem.php?type='.$typeseach.'">
      <div class="form-group">
        <label>input username : </label>
        <input type="text" class="form-control" name="seachUser">
      </div>
        <button type="submit" name="seach" class="btn btn-primary">seach</button>
    </form>
  </div>';
  if(isset($_POST['seach'])){
    $seachUser=$_POST['seachUser'];
    if($seachUser!=NULL){
    $users=array(array());
    $users=$u2->getUserByLikeName($seachUser);
    foreach ($users as $temp2) {
    		if($temp2==NULL){
    			echo '<div class="well"><h4>Không tìm thấy user phù hợp</h4></div>';
    		}
    			else{
    		echo '<div class="well">';
    		$anh='../images/'.$temp2['img'];
    		echo "<img src=$anh width=\"40px\" height=\"40\" /> ";
                $user2=$temp2;
                
                include '../controler/check_friend.php';
                
    		echo '<a href="page_user.php?user_id='.$user2['id'].'&friend='.$flag['flag'].'"><i class=" icon-pencil icon-2x"></i><b>'.$temp2['username'].'</a>';
    		echo '</div>';	
    	}	
    	}	
    }
	}

?>