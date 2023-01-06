<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;

/**
 * handle the user operation
 */
class Users extends Controller
{

        /**
         * redirect the user
         *
         * @return void
         */
        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        
        /**
         * display the dashboard
         *
         * @return void
         */
        public function index()
        {
                $this->view = 'dashboard';
        }


        /**
         * display the user profile
         *
         * @return void
         */
        public function profile()
        {
                $this->view = 'profile-form';
                $user=new User();
                $this->data=(array)$user->get_by_id($_SESSION['user']['id']);
        }


        /**
         * display users management dashboard
         *
         * @return void
         */
        public function users_management()
        {
                $this->view = 'display-users';
                $user=new User();
                $this->data=$user->get_all();
        }
        

        /**
         * display update profile form
         *
         * @return void
         */
        public function update_profile_form()
        {
                $this->view = 'update-profile-form';
                $user=new User();
                $this->data=(array)$user->get_by_id($_GET['id']);
        }


        /**
         * update the user profile
         *
         * @return void
         */
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
                                'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT),
                                'user_image'=> $_FILES['file']['name']
                        );
                        
                        $uploaddir = dirname(__DIR__,2).'\\resources\\views\\photos\\';
                        $uploadfile = $uploaddir . basename($_FILES['file']['name']);
                        move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                        $_SESSION['user']['user_image']= $_POST['user_image']; 
                }
 
                $_POST['password']=password_hash($_POST['password'],PASSWORD_DEFAULT);
                $user=new User();
                $user->update($_POST);

                $_SESSION['user']['username']= $_POST['username'];
                $_SESSION['user']['display_name']= $_POST['display_name'];
                $_SESSION['user']['email']= $_POST['email'];
                
                   
            } 
                               
                Helper::redirect('/dashboard');
        }


        /**
         * display create user form
         *
         * @return void
         */
        public function create_user_form()
        {
                $this->view = 'create-user-form';
        }


        /**
         * create new user on the database
         *
         * @return void
         */
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
                                'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT),
                                'permission'=>$_POST['permission'],
                                'user_image'=> $_FILES['file']['name']
                        );
                        
                        $uploaddir = dirname(__DIR__,2).'\\resources\\views\\photos\\';
                        $uploadfile = $uploaddir . basename($_FILES['file']['name']);
                        move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                }
                $_POST['password']=password_hash($_POST['password'],PASSWORD_DEFAULT);
                $user = new User();
                $user->create($_POST);
            }     
                Helper::redirect('/users-management');
        }


        /**
         * display update user form
         *
         * @return void
         */
        public function update_user_form()
        {
                $this->view = 'update-user-form';
                $user=new User();
                $this->data=(array)$user->get_by_id($_GET['id']);
        }
        

        /**
         * display single user information
         *
         * @return void
         */
        public function single_user()
        {
                $this->view = 'single-user';
                $user=new User();
                $this->data=(array)$user->get_by_id($_GET['id']);
        }


        /**
         * update single user information
         *
         * @return void
         */
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
                                'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT),
                                'permission'=>$_POST['permission'],
                                'user_image'=> $_FILES['file']['name']
                        );
                        
                        $uploaddir = dirname(__DIR__,2).'\\resources\\views\\photos\\';
                        $uploadfile = $uploaddir . basename($_FILES['file']['name']);
                        move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                }
                $_POST['password']=password_hash($_POST['password'],PASSWORD_DEFAULT);
                $user=new User();
                $user->update($_POST);  
            }     
              
                Helper::redirect('/users-management');
        }


        /**
         * delete user from the database
         *
         * @return void
         */
        public function delete_user()
        {
                $user =new User();
                $user->delete($_GET['id']);
                Helper::redirect('/users-management');
        }

}
