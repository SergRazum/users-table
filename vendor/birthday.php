<?php 

session_start();
require_once 'connect.php';

$id = $_POST['id_user'];
$name = $_POST['fio_user'];

$check_user = mysqli_query($connect, "SELECT `birthday` FROM `persons` WHERE `id` = '{$id}' AND `name` = '{$name}'");
if (mysqli_num_rows($check_user) > 0) {
    print_r(mysqli_fetch_assoc($check_user)['birthday']);
} else {
    echo "ОШИБКА, записей не найдено";
}
?>