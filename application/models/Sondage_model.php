<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sondage_model extends CI_Model {


    public function __construct(){
        $this->load->database();
    }

    public function creerSondage($data)
    {//dans $data, titre lieu descriptif et createur sont déjà remplis
        do{
        $data['cle']=rand(0,2000000000);//2 miliards
        
        $requete=$this->db->select('cle')
                 ->from('doudle_sondage')
                 ->where('cle',$data['cle'])
                 ->get();

        $resultat=$requete->result();

        }while(count($resultat) != 0); //peut être mettre cette partie dans un controller pour qu'il ait la clé pour après créer les dates



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