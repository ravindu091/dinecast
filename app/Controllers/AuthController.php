<?php
require_once __DIR__ .'/../models/User.php';
class AuthController extends Controller {

    /**
     * GET /  — Show the login page
     */
    public function loginView(array $params = []): void {
        $this->render('login');
    }

    public function login(){
        if(isset($_POST['username']) && isset($_POST['password'])){
            $username = trim($_POST['username']);
            $password = $_POST['password'];

            if($username === '' || $password === ''){
                $_SESSION['message'] = "Enter the username and password";
                $_SESSION['message-type'] = "error";

                header("Location: " . BASE_URL . "/");
                exit;
            }
            $user = new User();
            $existingUser = $user->getUserByUsername($username);

            if(!$existingUser){
                $_SESSION['message'] = "There is no account with that username.";
                $_SESSION['message-type'] = "error";

                header("Location: " . BASE_URL . "/");
                exit;
            }

            //if there is a existing user
            //check password match
            
            if(password_verify($password,$existingUser["password_hash"])){
                //if password matched
                //check whether user active or inactive

                if($existingUser['is_active'] < 1){
                    $_SESSION['message'] = "This user is not active. Please contact Admin";
                    $_SESSION['message-type'] = "error";

                    header("Location: " . BASE_URL . "/");
                    exit;
                }

                //user is a active user
                //create a session
                session_regenerate_id(true);
                $_SESSION['userId'] = $existingUser['id'];
                $_SESSION['fullName'] = $existingUser['full_name'];
                $_SESSION['username'] = $existingUser['username'];
                $_SESSION['role'] = $existingUser['role'];
                $_SESSION['profile_picture'] = $existingUser['profile_picture'];

                header("Location: " . BASE_URL . "/" . $_SESSION['role']);
                exit;

            }else{
                //password doesn't matched
                
                $_SESSION['message'] = "Username and password do not match";
                $_SESSION['message-type'] = "error";

                header("Location: " . BASE_URL . "/");
                exit;

            }

        }else{
            //username and password not found
            $_SESSION['message'] = "Please enter username and password";
            $_SESSION['message-type'] = "error";

            header("Location: " . BASE_URL . "/");
            exit;

        }

    }
    public function logOut(){
        session_unset();
        session_destroy();
        header("Location: " . BASE_URL . "/");
        exit;
    }
}
