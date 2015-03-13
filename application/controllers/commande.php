<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commande extends CI_Controller
{
    public function livraison()
    {
        session_start();

        $this->load->view('head');
        $this->load->view('info_livraison');
        $this->load->view('foot');
    }

    public function info_to_db()
    {
        session_start();

        if(array_key_exists('firstname_liv', $_POST)) {
            $info_livraison = $this->Model_Commande->add_info_livraison_to_db(
                $_POST['firstname_liv'],
                $_POST['lastname_liv'],
                $_POST['nbr_street_liv'],
                $_POST['street_liv'],
                $_POST['postCode_liv'],
                $_POST['city_liv'],
                $_SESSION['id']
            );
        }

        if(array_key_exists('checkbox', $_POST))
        {
            $info_facturation = $this->Model_Commande->add_info_facturation_to_db(
                $_POST['firstname_liv'],
                $_POST['lastname_liv'],
                $_POST['nbr_street_liv'],
                $_POST['street_liv'],
                $_POST['postCode_liv'],
                $_POST['city_liv'],
                $_SESSION['id']
            );
        }
        else
        {
            $info_facturation = $this->Model_Commande->add_info_facturation_to_db(
                $_POST['firstname_fac'],
                $_POST['lastname_fac'],
                $_POST['nbr_street_fac'],
                $_POST['street_fac'],
                $_POST['postCode_fac'],
                $_POST['city_fac']
            );
        }

        if(array_key_exists('phone', $_POST))
        {
            var_dump($_SESSION);
            $info_user = $this->Model_Commande->add_info_user_to_db(
                $_SESSION['id'],
                $_POST['phone']
            );
        }

        redirect('/commande/facturation');
    }

    public function facturation()
    {
        session_start();

        $end = $this->Model_Commande->get_info_finalisation($_SESSION['id']);
        $rowarray = $this->Model_Commande->get_info_finalisation_rowarray($_SESSION['id']);

        $this->load->view('head');
        $this->load->view('info_facturation', ["end"=>$end, "rowarray"=>$rowarray]);
        $this->load->view('foot');
    }

    public function expedition()
    {
        session_start();

        $this->load->view('head');
        $this->load->view('expedition');
        $this->load->view('foot');
    }


}




