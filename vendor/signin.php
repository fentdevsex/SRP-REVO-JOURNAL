<?php

    session_start();

    $login = $_POST['login'];
    $password = md5($_POST['password']);
    $connect = mysqli_connect('f0794045.xsph.ru', 'f0794045_systemrevo', 'systemrevo', 'f0794045_systemrevo');

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password' AND `status` = 1");

    if (mysqli_num_rows($check_user) > 0){

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "status" => $user['status'],
            "login" => $user['login'],
            "lvl" => $user['lvl']
        ];

        header('Location: ../home.php');

    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: ../index.php');
    }