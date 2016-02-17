<?php $img='../images/'.$user2['img'];?>
        <div class="col-lg-12">
        <div align="center" ><img src= "<?php echo $img ?>" width="250px" height="250" /></div>
        <div  style="color: #ff3333" align="center"><h2><b><?php echo $user2['username'];?></b></h2></div>
        
        <div class="list-group">
            <p class="list-group-item">
        <b>Name: </b><?php echo $user2['name'];?>
            </p>
            <p class="list-group-item">
        <b>Nghề nghiệp: </b><?php echo $user2['job'];?>
            </p>
            <p class="list-group-item">
        <b>Sở thích: </b> <?php echo $user2['sothich'];?>
            </p>
            <p class="list-group-item">
        <b>Địa chỉ: </b><?php echo $user2['addr'];?>
            </p>
            <p class="list-group-item">
        <b>Email: </b> <?php echo $user2['email']; ?>
            </p>
            <p class="list-group-item">
        <b>Phone: </b> <?php echo $user2['phone']; ?>
            </p>
        </div>
        </div>