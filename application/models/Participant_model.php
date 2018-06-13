<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participant_model extends CI_Model {


    public function __construct(){
        $this->load->database();
    }

	public function creerParticipant($data)
    {//dans $data, prenom et nom sont déjà remplis
        $requete=$this->db->select('max(id)')
                 ->from('doudle_participant')
                 ->get();
        $id=$requete->result_array();
        if ($id[0]['max(id)']==null) {
            $idmax=0;
        }else {
            $idmax=(int)$id[0]['max(id)']+1;
        }
        $data=array_merge(['id'=>$idmax],$data);
        $this->db->insert('doudle_participant', $data);

        return $idmax;
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

        $this->db->insert('doudle_vote', $data);
    }
}
