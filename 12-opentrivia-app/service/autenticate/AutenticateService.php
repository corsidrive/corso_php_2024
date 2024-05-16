<?php
// service\autenticate
// C:\xampp\htdocs\corso_php_2024\12-opentrivia-app\service\autenticate\AutenticateService.php
namespace service\autenticate;


use crud\UserCRUD;

class AutenticateService {

    public static function logIn($email,$password) {
        // var_dump($email,$password);
        try {
            $crud = new UserCRUD;
            # esiste un utente con la stessamail
            $user = $crud->findByMail($email);
       
            # controlliamo la password inserita
            // var_dump($user->password === md5($password));
            if($user->password === md5($password)){

                $_SESSION['user_id'] = $user->user_id;
                // $_SESSION['ciccio'] = "altri dati";
                return true;
            }else{

                throw new \Exception("accesso negato", 1);
            }
            //code...
        } catch (\Throwable $th) {
            //   "utente non trovato devi registrari";
            //  echo $th->getMessage();
            throw $th;
        }

       
    }

    public static function logOut(){
        // $a = null;
        // unset($_SESSION['user_id']);# eseguite tutte le operazione da fare prima del log out
        session_destroy();
    }

    public static function isAutenticate(){
        return isset($_SESSION['user_id']);
    }
    public static function getAuthenticatedUser(){
        // AutenticateService::isAutenticate()
        if(self::isAutenticate()){
           $userCRUD = new UserCRUD();
           return $userCRUD->readOne($_SESSION['user_id']);
        }
    }

}