<!DOCTYPE html>

<head>
    <meta charset="utf-8" /> 
    <title>FlowerShop</title>
    <link rel=stylesheet href=style.css>
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1" />
</head>

<?php
    $link = mysqli_connect("localhost", "root", "", "accounts of flowershop");

    if ($link == false){
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    }
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])){
            $id = $_GET['id'];
        }
        else{
            $id=0;
        }
    }
?>

<body>
    <div class="conteiner">
        <div class="conteiner2">
            <div class="flex-container">
                <img src="img/topflower.png" alt="">
            </div>
            <div class="flex-container2">
                <div class="top-nav-menu">
                    <a href="create.php">SIGH IN</a>
                    <!--<a href="#">SIGH UP</a>-->
                    <a href="update.php?id=<?= $id?>">Редактировать профиль</a>
                    <a href="delete.php?id=<?= $id?>">Удалить профиль</a>
                    <a href="list.php?id=<?= $id?>">Список профилей</a>
                    <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                            if ($id>0){
                            $count = mysqli_num_rows(mysqli_query($link, 'SELECT * from users'));
                            $sql1 = 'SELECT user_name FROM users WHERE id='.$id.'';
                            $sql2 = 'SELECT user_surname FROM users WHERE id='.$id.'';
                            $result1 = mysqli_query($link, $sql1);
                            ?>
                                <div class="task-card">
                                    <span class="task-card-name"><?= mysqli_fetch_array(mysqli_query($link, $sql1))[0] ?></span>
                                    <span class="task-card-assignedTo"><?= mysqli_fetch_array(mysqli_query($link, $sql2))[0] ?></span>
                                </div>
                            <?php
                            }
                        }
                    ?>
                </div>
                <div class="text">
                    <div class="top-text">Kembang Flower Mantap</div>
                    <div class="bottom-text">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-container3">
            <div class="blockof">
                <div class="pictext">
                    <img src="img/1block.png" alt="">
                    Fast Delivery
                </div>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
            </div>
            <div class="blockof">
                <div class="pictext">
                    <img src="img/2block.png" alt="">
                    Customer Service
                </div>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
            </div>
            <div class="blockof">
                <div class="pictext">
                    <img src="img/3block.png" alt="">
                    Original Plants
                </div>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
            </div>
            <div class="blockof">
                <div class="pictext">
                    <img src="img/4block.png" alt="">
                    Affordable Price
                </div>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
            </div>
        </div>
        <p>Featured Plants</p>
        <div class="line"></div>
        <div class="flex-container4">
            <div class="floweritem">
                <img src="img/kaktus.png" alt="">
                <div>Kaktus Plants</div>
                <div class="price">IDR 85.000</div>
            </div>
            <div class="floweritem">
                <img src="img/plant2.png" alt="">
                <div>Kecubung Plants
                    <div class="price">IDR 105.000</div>
                </div>
            </div>
            <div class="floweritem">
                <img src="img/plant3.png" alt="">
                <div>Kecubung Plants</div>
                <div class="price">IDR 85.000</div>
            </div>
            <div class="floweritem">
                <img src="img/plant4.png" alt="">
                <div>Kecubung Plants</div>
                <div class="price">IDR 85.000</div>
            </div>
        </div>
        <div class="container3">
            <div class="flex-container5">
                <div class="high">Buy more plants, it helps you to be relaxed </div>
                <div class="low">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi gravida gravida aliquam. Pellentesque et lobortis nisl. Sed et mauris justo. Nulla eu enim non mauris maximus dignissim. Maecenas vitae eros sapien. Quisque pellentesque tempus dignissim.</div>
                <img src="img/left.png" alt="">
            </div>
            <div class="flex-container6">
                <img src="img/right.png" alt="">
            </div>
        </div>
        <div class="container4">
            <div class="flex-container7">
                <div>Get your favourites plant on our shop now</div>
                <a href="#">Visit Shop</a>
            </div>
            <div class="flex-container8">
                <img class="uno" src="img/last.png" alt="">
            </div>
        </div>
    </div>
    <div class="last"></div>
    <div class="container5">
        <div class="flex-container9">
            <div class="line1">PLANTKU</div>
            <div class="line4">Plantku House</div>
            <div class="line3">Jl. Laksda Adisucipto No.51, Demangan, Kec. Depok, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55282</div>
        </div>
        <div class="flex-container10">
            <div class="line4">Perusahaan</div>
            <div class="line5">Tentang Kami</div>
            <div class="line5">Hubungi Kami</div>
        </div>
        <div class="flex-container11">
            <div class="line4">Produk</div>
            <div class="line5">Tanaman</div>
            <div class="line5">Tanaman Lain</div>
        </div>
        <div class="flex-container12">
            <div class="line4">Berlangganan Email Kami</div>
            <input placeholder="Masukan Alamat Email"></input>
            <button>Submit</button>
        </div>
    </div>
</body>
