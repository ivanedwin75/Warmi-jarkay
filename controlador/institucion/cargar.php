
<?php
        //echo sys_get_temp_dir();
        //echo exec('whoami');
        //echo get_current_user();
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
        $path = 'Archivo/'; // upload directory
        if(!empty($_POST['name']) || !empty($_POST['email']) || $_FILES['image'])
        {
            $img = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];
            // get uploaded file's extension
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            // can upload same image using rand function
            $final_image = rand(1000,1000000).$img;
            // check's valid format
            if(in_array($ext, $valid_extensions)) 
            { 
                $path = $path.strtolower($final_image); 
                if(move_uploaded_file($tmp,$path)) 
                {
                    echo "<img src='$path' />";
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    //include database configuration file
                    include_once 'connect.php';
                    //insert form data in the database
                    $insert = $db->query("INSERT uploading (name,email,file_name) VALUES ('".$name."','".$email."','".$path."')");
                    //echo $insert?'ok':'err';
                }
            } 
            else{
                echo 'invalid';
            }
        }
        if($errorimg > 0){
            die('<div class="alert alert-danger" role="alert"> An error occurred while uploading the file </div>');
        }
        if($myFile['size'] > 500000){
            die('<div class="alert alert-danger" role="alert"> File is too big </div>');
        }
?>