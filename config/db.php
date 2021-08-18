<?php

$connection = new mysqli('localhost','root','','ShineWay');

if($connection->connect_error){
    die('connection failed'.$connection->connect_error);
}

?>