<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CommandeModel;

class AdminCommandeController extends BaseController
{
    public function index()
    {
        $commande = new CommandeModel();
        $allCommande = $commande->findAll();
        return view('Admin/Commande/index', [
            'commande'=>$allCommande
        ]);
    }

    public function delete($id)
    {
        $oneCommande = new CommandeModel();
        $findCommande = $oneCommande->find($id);
        if($findCommande)
        {
            $oneCommande->delete($id);
            return redirect('Admin/AllCommande')->with('status', 'Deleted successfully');
        }else{
            echo 'Commande does not exist';
        }
    }
}