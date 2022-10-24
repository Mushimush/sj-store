<?php

if(session_id() == ''){
    //session has not started
    session_start();
    if(!isset($_SESSION['custId'])){
        header('Location: ../pages/index.php?showModal=login-modal');
    }
}

?>