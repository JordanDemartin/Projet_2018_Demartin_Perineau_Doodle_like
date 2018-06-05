<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doudle extends CI_Controller {

    public function index()
    {

        loadpage("Connexion","doudle/index");
    }

    public function creation()
    {
        if (!$this->session->connecter) {
            redirect('/compte/connexion', 'auto');
        }
        loadpage();
    }

}
