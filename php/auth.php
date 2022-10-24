<?php
if(session_id() == ''){
    //session has not started
    session_start();
}

$showModal = isset($_GET['showModal']) ? $_GET['showModal'] : '';

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['type']) ){
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $password = md5($password);
    $errorMessage = '';

    //handle login here
    if($_POST['type'] == 'login'){
        $query = 'SELECT * from Account '
        ."WHERE username='$username' "
        ." AND password='$password'";

        $result = $conn->query($query);
        if ($result->num_rows >0 ) //if login is successfull
        {
            $row = $result->fetch_assoc();
            $accountId = $row['accountId'];   
            
            $_SESSION['username'] = $username;    
            $_SESSION['accountId'] = $accountId;

            $query = 'SELECT * from CustomerDetails '
            ."WHERE accountId='$accountId'";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            $custId = $row['custId']; 
            
            $_SESSION['custId'] = $custId;
            $showModal='';
        }
        else{ //if login is failed
            $errorMessage = 'Invalid username or password';
            $showModal = 'login-modal';
            $prev_username = $username;
            $prev_password = $_POST['password'];
        }

    }
    //handle signup here
    else if($_POST['type'] == 'signup'){
        //validate first
        $isValidated = true;
        if ($_POST['password'] !== $_POST['confirmPassword'] ){
            $errorMessage = 'Password is not matched';
            $showModal = 'signup-modal';
            $isValidated = false;
        }
        if(!isset($_POST['fullName']) || !isset($_POST['email']) || !isset($_POST['email']) || !isset($_POST['dateOfBirth']) || !isset($_POST['confirmPassword'])){
            $errorMessage = 'Please fill all the field';
            $showModal = 'signup-modal';
            $isValidated = false;
        } 

        if(!$isValidated){
            $prev_fullName = $_POST['fullName'];
            $prev_username = $username;
            $prev_password = $_POST['password'];
            $prev_email = $_POST['email'];
            $prev_dateOfBirth= $_POST['dateOfBirth'];
            $prev_confirmPassword = $_POST['confirmPassword'];
        }

        //signup account to database
        if($isValidated){
            $email = $_POST['email'];
            $fullName = $_POST['fullName'];
            $dateOfBirth = $_POST['dateOfBirth'];

            $query = "INSERT INTO Account (username, password) 
                    VALUES ('$username', '$password')";
            $result = $conn->query($query);

            $query2 = "SELECT * from Account where username = '$username'";
            $result = $conn->query($query2);
            $row = $result->fetch_assoc();
            $accountId = $row['accountId'];

            $query3 = "INSERT INTO CustomerDetails(accountId, fullName, email, phoneNumber, dateOfBirth)
            VALUES ( $accountId, '$fullName', '$email', '' , '$dateOfBirth' )";
            $result = $conn->query($query3);

            //register a session here
            $_SESSION['username'] = $username;    
            $_SESSION['accountId'] = $accountId;    

            $query = 'SELECT * from CustomerDetails '
            ."WHERE accountId='$accountId'";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            $custId = $row['custId']; 
            
            $_SESSION['custId'] = $custId;
            $showModal='';
        }
        
    }
}
?>