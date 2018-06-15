<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte_model extends CI_Model {


    public function __construct(){
        $this->load->database();
    }

    public function creerCompte($data)
    {
        $data['passw']=password_hash($data['passw'],PASSWORD_DEFAULT);
        $this->db->insert('doudle_compte', $data);
    }

    public function verifUser($login,$passw=null){
        $requete=$this->db->select('passw')
                 ->from('doudle_compte')
                 ->where('login',$login)
                 ->get();

        $resultat=$requete->result();

        if (count($resultat) != 0) {
            if ($passw===null) {
                return true;
            }
            if (password_verify($passw,$resultat[0]->passw)) {
                return true;
            }

        }
        return false;
    }

    public function getSondage($login)
    {
        $requete=$this->db->select('*')
                 ->from('doudle_sondage')
                 ->where('createur',$login)
                 ->order_by('etat','DESC')
                 ->order_by('titre')
                 ->order_by('lieu')
                 ->get();

        return $requete->result_array();
    }

}
