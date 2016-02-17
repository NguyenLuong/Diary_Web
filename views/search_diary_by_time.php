<?php
echo '
<div class="well">
	<h3 align="center"><b>Tìm kiếm nhật kí của bạn theo thời gian</b></h3>
    <form role="form" align="center" class="form-inline" method="post" action="timkiem.php?type='.$typeseach.'">
      <div class="form-group">';
      ?>
    		<div align="center">		
    			<table class="table table-hover">
    				<thead>
      					<tr>
        					<th>Thời gian bắt đầu</th>
        					<th>Thời gian kết thúc</th>
      					</tr>
    				</thead>
    				<tbody>
      					<tr>
        					<td><input  type="text" placeholder="click to show datepicker" name="startTime" id="example1"></td>
        					<td><input  type="text" placeholder="click to show datepicker" name="endTime" id="example2"></td>
      					</tr>
    				</tbody>
  				</table>	
                                <script type="text/javascript">
            		$(document).ready(function () {
                
                	$('#example1').datepicker({
                    	format: "yyyy-mm-dd"
                		}); 
                 	$('#example2').datepicker({
                    format: "yyyy-mm-dd"
                		});  
            
            			});
        		</script>
      		</div>
        	<button type="submit" name="seach" class="btn btn-primary">seach</button>
    </form>
  </div>
</div>
<?php

 if(isset($_POST['seach'])){
    $timeStart=$_POST['startTime'];
    $timeEnd=$_POST['endTime'];
    if($timeStart!=NULL && $timeEnd!=NULL){ 	
    	if(strtotime($timeStart)>strtotime($timeEnd)){
    		echo '<div class="well"><h4>Thời gian bắt đầu lớn hơn thời gian kết thúc</h4></div>';
    	}
    	else {
    		//$timeStart=date("Y-m-d",$startTime);
    		//echo $timeStart;
    		//$timeEnd=date("Y-m-d",$endTime);
    		//echo $timeEnd;
    		$diary=$t->getDiarySeachLimitTime($timeStart,$timeEnd,$_SESSION['id']);
    		foreach ($diary as $temp) {
    		if($temp==NULL){
    			echo '<div class="well"><h4>Không tìm thấy bài phù hợp</h4></div>';
    		}
    		else{
    			$i=0;$page='';
                    $i++;
                    $user=$u2->getUser($temp['user_id']);
                    $url='diary_view.php?diary_id='.$temp['id'];
                    include 'get_list_diary.php';

    		}	
    	}	
    	}
    }
	}

?>