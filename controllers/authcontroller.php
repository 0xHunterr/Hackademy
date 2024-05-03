<?php
require_once("../models/user.php");
require_once("../controllers/DBcontroller.php");

class authcontroller
{
    protected $db;



    public function login(User $user)
    {
        $this->db=new DBController;
        if($this->db->openConnection())
        {
            $query="select * from users where email='$user->email' and password ='$user->password'";
            $result=$this->db->select($query);
            if($result===false)
            {
                echo "Error in Query";
                return false;
            }
            else
            {
                if(count($result)==0)
                {
                    session_start();
                    $_SESSION["errmsg"]="You have entered wrong email or password";
                    $this->db->closeConnection();
                    return false;
                }
                else
                {
                    session_start();
                    $_SESSION["userId"]=$result[0]["id"];
                    $_SESSION["userName"]=$result[0]["name"];
                    if($result[0]["roleid"]==1)
                    {
                        $_SESSION["userRole"]="Admin";
                    }
                    else
                    {
                        $_SESSION["userRole"]="User";
                    }
                    $this->db->closeConnection();
                    return true;
                }
            }
        }
        else
        {
            echo "Error in Database Connection";
            return false;
        }
    }


/*

    public function login(user $user){
           $this->db = new DBcontroller;
            if($this->db->openconnection())
            {
                $query="select * from users where email='$user->email' and password ='$user->password'";
                $result=$this->db->select($query);
                if($result===false)
                {
                    echo ' Error in query';
                    return false;
                }
                else
                {
                    return true;
                    if(count($result)==0 )
                    {
                        session_start();
                        $_SESSION["errmsg"] = "wrong email or password";
                        $this->db->closeConnection();
                        return false;
                    }   
                    else
                    {
                        session_start();
                        $_SESSION["userId"] =$result[0]["id"];
                        $_SESSION["userName"] =$result[0]["name"];

                        if($result[0]["roleid"] == 1)
                        {
                            $_SESSION["userRole"]="Admin";
                        }else
                        {
                            $_SESSION["userRole"]="User";
                        }
                       
                       
                        $this->db->closeConnection();
                        return true;
                    }
                 
                }


            }
            else
            {
                echo "error";
                return false;
            }
    }
    






*/




    
        public function register(user $user)
        {
            $this->db = new DBcontroller;
            if($this->db->openconnection())
            {

                $query = " insert into users values('','$user->name','$user->password','$user->email',2) ";
                $result = $this->db->insert($query);
                if($result!=false)
                {
                    session_start();
                    $_SESSION["userId"] =$result ;
                    $_SESSION["userName"] =$user->name ;
                    $_SESSION["userRole"] = "User" ;

                    $this->db->closeconnection();
                    return true;
                    }
                else
                {
                    
                    $_SESSION["errmsg"] = "some thing went wrong....try agine later";
                    $this->db->closeconnection();
                    return false;
                }
            }
            else
            {
                echo "error";
                return false;
            }
        }
     
}


?>