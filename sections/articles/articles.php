<?php
    namespace SITE;
    class Page {
        public $topdescription;
        public $ui;
        public $tablename;

        public function __construct($id)
        {
            include 'scripts/php/echotable.php';
            include 'scripts/php/db.php';
            $this->$tablename = explode("\n",explode("table=",file_get_contents("rt.conf"))[1])[0];
            if(!isset($id)){
                $this->topdescription = "Главная";
                $this->ui = formNewsList($this->$tablename);
            }
            else {
                $query = $conn->query("SELECT * FROM ".$this->$tablename." WHERE id='".$id."';");
                $row = $query->fetch_array(MYSQLI_ASSOC);
                $date = $row['date'];
                $this->topdescription = $row['name'];
                $this->ui = formArticle($this->$tablename,$id,$date);
            }
        }
    }
?>
