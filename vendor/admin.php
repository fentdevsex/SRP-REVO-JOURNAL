<?php
    session_start();

    $id = $_POST['id'];
    $lvl = $_POST['lvl'];

    $connect = mysqli_connect('', '', 'systemrevo', '');

        mysqli_query($connect, "UPDATE `users` SET `lvl` = '$lvl' WHERE `users`.`id` = '$id'");

        $_SESSION['message'] = 'Операция выполнена успешно!<br>' . $nickname . ' => ' . $lvl . ' ';
        header('Location: ../admin/index.php');
