<?php 
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class SecurityController extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function login()
    {
        if($this->request->getMethod() == 'post')
        {
            $data = [];
            $data['validation'] = null;
            if($this->validate([
                'EMAIL'=>'required|valid_email',
                'PASSWORD'=>'required|min_length[6]'
            ])){
                $email = $this->request->getVar('EMAIL');
                $password = $this->request->getVar('PASSWORD');
                $admin = new AdminModel();
                $is_email = $admin->where('EMAIL', $email)->first();
                if($is_email)
                {
                    if(password_verify($password, $is_email['PASSWORD']))
                    {
                        session()->set("logged_admin");
                        return redirect()->to(base_url('Admin/AllVideo'));
                    }else{
                        session()->setTempdata('error', 'sorry! , wrong password entered for that email',3);
                        return redirect()->to(current_url());
                    }
                }else{
                    session()->setTempdata('error','sorry! Email does not exit',3);
                    return redirect()->to(current_url());
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }

        return view('Admin/login');
    }

    public function logout()
    {
        session()->remove('logged_admin');
        session()->destroy();
        return redirect()->to(base_url('Admin/login'));
    }
}