<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Aymane
 * Date: 22/11/2015
 * Time: 23:15
 */
class Panier_m extends CI_Model
{
    public function getAllPanier(){
        $id_user = $this->session->userdata('id_user');
        $sql='SELECT produit.id,panier.id_panier,produit.nom, panier.quantite,produit.prix, produit.prix*panier.quantite as total from panier,produit where produit.id=panier.id_produit and panier.id_user ='.$id_user.';';
        $requet = $this->db->query($sql);
        return $requet->result();
    }

    public function isEmpty(){
        $id_user = $this->session->userdata('id_user');
        $sql = 'select count(*) from panier where id_user=?';
        $req = $this->db->query($sql,$id_user);
        if($req->result()==0)
            return true;
        else
            return false;
    }

    public function getPanier($id_produit){
        $id_user = $this->session->userdata('id_user');
        $sql = 'select panier.id_panier, produit.id, panier.prix from panier,produit where panier.id_produit=? and panier.id_user =?;';
        $request = $this->db->query($sql,array($id_produit,$id_user));
        return $request->result();
    }

    public function ajoutPanier($id_produit,$prix){
        $id_user = $this->session->userdata('id_user');

        if($this->getPanier($id_produit)==array()){
            $sql='insert into panier (id_user, id_produit, quantite,prix) values ('.$id_user.','.$id_produit.',1,'.$prix.');';
            $this->db->query($sql);
        }
        else{
            $this->incrementeQuantite($id_produit,$prix);
        }

    }

    public function suppPanier(){
        $id_user=$this->session->userdata('id_user');
        $sql='delete from panier where panier.id_user=?;';
        $request = $this->db->query($sql,$id_user);
    }
    public function incrementeQuantite($id_produit,$prix){
        $id_user=$this->session->userdata('id_user');
        $sql='update panier set quantite = (select quantite  from (select quantite from panier where panier.id_user='.$id_user.' and id_produit ='.$id_produit.') as x) + 1 , panier.prix ='.$prix.' where panier.id_produit=? and panier.id_user=? ;';
        $this->db->query($sql,array($id_produit,$id_user));
    }

    public function decrementeQuantite($id_produit,$prix){
        $id_user=$this->session->userdata('id_user');

        $sql='update panier set quantite = (select quantite  from (select quantite from panier where id_produit ='.$id_produit.') as x) -1 , panier.prix ='.$prix.' where panier.id_produit=? and panier.id_user=? and panier.quantite >0 ;';
        $this->db->query($sql,array($id_produit,$id_user));
    }

    /**
     *
     */


}