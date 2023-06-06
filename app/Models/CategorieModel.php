<?php
namespace App\Models;

use CodeIgniter\Model;

class CategorieModel extends Model
{
    
    protected $table = 'CATEGORIES';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['NOM'];

    
}