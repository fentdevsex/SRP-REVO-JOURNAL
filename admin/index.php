<?php

session_start();
if ($_SESSION['user']['lvl'] < 6) {
    header('Location: index.php');
}
?>

<?php
$connect = mysqli_connect('f0794045.xsph.ru', 'f0794045_systemrevo', 'systemrevo', 'f0794045_systemrevo');
$query = "SELECT * FROM users";

$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
$num_rows = mysqli_num_rows($result);

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Revo | ADMIN</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header>
    <a href="#" class="logo">REVOLUTION</a>
    <nav>
        <ul>
            <li><a href="../index.php">ГЛАВНАЯ</a></li>
            <li><a href="../404.html">SOON</a></li>
            <li><a href="../404.html">SOON</a></li>
            <li><a href="../home.php"><?= $_SESSION['user']['login']?>[LVL:<?= $_SESSION['user']['lvl']?>] &bigtriangledown;</a>
                <ul>
                    <li><a href="../vendor/logout.php">Выход</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
    <p class="echo_auth">ВЫ АВТОРИЗОВАЛИСЬ КАК АДМИНИСТРАТОР <?= $_SESSION['user']['lvl'] ?> УРОВНЯ</p>
<form action="../vendor/admin.php" method="post" class="updlvl">
    <label>ID USER</label>
    <input type="text" name="id" placeholder="Введите ID пользователя">
    <label>Уровень</label>
    <input type="text" name="lvl" placeholder="Введите уровень">
    <button type="submit">Отправить</button>
    <?php
    if ($_SESSION['message']) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    }
    unset($_SESSION['message']);
    ?>
</form>
<form action="../vendor/updatestatus.php" method="post" class="updstatus">
    <label>ID USER</label>
    <input type="text" name="id" placeholder="Введите ID пользователя">
    <label>Статус активации</label>
    <input type="text" name="statuscount" placeholder="0-disable, 1-enable">
    <button type="submit">Отправить</button>
    <?php
    if ($_SESSION['message']) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    }
    unset($_SESSION['message']);
    ?>
</form>
<table class="userstableadm" border="1">
    <tr>
        <th>ID</th>
        <th>LOGIN</th>
        <th>STATUS</th>
        <th>LVL</th>
    </tr>
    <?php foreach($result as $key => $value) {?>
        <tr>
            <td class="uniqueidadm"><?php echo $value['id'] ?></td>
            <td class="loginadm"><?php echo $value['login'] ?></td>
            <td class="statusadm"><?php echo $value['status'] ?></td>
            <td class="lvladm"><?php echo $value['lvl'] ?></td>
        </tr>
    <?php }?>
</table>
</body>
</html>