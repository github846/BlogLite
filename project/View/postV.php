<?php

	class PostV
	{
		public function postForm()
		{
			echo
			'<div class="author">
			<form method="POST" action="" enctype="multipart/form-data">
			<h1>Post an article</h1>
				<input type="text" name="title" placeholder="Add title"><br>
				<textarea name="body" rows="6" cols="80"></textarea><br>
				<input type="file" value="Add picture" name="fileURL"><br>
				<input type="submit" name="publish" class="send" value="Publish">
			</form>
			</div>';
		}

		public function eraseDialog()
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

		public function postList($fetchResult)/* Where does this array come from? */
        {
			echo "<h1>All articles</h1>";
			echo "<div class='postlist'>";
			$i = 0;
			
            foreach ($fetchResult as $key)
            {
				echo "<p>
					<a href='?page=article&indexA=" . $key['indexA'] . "'> " . $key['title'] . " </a><span class='notice'> by
					<a href='?page=profile&indexP=" . $key['indexP'] . "'> " . $key['nickname'] . 
					"</a><br> posted on " . $key['submitDate'] . "</span>";
				if ($_SESSION['indexP'] == $key['indexP'])
				{
					echo "<a href='?page=editarticle&indexA=" . $key['indexA'] . "'><img alt='delete' src='img/edit.png'> <span class='notice'>Edit</span>  </a> 
					<a href='?page=postdel&indexA=" . $key['indexA'] . "'><img alt='delete' src='img/delete.png'> <span class='notice'>Delete</span>  </a>
					</p>";
				}
				else
				{
					echo " not yours ";
				}
				$i++;
			}
			if ($i > 0)
			{
				echo "Articles: " . $i . " </div>";
			}
			else
			{
				echo "No articles </div>";
			}
			
		}

		public function editPostForm($fetchTitle, $fetchBody, $fetchPic)
		{
			echo
			'<form method="POST" action="" enctype="multipart/form-data">
			<h1>Edit this article</h1>
				<input type="text" name="title" value="'. $fetchTitle .'"><br>
				<textarea name="body" rows="5" cols="60">'. $fetchBody .'</textarea><br>
				<input name="fileURL" type="file" value="'. $fetchPic .'"><br>
				<input type="submit" name="publish" class="send" value="Save changes">
			</form>';
		}
		
		public function viewArticle($currentTitle, $currentBody, $currentPic)
		{
			echo
			'<div class="article">
			<h1>' . $currentTitle . '</h1>'. $currentBody . '<div><img src="Upload/' . $currentPic . '" ></div>
			</div>';
		}

		public function searchBar()
		{
			echo
			'<div class="search">
			<input type="text">
			<select>
			<option></option>
			<option></option>
			</select>
			<button>Go!</button>
			</div>';
		}

		public function postNotice($message)
		{
			echo "<div class='alert'>$message</div>";
		}
	}