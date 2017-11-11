<?php 

class Crime extends Db_object {
    
    protected static $db_table = "crimes";
    protected static $db_table_fields = array('creature_id','note','datum','punished');
    
    public $id;
    public $creature_id;
    public $note;
    public $datum;
    public $punished;

    
    

    
} // End of crime class




?>