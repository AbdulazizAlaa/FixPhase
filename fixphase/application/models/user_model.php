<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model{

    //<===========Ali & Bassem=============>
    public function insert_user($data)
    {
      $query = $this->db->insert('users',$data);
      if($query){
        return true;
      }else{
        return false;
      }
    }

    //<============Moataz============>
        /**
     * This Function used to check is email exists in db
     * @param $email
     * @return bool
         * Author : Moataz M. Farid
     */
    public function isemail($email){
        $email = strtolower ($email);
        $sql='Select * from `users` where `email` = ?';
        $query = $this->db->query($sql,array($email));
        if($query->num_rows() == 1){
            return true;
        }
        return false;
    }

    /**
     * This Function used to check is username exists in db
     * @param $user
     * @return bool
     * Author : Moataz M. Farid
     */
    public function isusername($user){
        $user = strtolower ($user);
        $sql='Select * from `users` where `username` = ?';
        $query = $this->db->query($sql,array($user));
        if($query->num_rows() == 1){
            // user exists and
            return true;
        }
        //var_dump($user); // used for test
        return false;
    }

    /**
     * This function return true if user exists and false if user/email + password don't match
     * @param $user
     * @param $email
     * @param $password
     * @return bool
     * Author : Moataz M. Farid
     */
    public function logging($user,$email,$password){
        $user = strtolower ($user);
        $email = strtolower ($email);
    //        var_dump($user); // testing
    //        var_dump($email); // testing

        if($this->isemail($email)&&isset($password)){
            $sql='Select * from `users`  where `email` = ? and `password` = ?';
            $query = $this->db->query($sql,array($email,$password));
            if($query->num_rows() > 0){
                // user exists and
                return true;
            }
        }elseif($this->isusername($user)&&isset($password)){
            $sql='Select * from `users` where `username` = ? and `password` = ?';
            $query = $this->db->query($sql,array($user,$password));
            if($query->num_rows() == 1){
                // user exists and
                return true;
            }
        }else{
            return false;
        }
    }
}
