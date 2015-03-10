<?php


Class Model_Panier extends CI_Model
{
    public function get_articles_to_panier()
    {
        $sql = "SELECT *
                FROM panier
                ";
        $query = $this->db->query($sql);
        $res = [];
        foreach($query->result_array() as $row)
        {
            $res[] = $row;
        }
        return $res;
    }

}