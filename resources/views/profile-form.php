<style>

    @media (max-width: 1000px) {
    #media {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        margin: auto;
    }}

</style>

<div class="text-center my-5">
        <h1 class="border-bottom border-3 m-auto w-50"><i class="fa-solid fa-user"></i> Profile</h1>
</div>
<div id="media" class="container w-100 row m-auto" >
    <div class="text-center align-middle w-50 h-50" >
        <img src="resources/views/photos/<?=$data->user_image;?>" style="height:25rem;width:25rem;" class="p-3 border border-primary" alt="user image">
    </div>
    <div class="text-center w-50 m-auto">
        <div class="input-group my-4">
            <span class="input-group-text" style="width:8rem;">User name</span>
            <input type="text" aria-label="username" disabled class="form-control" name="username" value="<?=htmlspecialchars($data->username);?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" style="width:8rem;">Display name</span>
            <input type="text" aria-label="display_name" disabled class="form-control" name="display_name" value="<?=htmlspecialchars($data->display_name);?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" style="width:8rem;">Email</span>
            <input type="text" aria-label="email" disabled class="form-control" name="email" value="<?=htmlspecialchars($data->email);?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" style="width:8rem;">Password</span>
            <input type="text" aria-label="password" disabled class="form-control" name="password" value="<?=htmlspecialchars($data->password);?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" style="width:8rem;">Permission</span>
            <input type="text" aria-label="permission" disabled class="form-control" name="permission" value="<?=$data->permission;?>">
        </div>
        <div class="input-group my-4 d-flex justify-content-around">
            <a href="/update-profile-form?id=<?=$data->id;?>" class="btn btn-warning"><i class="fa-solid fa-eye"> Update info</i></a>
        </div>
    </div>
</div>
