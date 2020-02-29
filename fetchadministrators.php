<?php

if ($_SERVER["REQUEST_METHOD"]=="GET"){

    $database_operation=new Fetch_Administrators();

    $database_operation->get_administrators();;


}


class  Fetch_Administrators{

    private  $connection;

    function  __construct()
    {
        include_once ("connection.php");
        $db=new DatabaseConnection();

        $this->connection=$db->connection();
    }

    public  function  get_administrators(){

        mysqli_begin_transaction($this->connection);

        $statement=$this->connection->query("SELECT * FROM `administrator`;");
        $administrators=array();
        foreach ($statement as $row){

            $administrators[] = $row;

        }
        echo json_encode($administrators);

        mysqli_commit($this->connection);


    }


}
