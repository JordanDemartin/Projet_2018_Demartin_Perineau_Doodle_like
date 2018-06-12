<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Date_model extends CI_Model {


    public function __construct(){
        $this->load->database();
    }

    public function creerDate($data)
    {//dans $data, jour mois annee heure minu et sondage sont déjà remplis
        do{
        $data['cle']=rand(0,2000000000);//2 miliards
        
        $requete=$this->db->select('cleDate')
                 ->from('doudle_date')
                 ->where('cleDate',$data['cleDate'])
                 ->get();

        $resultat=$requete->result();

        }while(count($resultat) != 0);
        
        $this->db->insert('doudle_date', $data);
    }


    public function getDate($cleDate)
    {
        $requete=$this->db->select('*')
                 ->from('doudle_date')
                 ->where('cleDate',$cleDate)
                 ->get();

        return $resultat=$requete->result();
    }

}
