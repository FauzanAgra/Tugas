<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mymodel extends CI_Model
{
    public function Get($table)
    {
        $res = $this->db->get($table);
        return $res->result_array();
    }

    public function GetWhere($table, $data)
    {
        $res = $this->db->get_where($table, $data);
        return $res->result_array();
    }

    public function Insert($table, $data)
    {
        $res = $this->db->insert($table, $data);
        return $res;
    }

    public function Update($table, $data, $where)
    {
        $res = $this->db->update($table, $data, $where);
        return $res;
    }

    public function Delete($table, $where)
    {
        $res = $this->db->delete($table, $where);
        return $res;
    }

    public function GetAcaraRelawan($id_relawan)
    {
        $res = $this->db->query("SELECT a.nama, ra.id_acara, ra.status, ra.id_relawan_acara FROM relawan_acara ra JOIN acara a ON ra.id_acara = a.id_acara WHERE ra.id_relawan='$id_relawan'");
        return $res->result_array();
    }
}
