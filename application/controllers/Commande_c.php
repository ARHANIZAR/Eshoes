<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Aymane
 * Date: 07/12/2015
 * Time: 04:14
 */
class Commande_c extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model(array('Produit_m','Panier_m','Users_m','Commande_m'));
    }
    public function check_droit(){
        if( $this->session->userdata('droit')!=1){
            redirect('Users_c');
        }
    }

    public function afficherCommande(){
        if( $this->session->userdata('droit')==1) {
            $this->load->view('head_v');

            $this->load->view('clients/navClient_v');
            if ($this->Panier_m->isEmpty())
                echo "Vous n'avez pas passez de commande";
            else {
                $data['titre'] = "affichage du tableau Commande";
                $data['commande'] = $this->Commande_m->getAllCommande();
                $this->load->view('clients/produit/table_commande_v', $data);
            }
            $this->load->view('foot_v');
        }
        else if($this->session->userdata('droit')==2){
            $this->load->view('head_v');
            $this->load->view('admin/navAdmin_v');
            $data['titre']='tableaux Commandes';
            $data['commande']=$this->Commande_m->getAllCommande2();
            $this->load->view('admin/produit/commande_v', $data);
            $this->load->view('foot_v');
        }
    }

    public function ajoutCommande($prix){
        $this->check_droit();
        $this->Commande_m->AjoutCommande($prix);
        $this->Panier_m->SuppPanier();
        redirect('/Client_c/index');
    }

    /**
     *
     */
    public function validerCommande($id_commande){
        if($this->session->userdata('droit')==2){
            $this->load->view('head_v');
            $this->load->view('admin/navAdmin_v');
            $this->Commande_m->validerCommande($id_commande);
            $data['titre']='tableaux Commandes';
            $data['commande']=$this->Commande_m->getAllCommande2();
            $this->load->view('admin/produit/commande_v', $data);
            $this->load->view('foot_v');
        }
        else
            echo 'ERR 404 ';
    }
    public function anullerCommande($id_commande){
        if($this->session->userdata('droit')==2){
            $this->load->view('head_v');
            $this->load->view('admin/navAdmin_v');
            $this->Commande_m->anullerCommande($id_commande);
            $data['titre']='tableaux Commandes';
            $data['commande']=$this->Commande_m->getAllCommande2();
            $this->load->view('admin/produit/commande_v', $data);
            $this->load->view('foot_v');
        }
        else
            echo 'ERR 404 ';
    }

}