<?php

$connection = new mysqli('localhost','root','','shineway');

if($connection->connect_error){
    die('connection failed'.$connection->connect_error);
}

?>