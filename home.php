<?php
session_start();
if(!$_SESSION['user'] or $_SESSION['user']['status'] = 0) {
    header('Location: index.php');
}
?>

<?php
$con = mysqli_connect('f0794045.xsph.ru', 'f0794045_systemrevo', 'systemrevo', 'f0794045_systemrevo');
$res=mysqli_query($con,"select * from logs");
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Revo | Journal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/js/app.js">
</head>
<header>
    <a href="https://samp-rp.online/" class="logo">REVOLUTION</a>
    <nav>
        <ul>
            <li><a href="index.php">ГЛАВНАЯ</a></li>
            <li><a href="../admin/index.php">АДМИН-ПАНЕЛЬ</a></li>
            <li><a href="404.html">INFO</a></li>
            <li><a href="home.php"><?= $_SESSION['user']['login']?>[LVL:<?= $_SESSION['user']['lvl']?>] &bigtriangledown;</a>
                <ul>
                    <li><a href="vendor/logout.php">Выход</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<img src="assets/comandrevo.png" class="center-img">
<body>
<div class="container">
    <table class="table table-striped table-bordered" data-mdb-sm="true" data-mdb-fixed-header="true">
        <thead>
        <tr>
            <th>ID</th>
            <th>TIME</th>
            <th>ADMIN</th>
            <th>NICKNAME</th>
            <th>ACTION</th>
            <th>REASON</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row=mysqli_fetch_assoc($res)){?>
            <tr>
                <td class="uniqueid"><?php echo $row['id']?></td>
                <td class="datatime"><?php echo $row['TIME']?></td>
                <td class="admin"><?php echo $row['ADMIN']?></td>
                <td class="player"><?php echo $row['NICKNAME']?></td>
                <td class="action"><?php echo $row['ACTION']?></td>
                <td class="reason"><?php echo $row['REASON']?></td>
            </tr>
        <?php } ?>
        </thead>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready( function () {
        $('.table').DataTable({
            'iDisplayLength': 15,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ru.json',
            },
        })
    });
</script>
</body>
</html>