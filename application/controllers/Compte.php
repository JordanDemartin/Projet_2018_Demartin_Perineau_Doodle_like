<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte extends CI_Controller {

	public function index()
	{
		redirect('/compte/connexion', 'auto');
	}

	public function connexion()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('Compte_model');
		$erreur='';

		$this->form_validation->set_rules('login', 'login', 'required');
		$this->form_validation->set_rules('passw', 'password', 'required');

		if ($this->form_validation->run() == true) {

			$post=$this->input->post(null);
			$this->Compte_model->verifUser($post['login']);
			if ($this->Compte_model->verifUser($post['login'],$post['passw'])) {
					redirect('/doudle', 'auto');
			}
			$erreur="mauvais mot de passe";
		}
		loadpage(["titre"=>"Connexion"],"compte/connexion",["valide"=>$erreur]);
	}

	public function inscription(){

		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('Compte_model');
		$compte="";

		$this->form_validation->set_rules('prenom', 'prenom', 'required|alpha');
		$this->form_validation->set_rules('nom', 'nom', 'required|alpha');
		$this->form_validation->set_rules('login', 'login', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('passw', 'password', 'required');
		$this->form_validation->set_rules('password_c', 'password_c', 'required|matches[passw]');

		if ($this->form_validation->run() == true) {
			$post=$this->input->post(null);

			if (!$this->Compte_model->verifUser($post['login'])) {
				array_splice($post,-1);
				$this->Compte_model->creerCompte($post);
				redirect('/compte/status', 'auto');
			}else{
				$compte="le compte existe déjà";
			}

		}

		loadpage(["titre"=>"Inscription"],"compte/inscription",["compte"=>$compte]);

	}

	public function status()
	{
		loadpage(["titre"=>"Succes"],"compte/status");
	}

	public function motpasseoublier(){
		loadpage(["titre"=>"Mot de passe oublier"],"compte/motpasseoublier");
	}

}
