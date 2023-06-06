<?php

namespace App\Controllers;

use App\Models\CategorieModel;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $categorie= new CategorieModel();
        $selectCategorie = $categorie->findAll();
        if(!empty($selectCategorie))
        {
            $result = [
                'status'=>201,
                'data'=>$selectCategorie
            ];
            
        }else{
            $result = [
                'status'=>404,
                'data'=>'No data found'
            ];
        }
        return $this->respond($result);
    }

    public function create()
    {
        if($this->request->getMethod() == 'post')
        {
            if($this->validate([
                'NOM'=>'required|min_length[4]'
            ]))
            {
                $nom = $this->request->getVar('NOM');
                $data = [
                    'NOM'=>$nom
                ];
                $newCategorie = new CategorieModel();
                $new = $newCategorie->insert($data);
                if($new)
                {
                    $result = [
                        'status'=>201,
                        'data'=>'Data inserted successfully'
                    ];
                    
                }
            }else{
                $result = [
                    'status'=>404,
                    'data'=>'some error found'
                ];
            }
            return $this->respond($result);
        }
    }

    public function update($id)
    {
        $categorie = new CategorieModel();
        $findCategorie = $categorie->find($id);
        if($findCategorie)
        {
            $result = [
                'status'=>201,
                'data'=>$findCategorie
            ];
            if($this->request->getMethod() == 'put')
            {
                if($this->validate([
                    'NOM'=>'required|min_length[4]'
                ]))
                {
                    $nom = $this->request->getVar('NOM');
                    $data = [
                        'NOM'=>$nom
                    ];
                    $findCategorie = new CategorieModel();
                    $updateCategorie = $findCategorie->update($id, $data);
                    if($updateCategorie)
                    {
                        $result = [
                            'status'=>201,
                            'data'=>'update successfully'
                        ];
                    }else{
                        $result = [
                            'status'=>404,
                            'data'=>'some Error found'
                        ];
                    }
                    
                }
            }
        }else{
            $result = [
                'status'=>404,
                'data'=>'No record found'
            ];
        }
        return $this->respond($result);
    }

    public function delete($id)
    {
        $categorie = new CategorieModel();
        $findCategorie = $categorie->find($id);
        if($findCategorie)
        {
            $deleteCategorie = $categorie->delete($id);
            if($deleteCategorie)
            {
                $result = [
                    'status'=>201,
                    'data'=>'delete successfully'
                ];
            }

        }else{
            $result = [
                'status'=>404,
                'data'=>'No data found'
            ];
        }
        return $this->respond($result);
    }

    
}
