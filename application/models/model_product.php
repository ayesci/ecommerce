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

    public function get_search($name, $ref, $min, $max, $owner)
    {
        $sql = "SELECT *
                FROM products
                WHERE name_product LIKE ? AND ref LIKE ? AND price BETWEEN ? AND ? AND owner LIKE ?
                ";
        $data = [$name, $ref, $min, $max, $owner];
        $query = $this->db->query($sql, $data);
        $res = [];
        foreach($query->result_array() as $row)
        {
            $res[] = $row;
        }
        return $res;
    }

    public function get_owners()
    {
        $sql = "SELECT owner
                FROM products
                GROUP BY owner
                ";
        $query = $this->db->query($sql);
        $owners = [];
        foreach ($query->result_array() as $all_owner)
        {
            $owners[] = $all_owner;
        }
        return $owners;
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

    public function get_picture_product($id)
    {
        $sql = "SELECT picture
                FROM img
                WHERE picture = ?
                ";
        $data = [$id];
        $query = $this->db->query($sql, $data);
        $pictures= $query->row_array();
        return $pictures;
    }

    ///////////// CATEGORIES /////////////

    public function get_topCategories()
    {
        $sql = "SELECT *
                FROM categories
                WHERE parent = ?
                ";
        $data = [0];
        $query = $this->db->query($sql, $data);
        $top_categories = [];
        foreach($query->result_array() as $row)
        {
            $top_categories[] = $row;
        }
        return $top_categories;
    }

    public function get_subCategories($parent)
    {
        $sql = "SELECT *
                FROM categories
                WHERE parent = ?
                ";
        $data = [$parent];
        $query = $this->db->query($sql, $data);
        $sub_categories = [];
        foreach($query->result_array() as $row)
        {
            $sub_categories[] = $row;
        }
        return $sub_categories;
    }

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
