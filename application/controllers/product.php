<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function index()
    {
        session_start();
        $this->load->model("Model_Product", "", true);
        $categories = $this->Model_Product->get_categories();

        $this->load->view('head');
        $this->load->view('list_categories', ["categories"=>$categories]);
        $this->load->view('foot');
    }

    public function all_product()
    {
        session_start();
        $this->load->model("Model_Product", "", true);
        $products = $this->Model_Product->get_icon_product();
        $categories = $this->Model_Product->get_categories();

        $this->load->view('head');
        $this->load->view('all_products', ["products"=>$products, "categories"=>$categories]);
        $this->load->view('foot');
    }

    public function products_by_categories($cat)
    {
        session_start();
        $this->load->model("Model_Product", "", true);
//        $res = $this->Model_Product->get_icon_product();
//        $categories = $this->Model_Product->get_categories();
        $res = $this->Model_Product->products_by_categories($cat);

        $this->load->view('head');
        $this->load->view('product_list', ["products"=>$res]);
        $this->load->view('foot');
    }

    public function add_product()
    {
        session_start();

        $this->load->model("Model_Product", "", true);

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
        $this->load->model("Model_Product", "", true);
        $details = $this->Model_Product->get_details_product($id);

        $this->load->view('head');
        $this->load->view('product_details', ["products"=>$details]);
        $this->load->view('foot');
    }

    public function search_product()
    {
        session_start();
        $this->load->model("Model_Product", "", true);

        $min = 0;
        $max = 500;

        if(array_key_exists('min_price', $_POST) && !empty($_POST['min_price']))
        {
            $min = $_POST['min_price'];
        }
        if(array_key_exists('max_price', $_POST) && !empty($_POST['max_price']))
        {
            $max = $_POST['max_price'];
        }
        $res = $this->Model_Product->get_price($min, $max);

        $this->load->view('head');
        $this->load->view('search_product', ["min"=>$min, "max"=>$max]);
        $this->load->view('product_list', ['products'=>$res]);
        $this->load->view('foot');
    }


}
