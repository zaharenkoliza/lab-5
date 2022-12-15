<?php

$xml = simplexml_load_file("data.xml") or die("Error: Cannot create object");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleforlist.css" />
</head>

<body>
    <div class="container">
        <a href="create.php">Создать новый аккаунт</a>
        <?php
        $link = mysqli_connect("localhost", "root", "", "accounts of flowershop");
        $count = mysqli_fetch_array(mysqli_query($link, 'SELECT max(id) FROM users'))[0];
        for ($i = 1; $i<=$count; $i+=1) {
            $sql = 'SELECT * FROM users WHERE id = "'.$i.'"';
            $result = mysqli_query($link, $sql);
            $array = mysqli_fetch_assoc($result);
            if ($array){
            $user_name = $array['user_name'];
            $user_surname = $array['user_surname'];
            $bd = $array['birthday'];
        ?>
            <div class="task-card">
                <span class="task-card-name"><?= $user_name ?></span>
                <span class="task-card-assignedTo"><?= $user_surname ?></span>
                <span class="task-card-deadline"><?= $bd ?></span>
                <a href="index.php?id=<?= $i?>">Войти в аккаунт</a>
                <a href="update.php?id=<?= $i?>">Редактировать профиль</a>
                <a href="delete.php?id=<?= $i?>">Удалить</a>
            </div>
        <?php
            }
        }

        ?>
       
    </div>
</body>

</html>