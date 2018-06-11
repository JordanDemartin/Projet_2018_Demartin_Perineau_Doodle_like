<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doudle extends CI_Controller {

    public function index()
    {

        loadpage("Index","doudle/index");
    }

    public function creation($nombre_date=1,$retirer="flase")
    {
        if ($nombre_date<1) {
            $nombre_date=1;
        }
        if (!$this->session->connecter) {
            redirect('/compte/connexion');
        }


        $this->load->library('form_validation');
		$this->load->helper('form');

        $this->form_validation->set_rules('titre', 'titre', 'required|trim');
		$this->form_validation->set_rules('lieu', 'lieu', 'required|trim');
        $this->form_validation->set_rules('description', 'description', 'trim');

        for ($i=0; $i < $nombre_date; $i++) {
            $this->form_validation->set_rules('date_'.$i, 'date_'.$i , 'required|trim');
            $this->form_validation->set_rules('heure_'.$i, 'heure_'.$i , 'required|trim');
        }

        if ($this->form_validation->run() == true && $retirer==="flase") {

                redirect("doudle/index");
                
        }else {
            loadpage("Création Doudle","doudle/creation",["nombre_date"=> $nombre_date]);
        }




    }

}
