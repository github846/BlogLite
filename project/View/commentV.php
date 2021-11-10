<?php

	class commentV
	{
		public function commentForm()
		{
			echo
			'<div class="author">
			<form method="POST" action="" name="reaction">
				<h2>Comment this article</h2>
				<textarea name="comment" placeholder="What do you think?"rows="2" cols="60"></textarea><br>
				<input class="send" type="submit" name="publish" value="OK">
			</form>
			</div>';
		}

		public function commentList($fetchResult)/* Where does this array come from? */
        {
            echo "<h2>Comments</h2>";
			echo "<div>";
			$i = 0;
            foreach ($fetchResult as $key)
            {
				echo"<p><a href='?page=profile&indexP=" . $key['indexP'] . "'>" . $key['nickname'] . " </a>" . $key['comment'] . "<br><span class='notice'> posted on " . $key['posted'] . "</span>";
				if ($key['indexP'] == $_SESSION['indexP'])
				{
					echo '<a href="?page=editcomment&indexR=' . $key['indexR'] . '"><img alt="edit" src="img/edit.png"> Edit </a> 
					<a href="?page=commdel&indexR=' . $key['indexR'] . '&indexA=' . $key['indexA'] . '"><img alt="delete" src="img/delete.png"> Delete </a></p>';
				}
				else
				{
					echo "<span class='notice'> ding </span></p>";
				}
				$i++;
			}
			echo"</div>";
			echo "Comments: " . $i;
			
		}

		public function editCommentForm($fetched)
		{
			echo
			'<form method="POST" action="" name="reaction">
			<h2>Edit your comment</h2>
				<textarea name="comment" rows="2" cols="60">' . $fetched . '</textarea><br>
				<input class="send" type="submit" name="edit" value="OK">
			</form>';
		}

		public function removeDialog()
		{
			echo
			'<form method="POST" action="" class="confirmbox">
			<h3>Are you sure?</h3>
				<div class="confirmrow">
				<a class="cancel" href="?page=post">Back to posts</a>
				<input type="submit" name="ready" class="ok" value="Delete">
				</div>
			</div>';
		}

		public function commentNotice($message)
		{
			echo $message;
		}
	}