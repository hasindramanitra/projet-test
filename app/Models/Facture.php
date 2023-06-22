<?php

namespace App\Models;

use CodeIgniter\Model;

class Facture extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'facture';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['COMMANDE_ID', 'CLIENT_MONEY', 'TOTAL', 'REST_MONEY_CLIENT'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function findAllAboutFacture()
    {
        $db = \Config\Database::connect();
        $query = $db->query("select facture.id, facture.commande_id,facture.total, clients.nom, clients.email  from facture left join commande on facture.commande_id = commande.id left join clients on commande.clients_id = clients.id left join details_commandes on commande.id = details_commandes.commande_id left join videos on details_commandes.produit_id = videos.id");

        return $query->getResultArray();
    }

    public function findAllAboutFactureById(int $id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("select facture.id,videos.price*details_commandes.quantite, details_commandes.quantite, videos.title from facture left join commande on facture.commande_id = commande.ID left join details_commandes on commande.ID = details_commandes.commande_id left join videos on details_commandes.produit_id = videos.id where facture.ID"."=".$id);

        return $query->getResultArray();
    }

    public function findTotal(int $id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("select sum(videos.price*details_commandes.quantite) from facture left join commande on facture.commande_id = commande.ID left join details_commandes on commande.ID = details_commandes.commande_id left join videos on details_commandes.produit_id = videos.id where facture.ID"."=".$id);

        return $query->getResultArray();
    }
}
