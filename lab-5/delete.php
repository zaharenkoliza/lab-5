<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $link = mysqli_connect("localhost", "root", "", "accounts of flowershop");
    $id = $_GET['id'];
    $sql1 = 'SELECT * FROM users WHERE id="'.$id.'"';
    $result = mysqli_query($link, $sql1);
    $array = mysqli_fetch_assoc($result);
    $user_name = $array['user_name'];
    $user_surname = $array['user_surname'];
    $bd = $array['birthday'];
    ?>
        <div>
            <div><?= $user_name ?></div>
            <div><?= $user_surname ?></div>
            <div><?= $bd ?></div>
            <form action="" method="POST">
                <button name='delete'>Удалить аккаунт</button>
                <a href="index.php?id=<?= $id?>">Назад</a>
            </form>
        </div>
    <?php
    if (isset ($_POST['delete'])){
        $i = 0;

        $sql = 'DELETE from users WHERE id="'.$id.'"';
        $result = mysqli_query($link, $sql);


        header('location:index.php');
    }
    ?>
</body>
