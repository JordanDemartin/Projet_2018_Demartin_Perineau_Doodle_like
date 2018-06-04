<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte_model extends CI_Model {


    public function __construct(){
        $this->load->database();
    }

    public function creerCompte($data)
    {
        $this->db->insert('doudle_compte', $data);
    }

    public function loginExiste($login){
        $requete=$this->db->select('passw')
                 ->from('doudle_compte')
                 ->where('login',$login)
                 ->get();

        $resultat=$requete->result();

        if (count($resultat) != 0) {
            return $resultat[0]->passw;
        }else {
            return false;
        }
    }


}
