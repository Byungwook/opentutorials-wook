<?php
        // DB 접속
    $link = mysql_connect('localhost', 'root', '881101dnr');
        
        if(!$link)
        {
                die('Could not connect: '.mysql_error());
        }
        
        // select database
        mysql_select_db('opentutorials');
        mysql_query("set session character_set_connection=utf8;");
        mysql_query("set session character_set_results=utf8;");
        mysql_query("set session character_set_client=utf8;");
        
        if(!empty($_GET['id']))
        {
                $sql = "select * from topic where id=".$_GET['id'];
                $result = mysql_query($sql);
                $topic = mysql_fetch_assoc($result);
        }
?>

<html>
        <head>
                <meta charset="utf-8" />
                
                <style type="text/css">
                        body
                        {
                                font-size: 0.8em;
                                font-family: dotum;
                                line-height: 1.6em;
                        }
                        body.black
                        {
                                background-color: black;
                                color: white;
                        }
                        body.white
                        {
                                background-color: white;
                                color: black;
                        }
                        body.black a
                        {
                                color: white;
                        }
                        body.black a:hover
                        {
                                color: #FF6600;
                        }
                        body.black header
                        {
                                border-bottom: 1px solid #333333;
                        }
                        body.black nav
                        {
                                border-right: 1px solid #333333;
                        }
                        header
                        {
                                border-bottom: 1px solid #CCCCCC;
                                padding: 20px 0;
                        }
                        #toolbar
                        {
                                padding: 10px;
                                float: right;
                        }
                        nav
                        {
                                float: left;
                                margin-right: 20px;
                                min-height: 500px;
                                border-right: 500px;
                                border-right: 1px solid #CCCCCC;
                        }
                        nav ul
                        {
                                list-style: none;
                                padding-left: 0;
                                padding-right: 20px;
                        }
                        article
                        {
                                float: left;
                        }
                        a
                        {
                                text-decoration: none;
                        }
                        a:link, a:visited
                        {
                                /* a 링크의 색깔 (클릭했을 때나 안했을 때 변화없이) */
                                color: #333333;
                        }
                        a:hover
                        {
                                /* 링크에 마우스 댔을 때 변하는 색깔*/
                                color: #FF6600;
                        }
                        h1
                        {
                                font-size: 1.4em;
                        }
                        .description
                        {
                                width: 500px;
                        }
                </style>
        </head>
        <body id="body">
                <div>
                        <header>
                                <h1>JavaScript</h1>
                        </header>
                        
                        <div id="toolbar">
                                <input type="button" value="black" onclick="document.getElementById('body').className='black'"/>
                                <input type="button" value="white" onclick="document.getElementById('body').className='white'"/>
                        </div>
                        
                        <nav>
                                <ul>
                                        <?php
                                                $sql = "select id, title from topic";
                                                $result = mysql_query($sql);
                                                
                                                while($row = mysql_fetch_assoc($result))        // mysql_fetch_array
                                                {
                                                        echo "<li><a href=\"?id={$row['id']}\">{$row['title']}</a></li>";
                                                }
                                        ?>
                                </ul>
                        </nav>
                        
                        <article>                                
                                <?php
                                /*
                                 * <?= ... ?> 이것은 echo $topic['title']; 과 같은 뜻 저 사이의 정보를 출력
                                 */
                                        if(!empty($topic))
                                        {
                                ?>
                                                <h2><?=$topic['title']?></h2>
                                                <div class="description">
                                                        <?=$topic['description']?>
                                                </div>
                                                <?php
                                        }
                                                ?>                                
                        </article>
                </div>
        </body>
</html>
