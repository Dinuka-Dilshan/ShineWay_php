<?php
    session_start();

    require("../config/db.php");

    if(isset($_POST['submit-edit-user'])){
        $ID = $_POST['submit-delete-user'];
        $query = "DELETE FROM `users` WHERE `ID` = $ID";

        $result = $connection->query($query);
    }

    $query = "SELECT  `ID`,`NIC`, `name`, `user_type`, `email`, `Telephone`, `Address` FROM `users` ";

    $result = $connection->query($query);

    $userList = $result->fetch_all(MYSQLI_ASSOC);

    $_SESSION['userList'] = $userList;

    header('Location: ../views/user-view.php');
?>