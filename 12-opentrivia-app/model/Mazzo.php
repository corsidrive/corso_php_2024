<?php
namespace model;
use src\card\CardBool;
use src\card\CardMulti;
use src\card\CardQuestionBoolean;
use src\card\CardQuestionMultiple;
/**
 * @copyright Antonina
 */
Class Mazzo{
    public $mazzo_id;
    public $carte;
    //questa è una stringa!
    public function carte(){
        $arr=json_decode($this->carte, true);
        $carte2=[];
        foreach($arr['results'] as $carta_singola){
            if($carta_singola['type']=='multiple'){
                $carte2 []= new CardQuestionMultiple($carta_singola);
            }
            // if($carta_singola['type']=='boolean'){
            //     $carte2 []= new CardQuestionBoolean($carta_singola);
            // }         
        }
        return $carte2;
    }
}