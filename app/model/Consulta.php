<?php
require_once ('../../infra/connection.php');

class Consulta {
    private $connection;

    public function __construct() {
        $this->connection = new Connection();
    }

    function consultaDuplicidadeEmail($email) {
        $sql = "SELECT idUsuario, nome, email, senha FROM usuario WHERE email = '$email'";
        $query = mysqli_query($this->connection->getConnection(), $sql);
    
        if($query && mysqli_num_rows($query) != 0) {
            return 1;
        } else {
            return 0;
        }
    }
}
