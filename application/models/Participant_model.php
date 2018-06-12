<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participant_model extends CI_Model {


    public function __construct(){
        $this->load->database();
    }

	public function creerParticipant($data)
    {//dans $data, prenom et nom sont déjà remplis
        do{
        $data['id']=rand(0,2000000000);//2 miliards
        
        $requete=$this->db->select('id')
                 ->from('doudle_participant')
                 ->where('id',$data['id'])
                 ->get();

        $resultat=$requete->result();

        }while(count($resultat) != 0);
        
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
        do{
        $data['cleVote']=rand(0,2000000000);//2 miliards
        
        $requete=$this->db->select('id')
                 ->from('doudle_vote')
                 ->where('cleVote',$data['cleVote'])
                 ->get();

        $resultat=$requete->result();

        }while(count($resultat) != 0);


        $data['cleParticipant']=$participant;

        $data['cleDate']=$date;
        
        $this->db->insert('doudle_participant', $data);
    }
}