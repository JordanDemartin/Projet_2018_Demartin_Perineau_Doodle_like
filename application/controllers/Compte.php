<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte extends CI_Controller {

	public function index()
	{
		redirect('/compte/connexion');
	}

	public function connexion()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		$erreur='';

		$this->form_validation->set_rules('login', 'login', 'required|trim');
		$this->form_validation->set_rules('passw', 'password', 'required|trim');

		if ($this->form_validation->run() == true) {
			$this->load->model('Compte_model');

			$post=$this->input->post(null);
			$post['login']=strtolower($post['login']);
			if ($this->Compte_model->verifUser($post['login'],$post['passw'])) {
				$this->session->set_userdata(['nom'  => $post['login'],'connecter' => TRUE]);
				redirect('/doudle');
			}
			$erreur="mauvais mot de passe";
		}

		loadpage("Connexion","compte/connexion",["valide"=>$erreur]);

	}

	public function inscription(){

		$this->load->library('form_validation');
		$this->load->helper('form');

		$compte="";

		$this->form_validation->set_rules('prenom', 'prenom', 'required|alpha|trim');
		$this->form_validation->set_rules('nom', 'nom', 'required|alpha|trim');
		$this->form_validation->set_rules('login', 'login', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|trim');
		$this->form_validation->set_rules('passw', 'password', 'required');
		$this->form_validation->set_rules('password_c', 'password_c', 'required|matches[passw]');

		if ($this->form_validation->run() == true) {
			$this->load->model('Compte_model');
			$post=$this->input->post(null);

			if (!$this->Compte_model->verifUser($post['login'])) {
				array_splice($post,-1);
				$this->Compte_model->creerCompte($post);
				redirect('/compte/status');

			}else{
				$compte="le compte existe déjà";
			}

		}
		loadpage("Inscription","compte/inscription",["compte"=>$compte]);


	}

	public function status(){
		loadpage("Succes","compte/succes");
	}

	public function motpasseoublier(){
		loadpage("Mot de passe oublier","compte/motpasseoublier");
	}

	public function deconnexion()
	{
		$this->session->sess_destroy();
		redirect('/compte/connexion');
	}

	public function mesDoudle()
	{
		if (!$this->session->connecter) {
            redirect('/compte/connexion');
        }

		$this->load->model('Compte_model');

		$doudle=$this->Compte_model->getSondage($this->session->nom);

		loadpage("mes Doulde","/compte/mesDoudle",["doudle"=>$doudle]);
	}

}
