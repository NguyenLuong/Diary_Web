<?php
    if($_FILES['file']['name'] != NULL){ // Đã chọn file
        // Tiến hành code upload file
        if($_FILES['file']['type'] == "image/jpeg"
        || $_FILES['file']['type'] == "image/png"
        || $_FILES['file']['type'] == "image/gif"
        ||$_FILES['file']['type'] == "image/jpg"){
        // là file ảnh
        // Tiến hành code upload    
            if($_FILES['file']['size'] > 1048576){
                echo "File không được lớn hơn 1mb";
            }else{
                // file hợp lệ, tiến hành upload
                $path = "../images/"; // file sẽ lưu vào thư mục data
                $tmp_name = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $type = $_FILES['file']['type']; 
                $size = $_FILES['file']['size']; 
                // Upload file
                if(move_uploaded_file($tmp_name,$path.$name)){
                    $part=$_FILES['file']['name'];
                    $u->updateImage($user['id'], $part);
                }
           }
        }else{
           // không phải file ảnh
           echo "Kiểu file không hợp lệ";
        }
   }
?>