<html>
<body>
<ol>
<?php
	mysql_connect('localhost', 'root', '881101dnr');
	mysql_select_db('wook');
	$result = mysql_query('select * from topic');

	$article = 'select * from topic where id='.$_GET['id'];
	echo $article;

	$result2 = mysql_query($article);
	$row2 = mysql_fetch_array($result2);
	echo '<br />'.$row2['description'];

	while($row = mysql_fetch_array($result))
	{
		echo '<li><a href="db.php?id='.$row['id'].'">'.$row['title'].'</a></li>';
	}

?>
</ol>
</body>
</html>
