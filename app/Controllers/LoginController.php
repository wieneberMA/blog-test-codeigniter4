<?php
 
 namespace App\Controllers;
  
 use App\Controllers\BaseController;
 use App\Models\LoginModel;
  
 class LoginController extends BaseController
 {
     protected $request;
     protected $loginModel;
  
     public function __construct()
     {
         $this->request = \Config\Services::request();
         $this->loginModel = new LoginModel;
     }
     public function index()
     {  
         $data=[];
         $data['page_title']="Login";
         $data['data']=$this->request;
         $session = session();
         if($this->request->getMethod() == 'post'){
             $user = $this->loginModel->where('email', $this->request->getPost('email'))->first();
             if($user){
                 $verify_password  = password_verify($this->request->getPost('password'),$user['password']);
                 if($verify_password){
                     foreach($user as $k => $v){
                         $session->set('login_'.$k, $v);
                     }
                     return redirect()->to('/Main');
                 }else{
                     $session->setFlashdata('error','Incorrect Password');
                 }
             }else{
                 $session->setFlashdata('error','Incorrect Email or Password');
             }
         }
         $data['session'] = $session;
         return view('login/login', $data);
     }
     public function logout(){
         $session = session();
         $session->destroy();
         return redirect()->to('/');
     }
  
     public function registration(){
         $session = session();
         $data=[];
         $data['session'] = $session;
         $data['data'] = $this->request;
         $data['page_title'] = "Registration";
         if($this->request->getMethod() == 'post'){
             $firstname = $this->request->getPost('firstname');
             $middlename = $this->request->getPost('middlename');
             $lastname = $this->request->getPost('lastname');
             $email = $this->request->getPost('email');
             $password = $this->request->getPost('password');
             $checkEmail = $this->loginModel->where('email', $email)->countAllResults();
             if($checkEmail > 0){
                 $session->setFlashdata('error','Email is already taken.');
             }else{
                 $idata = [  
                             'firstname' => $firstname,
                             'middlename' => $middlename,
                             'lastname' => $lastname,
                             'email' => $email,
                             'password' => password_hash($password, PASSWORD_DEFAULT),
                         ];
                 $save = $this->loginModel->save($idata);
                 if($save){
                     $session->setFlashdata('success','Your Account has been registered sucessfully.');
                     return redirect()->to('/');
                 }
             }
         }
         return view('login/registration', $data);
     }
 }