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

    public function get_pictures_product($id)
    {
        $sql = "SELECT img.*
                FROM img
                JOIN products ON products.id = img.parent
                WHERE products.id = ?
                ";
        $data = [$id];
        $query = $this->db->query($sql, $data);
        $img = [];
        foreach ($query->result_array() as $all_img)
        {
            $img[] = $all_img;
        }
        return $img;
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


    ///////////// COMMENTAIRES /////////////

    public function get_comm($id)
    {
        $sql = ("SELECT comm.*, users.name
              FROM comm
              JOIN users ON users.id = comm.author
              WHERE comm.parent = ?
              ");
        $data = [$id];
        $query = $this->db->query($sql, $data);
        $avis = [];
        foreach ($query->result_array() as $all_comm)
        {
            $avis[] = $all_comm;
        }
        return $avis;
    }

    public function add_avis($title, $note, $content, $id)
    {
        $sql = "INSERT INTO comm(title, note, author, content, parent)
                VALUES (?, ?, ?, ?, ?)
                ";
        $data = [$title, $note, $_SESSION['id'], $content, $id];
        $this->db->query($sql, $data);
        return $this->db->insert_id();
    }

    public function get_moy_stars($id_product)
    {
        $sql = "SELECT avg(note) AS moyenne
                FROM comm
                WHERE parent = ?
                ";
        $data = [$id_product];
        $query = $this->db->query($sql, $data);
        $moy = $query->row_array();
        return $moy['moyenne'];
    }



}
