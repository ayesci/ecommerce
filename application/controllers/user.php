<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    public function login()
    {
        session_start();
        if(array_key_exists('name', $_POST))
        {
            if($this->Model_User->users_exists($_POST['name']))
            {
                if($this->Model_User->valid_user($_POST['name'], $_POST['password']))
                {
                    redirect('/home');
                }
                else
                {
                    $_SESSION['message'] = "Erreur de mot de passe.";
                }
            }
            else
            {
                $_SESSION['message'] = "Merci de vous inscrire";
                redirect('/user/inscription');
            }
        }

        $this->load->view('head');
        $this->load->view('user_login');
        $this->load->view('foot');
    }

    public function inscription()
    {
        session_start();
        $this->load->view('head');
        $this->load->view('user_inscription');
        $this->load->view('foot');

        if(array_key_exists('name', $_POST))
        {
            if($this->Model_user->users_exists($_POST['name']))
            {
                $_SESSION['username'] = $_POST['name'];
                $_SESSION['message'] = "Vous êtes déjà inscrit.";
                redirect('/user/login');
            }
            else
            {
                $_SESSION['username'] = $_POST['name'];
                $this->Model_user->create($_POST['name'], $_POST['password'], $_POST['email']);
                redirect('/home');
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
//        redirect('/user/logout');

        $this->load->view('head');
        $this->load->view('logout_page');
        $this->load->view('foot');

    }


}