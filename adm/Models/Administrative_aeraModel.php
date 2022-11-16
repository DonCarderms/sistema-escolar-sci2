<?php

class  Administrative_aeraModel extends ConnectionController {
    public object $conn;

    public function adm(){
        echo " chegou adm model";
        $this->conn = $this->connectDb();
    }
}