<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_c extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model(array('Produit_m','Users_m','Panier_m'));
    }

    public function check_droit(){
        if( $this->session->userdata('droit')!=1){
            redirect('Users_c');
        }
    }

    public function index() {
        $this->check_droit();
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $data['titre']="affichage du tableau produit";
        $data['produit']=$this->Produit_m->getAllProduits();
        $this->load->view('clients/produit/produit_v',$data);
        $this->load->view('foot_v');
    }


}