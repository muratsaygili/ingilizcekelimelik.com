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
            $boxes = $this->db->prepare("select * from box where u_id = ? order by b_id desc");
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
    public function userUpdate($id,$username,$email)
    {
        try {
            $updatedUser = $this->db->prepare("update user set username = ?, email = ? where u_id = ?");
            $updatedUser->bindParam(1,$username);
            $updatedUser->bindParam(2,$email);
            $updatedUser->bindParam(3,$id);
            $check = $updatedUser->execute();
            if ($check) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function createBox($box_name,$id)
    {
        try {
             $box = $this->db->prepare("insert into box(u_id,b_name) values(?,?)");  
             $box->bindParam(1,$id);
             $box->bindParam(2,$box_name);
             $check = $box->execute();
             if ($check) {
                 return true;
             }return false;
        }catch (PDOException $e) {
               echo $e->getMessage();
        }   
    }
    public function deleteBox($b_id,$u_id)
    {
         try {
             $deleted = $this->db->prepare("delete from box where b_id =? and u_id = ?"); 
             $deleted->bindParam(1,$b_id);
             $deleted->bindParam(2,$u_id);
             $check = $deleted->execute();
             if ($check) {
                 return true;
             }return false;
             
        }catch (PDOException $e) {
               echo $e->getMessage();
        } 
    }

    public function createVocabulary($v_name,$v_trans,$v_example,$u_id,$b_id)
    {
        try {
            $vocabulary = $this->db->prepare("insert into vocabulary(v_name,v_trans,v_example,u_id,b_id) values(?,?,?,?,?)");
            $vocabulary->bindParam(1,$v_name);
            $vocabulary->bindParam(2,$v_trans);
            $vocabulary->bindParam(3,$v_example);
            $vocabulary->bindParam(4,$u_id);
            $vocabulary->bindParam(5,$b_id);
            $check = $vocabulary->execute();
            if ($check) {
                return true;
            }return false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getVocInBox($b_id,$u_id)
    {
        try {
            $vocabularies = $this->db->prepare("select * from vocabulary where b_id = ? and u_id = ?");
            $vocabularies->bindParam(1,$b_id);
            $vocabularies->bindParam(2,$u_id);
            $check = $vocabularies->execute();
            if ($check) {
                return $vocabularies->fetchAll();
            }return null;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function deleteVoc($v_id,$u_id)
    {
         try {
             $deleted = $this->db->prepare("delete from vocabulary where v_id =? and u_id = ?"); 
             $deleted->bindParam(1,$v_id);
             $deleted->bindParam(2,$u_id);
             $check = $deleted->execute();
             if ($check) {
                 return true;
             }return false;
             
        }catch (PDOException $e) {
               echo $e->getMessage();
        } 
    }

}

?>
    