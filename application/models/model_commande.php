<?php


Class Model_Commande extends CI_Model
{
    public function add_info_livraison_to_db($firstname_liv, $lastname_liv, $nbr_street_liv, $street_liv, $postCode_liv, $city_liv, $user_id)
    {
        $sql = "INSERT INTO livraison(firstname, lastname, nbr_street, street, postCode, city, user_id)
                VALUES (?, ?, ?, ?, ?, ?, ?)
                ";
        $data = [$firstname_liv, $lastname_liv, $nbr_street_liv, $street_liv, $postCode_liv, $city_liv, $user_id];
        $this->db->query($sql, $data);

        return $this->db->insert_id();
    }

    public function add_info_facturation_to_db($firstname_fac, $lastname_fac, $nbr_street_fac, $street_fac, $postCode_fac, $city_fac, $user_id)
    {
        $sql = "INSERT INTO facturation(firstname, lastname, nbr_street, street, postCode, city, user_id)
                VALUES (?, ?, ?, ?, ?, ?, ?)
                ";
        $data = [$firstname_fac, $lastname_fac, $nbr_street_fac, $street_fac, $postCode_fac, $city_fac, $user_id];
        $this->db->query($sql, $data);

        return $this->db->insert_id();
    }

    public function add_info_user_to_db($id, $phone)
    {
        $sql = "UPDATE users
                SET phone = ?
                WHERE id = ?
                ";
        $data = [$phone, $id];
        $this->db->query($sql, $data);

    }

    public function get_info_finalisation($user_id)
    {
        $sql = "SELECT  products.ref, products.name_product, products.price,
                        panier.quantity,
                        livraison.firstname, livraison.lastname, livraison.nbr_street, livraison.street, livraison.postCode, livraison.city,
                        facturation.firstname, facturation.lastname, facturation.nbr_street, facturation.street, facturation.postCode, facturation.city
                FROM products
               	JOIN panier ON products.id = panier.product_id
                JOIN livraison ON panier.user_id = livraison.user_id
                JOIN facturation ON panier.user_id = facturation.user_id
                JOIN users ON panier.user_id = users.id

                WHERE users.id = ?
                GROUP BY panier.id
                ";
        $data = [$user_id];
        $query = $this->db->query($sql, $data);
        $res = [];
        foreach ($query->result_array() as $row)
        {
            $res[] = $row;
        }
        return $res;
    }

    public function get_info_finalisation_rowarray($user_id)
    {
        $sql = "SELECT  products.ref, products.name_product, products.price,
                        panier.quantity,
                        livraison.firstname, livraison.lastname, livraison.nbr_street, livraison.street, livraison.postCode, livraison.city,
                        facturation.firstname, facturation.lastname, facturation.nbr_street, facturation.street, facturation.postCode, facturation.city
                FROM products
               	JOIN panier ON products.id = panier.product_id
                JOIN livraison ON panier.user_id = livraison.user_id
                JOIN facturation ON panier.user_id = facturation.user_id
                JOIN users ON panier.user_id = users.id

                WHERE users.id = ?
                ";
        $data = [$user_id];
        $query = $this->db->query($sql, $data);
        $res= $query->row_array();
        return $res;
    }

}