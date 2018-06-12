<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sondage_model extends CI_Model {


    public function __construct(){
        $this->load->database();
    }

    public function creerSondage($data)
    {//dans $data, cle titre lieu descriptif et createur sont déjà remplis

        $data['etat']="En cours"; //états: En cours et Clos

        $this->db->insert('doudle_sondage', $data);
    }

    public function getSondage($sondage)
    {
        $requete=$this->db->select('*')
                 ->from('doudle_sondage')
                 ->where('cle',$sondage)
                 ->get();

        return $resultat=$requete->result();
    }

    public function supprimeSondage($sondage)
    {
        $this->db->delete('doudle_sondage', array('cle' => $sondage));
    }

}
