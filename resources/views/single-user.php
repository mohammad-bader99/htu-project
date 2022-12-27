<?PHP

//if($_SERVER['REDIRECT_URL'])
?>
<div class="text-center my-5">
        <h1 class="border-bottom border-3 m-auto w-50"><?=$data->username;?></h1>
</div>
<div class="container w-100 d-flex flex-row" >
    <div class="text-center align-middle w-50 h-50" >
        <img src="resources/views/photos/<?=$data->user_image;?>" style="height:25rem;width:25rem;" class="p-3 border border-primary" alt="user image">
    </div>
    <div class="text-center w-50">
        <div class="input-group my-4">
            <span class="input-group-text">User name</span>
            <input type="text" aria-label="username" disabled class="form-control" name="username" value="<?=$data->username;?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text">Display name</span>
            <input type="text" aria-label="display_name" disabled class="form-control" name="display_name" value="<?=$data->display_name;?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text">Email</span>
            <input type="text" aria-label="email" disabled class="form-control" name="email" value="<?=$data->email;?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text">Password</span>
            <input type="text" aria-label="password" disabled class="form-control" name="password" value="<?=$data->password;?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text">Permission</span>
            <input type="text" aria-label="permission" disabled class="form-control" name="permission" value="<?=$data->permission;?>">
        </div>
        <div class="input-group my-4 d-flex justify-content-around">
            <a href="/update-user-form?id=<?=$data->id;?>" class="btn btn-warning"><i class="fa-solid fa-eye"> Update user</i></a>
            <a href="/delete-user?id=<?=$data->id;?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete user</a>
        </div>
    </div>
</div>
