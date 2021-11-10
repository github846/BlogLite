<?php

	class PostM
	{
		/* To create a post, you need to an email. */
		public function createPost()
		{
			$createRequest = $this->DataObject->prepare("INSERT INTO article(title, body, indexP ,fileURL) VALUES (?, ?, ?, ?)");
			$createRequest->execute(array($this->title, $this->body, $this->indexP, $this->fileURL));
		}	

		public function viewAllPost()
		{
			return $this->DataObject->query("SELECT * FROM article INNER JOIN person ON article.indexP = person.indexP")->fetchAll();
		}

		public function viewPersonPost($indexP)
		{
			return $this->DataObject->query("SELECT * FROM article INNER JOIN person ON article.indexP = person.indexP WHERE person.indexP=$indexP")->fetchAll();
		}

		public function viewOnePost($indexA)
		{
			$Article =  $this->DataObject->query("SELECT * FROM article WHERE indexA='$indexA'")->fetch(PDO::FETCH_OBJ);
			return $Article;
		}

		public function deletePost()
		{
			$deleteRequest = $this->DataObject->prepare("DELETE FROM article WHERE indexA=?");
			return $deleteRequest->execute(array($this->indexA));
		}

		public function editPost()
		{
			$editRequest = $this->DataObject->prepare("UPDATE article SET title=?, body=?, fileURL=? WHERE indexA=?");
			return $editRequest->execute(array($this->title, $this->body, $this->fileURL, $this->indexA));
		}
	}

	/*
		* person: nickname, email, passcode, nickname
		* article: title, body, submitDate, indexA, nickname
		* reaction: comment, posted, indexR, nickname, indexA
		* Think of the columns to display and to use. An index is a great way to make each row distinct,
		* but nobody needs to see it. 
	*/
	