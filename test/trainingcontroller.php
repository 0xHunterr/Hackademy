<?php
require_once("../models/training.php");
require_once("../controllers/DBcontroller.php");

class trainingcontroller
{
    protected $db;


    


    public function addtraining(train $training )
    {
        
        $this->db = new DBcontroller;
        if($this->db->openconnection())
        {
            $query = "insert into trainings values ('','$training->name','$training->description','$training->date')";
            return $this->db->insert($query);
        }
        else
        {
            echo "error in database connection";
            return false;
        }
    }

    public function getall_trainings()
    {
        $this->db = new DBcontroller;

        if($this->db->openconnection())
        {
            $query = "select *from trainings";
            return $this->db->select($query);
        }
        else
        {
            echo "error in database connection";
            return false;
        }
    }
     
    public function delete_training($id)
    {
        $this->db = new DBcontroller;
        if($this->db->openconnection())
        {
            $query = "delete from trainings where id  = $id";
            return $this->db->delete($query);
        }
        else
        {
            echo "error in database connection";
            return false;
        }
    }

    



}


?>