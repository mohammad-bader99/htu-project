<?php
session_start();


use Core\Model\User;
use Core\Router;



spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Core') === false)
        return;
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});

 if (isset($_COOKIE['user_id']) && !isset($_SESSION['user'])) { // check if there is user_id cookie.
     // log in the user automatically
     $user = new User(); // get the user model
     $logged_in_user = $user->get_by_id($_COOKIE['user_id']); // get the user by id
     $_SESSION['user'] = array(
        'id' => $logged_in_user->id,
        'username' => $logged_in_user->username,
        'display_name' => $logged_in_user->display_name,
        'email' => $logged_in_user->email,
        'password' => $logged_in_user->password,
        'permission' => $logged_in_user->permission,
    );
 }

Router::get('/','authentication.login'); // Displays the login form
Router::post('/authenticate','authentication.validation'); //check the entered username and password
Router::get('/login', "authentication.login"); // Displays the login form
Router::get('/logout', "authentication.logout"); // Logs the user out


Router::get('/dashboard', "users.index"); // Displays the user dashboard
Router::get('/profile', "users.profile"); // Displays the profile form
Router::post('/update-profile', "users.update_profile"); // Update the user profile
Router::get('/users-management', "users.users_management"); // Displays all users form
Router::get('/delete-user', "users.delete_user"); // Delete user profile
Router::get('/create-user', "users.create_user_form"); // Displays create user form
Router::post('/save-user', "users.save_user"); // Create new user
Router::get('/update-user-form', "users.update_user_form"); // Displays update user form
Router::post('/update-user', "users.update_user"); // Update user info
Router::get('/single-user-form', "users.single_user"); // Displays single user form
Router::get('/update-profile-form', "users.update_profile_form"); // Displays update profile form


Router::get('/stock-dashboard', "items.dashboard"); // Displays all items dashboard
Router::get('/restock-items', "items.restock"); // Displays restock dashboard
Router::post('/update-quantity', "items.update_item_quantity"); // Update item quantity
Router::get('/single-item', "items.single_item"); // Displays single item dashboard
Router::get('/update-item-form', "items.update_item_form"); // Displays update item form
Router::post('/update-item', "items.update_item"); // Update item info
Router::get('/delete-item', "items.delete_item"); // Delete item
Router::get('/create-item-form', "items.create_item_form"); // Displays create item form
Router::post('/create-item', "items.create_item"); // Create new item
Router::get('/out-of-stock', "items.out_of_stock"); // Displays out of stock form


Router::get('/selling-dashboard', "transactions.selling_dashboard"); // Displays selling dashboard
Router::get('/user-record', "transactions.user_record"); // Displays user's transaction record
Router::get('/records-dashboard', "transactions.display_records"); // Displays all transacion records
Router::get('/delete-record', "transactions.delete_record"); // Delete transaction
Router::get('/update-record-form', "transactions.update_record_form"); // Displays update transaction form
Router::post('/update-record', "transactions.update_record"); // Update transaction
Router::get('/info-dashboard', "transactions.info_dashboard"); // Displays info dashboard
Router::get('/get-single-transaction', "transactions.single_transaction"); // Displays single transaction


Router::post('/api/create-transaction', "api.create_transaction"); //  Create new transaction using ajax
Router::get('/api/get-transaction', "api.get_transaction"); // Displays all user transaction using ajax
Router::put('/api/update-transaction', "api.update_transaction"); // Update user transaction using ajax
Router::delete('/api/delete-transaction', "api.delete_transaction"); // Delete transaction using ajax



Router::redirect();
