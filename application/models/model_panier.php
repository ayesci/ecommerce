<?php


Class Model_Panier extends CI_Model
{
    public function list_articles_in_panier($user_id)
    {
        $sql = "SELECT products.id, products.ref, products.name_product, products.picture, products.price, panier.quantity, panier.id as id_panier
                FROM panier
                JOIN products ON panier.product_id = products.id
                WHERE user_id = ?
                ";
        $data = [$user_id];
        $query = $this->db->query($sql, $data);

        $res = [];
        foreach($query->result_array() as $row)
        {
            $res[] = $row;
        }
        return $res;
    }

    public function add_article_to_db($product_id, $user_id)
    {
        $sql = "INSERT INTO panier(product_id, user_id, quantity)
                VALUES (?, ?, 1)
                ";
        $data = [$product_id, $user_id];
        $this->db->query($sql, $data);
        return $this->db->insert_id();
    }

    public function change_quantity($quantity, $user_id, $article_id)
    {
        $sql = "UPDATE panier
                SET quantity = ?
                WHERE user_id = ? AND product_id = ?
                ";
        $data = [$quantity, $user_id, $article_id];
        $this->db->query($sql, $data);

    }

    public function delete_article($id_panier, $user_id)
    {
        $sql = "DELETE
                FROM panier
                WHERE id = ? AND user_id = ?
                ";
        $data = [$id_panier, $user_id];
        $this->db->query($sql, $data);
    }

    public function get_article_in_panier($product_id, $user_id)
    {
        $sql = "SELECT *
                FROM panier
                WHERE product_id = ? AND user_id = ?
                ";
        $data = [$product_id, $user_id];
        $query = $this->db->query($sql, $data);

        $res = $query->row_array();

        if($res)
        {
            return $res['quantity'];
        }
        else
        {
            return 0;
        }
    }

    public function nbr_article_in_panier($user_id)
    {
        $sql = "SELECT count(id) as nbr
                FROM panier
                WHERE user_id = ?
                ";
        $data = [$user_id];
        $query = $this->db->query($sql, $data);
        $nbr = $query->row_array();
        return $nbr['nbr'];
    }

}