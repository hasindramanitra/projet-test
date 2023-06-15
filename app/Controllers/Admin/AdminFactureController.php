<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Facture;

class AdminFactureController extends BaseController
{
    public function index()
    {
        $facture = new Facture();
        $allFacture = $facture->findAllAboutFacture();
        return view('Admin/Facture/index', [
            'factures'=>$allFacture
        ]);
    }
}