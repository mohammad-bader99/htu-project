<?PHP

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;

class Authentication extends Controller
{

        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        public function login()
        {
                $this->view = 'login-form';
        }

        

        public function validation()
        {

                // if user doesn't exists, do not authenticate
                $user = new User();
                $logged_in_user = $user->check_username($_POST['username']);

                if (!$logged_in_user) {
                        $this->invalid_redirect();
                }

                if ($_POST['password']!= $logged_in_user->password) {
                        $this->invalid_redirect();
                }




                 if (isset($_POST['remember_me'])) {
                         // DO NOT ADD USER ID TO THE COOKIES - SECURITY BREACH!!!!!
                         \setcookie('user_id', $logged_in_user->id, time() + (86400 * 30)); // 86400 = 1 day (60*60*24)
                 }

                $_SESSION['user'] = array(
                        'id' => $logged_in_user->id,
                        'username' => $logged_in_user->username,
                        'display_name' => $logged_in_user->display_name,
                        'email' => $logged_in_user->email,
                        'password' => $logged_in_user->password,
                        'permission' => $logged_in_user->permission,
                        'user_image' => $logged_in_user->user_image
                );

                $_SESSION['qty_error']="";

                Helper::redirect('/dashboard');
        }


        public function logout()
        {
                \session_destroy();
                \session_unset();
                \setcookie('user_id', '', time() - 3600); // destroy the cookie by setting a past expiry date
                Helper::redirect('/');
        }

        private function invalid_redirect()
        {
                $_SESSION['error'] = "Invalid Username or Password";
                Helper::redirect('/login');
                exit();
        }
}