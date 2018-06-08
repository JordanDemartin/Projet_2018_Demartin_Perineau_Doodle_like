<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doudle extends CI_Controller {

    public function index()
    {

        loadpage("Index","doudle/index");
    }

    public function creation($nombre_date=1)
    {
        if ($nombre_date<1) {
            $nombre_date=1;
        }
        if (!$this->session->connecter) {
            redirect('/compte/connexion', 'auto');
        }

        $this->load->library('form_validation');
		$this->load->helper('form');

        $this->form_validation->set_rules('titre', 'titre', 'required|trim');
		$this->form_validation->set_rules('lieu', 'lieu', 'required|trim');
        $this->form_validation->set_rules('description', 'description', 'required|trim');

        for ($i=0; $i < $nombre_date; $i++) {
            $this->form_validation->set_rules('date_'.$i, 'date_'.$i , 'required|trim|regex_match[/(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d/]');
        }

        if ($this->form_validation->run() == true) {

            redirect("doudle/index");
        }


        loadpage("Création Doudle","doudle/creation",["nombre_date"=> $nombre_date]);

    }

}
