<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ClientModel;

class AdminClientController extends BaseController
{
    public function index()
    {
        $client = new ClientModel();
        $allClient = $client->findAll();
        return view('Admin/Clients/index', [
            'clients'=>$allClient
        ]);
    }

    public function delete($id)
    {
        $oneClient = new ClientModel();
        $findClient = $oneClient->find($id);
        if($findClient)
        {
            $oneClient->delete($id);
            return redirect('Admin/AllClient')->with('status', 'Deleted successfully');
        }else{
            echo 'Client does not found';
        }
    }
}