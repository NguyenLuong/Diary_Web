
        <?php $img='../images/'.$user_page['img'];?>
         <div class="col-lg-12">
        <div align="center" ><img src="<?php echo $img; ?>" width="250px" height="250px"/></div></br>
        <div style="color: #ff3333" align="center"><h2><b><?php echo $user_page['username'];?></b></h2></div>
        
        <div class="list-group">
            <p class="list-group-item">
        <b>Name: </b><?php if(isset($friend['name'])) echo $friend['name']; 
                                else  echo "you can't views";?>
             </p>
             <p class="list-group-item">
        <b>Nghề nghiệp: </b><?php if(isset($friend['job'])) echo $friend['job']; 
                                else  echo "you can't views";?>
        
             </p>
             <p class="list-group-item">
        <b>Sở thích: </b> <?php if(isset($friend['sothich'])) echo $friend['sothich']; 
                                else  echo "you can't views";?>
             </p>
             <p class="list-group-item">
        <b>Địa chỉ: </b><?php if(isset($friend['addr'])) echo $friend['addr']; 
                                else  echo "you can't views";?>
             </p>
             <p class="list-group-item">
        <b>Email: </b> <?php if(isset($friend['email'])) echo $friend['email']; 
                                else  echo "you can't views"; ?>
             </p>
             <p class="list-group-item">
        <b>Phone: </b> <?php if(isset($friend['phone'])) echo $friend['phone']; 
                                else  echo "you can't views"; ?>
             </p>
        </div>
        </div>