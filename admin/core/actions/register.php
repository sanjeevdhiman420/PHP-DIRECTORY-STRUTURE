<?php
require_once __DIR__ .'../../../../env/connection.php';
session_start();
/**
* Check all the fields of form have value or not
* if all fileds are filled properly then sumit the form
* else exectuion will stop immediately
* @return the input filed data that enter by the users
*/
error_reporting( 0 );

if ( $_POST['submit'] ) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatpassqword = $_POST['repeatpassword'];
  

    if ( $_POST['name'] == '' || $_POST['email'] == '' || $_POST['password'] == '' || $_POST['repeatpassword'] == '') {
        echo '<br>error:ALL fields are required';
    } elseif ( $_POST['password'] !== $_POST['repeatpassword'] ) {
        echo "The password doesn't match";
    } else {

        try {
            $sql = "CREATE INTO `users` (name, email ,password, repeatpassword)
            VALUES ('$name','$email','$password','$repeatpassword')";
               $conn->exec( $sql );
            $name = $_POST['name'];
            $sql = "INSERT INTO `users` (name, email ,password, repeatpassword)
         VALUES ('$name','$email','$password','$repeatpassword')";
            $conn->exec( $sql );
            echo 'New record created successfully';

            // insert the user profile into users_profile table
            $sqls = "INSERT INTO `userprofile` (user_id, name)
               VALUES (LAST_INSERT_ID(),'$name')";
            //The LAST_INSERT_ID() function returns the AUTO_INCREMENT id of the last row that has been inserted or updated in a table.

            $conn->exec( $sqls );
            echo 'New records created successfully';
        } catch ( PDOException $e ) {
            echo $sql . '<br>' . $e->getMessage();
        }
        $connection = null;
        header( 'Location:index.php' );

    }
}
