<?php
namespace src\card;
abstract class CardQuestion {
    protected $type;
    protected $question;
    protected $difficulty;
    protected $category;

    public $user_answer;
    public function __construct(array $data) {
         $this->type = $data['type'];
         $this->question = $data['question'];
         $this->difficulty = $data['difficulty'];
         $this->category = $data['category'];
    }

    public function showQuestion() : string {
        return $this->question;
    }

    public abstract function showAnswers() : array;
    public abstract function isCorrect($user_response):bool;
    public abstract function serializeJSON():string;
    public abstract function toArray():array;


}

