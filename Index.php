<?php
    require_once("db.php");
    if ($connection == false) 
        {
            echo "Error!";
            echo mysqli_connect_errno();
            exit();
        }
    if (isset($_GET['page'])) 
        {
            $page = $_GET['page'];
        } 
    else 
        {
            $page = 1;
        }
    $limit = 5;
    $number = ($page * $limit) - $limit;
    $res_count = mysqli_query($connection, "SELECT COUNT(*) FROM `$dbarticles`");
    $row = mysqli_fetch_row($res_count);
    $total = $row[0];
    $str_page = ceil($total / $limit);
    $query = mysqli_query($connection,"SELECT * FROM $dbarticles ORDER BY `idate` DESC LIMIT $number, $limit");
    require_once("news.php");
?>

