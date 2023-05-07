<?php

    session_start();
    $id = $_POST['id'];
    $statuscount = $_POST['statuscount'];

    $connect = mysqli_connect('f0794045.xsph.ru', 'f0794045_systemrevo', 'systemrevo', 'f0794045_systemrevo');

        mysqli_query($connect, "UPDATE `users` SET `status` = '$statuscount' WHERE `users`.`id` = '$id'");

        $_SESSION['message'] = 'Операция выполнена успешно!<br>' . $id . ' => ' . $statuscount . ' ';
        header('Location: ../admin/index.php');