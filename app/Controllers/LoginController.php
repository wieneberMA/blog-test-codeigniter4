<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\LoginModel;

class LoginController extends BaseController
{   
    protected $request;
    protected $LoginModel;
    
    public function __construct(){
        $this->request = \Config\Services::request();
        $this->LoginModel = new LoginModel();
    }

    public function index(){
        $data=[];
        $data['page_title']="Login";
        $data['data']=$this->request;
        $session = session();
        if ($this->request->getMethod()=="post") {
            $user = $this->LoginModel->where('email',$this->request->getPost('email'))->first();
            if ($user) {
                $verify_password = password_verify('email',$this->request->getPost('password'),$user['password']);
                if ($verify_password) {
                    foreach ($user as $k => $v) {
                        $session->set('Login_'.$k, $v);
                    }
                    return redirect()->to('/Main');
                }else{
                    $session->setFlashdata('error','Incorrect Password');
                }
            }else{
                $session->setFlashdata('error','Email or Password Not Found');
            }
        }
        $data['session']=$session;
        return view('login/login',$data);
    }
    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    public function registration(){
        $session = session();
        $data=[];
        $data['session']=$session;
        $data['data']=$this -> request;
        $data['page_title']="Registration";
        if ($this->request->getMethod()=='post') {
            $firstname = $this->request->getPost('firstname');
            $middlename = $this->request->getPost('middlename');
            $lastname = $this->request->getPost('lastname');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $checkEmail = $this->LoginModel->where('email',$email)->countAllResults();
            if ($checkEmail>0) {
                $session->setFlashdata('error','Email Already Exist');
            }else{
                $data = [
                    'firstname' => $firstname,
                    'middlename' => $middlename,
                    'lastname' => $lastname,
                    'email' => $email,
                    'password' => password_hash($password,PASSWORD_DEFAULT),
                ];
                $save = $this->LoginModel->save($isadata);
                if ($save) {
                    $session->setFlashdata('success','your Account has been Registration Successfull');
                    return redirect()->to('/');
                }
            }

        }
        return view('login/registration',$data);
    }
}
