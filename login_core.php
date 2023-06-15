<?php

session_start();

include_once "config.php";
  $connection = new mysqli($servername, $username, $password, $dbname);
if ( !$connection ) {
    echo mysqli_error( $connection );
    throw new Exception( "Database cannot Connect" );
}
$action = $_REQUEST['action'] ?? '';

if ( 'login' == $action ) {
    $email = $_REQUEST['email'] ?? '';
    $password = $_REQUEST['password'] ?? '';
    $role = $_REQUEST['role'] ?? '';

    if ( $email && $password && $role ) {
        $query = "SELECT * FROM {$role} WHERE email='{$email}'";
        $result = mysqli_query( $connection, $query );

        if ( $data = mysqli_fetch_assoc( $result ) ) {
            $_passsword = $data['password'] ?? '';
            $_email = $data['email'] ?? '';
            $_id = $data['id'] ?? '';
            $_role = $data['role'] ?? '';

            if ( password_verify( $password, $_passsword ) ) {
                $_SESSION['role'] = $_role;
                $_SESSION['id'] = $_id;
                header( "location:index.php" );
                die();
            }
        } else {
            header( "location:login.php?error" );
        }

    }
}
