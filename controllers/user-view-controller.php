<?php
    session_start();

    require("../config/db.php");

    $query = "SELECT  `NIC`, `name`, `user_type`, `email`, `Telephone`, `Address` FROM `users` ";

    $result = $connection->query($query);

    $userList = $result->fetch_all(MYSQLI_ASSOC);

    $_SESSION['userList'] = $userList;

    header('Location: ../views/user-view.php');
?>