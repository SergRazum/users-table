<?php
    require_once 'vendor/connect.php';

    $id = $_GET['id'];

    $user = mysqli_query($connect, "SELECT * FROM `persons` WHERE `id` = '${id}' ");
    $user = mysqli_fetch_assoc($user);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Изменить запись</title>
    <link rel="stylesheet" href="assets/main.css">
</head>
<body>
<div class="element">
    <h2>Изменить запись</h2>
    <form action="vendor/update.php" method="POST">
    <input type="hidden" name="id" value="<?= $user['id']?>">
        <p>Имя</p>
        <input type="text" name="name" value="<?= $user['name']?>">
        <p>День рождения</p>
        <input type="date" name="birthday" value="<?= $user['birthday']?>">
        <p>Создание</p>
        <input type="datetime-local" name="created" value="<?= $user['created']?>">
        <p>Обновление</p>
        <input type="datetime-local" name="updated" value="<?= $user['updated']?>"> <br> <br> <br>
        <button type="sunmit"> Обновить информацию
    </form>
</div>
</body>
</html>