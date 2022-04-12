<?php

class Model
{
    private $server = "localhost";
    private $username = "id17734979_database";
    private $password = "{%->DLz}JG9~Xc1w";
    private $db = "id17734979_gsis";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (\Throwable $th) {
            //throw $th;
            echo "Connection error " . $th->getMessage();
        }
    }

    public function fetch()
    {
        $data = [];
         // $query = "SELECT inventory.qty, inventory.stock_from, inventory.remarks, inventory.date_updated, product_list.name FROM inventory left JOIN product_list on inventory.product_id = product_list.id";
         $query = "SELECT inventory.qty, inventory.stock_from, inventory.remarks, inventory.date_updated, product_list.description FROM inventory FULL OUTER JOIN product_list ON inventory.product_id=product_list.id";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function date_range($start_date, $end_date)
    {
        $data = [];

        if (isset($start_date) && isset($end_date)) {
            $query = "SELECT * FROM `inventory` WHERE `date_updated` > '$start_date' AND `date_updated` < '$end_date'";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
        }

        return $data;
    }
}