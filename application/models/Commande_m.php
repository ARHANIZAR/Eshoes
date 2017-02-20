<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Aymane
 * Date: 07/12/2015
 * Time: 04:15
 */
class Commande_m extends CI_Model
{
    public function getAllCommande2(){

        $sql='SELECT commande.id_commande,commande.id_user,etat.libelle,commande.prix,commande.date_achat from commande,etat where etat.id_etat=commande.id_etat';
        $requet = $this->db->query($sql);
        return $requet->result();
    }
    public function getAllCommande(){
        $id_user = $this->session->userdata('id_user');
        $sql='SELECT commande.id_commande,commande.id_user,etat.libelle,commande.prix,commande.date_achat from commande,etat where etat.id_etat=commande.id_etat and commande.id_user=?';
        $requet = $this->db->query($sql,$id_user);
        return $requet->result();
    }

    public function ajoutCommande($prix){
        $id_user = $this->session->userdata('id_user');
        $date = date('Y-m-d');
        $sql='insert into commande (id_user,prix,date_achat,id_etat) values ('.$id_user.','.$prix.',"'.$date.'",1);';
        $this->db->query($sql);

    }

    /**
     *
     */
    public function validerCommande($id_commande){
        $sql = 'update commande set id_etat = 2 where commande.id_commande = ?';
        $this->db->query($sql,$id_commande);
    }
    public function anullerCommande($id_commande){
        $sql = 'update commande set id_etat = 3 where commande.id_commande = ?';
        $this->db->query($sql,$id_commande);
    }
}