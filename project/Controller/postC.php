<?php 
include('Model/PostM.php');
include('View/PostV.php');

/* Keep the class as is. Only run methods in dedicated pages.*/
class PostC extends PostM
	{
		public $title;
		public $body;
		public $nickname;
		public $indexA;
		public $fileURL;
		public $DataObject;
		public $folder = "Upload/";
		
		public function __construct()
		{
			$this->DataObject = DB::accessDB();
		}
		
		public function searchFunction()
		{
			$PostV = new PostV();
			$PostV->searchBar();
		}

		public function newPost()
		{
			$PostV = new PostV();
			
			/* the session must be set before posting. articles must include a title, or else you can't access them!*/
			if (isset($_SESSION['indexP']))
			{
				$PostV->postForm();
				
				if (isset($_POST['publish']))
				{
					$this->title = $_POST['title'];
					$this->body = $_POST['body'];
					$this->indexP = $_SESSION['indexP'];
					$this->fileURL = $_FILES['fileURL']['name'];
					if (empty($_POST['title']))
					{
						$PostV->postForm();
						$PostV->postNotice("Must include a title!");
					}
					if (!empty($_FILES))
					{
						$uploadedFile = $_FILES['fileURL']['name'];
						$tmpFile = $_FILES['fileURL']['tmp_name'];

						if ($_FILES['fileURL']['type'] != 'image/png')
						{
							$PostV->postForm();
							$PostV->postNotice("PNG files only!");
						}
						elseif ($_FILES['fileURL']['size'] > 102400)
						{
							$PostV->postForm();
							$PostV->postNotice("Nothing above 100 KB!");
						}
						else
						{
							move_uploaded_file($tmpFile, $this->folder . $uploadedFile);
							$this->createPost();
							$PostV->postNotice("Article published!");
							header("location: ?page=post");
							exit();
						}
					}
					else
					{
						$this->createPost();
						$PostV->postNotice("Article published!");
						header("location: ?page=post");
						exit();
					}
				}
			}
			else
			{
				$PostV->postNotice("<br><span class='notice'>You must be connected to post articles.</span>");
			}
		}
		
		public function postCollection()
		{
			$PostV = new PostV();
			$fetchResult = $this->viewAllPost();
			$PostV->postList($fetchResult);
		}

		public function postInventory()
		{
			$indexP = $_GET['indexP'];
			$PostV = new PostV();
			$fetchResult = $this->viewPersonPost($indexP);
			$PostV->postList($fetchResult);
		}

		public function readArticle($indexA)
		{
			$PostV = new PostV();
			$Article = $this->viewOnePost($indexA);
			$currentPic = $Article->fileURL;
			$currentTitle = $Article->title;
			$currentBody = $Article->body;
			$indexA = $_GET['indexA'];
			$PostV->viewArticle ($currentTitle, $currentBody, $currentPic);
		}

		public function editArticle($indexA)
		{
			$PostV = new PostV();
			$indexA = $_GET['indexA'];
			$Article = $this->viewOnePost($indexA);
			$fetchTitle = $Article->title;
			$fetchBody = $Article->body;
			$fetchPic = $Article->fileURL;
			$PostV->editPostForm($fetchTitle, $fetchBody, $fetchPic);
			if (isset($_POST['publish']))
			{
				$this->title = $_POST['title'];
				$this->body = $_POST['body'];
				$this->fileURL = $_POST['fileURL'];
				$this->indexA = $_GET['indexA'];
				$this->editPost();
				header("location: ?page=post");
				exit();
			}
		}

	public function deleteFunction()
	{
		$PostV = new PostV();
		$PostV->eraseDialog();
		if (isset($_POST['ready']))
		{
			$this->indexA = $_GET['indexA'];
			$this->deletePost();
			header("location: ?page=post");
			exit();
		}
	}

	}
?>