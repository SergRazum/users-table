<?php
require_once 'connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$created = $_POST['created'];
$updated = $_POST['updated'];

mysqli_query($connect, "UPDATE `persons` SET `name` = '{$name}', `birthday` = '{$birthday}', `created` = '{$created}', `updated` = '{$updated}' WHERE `persons`.`id` = '{$id}'");

header('Location: /index.php');?>