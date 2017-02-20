<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Aymane
 * Date: 07/12/2015
 * Time: 02:51
 */
class Panier_c extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model(array('Produit_m','Panier_m','Users_m'));
    }

    public function check_droit(){
        if( $this->session->userdata('droit')!=1){
            redirect('Users_c');
        }
    }
    public function index()
    {
        $this->check_droit();

        $this->load->view('head_v');
        $this->load->view('client/navClient_v');
        if($this->Panier_m->isEmpty())
            echo 'panier vide';
        else{
            $data['titre'] = "affichage du tableau Panier";
            $data['panier'] = $this->Panier_m->getAllPanier();
            $this->load->view('clients/produit/table_panier_v', $data);
        }
        $this->load->view('foot_v');

    }



    /**
     *
     */
    public function afficherPanier(){
        $this->check_droit();
        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        if($this->Panier_m->isEmpty())
            echo 'panier vide';
        else{
            $data['titre'] = "affichage du tableau Panier";
            $data['panier'] = $this->Panier_m->getAllPanier();
            $this->load->view('clients/produit/table_panier_v', $data);
        }
        $this->load->view('foot_v');
    }

    public function ajoutPanier($id,$prix){
        $this->check_droit();
        if(is_numeric($id))
            $this->Panier_m->AjoutPanier($id,$prix);
        redirect('/Client_c/index');
    }



    /**
     * @param $id
     */
    public function suppPanier(){
        $this->check_droit();
            $this->Panier_m->SuppPanier();
        redirect('/Panier_c/afficherPanier');

    }
    public function incrementeQuantite($id,$prix){
        $this->check_droit();

        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $data['titre']="affichage du tableau Panier";
        $data['panier']=$this->Panier_m->getAllPanier();
        $quantite=$this->Panier_m->incrementeQuantite($id,$prix);
        $data['panier']=$this->Panier_m->getAllPanier();

        $this->load->view('clients/produit/table_panier_v',$data);

        $this->load->view('foot_v');
    }

    public function decrementeQuantite($id,$prix){
        $this->check_droit();

        $this->load->view('head_v');
        $this->load->view('clients/navClient_v');
        $data['titre']="affichage du tableau Panier";
        $data['panier']=$this->Panier_m->getAllPanier();
        $quantite=$this->Panier_m->decrementeQuantite($id,$prix);
        $data['panier']=$this->Panier_m->getAllPanier();
        $this->load->view('clients/produit/table_panier_v',$data);
        $this->load->view('foot_v');
    }




}