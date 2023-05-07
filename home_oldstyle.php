<?php
session_start();
if(!$_SESSION['user'] or $_SESSION['user']['status'] = 0) {
    header('Location: index.php');
}
?>

<?php
$connect = mysqli_connect('f0794045.xsph.ru', 'f0794045_systemrevo', 'systemrevo', 'f0794045_systemrevo');
$query = "SELECT * FROM logs";

$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
$num_rows = mysqli_num_rows($result);

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Revo | Journal</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
    <a href="#" class="logo">REVOLUTION</a>
    <nav>
        <ul>
            <li><a href="index.php">ГЛАВНАЯ</a></li>
            <li><a href="404.html">SOON</a></li>
            <li><a href="404.html">SOON</a></li>
            <li><a href="home.php"><?= $_SESSION['user']['login']?>[LVL:<?= $_SESSION['user']['lvl']?>] &bigtriangledown;</a>
                <ul>
                    <li><a href="vendor/logout.php">Выход</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<img src="assets/comandrevo.png" class="center-img">
<table border="1">
    <tr>
        <th>ID</th>
        <th>ДАТА/ВРЕМЯ</th>
        <th>АДМИН</th>
        <th>ИГРОК</th>
        <th>ОПЕРАЦИЯ</th>
        <th>ПРИЧИНА</th>
    </tr>
    <?php foreach($result as $key => $value) {?>
        <tr>
            <td class="uniqueid"><?php echo $value['id'] ?></td>
            <td class="datatime"><?php echo $value['TIME'] ?></td>
            <td class="admin"><?php echo $value['ADMIN'] ?></td>
            <td class="player"><?php echo $value['NICKNAME'] ?></td>
            <td class="action"><?php echo $value['ACTION'] ?></td>
            <td class="reason"><?php echo $value['REASON'] ?></td>
        </tr>
    <?php }?>
</table>
</body>
</html>