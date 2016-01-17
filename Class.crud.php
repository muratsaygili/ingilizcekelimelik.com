<?php

session_start();
ob_start();

class crud{
    private $db;
    
    function __construct($baglan){
        $this->db = $baglan;
    }
    public function login($username,$password)
    {
        try {
            $user = $this->db->prepare("select * from user where username=? and password=?");
            $user->bindParam(1,$username);
            $user->bindParam(2,$password);
            $check = $user->execute();
            if ($check) {
                if ($user->rowCount() == 1) {
                    $user = $user->fetchAll();
                    return $user[0]['u_id'];
                }
            }
            return null;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function register($username,$password,$email)
    {
        try {
            $user = $this->db->prepare("insert into user(username,password,email) values(?,?,?)");
            $user->bindParam(1,$username);
            $user->bindParam(2,$password);
            $user->bindParam(3,$email);
            $check = $user->execute();
            if ($check) {
                return true;
            }
            return false;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getUserData($id)
    {
        try {
            $userData = $this->db->prepare("select * from user where u_id = ?");
            $userData->bindParam(1,$id);
            $check = $userData->execute();
            if ($check) {
                if ($userData->rowCount() == 1) {
                    return $userData->fetchAll();
                }
            }
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function getBox($id)
    {
        try {
            $boxes = $this->db->prepare("select * from box where u_id = ?");
            $boxes->bindParam(1,$id);
            $check = $boxes->execute();
            if ($check) {
                if ($boxes->rowCount()>0) {
                    return $boxes->fetchAll();
                }
                return false;
            }
            return false;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>
    