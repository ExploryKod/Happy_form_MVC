<?php
require_once __DIR__.'/Controller.php';
require_once dirname(__FILE__, 2).'/Services/JWTHelper.php';
require_once dirname(__FILE__, 2).'/models/Managers/getUserData.model.php';
require_once dirname(__FILE__, 2).'/models/Managers/postUserData.model.php';

class AccountsController extends MainController
{
    public function login()
    {
        $user = null;
        if(isset($_POST['account_login']))  {
            if(isset($username) && isset($password)) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $getUserData = new getUserData();
                $postUserData = new postUserData();
                $user = $getUserData->getUserByName($username);

            if ($user && $user->verifyPassword($password)) {
                $jwt = JWTHelper::buildJWT($user);
                $user->setToken($jwt);
                $postUserData->update($user);

                }
            }
        }

        $data_page = [
            "page_description" => "S'enregistrer",
            "page_title" => "login",
            "page_css" => ["form.css"],
            "user" => $user,
            "page_javascript" => ["inputsValidation.js", "openCloseForm.js", "confirmPopUp.js"],
            "view" => "login.view.php",
            "template" => "common/template.php"
        ];

        $this->generatePage($data_page);
    }

    public function signUp()
    {
        $user = null;
        if(isset($_POST['account_register']))  {
            $username = $_POST['username'];
            if(isset($username)) {

                $getUserData = new getUserData();
                $postUserData = new postUserData();
                $user = $getUserData->getUserByName($username);
                if (!isset($user)) {
                    $user = new Users($_POST);
                    $user = $postUserData->insert($user);
//                    $jwt = new JWTHelper();
//                    $jwtstr = $jwt->buildJWT($user);
                    $jwt = JWTHelper::buildJWT($user);
                    $user->setToken($jwt);
                    $postUserData->update($user);
                }
            }
        }
        $data_page = [
            "page_description" => "S'enregistrer",
            "page_title" => "SignUp",
            "page_css" => ["form.css"],
            "user" => $user,
            "page_javascript" => ["inputsValidation.js", "openCloseForm.js", "confirmPopUp.js"],
            "view" => "login.view.php",
            "template" => "common/template.php"
        ];
        $this->generatePage($data_page);
    }

    public function signout()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            unset($_SESSION["user"]);
            http_response_code(200);
        }
        exit();
    }
}