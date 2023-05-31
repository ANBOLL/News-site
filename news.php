<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="css/index.css" rel="stylesheet">
            <link href="css/reset.css" rel="stylesheet">
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
                    <?php
                            while ($article = mysqli_fetch_assoc($query)) 
                            {   
                                $timestamp = $article['idate'];   
                                echo '<div class="art">';
                                $run = date("d-m-Y", $timestamp);
                                echo '<span class="idatestyle">'.$run.'</span>'.' <a class="announce-style" href=page.php?id='.$article['id'].'>'.'<span class="titlestyle">'.$article['title'].'</span>'.'</a><br>';
                                echo '<br>';
                                echo $article['announce'].' '.'<br>';
                                echo '<br>';
                                echo '</div>'; 
                            }
                        ?>
                </div>
            </main>
            <footer>
                <div class="news-footer">
                    <h3 class="navigation">
                        Страницы:
                    </h3>
                    <div class="news-navigation">
                        <?php
                            function navigation($page, $count, $pages_count, $show_link)
                            {
                            if ($pages_count == 1) return false;
                            $sperator = ' ';
                            $style = 'style="
                            color: rgb(0, 0, 0);
                            text-decoration: none;
                            font-family: fantasy;
                            font-weight: 200;
                            font-style: normal;
                            font-size: 25px;
                            margin-right: 10px;
                            "';
                            $begin = $page - intval($show_link / 2);
                            unset($show_dots);
                            if ($pages_count <= $show_link + 1) $show_dots = 'no';
                            if (($begin > 2) && ($pages_count - $show_link > 2)) 
                                {
                                    echo '<a '.$style.' href=index.php?page=1> |< </a> ';
                                }
                            for ($j = 0; $j <= $show_link; $j++)
                                {
                                $i = $begin + $j;
                                if ($i < 1) continue;
                                if (!isset($show_dots) && $begin > 1) 
                                    {
                                        echo ' <a '.$style.' href=index.php?page='.($i-1).'><b>...</b></a> ';
                                        $show_dots = "no";
                                    }
                                if ($i > $pages_count) break;
                                if ($i == $page) 
                                    {
                                        echo ' <a '.$style.' ><b>'.$i.'</b></a> ';
                                    } 
                                else 
                                    {
                                        echo ' <a '.$style.' href=index.php?page='.$i.'>'.$i.'</a> ';
                                    }
                                if (($i != $pages_count) && ($j != $show_link)) echo $sperator;
                                if (($j == $show_link) && ($i < $pages_count)) 
                                    {
                                        echo ' <a '.$style.' href=index.php?page='.($i+1).'><b>...</b></a> ';
                                    }
                                }
                            if ($begin + $show_link + 1 < $pages_count) 
                                {
                                    echo ' <a '.$style.' href=index.php?page='.$pages_count.'> >| </a>';
                                }
                            return true;
                            }
                            $perpage = 10;
                            if (empty($_GET['page']) || ($_GET['page'] <= 0)) 
                                {
                                    $page = 1;
                                } 
                            else 
                                {
                                    $page = (int) $_GET['page'];
                            }                   
                            $pages_count = $str_page;
                            if ($page > $pages_count) $page = $pages_count;
                            $start_pos = ($page - 1) * $perpage;
                            navigation($page, $count, $pages_count, 10);
                        ?>
                    </div>
                </div>
            </footer>
        </body>
    </html>

