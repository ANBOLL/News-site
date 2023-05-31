<?php
require_once("db.php");
if ($connection == false) 
    {
        echo "Error!";
        echo mysqli_connect_errno();
        exit();
    }
$page = $_GET['id'];
$query = mysqli_query($connection,"SELECT * FROM `news` WHERE id='$page' ");
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/reset.css">
    <meta charset="utf8">
    <title>FORUMEDIA</title>
    </head>
    <body>
        <header>
            <div class="news-header">
                <div class="logo-header">
                    <a class="astyle" href="index.php?page=1">
                        <img src="img/news-logo.svg" alt="Логотип сайта новостей">
                    </a>
                </div>            
                <h1 class="title-header">
                    <a class="astyle" href="index.php?page=1">Новости</a>
                </h1>                
            </div>
        </header>   
        <main>
            <div class="news-main">         
                <h2 class="page-title">
                    <?php
                        $article = mysqli_fetch_assoc($query);
                        echo $article['title'];
                    ?>
                </h2>  
                <h3 class="news-content">
                    <?php
                        echo ' '.$article['content'];
                    ?>
                </h3>               
            </div>
        </main>
        <footer>
            <div class="news-footer">
                <h3 class="navigation">
                    <?php
                        $string = "Все новости >>";
                        echo '<a class="navigationpage" href=index.php?id='.$article['id'].'>'. $string.'</a><br>'. ' ';
                    ?>
                </h3>
            </div>
        </footer>
    </body>
</html>
