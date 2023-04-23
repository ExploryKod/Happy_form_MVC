<?php
require_once __DIR__.'/Controller.php';
require_once __DIR__.'/CustomerFormController.php';
require_once dirname(__FILE__, 2).'/Services/JWTHelper.php';
require_once dirname(__FILE__, 2).'/models/Managers/getUserData.model.php';
require_once dirname(__FILE__, 2).'/models/Managers/postUserData.model.php';

class AccountsController extends MainController
{

    private function accountDatas($user, $view ='login.form.php', $message = "", $logged = false)
    {

          $data_page = [
            "page_description" => "S'enregistrer",
            "page_title" => "login",
            "page_css" => ["form.css"],
            "logged" => $logged,
            "user" => $user,
             "message" => $message,
            "page_javascript" => ["inputsValidation.js", "openCloseForm.js", "confirmPopUp.js"],
            "view" => $view,
            "template" => "common/template.php"
        ];

        $this->generatePage($data_page);
    }

    public function loginFormPage($message = "")
    {
        $user = null;
        $view = 'login.view.php';
        $this->accountDatas($user, $view, $message);
    }

    public function login()
    {
        if(isset($_POST['account_login']))  {
            $username = $_POST['username'] ?? null;
            $password = $_POST['password'] ?? null;

            if(isset($username) && isset($password)) {
                $getUserData = new getUserData();
                $user = $getUserData->getUserByName($username);

            if($user && $user->verifyPassword($password)) {
                $_SESSION['user'] = $username;
                $user->setSession($_SESSION['user']);
                $view = 'login.view.php';
                $message = 'vous êtes connecté';
                $this->accountDatas($user, $view, $message);

                } else  {
                    $this->pageError("Votre mot de passe ou nom d'utilisateur est invalide");
                    exit();
                }
            }
        }
        $this->signUp();
    }

    public function signUp()
    {
        if(isset($_POST['account_register']))  {

            $username = $_POST['username'];
            if(isset($username)) {

                $getUserData = new getUserData();
                $postUserData = new postUserData();
                $user = $getUserData->getUserByName($username);
                if (!isset($user)) {
                    $user = new Users($_POST);
                    $user = $postUserData->insert($user);
                    $jwt = JWTHelper::buildJWT($user);
                    $user->setToken($jwt);
                    $postUserData->update($user);
                    $view = 'login.view.php';
                    $message = 'Vous êtes bien inscris';
                    $this->accountDatas($user, $view, $message);
                } else  {
                    $view = 'login.view.php';
                    $message = 'Vous êtes déjà inscris';
                    $this->accountDatas($user, $view, $message);
                }
            }
        } else  {
            $message = "Vous n'avez pas pu vous enregistrer";
            $this->loginFormPage($message);
        }
    }

    public function signOut()
    {
        if($_SERVER["REQUEST_METHOD"] === "GET") {
            unset($_SESSION["user"]);
            $this->loginFormPage("Vous êtes bien déconnecté");
        }
    }
}