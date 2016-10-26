<?php 

	include_once("includes/connection.php");
	include_once("includes/article.php");

	$article = new Article;
	$articles = $article->fetch_all();

 ?>


<html>
<head>
	<title> FIRST CMS </title>
    <link rel="stylesheet" type="text/css" href="styless.css">
</head>

<body>
	
	<div class="container">	
	<a href="index.php" id="logo">FirstCMS</a>

	<p> List of articles:</p>
	
	<ol>
		<?php foreach ($articles as $article) { ?>
			
			<li> <a href="article.php?id=
			<?php echo$article['article_id']; ?>" > 

			<?php echo $article['article_title']; ?>  
			</a>  - <small> posted: 
						<?php 
							echo date('l jS', $article['article_timestamp']) ;
						?>

					</small> </li>

			<?php } ?>
	 </ol>

	 <br>
	 
	 <small> <a href="admin">admin</small>

	</div>

</body>
</html>