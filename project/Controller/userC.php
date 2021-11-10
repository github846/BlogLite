<?php 
include('Model/userM.php');
include('View/userV.php');

class UserC extends UserM
{
	public $nickname;
	public $email;
	public $passcode;
	public $indexP;
	public $DataObject;

	/* run method without instance*/
	public function __construct()
	{
		$this->DataObject = DB::accessDB();
	}
	
	public function newPerson() /* inserts an user into the database, Register*/ 
	{
		$UserV = new UserV();
		$emailRegEx = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/"; /* verifying email format*/
		$checkUser = $this->checkPerson();
		$emailCheck = $_POST['email'];
		
		if (empty($_POST)) /* all checks performed before sending in data*/
		{
			$UserV->userNotice('Time to fill the form!');
			$UserV->joinForm();
		}
		elseif (empty($_POST['nickname']))
		{
			$UserV->userNotice('Nickname required');
			$UserV->joinForm();
		}
		elseif (!preg_match($emailRegEx, $_POST['email']))
		{
			$UserV->userNotice('Wrong email format');
			$UserV->joinForm();
		}
		elseif (strlen($_POST['passcode']) < 8)
		{
			$UserV->userNotice('Password too short');
			$UserV->joinForm();
		}
		elseif (in_array($emailCheck, $checkUser))
		{
			$UserV->userNotice('Email taken');
			$UserV->joinForm();
		}
		else /*encrypting password in database*/
		{
			$this->nickname = $_POST['nickname'];
			$this->email = $_POST['email'];
			$this->passcode = password_hash($_POST['passcode'], PASSWORD_BCRYPT);
			$this->createPerson();
			header("location: ?page=home");
			exit();
		}
	}

	/* If $_POST data matches fetched SQL data, login works!  */
	public function login()
	{
		$UserV = new UserV();

		if (!empty($_POST['email'])) 
		{
			$email = $_POST['email'];
			$passcode = $_POST['passcode'];
			$userObject = $this->loginQuery($email);
			if ($userObject != false)
			{	
				$checkPasscode = $_POST['passcode'];
				if (password_verify($checkPasscode, $userObject->passcode))
				{
					$_SESSION['email'] = $userObject->email;
					$_SESSION['nickname'] = $userObject->nickname;
					$_SESSION['passcode'] = $_POST['passcode'];
					$_SESSION['indexP'] = $userObject->indexP;
					$UserV->userNotice('Logged in.');
					header("location: ?page=home");
					exit();
				}
				else
				{
					$UserV->userNotice('Wrong password.');
					$UserV->loginForm();
				}
			}
			else
			{
				$UserV->userNotice('No such registered user.');
				$UserV->loginForm();
			}
		}
		else
		{
			$UserV->userNotice('Ready to login?');
			$UserV->loginForm();
		}
	}

	/* Displays profile
	* Because the same checks are perform whether you
	* create or update, store them in a different method or controller.
	* Even better: keep one big security check for ALL entities!*/
	public function myProfile()
	{
		$UserV = new UserV();
		$checkUser = $this->checkPerson();
		
		if (isset($_POST['update']) && !empty($_POST))
		{
			/* DO NOT DISPLAY THE PASSWORD!!!
				Instead, have the user enter the new password*/
			$this->nickname = $_POST['nickname'];
			$this->email = $_POST['email'];
			$this->passcode = password_hash($_POST['passcode'], PASSWORD_BCRYPT);
			$this->indexP = $_SESSION['indexP'];
			$this->editPerson();
		}
		elseif (in_array($_POST['email'], $checkUser))
		{
			$UserV->profileForm();
			$UserV->userNotice('Email taken.');
		}
		elseif (strlen($_POST['passcode']) < 8)
		{
			$UserV->profileForm();
			$UserV->userNotice('Password too short');
		}
		else
		{
			$UserV->profileForm();
			$UserV->userNotice('Leave no empty fields!');
		}
	}

	/* Ask for confirmation before sensitive actions like
		signing out, deleting.*/
	public function signoutConfirm()
	{
		$UserV = new UserV;
		$UserV->signoutDialog();
	}

	public function viewUser()
	{
		/* the user's ID is stored as an URL variable and needed to fetch the row*/
		$indexP = $_GET['indexP'];
		$UserV = new UserV();
		$fetchUser = $this->viewPerson($indexP);
		/* using fetched row values as parameters*/
		$nameP = $fetchUser->nickname;
		$emailP = $fetchUser->email;
		$UserV->viewProfile($nameP, $emailP);
	}

	public function deleteFunction()
	{
		$_GET['indexP'] = $_SESSION['indexP'];
		$UserV = new UserV();
		$UserV->deleteDialog();
		if (isset($_POST['ready']))
		{
			$this->indexP = $_SESSION['indexP'];
			if ($_GET['indexP'] == $_SESSION['indexP'])
			{
				$this->indexP = $_SESSION['indexP'];
				$this->deletePerson();
				sleep(1);
				header("location: ?page=exit");
				exit();
			}
			else
			{
				sleep(1);
				header("location: ?page=home");
				exit();
			}
		}
	}
}
