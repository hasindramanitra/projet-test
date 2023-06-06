<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VideoModel;
use CodeIgniter\API\ResponseTrait;

class AdminVideoController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $allVideo = new VideoModel();
        $videos = $allVideo->findAll();
        if(!empty($videos))
        {
            $result = [
                'status'=>201,
                'data'=>$videos
            ];
        }else{
            $result = [
                'status'=>404,
                'data'=>'No record found in database'
            ];
        }
        return $this->respond($result);
    }

    public function create()
    {
        if($this->request->getMethod() == 'post')
        {
            if($this->validate([
                'TITLE'=>'required|min_length[4]',
                'TIME'=>'required|min_length[5]',
                'PRICE'=>'required|numeric|is_natural_no_zero',
                'DESCRIPTION'=>'required',
                'CATEGORIE_ID'=>'required'
            ]))
            {
                $title = $this->request->getVar('TITLE');
                $time = $this->request->getVar('TIME');
                $price = $this->request->getVar('PRICE');
                $description = $this->request->getVar('DESCRIPTION');
                $categorie = $this->request->getVar('CATEGORIE_ID');

                $data = [
                    'TITLE'=>$title,
                    'TIME'=>$time,
                    'PRIX'=>$price,
                    'DESCRIPTION'=>$description,
                    'CATEGORIE_ID'=>$categorie
                ];

                $newVideo = new VideoModel();
                $newVideo->insert($data);
                if($newVideo->insert($data))
                {
                    $result = [
                        'status'=>201,
                        'data'=>'video inserted successfully'
                    ];
                }else{
                    $result = [
                        'status'=>404,
                        'data'=>'Some Error found'
                    ];
                }

            }
            return $this->respond($result);
        }
    }
}