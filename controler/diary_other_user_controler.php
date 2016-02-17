<?php

    
    $i=0;$page=''; 
            foreach ($diary as $temp) {
        # code...
            $i++;
            if($temp!=NULL){           
               //
               $submit='submit'.$i;
               if(isset($_POST[$submit])){
                    if(isset($_POST['comment'])){
                        if($_SESSION['id']!=$temp['user_id']){
                        $notify['id_from']=$_SESSION['id'];
                        $notify['content']=" comment";
                        $notify['id_to']=$temp['user_id'];
                        $notify['page_id']=$temp['id']; //diary_id
                        $n->create($notify);
                        }
                        
                        $comment['user_id']=$_SESSION['id'];
                        $comment['diary_id']=$temp['id'];
                        $comment['content']=$_POST['comment'];
                        $c->create($comment);
                     
                    }
                }
                 $button_like='button_like'.$i;
                if(isset($_POST[$button_like])){
                    $l->create($temp['id'], $_SESSION['id']);
                    if($_SESSION['id']!=$temp['user_id']){
                        $notify['id_from']=$_SESSION['id'];
                        $notify['content']=" like";
                        $notify['id_to']=$temp['user_id'];
                        $notify['page_id']=$temp['id']; //diary_id
                        $n->create($notify);
                        }
                }
                //
                   //dem so comment
                $dem=$c->countComment($temp['id']);  
  echo '
  <div class="well">';
       $anh='../images/'.$user_page['img'];
       echo "<img src=$anh width=\"40px\" height=\"40\" /> ";
       if($user_page['id']==$_SESSION['id']){
           echo '<a href=#trangcanhan.php><i class=" icon-pencil icon-2x"></i><b>'.$user_page['username'].'</a>';
       }
       else {
           /////
         if($f->checkUserId($_SESSION['id'],$user_page['id'])){
             echo '<a href=page_user.php?user_id=';echo $user_page['id'];
                $a=$f->getFlagFriend($_SESSION['id'],$user_page['id']);
                $flag['flag']=$a['flag'];
                echo '&friend='; echo $flag['flag']; echo '><i class=" icon-pencil icon-2x"></i><b>'.' '.$user_page['username'].'</b></a>';
              }
         if($f->checkUserId($user_page['id'],$_SESSION['id'])){
             $b=$f->getFlagFriend($user_page['id'],$_SESSION['id']);
             if($b['flag']==2){
            $flag['flag']=3;
            echo '<a href=page_user.php?user_id=';echo $user_page['id'];
            echo '&friend=3><i class=" icon-pencil icon-2x"></i><b>'.' '.$user_page['username'].'</b></a>';
             }

            }
         if((!$f->checkUserId($_SESSION['id'],$user_page['id']))&&(!$f->checkUserId($user_page['id'],$_SESSION['id']))){
             echo '<a href=page_user.php?user_id=';echo $user_page['id'];
                $flag['flag']=0;
                echo '&friend='; echo $flag['flag']; echo '><i class=" icon-pencil icon-2x"></i><b>'.' '.$user_page['username'].'</b></a>';
              }
       }
       
                       
       echo '<h2 color="blue">'.$temp['subject'].'</h2>';
       echo $temp['time_on'].'</br>';
       echo  $temp['content'];
        
      /////////////////  
    
       echo'  <form role="form" method="post" action="page_user.php'; echo '?user_id=';echo $user_page['id'];  
       echo '&friend=';echo $flag['flag']; echo'">';
       
        echo '
      
       <div class="row">
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">';
              //checklike
              if($l->checkUserLike($temp['id'], $_SESSION['id'])){
                  $click_like='onclick="this.disabled=true"';
                  $like_name='Đã thích';
              }else {
                  $click_like='';
                  $like_name='Thích';
              }
               $like=$l->countLike($temp['id']);  //so like cua bai dang
             
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
            <div id='.$href.' class="panel-collapse collapse">
              <ul class="list-group"> ';
            
               
               $comment=$t->getCommentOfDiary($temp['id']);
               foreach ($comment as $value) {
                    if($value!=NULL){
                        $user2=$u->getUser($value['user_id']);
                        
                        include '../views/comment_views.php';
                        
                    }
                }
                
               //
               
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
        
     }
  ?>