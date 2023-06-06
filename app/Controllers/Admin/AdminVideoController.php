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
}