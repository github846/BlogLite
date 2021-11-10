<?php 
include('Model/CommentM.php');
include('View/CommentV.php');

class CommentC extends CommentM
	{
		public $comment;
		public $posted;
		public $indexR;
		public $indexA;
		public $indexP;
		public $DataObject;

		public function __construct()
		{
			$this->DataObject = DB::accessDB();
		}

		public function newComment()
		{
			$CommentV = new CommentV();
			$this->indexA = $_GET['indexA'];
			$indexA = $this->indexA;
			$fetchResult = $this->viewComment($indexA);

			if (isset($_SESSION['nickname']))
			{
				$CommentV->commentForm();
				$CommentV->commentList($fetchResult);
				if (isset($_POST['publish']))
				{
					$this->comment = $_POST['comment'];
					$this->indexP = $_SESSION['indexP'];
					$CommentV->commentList($fetchResult);
					$this->createComment($indexA);
				}
			}
			else
			{
				$CommentV->commentList($fetchResult);
			}	
		}
		
		public function deleteFunction()
		{
			$CommentV = new CommentV();
			$CommentV->removeDialog();
			if (isset($_POST['ready']))
			{
				$this->indexR = $_GET['indexR'];
				$this->deleteComment();
				header("location: ?page=post");
				exit();
			}
		}

		public function changeComment()
		{
			$indexR = $_GET['indexR'];
			
			$oldComment = $this->fetchComment($indexR);
			$fetched = $oldComment->comment;
			$indexS = $_SESSION['indexP'];
			$indexF = $oldComment->indexP;
			$CommentV = new CommentV();
			/* */ 
			if ($indexS == $indexF)
			{
				$CommentV->editCommentForm($fetched);
				if (isset($_POST['edit']))
				{
					$this->comment = $_POST['comment'];
					$this->indexR = $_GET['indexR'];
					$this->editComment();
					header("location: ?page=post");
					exit();
				}
			}
			else
			{
				header("location: ?page=post");
				exit();
			}
		}
		
	}
?>