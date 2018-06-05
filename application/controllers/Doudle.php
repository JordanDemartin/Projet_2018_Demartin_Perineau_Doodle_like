<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doudle extends CI_Controller {

    public function index()
    {
        
        loadpage(["titre"=>"Connexion"],"doudle/index");
    }

}
