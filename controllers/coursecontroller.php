<?php
require_once("../models/coursecategories.php");
require_once("../models/course.php");
require_once("../controllers/DBcontroller.php");

class coursecontroller
{
    protected $db;


    public function getcategories()
    {
        $this->db = new DBcontroller;

        if($this->db->openconnection())
        {
            $query = "select * from coursecategories";
            return $this->db->select($query);
        }
        else
        {
            echo "error in database connection";
            return false;
        }


    }


    public function addcourse(course $course )
    {
        
        $this->db = new DBcontroller;
        if($this->db->openconnection())
        {
            $query = "insert into courses values ('','$course->name','$course->description','$course->image','$course->coursecategoryid')";
            return $this->db->insert($query);
        }
        else
        {
            echo "error in database connection";
            return false;
        }
    }
/*
    public function getallcourses()
    {
        $this->db = new DBcontroller;

        if($this->db->openconnection())
        {
            $query = "select courses.id,courses.name, courses.description ,coursecategories.name AS'category' from courses,coursecategories where courses.coursecategoryid = coursecategories.id";
            return $this->db->select($query);
        }
        else
        {
            echo "error in database connection";
            return false;
        }
    }
    */
    public function getallcourses()
    {
        $this->db = new DBcontroller;

        if($this->db->openconnection())
        {
            $query = "select courses.image, courses.id,courses.name, courses.description ,coursecategories.name AS'category' from courses,coursecategories where courses.coursecategoryid = coursecategories.id";
            return $this->db->select($query);
        }
        else
        {
            echo "error in database connection";
            return false;
        }
    }
     
    public function deletecourses($id)
    {
        $this->db = new DBcontroller;
        if($this->db->openconnection())
        {
            $query = "delete from courses where id  = $id";
            return $this->db->delete($query);
        }
        else
        {
            echo "error in database connection";
            return false;
        }
    }

    public function getegorycourses($id)
    {
        $this->db = new DBcontroller;

        if($this->db->openconnection())
        {
            $query = "select courses.image, courses.id,courses.name, courses.description ,coursecategories.name AS'category' from courses,coursecategories where courses.coursecategoryid = coursecategories.id and coursecategories.id = $id";
            return $this->db->select($query);
        }
        else
        {
            echo "error in database connection";
            return false;
        }
    }



}


?>