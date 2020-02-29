
<?php

if ($_SERVER["REQUEST_METHOD"]=="GET"){

    $database_operation=new Fetch_Administrators();

    $database_operation->get_administrators();;


}


class  Fetch_Administrators{

    private  $connection;

    function  __construct()
    {

        $this->connection=mysqli_connect("localhost","root","","msaidizi");
    }

    public  function  get_administrators(){

        mysqli_begin_transaction($this->connection);

        $statement=$this->connection->query("SELECT * FROM offers 
        LEFT JOIN services ON `services`.`public_id`=`offers`.`worker_id`
        LEFT JOIN users ON `users`.`public_id`=`offers`.`worker_id`
        WHERE `offers`.`public_id`=1582794349 ");
        $administrators=array();
        foreach ($statement as $row){

            $administrators[] = $row;

        }
        echo json_encode($administrators);

        mysqli_commit($this->connection);


    }


}
?>

