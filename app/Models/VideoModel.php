<?php
namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $table = 'VIDEOS';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['TITLE', 'PRICE', 'DESCRIPTION', 'TIME','IMAGE', 'CATEGORIE_ID', 'QUANTITE_EN_STOCK'];


    public function updateVideo(int $id, int $quantite)
    {
        $db = \Config\Database::connect();

        $query = $db->query("update videos set quantite_en_stock"."=".$quantite."where id"."=".$id);

        return $query;
    }
    
    public function findAllRelatedVideo(int $id)
    {
        $db = \Config\Database::connect();
        $query = $db->query("select * from details_commandes left join videos on details_commandes.produit_id = videos.id where videos.id=".$id);
        $result = $query->getResult();

        return $result;
    }


    
}