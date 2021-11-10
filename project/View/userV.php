<?php

	class UserV
	{
		public function joinForm()
		{
			
			echo
			'<script>
			$(document).ready(function()
			{
				$("[name="join"]").submit(function(form)
				{
				  form.preventDefault();
				  var nickame = $("[name="nickname"]").val();
				  var email = $("[name="email"]").val();
				  var passcode= $("[name="passcode"]").val();
			  
				  $(".error").remove();
			  
				  if (first_name.length < 1)
				  {
					$("[name="nickname"]").after("<span class="warning">This field is required</span>");
				  }
				  if (email.length < 1)
				  {
					$("[name="email"]").after("<span class="warning">This field is required</span>");
				  }
				  else
				  {
					var regEx = /^[A-Z0-9][A-Z0-9._%+-]{0,63}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/;
					var validEmail = regEx.test(email);
					if (!validEmail)
					{
					  $("[name="email"]").after("<span class="warning">Enter a valid email</span>");
					}
				  }
				  if (password.length < 8)
				  {
					$(("[name="passcode"]").after("<span class="warning">Password must be at least 8 characters long</span>");
				  }
				});
			  });
			</script>
			<form method="POST" action="" name="join">
			<h1>Join the gang!</h1>
				<input type="text" name="nickname" placeholder="your name"><br>
				<input type="email" name="email" placeholder="email"><br>
				<input type="password" name="passcode" placeholder="password"><br>
				<input class="send" type="submit" value="Register me!">
			</form>';
		}

		public function loginForm()
		{
			echo
			'<form method="POST" action="" name="login">
			<h1>Log in</h1>
				<input type="email" name="email" placeholder="email"><br>
				<input type="password" name="passcode" placeholder="password"><br>
				<input class="send" type="submit" value="Let me in!">
			</form>';
		}

		public function deleteDialog()
		{
			echo
			'<form method="POST" action="" class="confirmbox">
			<h3>Are you sure?</h3>
				<div class="confirmrow">
				<a class="cancel" href="?page=me">Back to profile</a>
				<input type="submit" name="ready" class="ok" value="Delete">
				</div>
			</div>';
		}

		public function profileForm()
		{
			echo
			'<form method="POST" action="" name="edit">
			<h1>About me</h1>
			<input type="text" name="nickname" value=' . $_SESSION["nickname"] . '><br>
				<input type="email" name="email" value=' . $_SESSION["email"] . '><br>
				<input type="password" placeholder="new password" name="passcode"><br>
				<input class="send" type="submit" name="update" value="Save changes">
			</form>
			<a class="warning" href="?page=userdel&indexP=' . $_SESSION['indexP'] .'">Delete my profile</a>';
		}

		public function viewProfile($nameP, $emailP)
		{
			echo
			'<h1>Profile</h1>
			<p>Nickname: ' . $nameP . '</p>
			<p>Email address: ' . $emailP . '</p>';
		}

		public function signoutDialog()
		{
			echo
			'<div class="confirmbox">
			<h3>Are you sure?</h3>
				<div class="confirmrow">
				<a class="cancel" href="?page=me">Back to profile</a>
				<a class="ok" href="?page=exit">Signout</a>
				</div>
			</div>';
		}

		public function testDialog()
		{
			echo
			'<form method="POST">
			<input type="hidden" name="secret" value="5741">
			Type secret code!<input type="text" name="code">
			<input type="submit" value="ready">
			</form>';
		}

		public function userNotice($message)
		{
			echo "<div class='alert'>$message</div>";
		}
	}