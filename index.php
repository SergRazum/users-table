<?php
    session_start();
    require_once 'vendor/connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP тестовое</title>

    <link rel="stylesheet" href="assets/main.css">
</head>
<body>
    <div class="element">
        <table>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>День рождения</th>
                <th>Создание</th>
                <th>Обновление</th>
    
            </tr>

            <?php
                $persons = mysqli_query($connect, "SELECT * FROM `persons`");
                $persons = mysqli_fetch_all($persons);
                foreach ($persons as $person){
                    ?>
                        <tr>
                            <td><?= $person[0] ?></td>
                            <td><?= $person[1] ?></td>
                            <td>
                                <button type="submit" class = "showBirthday">Показать ДР</button>
                            </td>
                            <td><?= $person[3] ?></td>
                            <td><?= $person[4] ?></td>
                        </tr>
                    <?php
                }
            ?>
        </table>


    </div>

    <script src="assets/main.js"></script>


</body>
</html>