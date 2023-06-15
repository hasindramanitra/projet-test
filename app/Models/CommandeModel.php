<?php

namespace App\Models;

use CodeIgniter\Model;

class CommandeModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'commande';
    protected $table1           = 'clients';
    protected $primaryKey       = 'id';
    protected $foreignKey       = 'CLIENTS_ID';
    protected $client           = 'ID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['CREATED_AT', 'CLIENTS_ID'];

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


    public function findClient()
    {
        $cliente = new ClientModel();
        $allClient = $cliente->findAll();
        $result = [];
        foreach($allClient as $key =>$value)
        {
            $result[] = [
                'ID'=>$value['ID']
            ];
        }
        return $result;
    }

    public function findCommand()
    {
        $commande = new CommandeModel();
        $allCommande  = $commande->findAll();
        $resultCommande = [];
        foreach ($allCommande as $key => $value) 
        {
            $resultCommande[] = [
                'ID'=>$value['CLIENTS_ID']
            ];
        }
        return $resultCommande;
    }
    
    public function findAllAboutCommande()
    {
        $db = \Config\Database::connect();
        

        //$query = $db->query("select * from ".$this->table."left join".$this->table1."on".$this->table.".".$this->findCommand()."=".$this->table1.".".$this->findClient());
        $query = $db->query("select commande.id,commande.created_at, clients.email, details_commandes.quantite, videos.title from commande left join clients on commande.CLIENTS_ID = clients.ID left join details_commandes on commande.ID = details_commandes.commande_id left join videos on details_commandes.produit_id = videos.id");

        return $query->getResultArray();
        
    }

    public function findAllAboutCommandeAndClient()
    {
        $db = \Config\Database::connect();
        $query = $db->query("select commande.id, clients.email, commande.created_at from commande left join clients on commande.clients_id = clients.id");

        return $query->getResultArray();
    }

    public function findAllAboutCommandeById(int $id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("select commande.id,commande.created_at,clients.nom, clients.email,clients.adresse, details_commandes.quantite, videos.title from commande left join clients on commande.CLIENTS_ID = clients.ID left join details_commandes on commande.ID = details_commandes.commande_id left join videos on details_commandes.produit_id = videos.id where commande.ID"."=".$id);

        return $query->getResultArray();
    }

    
}
