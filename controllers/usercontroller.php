<?php

require_once("../models/user.php");
require_once("../controllers/DBcontroller.php");

class usercontroller
{
    protected $db;


    public function getusers()
    {
        $this->db = new DBcontroller;

        if($this->db->openconnection())
        {
            $query = "select * from users";
            return $this->db->select($query);
        }
        else
        {
            echo "error in database connection";
            return false;
        }


    }
    
    public function getroles()
    {
        $this->db = new DBcontroller;

        if($this->db->openconnection())
        {
            $query = "select * from roles";
            return $this->db->select($query);
        }
        else
        {
            echo "error in database connection";
            return false;
        }


    }

    public function adduser(user $user )
    {
        
        $this->db = new DBcontroller;
        if($this->db->openconnection())
        {
            $query = "insert into users values ('','$user->name','$user->password','$user->email','$user->roleid')";
            return $this->db->insert($query);
        }
        else
        {
            echo "error in database connection";
            return false;
        }
    }

    public function getalluseres()
    {
        $this->db = new DBcontroller;

        if($this->db->openconnection())
        {
            $query = "select users.id, users.name ,users.email,users.password from users where users.roleid = 2";
            return $this->db->select($query);
        }
        else
        {
            echo "error in database connection";
            return false;
        }
    }
     
    public function deleteuseres($id)
    {
        $this->db = new DBcontroller;
        if($this->db->openconnection())
        {
            $query = "delete from users where id  = $id";
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