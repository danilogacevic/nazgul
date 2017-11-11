<?php 

class Note extends Db_object {
    
    protected static $db_table = "notes";
    protected static $db_table_fields = array('creature_id','note','datum');
    public $id;
    public $creature_id;
    public $note;
    public $datum;

    


    
   

    
} // End of note class




?>