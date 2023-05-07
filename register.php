<?php
    session_start();
    if ($_SESSION['user']){
        header('Location: home.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>REVO|ADD</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

<form action="vendor/signup.php" method="post">
    <label>Логин</label>
    <input type="text"  name="login" placeholder="Введите логин для аккаунта">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль для аккаунта">
    <label>Подтверждение пароля</label>
    <input type="password" name="password_confirm" placeholder="Введите еще раз пароль для аккаунта">
    <button type="submit">Регистрация</button>
    <p>
       У вас уже есть аккаунт? - <a href="/index.php">войдите</a>!
    </p>
    <?php
    if ($_SESSION['message']) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    }
    unset($_SESSION['message']);
    ?>
</form>

</body>
</html>