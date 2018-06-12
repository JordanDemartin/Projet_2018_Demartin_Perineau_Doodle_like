<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sondage_model extends CI_Model {


    public function __construct(){
        $this->load->database();
    }

    public function creerSondage($data)
    {
        $data['cle']=;//alea
        $data['etat']="En cours";
        $data['createur']="";
        $this->db->insert('doudle_compte', $data);
    }

}