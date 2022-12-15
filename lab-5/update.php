<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $id = 0;
    $user_name = '';
    $user_surname = '';
    $bd = '';

    $link = mysqli_connect("localhost", "root", "", "accounts of flowershop");

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = $_GET['id'];

        $sql1 = 'SELECT * FROM users WHERE id="'.$id.'"';
        $result = mysqli_query($link, $sql1);
        $array = mysqli_fetch_assoc($result);
        $user_name = $array['user_name'];
        $user_surname = $array['user_surname'];
        $bd = $array['birthday'];


    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];

        $user_name1 = $_POST['user_name'];
        $user_surname1 = $_POST['user_surname'];
        $bd1 = $_POST['bd'];

        print($user_name);
        $sql1 = 'UPDATE users SET user_name = "'.$user_name1.'", user_surname = "'.$user_surname1.'", birthday = "'.$bd1.'" WHERE id = "'.$id.'" ';
        $result = mysqli_query($link, $sql1);

        header('Location: index.php?id='. $id);
    }
    ?>
    <form method="POST" action="update.php?id=<?= $id ?>">
        Имя: <input type="text" name="user_name" required value="<?= $user_name ?>"/><br />
        Фамилия: <input type="text" name="user_surname" value="<?= $user_surname ?>"/><br />
        День рождения: <input type="date" name="bd" value="<?= $bd ?>"/><br />
        <input type="hidden" value="<?= $id ?>" name="id"/>
        <input type="submit" value="Сохранить" />
    </form>
</body>

</html>