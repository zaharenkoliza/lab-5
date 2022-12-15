<!DOCTYPE html>

<head>
    <meta charset="utf-8" /> 
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1" />
</head>

<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $link = mysqli_connect("localhost", "root", "");

        if ($link == false){
            print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        }
        else {
            print("Соединение установлено успешно");
        }
        $user_NAME = $_POST['user_NAME'];
        $user_surname = $_POST['user_surname'];
        $bd = $_POST['bd'];
        print($user_NAME);
        $linkuno = mysqli_connect("localhost", "root", "", "accounts of flowershop");

        $sql = 'INSERT INTO `users` (`user_name`, `user_surname`, `birthday`) VALUES ("'.$user_NAME .'", "'.$user_surname.'", "'.$bd.'")';

        $result = mysqli_query($linkuno, $sql);
        if ($result == false) {
            print("Произошла ошибка при выполнении запроса");
        }

        $id = mysqli_fetch_array(mysqli_query($linkuno, 'SELECT id from users WHERE user_name="'.$user_NAME.'" and user_surname="'.$user_surname.'" AND birthday="'.$bd.'"'))[0];
        print($id);
        header('Location: index.php?id='. $id.'');

    }
    ?>
    <form method="POST" action="create.php">
        Имя: <input type="text" name="user_NAME" required /><br />
        Фамилия: <input type="text" name="user_surname" /><br />
        Логин: <input type="date" name="bd" /><br />
        <input type="submit" value="Сохранить" />
        <a type="submit" href="update.php?id=<?= $item['id']?>">Редактировать профиль</a>
        <a type="submit" href="delete.php?id=<?= $item['id']?>">Удалить профиль</a>
    </form>
</body>

</html>