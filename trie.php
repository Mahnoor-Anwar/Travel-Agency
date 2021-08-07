<?php

    $connect = mysqli_connect('localhost','root','','booking');
    if(mysqli_connect_errno($connect)){
        echo "failed to connect";
    }
    else{
        echo'connection successfull';
    }

?>