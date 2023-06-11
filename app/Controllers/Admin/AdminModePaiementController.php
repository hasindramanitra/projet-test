<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModePaimentModel;

class AdminModePaiementController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        $modePaiement = new ModePaimentModel();
        return view('Admin/ModePaiement/index', [
            'ModePaiements'=>$modePaiement->findAll()
        ]);
    }

    public function create()
    {
        $data = [];
        $data['validation'] = null;
        if($this->request->getMethod() == 'post')
        {
            if($this->validate([
                'NOM'=>'required|min_length[3]'
            ])){
                $nom = $this->request->getVar('NOM');
                $data = [
                    'NOM'=>$nom
                ];
                $newModePaiement = new ModePaimentModel();
                $newModePaiement->insert($data);
                return redirect('Admin/AllModePaiement')->with('status', 'Mode paiement added');
            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('Admin/ModePaiement/new');
    }

    public function update($id)
    {
        $oneModePaiement = new ModePaimentModel();
        $findModePaiement = $oneModePaiement->find($id);
        if($findModePaiement)
        {
            if($this->request->getMethod() == 'post')
            {
                if($this->validate([
                    'NOM'=>'required|min_length[3]'
                ])){
                    $data = [
                        'NOM'=>$this->request->getVar('NOM')
                    ];
                    $updateModePaiement = new ModePaimentModel();
                    $updateModePaiement->update($id, $data);
                    return redirect('Admin/AllModePaiement')->with('status', 'updated successfully');
                }
            }
            return view('Admin/ModePaiement/update', [
                'modePaiement'=>$findModePaiement
            ]);
        }else{
            echo 'Mode paiement does not found';
        }
    }

    public function delete($id)
    {
        $modePaiement = new ModePaimentModel();
        $findModePaiement = $modePaiement->find($id);
        if($findModePaiement)
        {
            $modePaiement->delete($id);
            return redirect('Admin/AllModePaiement')->with('status', 'Deleted successfully');
        }else{
            echo 'Data not found';
        }
    }
}