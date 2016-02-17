<?php

if($f->checkUserId($_SESSION['id'],$user2['id'])){
             
                $a=$f->getFlagFriend($_SESSION['id'],$user2['id']);
                $flag['flag']=$a['flag'];
              }
         if($f->checkUserId($user2['id'],$_SESSION['id'])){
             $b=$f->getFlagFriend($user2['id'],$_SESSION['id']);
             if($b['flag']==2){
             $flag['flag']=3;
             }

            }
         if(!$f->checkUserId($_SESSION['id'],$user2['id'])&&(!$f->checkUserId($user2['id'],$_SESSION['id']))){
             
                $flag['flag']=0;
                
              }
?>
