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

    /*public function more($id)
    {
        $facture = new Facture();
        $findFacture = $facture->find($id);
        $findAllAboutFactureById = $facture->findAllAboutFactureById($id);
        if($findFacture && $findAllAboutFactureById)
        {
            return view('Admin/Facture/more', [
                'allAboutFactures'=>$findAllAboutFactureById
            ]);
        }else{
            echo 'erreur';
        }
    }*/
}