<?php
class mahasiswa{
    public $conn;
    public function __construct($conn){
        $this->conn = $conn;
    }

    public function create(){
        $mahasiswa = mysqli_query($this->conn, "INSERT INTO FORM VALUES");
        $data = mysqli_fetch_assoc($mahasiswa);
        return $data;
    }
    public function delete(){
        $mahasiswa = mysqli_query($this->conn, "DELETE FROM FORM VALUES");
        $data = mysqli_fetch_assoc($mahasiswa);
        return $data;
    }

}
?>