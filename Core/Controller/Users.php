<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;


class Users extends Controller
{
        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        // function __construct()
        // {
        //         $this->auth();
        //         $this->admin_view(true);
        // }

        public function index()
        {
                $this->view = 'dashboard';
        }

        public function profile()
        {
                $this->view = 'profile-form';
                $user=new User();
                $this->data=(array)$user->get_by_id($_SESSION['user']['id']);
        }

        public function users_management()
        {
                $this->view = 'display-users';
                $user=new User();
                $this->data=$user->get_all();
        }
        
        public function update_profile_form()
        {
                $this->view = 'update-profile-form';
                $user=new User();
                $this->data=(array)$user->get_by_id($_GET['id']);
        }

        public function update_profile()
        {
                if(!empty($_POST))
            { 
                if(!empty($_FILES['file']['name']))
                {
                        $name=explode('.',$_FILES['file']['name']);
                        $_FILES['file']['name']=$name[0].'.png';
                        $_POST=array(
                                'id'=>$_POST['id'],
                                'username'=>$_POST['username'],
                                'display_name'=>$_POST['display_name'],
                                'email'=>$_POST['email'],
                                'password'=>$_POST['password'],
                                'user_image'=> $_FILES['file']['name']
                        );
                        
                        $uploaddir = dirname(__DIR__,2).'\\resources\\views\\photos\\';
                        $uploadfile = $uploaddir . basename($_FILES['file']['name']);
                        move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                        $_SESSION['user']['user_image']= $_POST['user_image']; 
                }
                $user=new User();
                $user->update($_POST);
                $_SESSION['user']['username']= $_POST['username'];
                $_SESSION['user']['display_name']= $_POST['display_name'];
                $_SESSION['user']['email']= $_POST['email'];
                $_SESSION['user']['password']= $_POST['password'];  
                   
            } 
                               
                Helper::redirect('/dashboard');
        }

        public function create_user_form()
        {
                $this->view = 'create-user-form';
        }

        public function save_user()
        {
                if(!empty($_POST))
            { 
                if(!empty($_FILES['file']['name']))
                {
                        $name=explode('.',$_FILES['file']['name']);
                        $_FILES['file']['name']=$name[0].'.png';
                        $_POST=array(
                                'username'=>$_POST['username'],
                                'display_name'=>$_POST['display_name'],
                                'email'=>$_POST['email'],
                                'password'=>$_POST['password'],
                                'permission'=>$_POST['permission'],
                                'user_image'=> $_FILES['file']['name']
                        );
                        
                        $uploaddir = dirname(__DIR__,2).'\\resources\\views\\photos\\';
                        $uploadfile = $uploaddir . basename($_FILES['file']['name']);
                        move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                }
                $user = new User();
                $user->create($_POST);
            }     
                Helper::redirect('/users-management');
        }

        public function update_user_form()
        {
                $this->view = 'update-user-form';
                $user=new User();
                $this->data=(array)$user->get_by_id($_GET['id']);
        }
        
        public function single_user()
        {
                $this->view = 'single-user';
                $user=new User();
                $this->data=(array)$user->get_by_id($_GET['id']);
        }

        public function update_user()
        {
                if(!empty($_POST))
            { 
                if(!empty($_FILES['file']['name']))
                {
                        $name=explode('.',$_FILES['file']['name']);
                        $_FILES['file']['name']=$name[0].'.png';
                        $_POST=array(
                                'id'=>$_POST['id'],
                                'username'=>$_POST['username'],
                                'display_name'=>$_POST['display_name'],
                                'email'=>$_POST['email'],
                                'password'=>$_POST['password'],
                                'permission'=>$_POST['permission'],
                                'user_image'=> $_FILES['file']['name']
                        );
                        
                        $uploaddir = dirname(__DIR__,2).'\\resources\\views\\photos\\';
                        $uploadfile = $uploaddir . basename($_FILES['file']['name']);
                        move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                }
                $user=new User();
                $user->update($_POST);  
            }     
              
                Helper::redirect('/users-management');
        }

        public function delete_user()
        {
                $user =new User();
                $user->delete($_GET['id']);
                Helper::redirect('/users-management');
        }

}
