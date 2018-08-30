<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
Class HomeModel extends CI_Model
{
    public function getData()
    {
        $QUERY = $this->db->get('user');
        return $QUERY->result();
        
    }
}
