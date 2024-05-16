<?php 
namespace src\card;
class CardQuestionMultiple extends CardQuestion {
    private $correct_answer;
    private $incorrect_answers;

    public function __construct($data) {
        parent::__construct($data);
        $this->incorrect_answers = $data['incorrect_answers'];
        $this->correct_answer = $data['correct_answer'];
    }

    public function showAnswers():array  {
      
        /** 
        $this->incorrect_answers              --> ...$this->incorrect_answers
        ["Neon", "Argon", "Krypton","Helium"] --> "Neon", "Argon", "Krypton","Helium" ;

        scrivi("Neon", "Argon", "Krypton","Helium");

        $all_answers = ["Neon", "Argon", "Krypton","Helium","cicio"];
        
        non corretto perche  inserisce  tra le risposte sbagliate anche quella giusta
        $this->incorrect_answers[] = $this->correct_answer;

        */
        # sommo le risposte giuste con sbagliate
        $all_answers =  [...$this->incorrect_answers, $this->correct_answer];
        return $all_answers;
        // // $all_answers =  $this->incorrect_answers[] = $this->correct_answer;
        // shuffle($all_answers);
        // return $all_answers; // $all_answers
    }

    public function isCorrect($user_response):bool
    {
        return true;
    }
}