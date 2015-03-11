<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panier extends CI_Controller
{

    public function list_product()
    {
        session_start();
        $articles = $this->Model_Panier->list_articles_in_panier();

        $this->load->view('head');
        $this->load->view('panier_list', ["articles"=>$articles]);
        $this->load->view('foot');
    }

    public function add_articles($id)
    {
        session_start();

        // si l'id produit existe déjà dans le panier -->
        // alors tu incrémentes de 1 la quantié -->
        // sinon, tu aujoutes le produit à la liste -->


        $quantity = ($this->Model_Panier->get_article_in_panier($id, $_SESSION['id']));

//        var_dump($quantity);
        if($quantity > 0)
        {
            $increase_quantity = $this->Model_Panier->change_quantity($quantity+1, $_SESSION['id'], $id);
        }
        else
        {
            $add_article = $this->Model_Panier->add_article_to_db($id, $_SESSION['id']);
        }

        redirect('panier/list_product');
    }

    public function update_quantity()
    {
        session_start();
        $new_quantity = $this->Model_Panier->change_quantity($_POST['quantity'], $_SESSION['id'], $_POST['article_id']);
        $product_id = $_POST['article_id'];

        redirect('panier/list_product');
    }

    public function delete($id_panier)
    {
        session_start();
        $delete_article = $this->Model_Panier->delete_article($id_panier, $_SESSION['id']);

        redirect('panier/list_product');

    }


}