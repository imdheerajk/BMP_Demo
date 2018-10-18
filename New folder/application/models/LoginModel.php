<?php

Class LoginModel extends CI_Model
{
    public function Login($uname, $passwd)
    {
        $this->db->select("username, password");
        $this->db->from("user");
        $this->db->where("username", $uname);
        $this->db->where("password", $passwd);
        
        $QUERY = $this->db->get();
        
        if($QUERY->num_rows() == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
