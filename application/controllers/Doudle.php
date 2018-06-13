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
            $this->form_validation->set_rules('minute_'.$i, 'minute_'.$i , 'required|trim');
        }

        if ($this->form_validation->run() == true && $retirer==="flase") {

            $post=$this->input->post(null);
            $valide=true;
            for ($i=0; $i < $nombre_date; $i++) {
                if (!(preg_match( "/^((0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/\d\d\d\d)$/" , $post['date_'.$i] ) && preg_match( "/^(([0-5][0-9])|([0-9]))$/" , $post['minute_'.$i]) && preg_match( "/^(([0-1][0-9])|2[0-3]|([0-9]))$/" , $post['heure_'.$i]))) {
                    $valide=false;
                }

            }
            if ($valide) {
                $this->load->model("Sondage_model");
                $this->load->model("Date_model");

                do {
                    list($usec, $sec) = explode(" ", microtime());
                    $cle = dechex(date("HisdmY").($usec*1000));
                    $this->Sondage_model->getSondage($cle);
                    var_dump($this->Sondage_model->getSondage($cle));
                } while (count($this->Sondage_model->getSondage($cle)) != 0);

                $this->Sondage_model->creerSondage(["cle"=>$cle , "titre" => $post['titre'] , "lieu" => $post["lieu"] , "descriptif" => $post['description'] , "createur" => $this->session->nom]);

                for ($i=0; $i < $nombre_date; $i++) {
                    $tmp=explode( "/" , $post['date_'.$i]);
                    $envoi= ["jour" => $tmp[0], "mois" => $tmp[1], "annee" => $tmp[2], "heure" => $post["heure_".$i], "minu" => $post["minute_".$i], "sondage"=>$cle];

                    $this->Date_model->creerDate($envoi);
                }
                $this->Date_model->creerDate(["sondage"=>$cle]);
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
        $this->load->model("Date_model");
        $dates=$this->Date_model->getDate($cle);

        if (count($dates) == 0) {
            loadpage("Doudle non disponible","doudle/non_dispo");
            return;
        }

        $this->form_validation->set_rules('prenom', 'prenom', 'required|alpha|trim');
		$this->form_validation->set_rules('nom', 'nom', 'required|alpha|trim');
        $this->form_validation->set_rules('valider');

        if ($this->form_validation->run() == true) {
            $post=$this->input->post(null);

            $this->load->model("Participant_model");
            $idper=$this->Participant_model->creerParticipant(["prenom"=>$post['prenom'], "nom"=>$post['nom']]);

            if (isset($post['valider'])) {
                foreach ($post['valider'] as $value) {
                    var_dump($value);
                    $this->Participant_model->ajouterVote($value,$idper);
                }
            }else{

                foreach ($dates as $value) {
                    if ($value['jour'] === null) {
                        $this->Participant_model->ajouterVote($value['cleDate'],$idper);
                    }
                }
            }

            redirect("/doudle/succes_part/$cle");

        }

        loadpage("Participer Doudle","doudle/participer",['dates'=>$dates]);
    }

    public function succes_part($cle=""){
        loadpage("Participer succes","doudle/succes_part",['cle'=>$cle]);
    }

    public function resultat($cle='')
    {
        $this->load->library('form_validation');
		$this->load->helper('form');
        $this->load->model("Date_model");
        $dates=$this->Date_model->getDate($cle);

        if (count($dates) == 0) {
            loadpage("Doudle non disponible","doudle/non_dispo");
            return;
        }

        loadpage("Resultat doudle","doudle/resultat");
    }

}
