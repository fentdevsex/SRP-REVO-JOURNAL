<?php
    session_start();
    if($_SESSION['user']){
        header('Location: home.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SampRpREVO</title>
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>

    <form action="vendor/signin.php" method="post">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit">Вход</button>
        <p>
            У вас нет аккаунта? - <a href="/register.php">регистрация</a>!
        </p>
        <?php
        if($_SESSION['message']){
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>
    </body>
</html>