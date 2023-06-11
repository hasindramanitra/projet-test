<?php
namespace App\Controllers;

use App\Models\CategorieModel;
use App\Models\VideoModel;

class VideoController extends BaseController
{
    public function index()
    {
        
        $video = new VideoModel();
        $allVideo = $video->findAll();
        return view('videos/index', [
            'videos'=>$allVideo
        ]);
    }

    
}