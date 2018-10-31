<?php
class Ingredient{
    public $level = -1;
    public $quantity = -1;
    public $idIngredient = -1;
    
    public function __construct($level, $quantity,  $idIngredient){
        $this->level = $level;
        $this->quantity = $quantity;
        $this->idIngredient = $idIngredient;
    }
    
}