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
			$this->Compte_model->verifUser($post['login']);
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

				loadpage("Succes","compte/succes");
			}else{
				$compte="le compte existe déjà";
			}

		}
		loadpage("Inscription","compte/inscription",["compte"=>$compte]);


	}

	public function motpasseoublier(){
		loadpage("Mot de passe oublier","compte/motpasseoublier");
	}

	public function deconnexion()
	{
		$this->session->sess_destroy();
		redirect('/compte/connexion');
	}

}
