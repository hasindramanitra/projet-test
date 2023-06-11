<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategorieModel;

class AdminCategoryController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        $categorie = new CategorieModel();
        return view('Admin/index', [
            'categories'=>$categorie->findAll()
        ]);
    }

    public function create()
    {
        if($this->request->getMethod() == 'post')
        {
            if($this->validate([
                'NOM'=>'required|min_length[3]'
            ])){
                $nom = $this->request->getVar('NOM');

                $data = [
                    'NOM'=>$nom
                ];
                $categorie = new CategorieModel();
                $categorie->insert($data);

                return redirect('Admin/AllCategorie')->with('status', 'Category added successfully');
            }
        }
        return view('Admin/new');
    }

    public function update($id)
    {
        $categorie = new CategorieModel();
        if($categorie->find($id))
        {
            if($this->request->getMethod() == 'post')
            {
                
                if($this->validate([
                    'NOM'=>'required|min_length[3]'
                ])){
                    $nom = $this->request->getVar('NOM');
                    $data = [
                        'NOM'=>$nom
                    ];
                    $updatecategorie = new CategorieModel();
                    $updatecategorie->update($id, $data);
                    return redirect('Admin/AllCategorie')->with('status', 'Category updated successfully');
                }
            }
            
            return view('Admin/update', [
                'category'=>$categorie->find($id)
            ]);
        }else{
            echo 'category does not exist';
        }
        
    }

    public function delete($id)
    {
        $categorie = new CategorieModel();
        $findCategorie = $categorie->find($id);
        if($findCategorie)
        {
            $deleteCategorie = new CategorieModel();
            $deleteCategorie->delete($id);
            return redirect('Admin/AllCategorie')->with('status', 'category deleted successfully');
        }else{
            echo 'Category does not exist';
        }
    }
}