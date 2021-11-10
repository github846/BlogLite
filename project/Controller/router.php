<?php 
    class Route
    {
        public $page;
        /* create object instance from router or page, never from class*/
        public function allRoute($page)
        {
            $this->page = $page;
            switch ($this->page)
            {
                case "signout":
                include("userC.php");
                $UserC = new UserC;
                $UserC->signoutConfirm();
                break;
                case "exit":
                $_SESSION = array();
                header("location: ?page=home");
                break;
                case "register":
                include("userC.php");
                $UserC = new UserC;
                $UserC->newPerson();
                break;
                case "login":
                include("userC.php");
                $UserC = new UserC();
                $UserC->login();
                break;
                case "profile":
                include("View/profile.php");
                case "me":
                include("UserC.php");
                $UserC = new UserC();
                $UserC->myProfile();
                break;
                case "userdel":
                include("View/deleteuser.php");
                break;
                case "postdel":
                include("View/deletearticle.php");
                break;
                case "commdel":
                include("View/deletecomment.php");
                break;
                case "editcomment":
                include("View/editcomment.php");
                break;
                case "editarticle":
                include("View/editarticle.php");
                break;
                case "post":
                include("View/summary.php");
                break;
                case "article":
                include("View/article.php");
                break;
                case "test":
                echo "you're logged in!";
                break;
                case "home":
                include("home.php");
                default:
                echo "<br> no page requested";
            }
        }
    }