<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function index()
    {
        session_start();
        $categories = $this->Model_Product->get_categories();

        $this->load->view('head');
        $this->load->view('list_categories', ["categories"=>$categories]);
        $this->load->view('foot');
    }

    public function product_menu()
    {
        session_start();
        $this->load->view('head');
        $this->load->view('menu', ['show_topCategories'=>$show_topCategories]);
        $this->load->view('foot');
    }

    public function all_product()
    {
        session_start();
        $products = $this->Model_Product->get_icon_product();
        $categories = $this->Model_Product->get_categories();

        $this->load->view('head');
        $this->load->view('all_products', ["products"=>$products, "categories"=>$categories]);
        $this->load->view('foot');
    }

    public function products_by_categories($cat)
    {
        session_start();
        $res = $this->Model_Product->products_by_categories($cat);

        $this->load->view('head');
        $this->load->view('product_list', ["products"=>$res]);
        $this->load->view('foot');
    }

    public function add_product()
    {
        session_start();

        if(array_key_exists('ref', $_POST))
        {
            if(isset($_FILES['picture']))
            {
                $oldName = $_FILES['picture']['tmp_name'];
                $newName = "asset/picture/".$_FILES['picture']['name'];
                move_uploaded_file($oldName, $newName);
                $this->Model_Product->add_product($_POST['ref'], $_POST['name_product'], $_POST['category'], $newName);
                redirect('/product');
            }
            else
            {
                $this->Model_Product->add_product($_POST['ref'], $_POST['name_product'], $_POST['category'], "");
                redirect('/product');
            }
        }

        $this->load->view('head');
        $this->load->view('add_product');
        $this->load->view('foot');
    }

    public function product_details($id)
    {
        session_start();
        $details = $this->Model_Product->get_details_product($id);

        $this->load->view('head');
        $this->load->view('product_details', ["products"=>$details]);
        $this->load->view('foot');
    }

    public function search_product()
    {
        session_start();

        // déclaration des variables
        $min = 0;
        $max = 500;
        $name = '%';
        $ref = '%';
        $owner = "%";

        // recherche par le prix
        if(array_key_exists('min_price', $_POST) && !empty($_POST['min_price']))
            $min = $_POST['min_price'];
        if(array_key_exists('max_price', $_POST) && !empty($_POST['max_price']))
            $max = $_POST['max_price'];

        // recherche par le nom
        if(array_key_exists('name', $_POST) && !empty($_POST['name']))
            $name = '%'.$_POST['name'].'%';

        // recherche par la référence
        if(array_key_exists('ref', $_POST) && !empty($_POST['ref']))
            $ref = '%'.$_POST['ref'].'%';

        // recherche par proprio
        if(array_key_exists('owner', $_POST) && !empty($_POST['owner']))
            $owner = '%'.$_POST['owner'].'%';

        // appel aux fonctions
        $price = $this->Model_Product->get_search($name, $ref, $min, $max, $owner);
        $owners = $this->Model_Product->get_owners();

        // enlève les % juste avant l'affichage pour laisser l'option sélectionné.
        $owner = str_replace('%', '', $owner);

        // vues
        $this->load->view('head');
        $this->load->view('search_product', ["name"=>$name, "ref"=>$ref, "min"=>$min, "max"=>$max, "owners"=>$owners, "current_owner"=>$owner]);
        $this->load->view('product_list', ['products'=>$price]);
        $this->load->view('foot');

    }




}
