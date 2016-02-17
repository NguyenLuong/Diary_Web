<?php
//truyen vao 1 diary $temp vs duong dan $url
  
        $i++;
    //        if($temp!=NULL){  
               $u=new UserModel();
               $user=$u->getUser($temp['user_id']);     //thong tin nguoi dang bai
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
                   //dem so comment
                $dem=$c->countComment($temp['id']); 
                $anh='../images/'.$user['img'];
                ?>
                
  <div class="well">
       
       <img src="<?php echo $anh;?>" width="70px" height="70" /> 
       <?php
        if($user['id']==$_SESSION['id']){
           echo '<a href=trangcanhan.php><i class=" icon-pencil icon-2x"></i><b>'.$user['username'].'</a>';
       }
       else {
           /////
         if($f->checkUserId($_SESSION['id'],$user['id'])){
             
                $a=$f->getFlagFriend($_SESSION['id'],$user['id']);
                $flag['flag']=$a['flag'];
                echo '<a href=page_user.php?user_id=';echo $user['id'];
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
              $flag['flag']=0;
             echo '<a href=page_user.php?user_id=';echo $user['id'];  
                echo '&friend='; echo $flag['flag']; echo '><i class=" icon-pencil icon-2x"></i><b>'.' '.$user['username'].'</b></a>';
              }
       }
       ?>
       
       <form role="form" method="post" action="';echo $url;  echo '">
       <?php
       include '../controler/edit_controler.php';
       ?>
      
       <div class="row">
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
           <?php
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
                ?>
              </h4>
            </div>
              
              
            <div id="<?php echo $href;?>" class="panel-collapse collapse">
              <ul class="list-group"> 
            
               <?php
               $comment=$t->getCommentOfDiary($temp['id']);
                
               foreach ($comment as $value) {
                   if($value!=NULL){
                      
                       $user2=$u->getUser($value['user_id']);
                       include '../views/comment_views.php';
                   }
               }
               ?>
                <li class="list-group-item">
                    
                    <div>
                     <div class="form-group">
                       <label for="comment">Comment:</label>
                       <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                     </div>
                     <div>
                         <button type="submit" class="btn btn-default" name="<?php echo $submit;?>" >Submit</button>
                     </div>
                   </div>
                </li>
              </ul>
            </div>
          </div>
    </div>
    </div>
      </form>
  </div> 