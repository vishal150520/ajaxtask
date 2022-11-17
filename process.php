<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'dbConfig.php';
$errors = [];
$data = [];

if (empty($_POST['name'])) {
    $errors['name'] = 'Name is required.';
}

if (empty($_POST['email'])) {
    $errors['email'] = 'Email is required.';
}

if (empty($_POST['phone'])) {
    $errors['phone'] = 'phone alias is required.';
}

if (!empty($errors)) 
{
    
    $data['success'] = false;
    $data['errors'] = $errors;
} 
else 
{    
        $name=$_POST["name"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];

    $sql = "INSERT INTO `ajaxdata` (`name`, `email`, `phone`) VALUES('$name','$email','$phone')";
        
        $result = $db->query($sql);
      
        if ($result == TRUE) {
            $data['success'] = true;
            $data['message'] = 'Success!';
        }
        else
        {
        echo "Error:". $sql . "<br>". $db->error;
        } 

        $db->close(); 

}
echo json_encode($data);

?>