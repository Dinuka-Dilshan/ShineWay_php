<?php
    session_start();

    require("../config/db.php");

    if(isset($_POST['submit-delete-owner'])){
        $ID = $_POST['submit-delete-owner'];
        $query = "DELETE FROM `owner` WHERE `ID`='$ID';";

        $result = $connection->query($query);
    }

    $query = "SELECT * FROM `owner`";

    $result = $connection->query($query);

    $ownerList = $result->fetch_all(MYSQLI_ASSOC);

    $_SESSION['ownerList'] = $ownerList;

    header('Location: ../views/owner-view.php');
?>