<?php

	class CommentM
	{
		public function createComment()
		{
			$createRequest = $this->DataObject->prepare("INSERT INTO reaction(comment, indexA, indexP) VALUES (?, ?, ?)");
			$createRequest->execute(array($this->comment, $this->indexA, $this->indexP));
		}

		public function viewComment($indexA)
		{
			return $this->DataObject->query("SELECT * FROM reaction INNER JOIN person ON reaction.indexP=person.indexP WHERE indexA='$indexA' ORDER BY posted DESC")->fetchAll();
		}

		public function fetchComment($indexR)
		{
			$oldComment = $this->DataObject->query("SELECT * FROM reaction WHERE indexR='$indexR'")->fetch(PDO::FETCH_OBJ);
			return $oldComment;
		}

		public function deleteComment()
		{
			$deleteRequest = $this->DataObject->prepare("DELETE FROM reaction WHERE indexR=?");
			$deleteRequest->execute(array($this->indexR));
		}

		public function editComment()
		{
			$editRequest = $this->DataObject->prepare("UPDATE reaction SET comment=? WHERE indexR=?");
			return $editRequest->execute(array($this->comment, $this->indexR));
		}
	}