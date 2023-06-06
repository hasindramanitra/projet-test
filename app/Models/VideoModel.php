<?php
namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $table = 'VIDEOS';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['TITLE', 'PRICE', 'DESCRIPTION', 'TIME', 'CATEGORIE_ID'];
}