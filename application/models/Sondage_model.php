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

        return $requete->result_array();
    }

    public function supprimeSondage($sondage)
    {
        $this->db->delete('doudle_sondage', array('cle' => $sondage));
    }

    public function getParticipant($sondage)
    {
        // $requete=$this->db->select('doudle_vote.cleDate','prenom','nom')
        //                    ->from('doudle_vote')
        //                    ->from('doudle_date')
        //                    ->from('doudle_participant')
        //                    ->where('doudle_date.cleDate','doudle_vote.cleDate')
        //                    ->where('doudle_date.sondage',$sondage)
        //                    ->where('doudle_participant.id','doudle_vote.cleParticipant')
        //                    ->get();

        $requete=$this->db->query("SELECT doudle_vote.cleDate,prenom,nom,cleParticipant FROM doudle_vote,doudle_date,doudle_participant WHERE doudle_date.cleDate=doudle_vote.cleDate and doudle_date.sondage=? and doudle_participant.id=doudle_vote.cleParticipant order by nom,prenom",$sondage);

        return $requete->result_array();
    }


    public function modifEtat($sondage,$etat)
    {

	       $this->db->where("cle",$sondage)
           ->update('doudle_sondage', array('etat' => $etat));

    }

}
