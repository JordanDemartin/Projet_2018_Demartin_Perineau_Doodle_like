<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doudle extends CI_Controller {

    public function index()
    {

        loadpage("Index","doudle/index");
    }

    public function creation_1()
    {
        if (!$this->session->connecter) {
            redirect('/compte/connexion', 'auto');
        }

        $this->load->library('form_validation');
		$this->load->helper('form');

        $this->form_validation->set_rules('titre', 'titre', 'required|trim');
		$this->form_validation->set_rules('lieu', 'lieu', 'required|trim');
        $this->form_validation->set_rules('description', 'description', 'required|trim');

        if ($this->form_validation->run() == true) {

            redirect('/doudle/creation_2', 'auto');
        }


        loadpage("Création Doudle","doudle/creation");

    }

    public function creation_2()
    {
        if (!$this->session->connecter) {
            redirect('/compte/connexion', 'auto');
        }

        $this->load->library('form_validation');
		$this->load->helper('form');

        loadpage("Création Doudle","doudle/creation_date");



    }

}
