<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Date_model extends CI_Model {


    public function __construct(){
        $this->load->database();
    }

    public function creerDate($data)
    {//dans $data, jour mois annee heure minu et sondage sont déjà remplis

        $this->db->insert('doudle_date', $data);
    }


    public function getDate($sondage)
    {
        $requete=$this->db->select('*')
                 ->from('doudle_date')
                 ->where('sondage',$sondage)
                 ->order_by('annee')
                 ->order_by('mois')
                 ->order_by('jour')
                 ->order_by('heure')
                 ->order_by('minu')  
                 ->get();

        return $requete->result_array();
    }

}
