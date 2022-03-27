<?php
require_once ('../../infra/connection.php');
class Usuario {
    public $idUsuario;
    public $nome;
    public $email;
    public $tipoUsuario;
    private $senha;

    private $connection;

    public function __construct() {
        $this->connection = new Connection();
    }

    //setters
    public function setNome($nome) {
        $this->nome = $nome;
    }   
    
    public function setEmail($email) {
        $this->email = $email;
    }    

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    //getters
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getNome() {
        return $this->nome;
    }   
    
    public function getEmail() {
        return $this->email;
    }    

    public function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    private function getSenha() {
        return $this->senha;
    }

    //consultas
    public function loginUsuario($email, $senha) {
        $sql = "SELECT idUsuario, nome, email, senha FROM usuario WHERE email = $email AND senha = $senha";
        $query = mysqli_query($this->connection->getConnection(), $sql);

        if($query && mysqli_num_rows($query) != 0) {
            $row = mysqli_fetch_assoc($query);
        } else {
            return 0;
        }

        $this->idUsuario = $row['idUsuario'];
        $this->nome = $row['nome'];
        $this->email = $row['email'];
        $this->senha = $row['senha'];

        return 1;
    }

    //cadastros
    public function cadastraUsuario($nome, $email, $tipoUsuario, $senha) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->tipoUsuario = $tipoUsuario;

        $sql = "INSERT INTO usuario (nome, email, senha, tipoUsuario) VALUES ('$nome', '$email', '$senha', $tipoUsuario)";
        return mysqli_query($this->connection->getConnection(), $sql);
    }
}
?>