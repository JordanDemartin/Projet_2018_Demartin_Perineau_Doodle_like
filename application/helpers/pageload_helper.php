<?php


function loadpage($titre, $chemin_contenue, $data="")
{
    $ci=& get_instance();
    $page = $ci->load->view($chemin_contenue,$data, true);
    $ci->load->view("template/default", ["nom"=>$titre, "page" => $page]);

}
