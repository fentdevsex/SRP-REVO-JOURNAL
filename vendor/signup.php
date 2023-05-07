<?php
    session_start();

    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $connect = mysqli_connect('f0794045.xsph.ru', 'f0794045_systemrevo', 'systemrevo', 'f0794045_systemrevo');

    if($password === $password_confirm){

        $password = md5($password);
        mysqli_query($connect, "INSERT INTO `users` (`id`, `status`, `login`, `password`) VALUES (NULL, '0', '$login', '$password')");

        $_SESSION['message'] = 'Регистрация прошла успешно<br>Ожидайте подтверждения!';
        header('Location: ../index.php');

    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }