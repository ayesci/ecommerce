<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        session_start();

        $this->load->view('head');
        $this->load->view('home_page');
        $this->load->view('foot');
    }

    public function category($cat)
    {
        session_start();
        $this->load->model("Model_Product", "", true);
        $this->load->view('head');
        $this->load->view('list_categories', ["categories"=>['category'=>$cat]]);
        $this->load->view('foot');
    }

    public function show_details()
    {
        session_start();
        $this->load->view('head');
        $this->load->view('product_details', ["categories"=>['category'=>$cat]]);
        $this->load->view('foot');
    }

}



