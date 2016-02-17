<?php session_start(); 
include_once '../model/notify_model.php';
$n=new NotifyModel();
$m=new NotifyModel();
?>
<?php
    include '../model/user_model.php';
    $u=new UserModel();
    $error=4; $part='dsds';
    $user=$u->getUser($_SESSION['id']);
    if(isset($_POST['submit'])){
        
            include '../controler/upload_image.php';
        
            if(isset($_POST['name'])){
            $new['name']=$_POST['name'];
        }else $new['name']=$user['name'];
        
        if(isset($_POST['job'])){
            $new['job']=$_POST['job'];
        }else $new['job']=$user['job'];
        if(isset($_POST['sothich'])){
            $new['sothich']=$_POST['sothich'];
        }else $new['sothich']=$user['sothich'];
        if(isset($_POST['addr'])){
            $new['addr']=$_POST['addr'];
        }else $new['addr']=$user['addr'];

        if(isset($_POST['email'])){
            $new['email']=$_POST['email'];
        }else $new['email']=$user['email'];
        if(isset($_POST['phone'])){
            $new['phone']=$_POST['phone'];
        }else $new['phone']=$user['phone'];
        if(isset($_POST['password'])&&isset($_POST['re_password'])){
            if($_POST['password']!=$_POST['re_password']) $error=1;
            if($_POST['password']!=''&&$_POST['re_password']!=''&&$_POST['password']==$_POST['re_password']){
                $new['password']=$_POST['password'];
            }else $new['password']=$user['password'];
        }
        $new['id']=$_SESSION['id'];
        if($error!=1){
             if($u->updateInfoUser($new)) $error=0;
        }
    }
    
    $user=$u->getUser($_SESSION['id']);
?>
        <?php include_once 'header.php';?>
       <div class="row well">
           <form enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
           <div class="col-sm-4">
              
               
               <?php
               $img='../images/'.$user['img'];?>
                
                      <li class="list-group-item" align="center">';
                      <img src="<?php echo $img;?>" width="250px" height="250" />
                      </li>
                       <a href=trangcanhan.php><i class=" icon-pencil icon-2x"></i>
                       <h2><p align="center"><b><?php echo $user['username'];?></b></p></h2></a>
               <h2>Update ảnh</h2>
               </br></br>
               <input type="file"  name="file" /></br></br>
               
              
           </div>
           <div class="col-sm-8">
               <h2>Thay đổi thông tin</h2>
               
                <?php
                    if($error==0)
                        echo '<div class="alert alert-info">
                                 <strong>Success!</strong> Thay đổi thành công!
                            </div>';
                    
                        
                    if($error==1)
                        echo '<div class="alert alert-danger">
                                <strong>Error!</strong> Nhập sai password!
                              </div>';
                ?>
                   <div class="row">
                   <div class="form-group col-sm-8">
                      <label class="control-label col-sm-2" for="Name">Name: </label>
                      <div class="col-sm-10">
                        <input type="name" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>">
                      </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <select class="form-control" id="share" name="sharewith">
                          <option value=3>Mọi người</option>
                          <option value=2>Bạn bè</option>
                          <option value=1>Chỉ mình tôi</option>
                        </select>
                  </div>
                  </div>
                    </br>
                    <div class="row">
                    <div class="form-group col-sm-8">
                      <label class="control-label col-sm-2" for="job">Job: </label>
                      <div class="col-sm-10">
                        <input type="job" class="form-control" id="job" name="job" value="<?php echo $user['job']; ?>">
                      </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <select class="form-control" id="share" name="sharewith">
                          <option value=3>Mọi người</option>
                          <option value=2>Bạn bè</option>
                          <option value=1>Chỉ mình tôi</option>
                        </select>
                  </div>
                    </div>
                     </br>
                    <div class="row">
                   <div class="form-group col-sm-8">
                      <!--label class="control-label col-sm-2" for="sothich">Favorite:</label>
                      <div class="col-sm-10">          
                        <input type="sothich" class="form-control" id="sothich" name="sothich" value="<?php //Secho $user['sothich']; ?>">
                      </div-->
                      
                        <div>
                            <label class="control-label col-sm-2" for="sothich">Favorite:</label>
                            <div class="col-sm-10">  
                            <textarea class="form-control" row="3" name="sothich" 
                                      ><?php echo $user['sothich']; ?></textarea><br>
                            </div>
                        </div>
                      
                    </div>
                    <div class="form-group col-sm-3">
                        <select class="form-control" id="share" name="sharewith">
                          <option value=3>Mọi người</option>
                          <option value=2>Bạn bè</option>
                          <option value=1>Chỉ mình tôi</option>
                        </select>
                  </div>
                   </br>
                   </div>
                   <div class="row">
                   <div class="form-group col-sm-8">
                      <label class="control-label col-sm-2" for="add">Address: </label>
                      <div class="col-sm-10">          
                        <input type="addr" class="form-control" id="addr" name="addr" value="<?php echo $user['addr']; ?>">
                      </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <select class="form-control" id="share" name="sharewith">
                          <option value=3>Mọi người</option>
                          <option value=2>Bạn bè</option>
                          <option value=1>Chỉ mình tôi</option>
                        </select>
                  </div>
                    </div>
                   </br>
                   <div class="row">
                   <div class="form-group col-sm-8">
                      <label class="control-label col-sm-2" for="email">Email: </label>
                      <div class="col-sm-10">          
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                      </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <select class="form-control" id="share" name="sharewith">
                          <option value=3>Mọi người</option>
                          <option value=2>Bạn bè</option>
                          <option value=1>Chỉ mình tôi</option>
                        </select>
                  </div>
                    </div>
                    </br>
                    <div class="row">
                    <div class="form-group col-sm-8">
                      <label class="control-label col-sm-2" for="phone">Phone: </label>
                      <div class="col-sm-10">          
                        <input type="phone" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>">
                      </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <select class="form-control" id="share" name="sharewith">
                          <option value=3>Mọi người</option>
                          <option value=2>Bạn bè</option>
                          <option value=1>Chỉ mình tôi</option>
                        </select>
                  </div>
                    </div>
                    </br>
                    <div class="form-group col-sm-8">
                      <label class="control-label col-sm-2" for="pwd">Password:</label>
                      <div class="col-sm-10">          
                        <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter your new password" >
                      </div>
                    </div>
                     </br>
                   <div class="form-group col-sm-8">
                      <label class="control-label col-sm-2" for="re_pwd">Re-Password:</label>
                      <div class="col-sm-10">          
                        <input type="password" class="form-control" id="pwd" name="re_password" placeholder="Enter your new password">
                      </div>
                    </div>
                     <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default" name="submit">Submit</button>
                    </div>
                    </div>
                 
              
               </div>
           </form>
       </div>
</div>

</body>
</html>

