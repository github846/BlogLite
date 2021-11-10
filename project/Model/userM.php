<?php

	class UserM
	{
		public function checkPerson()
		{
			$checkUser = $this->DataObject->query("SELECT email FROM person")->fetchAll(PDO::FETCH_COLUMN);
			return $checkUser;
		}
		public function createPerson()
		{
			$createRequest = $this->DataObject->prepare("INSERT INTO person(nickname, email, passcode) VALUES (?, ?, ?)");
			$createRequest->execute(array($this->nickname, $this->email, $this->passcode));
		}
		
		public function loginQuery($email)
		{
			$connectQuery = "SELECT * FROM person WHERE email='$email'";
			$userObject = $this->DataObject->query($connectQuery)->fetch(PDO::FETCH_OBJ);
			return $userObject;
		}

		public function viewPerson($indexP)
		{
			$fetchUser = $this->DataObject->query("SELECT nickname, email FROM person WHERE indexP='$indexP'")->fetch(PDO::FETCH_OBJ);
			return $fetchUser;
		}

		public function viewPersonArticle($indexP)
		{
			$fetchUserArticle = $this->DataObject->query("SELECT * FROM article WHERE indexP='$indexP'")->fetchAll();
			return $fetchUserArticle;
		}
		
		public function deletePerson()
		{
			$deleteRequest = $this->DataObject->prepare("DELETE FROM person WHERE indexP=?");
			return $deleteRequest->execute(array($this->indexP));
		}

		public function editPerson()
		{
			$editRequest = $this->DataObject->prepare("UPDATE person SET nickname=?, email=?, passcode=? WHERE indexP=?");
			return $editRequest->execute(array($this->nickname, $this->email, $this->passcode, $this->indexP));
		}
	}