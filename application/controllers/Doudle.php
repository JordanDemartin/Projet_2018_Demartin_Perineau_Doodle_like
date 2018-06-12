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

            $post=$this->input->post(null);
            $valide=true;
            for ($i=0; $i < $nombre_date; $i++) {
                if (!preg_match( "/(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/\d\d\d\d/" , $post['date_'.$i] )) {
                    if (!preg_match( "/([0-1][0-9])|2[0-3]|([0-9])/" , $post['heure_'.$i])) {
                        if (!preg_match( "/([1-5][0-9])|(0[1-9])|([1-9])/" , $post['minute_'.$i])){
                            $valide=false;
                        }
                    }
                }

            }
            if ($valide) {
                list($usec, $sec) = explode(" ", microtime());
                $cle = dechex(date("HisdmY").($usec*1000));
                redirect("/doudle/succes/$cle");
            }

        }
        loadpage("Création Doudle","doudle/creation",["nombre_date"=> $nombre_date]);

    }

    public function succes($cle){
        loadpage("création réusite","doudle/creation_final",['url'=> "http://".$_SERVER['HTTP_HOST'].site_url("doudle/participer")."/".$cle]);
    }

    public function participer($cle='')
    {
        $this->load->library('form_validation');
		$this->load->helper('form');
        loadpage("Participer Doudle","doudle/participer");
    }

    

}
