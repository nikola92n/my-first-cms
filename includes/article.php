<?php 

class Article {
	public function fetch_all() {
		global $connect;

		$query = $connect->prepare("SELECT * FROM articles");
		$query->execute();

		return $query->fetchAll();
	}



	public function fetch_data($article_id) {
		global $connect;

		$query = $connect->prepare("SELECT * FROM articles WHERE article_id = ?");
		$query->bindValue(1, $article_id);
		$query->execute();

		return $query->fetch();

	}

}

?>