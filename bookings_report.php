<?php

if ($_SERVER['REQUEST_METHOD']=="GET"){

    $database_operation=new User_Region_Reports();

    $database_operation->users();

}


class  User_Region_Reports{

    private  $connection;

    function  __construct()
    {
        include_once ("dbconfig.php");
        $db=new DatabaseConnection();

        $this->connection=$db->connection();
    }

    public  function  users(){

        mysqli_begin_transaction($this->connection);

        $query="SELECT reg_date,COUNT(reg_date) as number FROM `users` GROUP BY reg_date";
        $result=mysqli_query($this->connection,$query);
        $activearray = array();
        mysqli_commit($this->connection);
        while ($row=mysqli_fetch_assoc($result)) {
            $activearray[]=$row;
        }

        echo json_encode($activearray);

    }
}


