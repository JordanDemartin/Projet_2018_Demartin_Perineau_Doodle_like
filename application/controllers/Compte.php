<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte extends CI_Controller {

	/**
	 * $this->load->helper("PageLoader");
	 *
	 * $this->PageLoader->loadPage("connection","connection");
	 * 	$page = $this->load->view("PageLoader","", true);
     *
     *$page = $this->load->view("connexion","", true);
     *$this->load->view("template/default",["titre"=>'connexion', "page" => $page]);
	 */

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
			$mot_passe=$this->Compte_model->loginexiste($post['login']);
			if ($mot_passe) {
				
				if (password_verify($post['passw'],$mot_passe)) {

					redirect('/compte/status', 'auto');
				}

			}
			$erreur="mauvais mot de passe";
		}
		loadpage("Connexion","connexion",["valide"=>$erreur]);
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

			if (!$this->Compte_model->loginexiste($post['login'])) {
				$post['passw']=password_hash($post['passw'],PASSWORD_DEFAULT);
				array_splice($post,-1);
				$this->Compte_model->inscription($post);
				redirect('/compte/status', 'auto');
			}else{
				$compte="le compte existe déjà";
			}

		}

		loadpage("Inscription","inscription",["compte"=>$compte]);

	}

	public function status()
	{
		loadpage("Succes","status");
	}

	public function motpasseoublier(){
		loadpage("Mot de passe oublier","motpasseoublier");
	}

}
