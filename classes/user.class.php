<?php

class User{
  
      public $con;
      public $error;
      public $row;

public function __construct(){

    $this->con = mysqli_connect("localhost", "root", "", "dbuser");
    if(!$this->con){

        echo 'Database Connection Error ' . mysqli_connect_error($this->con);

      }
}


public function required_validation($field){
           $count = 0;
           foreach($field as $key => $value)
           {
                if(empty($value))
                {
                     $count++;
                     $this->error .= "<p style='color:red;'>" . $key . " is required</p>";
                }
           }
           if($count == 0)
           {
                return true;
           }
      }


public function login($where_condition){

           $condition = '';
           foreach($where_condition as $key => $value){

                $condition .= $key . " = '".$value."' AND ";

           }

           $condition = substr($condition, 0, -5);
           $query = "select * from tbl_user where " . $condition;
           $result = mysqli_query($this->con, $query);

  		   if(mysqli_num_rows($result)){

           $this->row = mysqli_fetch_array($result);
           return $this;

         }else
         {
            $this->error = "Invalid Credentials";
          }
      }
 }
 ?>
