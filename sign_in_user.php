<?php

if(isset($_POST['sign_in']))
{
    $row = 1;
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (($handle = fopen("drivers.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            
            $row++;
            if($data[3] == $username && $data[4] == $password)
            {
                session_start();
                $_SESSION['logs'] = [
                    "licenseNo" => $data[0],
                    "firstName" => $data[1],
                    "surname" => $data[2]
                ];
                
                header('location:public_console.php');
            }
            else
            {
                $_SESSION['loginErr'] = 'Error: Login information doesnt match';
            }
        }
    fclose($handle);
}
}
?>