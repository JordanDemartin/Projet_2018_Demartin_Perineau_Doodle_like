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
        loadpage("connexion","connexion");
	}

	public function inscription(){
		loadpage("inscription","inscription");
	}

	public function motpasseoublier(){
		loadpage("mot de passe oublier","motpasseoublier");
	}

}
