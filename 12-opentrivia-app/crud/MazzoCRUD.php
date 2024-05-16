<?php 
namespace crud;
use model\Mazzo;
use model\User;


class MazzoCRUD {

   
    private $pdo;
    public function __construct() {
        try {
            $dsn = 'mysql:dbname='.\Config::DB_NAME.';host='.\Config::DB_HOST;
            $user = \Config::DB_USER;
            $password = \Config::DB_PASSWORD;
            // Connnessione
            $this->pdo = new \PDO($dsn, $user, $password);  //code...
            // $this->pdo->exec("USE ".\Config::DB_NAME.";");

        } catch (\PDOException $th) {

             throw $th;
            
        }

    }
    public function create($query_string){

         $url = "https://opentdb.com/api.php?". http_build_query($query_string);
         $response = getJson($url);
        #
        
        $carte = json_encode($response);
        
            $sql = "INSERT INTO mazzo (carte) VALUES (:carte)";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':carte',$carte,\PDO::PARAM_STR);
            $stm->execute();
        
       
        return  $this->pdo->lastInsertId();
    }

    public function readOne(int $mazzo_id) {
        $sql = "SELECT * FROM mazzo WHERE mazzo_id = :mazzo_id;";
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':mazzo_id',$mazzo_id,\PDO::PARAM_INT);
        $stm->execute();

        $mazzo = $stm->fetchAll(\PDO::FETCH_CLASS,Mazzo::class)[0];
        // $user = $stm->fetchAll(\PDO::FETCH_FUNC,function($nome,$cognome,$email){
        //             return new User($no)
        // })[0];
        return $mazzo;
    }

 

    public function readAll() : array {
        $sql = "";
        $stm = $this->pdo->prepare($sql);
        $stm->execute();

        // $stm->fetchAll(\PDO::FETCH_ASSOC);
        $risultato = $stm->fetchAll(\PDO::FETCH_CLASS,User::class);
        return $risultato;
    }

    public function findByMail($email){
        $sql = "";
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':email',$email);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_CLASS,User::class);
        
        if(count($result) == 0){
            throw new \Exception("Utente non trovato", 666);
        }elseif (count($result) == 1) {
            # code...
            return $result[0];
        }
    }

    public function delete(int $user_id) {
        $sql = "";
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':user_id',$user_id,\PDO::PARAM_INT);
        $stm->execute();
    }

    public function update(User $user) {

        // print_r($user);die();

        $sql="";
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':nome',$user->nome,\PDO::PARAM_STR);
        $stm->bindValue(':cognome',$user->cognome);
        $stm->bindValue(':email',$user->email);
        $stm->bindValue(':user_id',$user->user_id);
        $stm->execute();

    }

}