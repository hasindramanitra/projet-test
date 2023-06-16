<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategorieModel;
use App\Models\VideoModel;

class AdminVideoController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        $videos  = new VideoModel();
        $allVideos = $videos->findAll();
        if($allVideos)
        {
            return view('Admin/videos/index', [
                'videos'=>$allVideos
            ]);
        }else{
            echo 'No videos found';
        }
    }
    public function create()
    {
        $categories = new CategorieModel();
        $data =[];
        $data['validation'] = null;
        if($this->request->getMethod() == 'post')
        {
            
            if($this->validate([
                'TITLE'=>'required|min_length[3]',
                'TIME'=>'required',
                'PRICE'=>'required|numeric|is_natural_no_zero',
                'DESCRIPTION'=>'required|min_length[10]',
                'IMAGE'=>'uploaded[IMAGE]',
                'CATEGORIE_ID'=>'required'
            ])){
                $image = $this->request->getFile('IMAGE');
                if($image->isValid() && !$image->hasMoved())
                {
                   
                    $newName = $image->getRandomName();
                    $image->move('Uploads/',$newName);
                    $data = [
                        'TITLE'=>$this->request->getVar('TITLE'),
                        'TIME'=>$this->request->getVar('TIME'),
                        'PRICE'=>$this->request->getVar('PRICE'),
                        'DESCRIPTION'=>$this->request->getVar('DESCRIPTION'),
                        'IMAGE'=>$newName,
                        'CATEGORIE_ID'=>$this->request->getVar('CATEGORIE_ID')
                    ];
                    $video = new VideoModel();
                    $video->insert($data);
                    return redirect('Admin/AllVideo')->with('status', 'video inserted successfully');
                }
                
            }else{
                $data['validation'] = $this->validator;
            }
        }
        return view('Admin/videos/new', [
            'categories'=>$categories->findAll()
        ]);
    }

    public function update($id)
    {
        $categories = new CategorieModel();
        $data =[];
        $data['validation'] = null;
        $oneVideo = new VideoModel();
        $findVideo = $oneVideo->find($id);
        if($findVideo)
        {
            if($this->request->getMethod() == 'post')
            {
                if($this->validate([
                    'TITLE'=>'required|min_length[3]',
                    'TIME'=>'required',
                    'PRICE'=>'required|numeric|is_natural_no_zero',
                    'DESCRIPTION'=>'required|min_length[10]',
                    'IMAGE'=>'uploaded[IMAGE]',
                    'CATEGORIE_ID'=>'required'
                ])){
                    $image = $this->request->getFile('IMAGE');
                    if($image->isValid() && !$image->hasMoved())
                    {
                    
                        $newName = $image->getRandomName();
                        $image->move('Uploads/',$newName);
                        $data = [
                            'TITLE'=>$this->request->getVar('TITLE'),
                            'TIME'=>$this->request->getVar('TIME'),
                            'PRICE'=>$this->request->getVar('PRICE'),
                            'DESCRIPTION'=>$this->request->getVar('DESCRIPTION'),
                            'IMAGE'=>$newName,
                            'CATEGORIE_ID'=>$this->request->getVar('CATEGORIE_ID')
                        ];
                        $video = new VideoModel();
                        $video->update($id,$data);
                        return redirect('Admin/AllVideo')->with('status', 'video inserted successfully');
                    }
                }else{
                    $data['validation'] = $this->validator;
                }
            }
            return view('Admin/videos/update', [
                'categories'=>$categories->findAll(),
                'video'=>$findVideo
            ]);
        }else{
            echo 'video does not exist';
        }
        
    }

    public function delete($id)
    {
        $video = new VideoModel();
        $findVideo = $video->find($id);
        $findAllRelatedVideo = $video->findAllRelatedVideo($id);
        if($findVideo && $findAllRelatedVideo)
        {
            return redirect('Admin/AllVideo')->with('status', "you can delete that video because it's related to a command");
        }else if($findVideo && !$findAllRelatedVideo){
            $video = new VideoModel();
            $deletedVideo = $video->delete($id);
            return redirect('Admin/AllVideo')->with('status', "Video deleted successfully");
        }
    }
}