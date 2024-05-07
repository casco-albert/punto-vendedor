<?php
include 'db.php';

class User extends DB{
    private $nombre;
    private $username;
    private $puntos;
    private $id_vendedor;


    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT a.nombre, a.username, a.password, b.id, b.ven_puntos AS puntos FROM usuarios a JOIN vendedor b ON a.id=b.id WHERE a.username = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['username'];
            $this->puntos = $currentUser['puntos'];
            $this->id_vendedor = $currentUser['id'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getUser(){
        return $this->username;
    }
    public function getPuntos(){
        return $this->puntos;
    }
    public function getVendedor(){
        return $this->id_vendedor;
    }
}


?>