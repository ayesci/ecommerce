<?php

class Model_User extends CI_Model
{
    public function get_users()
    {
        $sql = "SELECT *
                FROM users
                ";
        $query = $this->db->query($sql);
        $res = [];
        foreach($query->result_array() as $row)
        {
            $res[] = $row;
        }
        return $res;
    }

    public function users_exists($name)
    {
        $sql = "SELECT name
                FROM users
                WHERE name = ?
                ";
        $data = [$name];
        $query = $this->db->query($sql, $data);
        if($query->num_rows()==0)
        {
            return false;
        }
        else
        {
            return true;
        }

        return $this->db->insert_id();
    }

    public function create($name, $password, $email)
    {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $sql = "INSERT INTO users(name, password, email)
                VALUES(?, ?, ?)";
            $data = [$name, password_hash($password,PASSWORD_DEFAULT), $email];
            $this->db->query($sql, $data);
            return $this->db->insert_id();
        }
        return false;
    }

    public function valid_user($name, $password)
    {
        $sql = "SELECT *
                FROM users
                WHERE name = ?
                ";
        $data = [$name];
        $query = $this->db->query($sql, $data);
        $res = $query->row_array();

        if(password_verify($password, $res['password']))
        {
            $_SESSION['username'] = $res['name'];
            $_SESSION['id'] = $res['id'];
            return true;
        }
        else
        {
            return false;
        }
    }


}