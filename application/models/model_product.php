<?php


Class Model_Product extends CI_Model
{

    ///////////////// PRODUCT //////////

    public function get_icon_product()
    {
        $sql = "SELECT *
                FROM products
                ";
        $query = $this->db->query($sql);
        $res = [];
        foreach($query->result_array() as $row)
        {
            $res[] = $row;
        }
        return $res;
    }

    public function add_product($ref, $name_product, $category, $picture)
    {
        $sql = "INSERT INTO products(ref, name_product, category, picture)
                VALUES (?, ?, ?, ?)
              ";
        $data = [$ref, $name_product, $category, $picture];
        $this->db->query($sql, $data);
        return $this->db->insert_id();
    }

    public function get_details_product($id)
    {
        $sql = "SELECT *
                FROM products
                WHERE id = ?
                ";
        $data = [$id];
        $query = $this->db->query($sql, $data);
        $details= $query->row_array();
        return $details;
    }

    public function get_price($min, $max)
    {
        $sql = "SELECT *
                FROM products
                WHERE price BETWEEN ? AND ?
                ";
        $data = [$min, $max];
        $query = $this->db->query($sql, $data);
        $res = [];
        foreach($query->result_array() as $row)
        {
            $res[] = $row;
        }
        return $res;
    }

    ///////////// CATEGORIES /////////////

    public function get_categories()
    {
        $sql = "SELECT category
                FROM products
                GROUP BY category
                ";
        $query = $this->db->query($sql);
        $categories = [];
        foreach ($query->result_array() as $all_categories)
        {
            $categories[] = $all_categories;
        }
        return $categories;
    }

    public function products_by_categories($cat)
    {
        $sql = "SELECT *
                FROM products
                WHERE category = ?
                ";
        $data = [$cat];
        $query = $this->db->query($sql, $data);

        $products = [];
        foreach ($query->result_array() as $product)
        {
            $products[] = $product;
        }
        return $products;
    }


}
