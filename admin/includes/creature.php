<?php 

class Creature extends Db_object {
    
    protected static $db_table = "creatures";
    protected static $db_table_fields = array('name','gender','birth_place','birth_date','ever_carried_ring','enslaved_by_sauron','race','reg_date');
    
    public $id;
    public $name;
    public $gender;
    public $birth_place;
    public $birth_date;
    public $ever_carried_ring;
    public $enslaved_by_sauron;
    public $race;
    public $reg_date;
  
 

    
} // End of creature class




?>