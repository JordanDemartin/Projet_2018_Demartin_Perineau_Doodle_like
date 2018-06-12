<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participant_model extends CI_Model {


    public function __construct(){
        $this->load->database();
    }

	public function creerParticipant($data)
    {//dans $data, prenom et nom sont déjà remplis

        $this->db->insert('doudle_participant', $data);
    }

    public function getParticipant($participant)
    {
        $requete=$this->db->select('*')
                 ->from('doudle_participant')
                 ->where('participant',$participant)
                 ->get();

        return $resultat=$requete->result();
    }

    public function ajouterVote($date,$participant)
    {

        $data['cleParticipant']=$participant;

        $data['cleDate']=$date;

        $this->db->insert('doudle_participant', $data);
    }
}
