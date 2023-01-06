<div class="container w-50 border border-primary" style="margin-top:8rem;">
    <form action="/update-profile" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$data->id;?>">
        <div class="input-group my-4">
            <span class="input-group-text" style="width:8rem;">Username</span>
            <input type="text" aria-label="username" class="form-control" required name="username" value="<?=htmlspecialchars($data->username);?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" style="width:8rem;">Display Name</span>
            <input type="text" aria-label="displayname" class="form-control" required name="display_name" value="<?=htmlspecialchars($data->display_name);?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" style="width:8rem;">Email</span>
            <input type="text" aria-label="email" class="form-control" required name="email" value="<?=htmlspecialchars($data->email);?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" style="width:8rem;">Password</span>
            <input type="text" aria-label="password" class="form-control" required name="password" value="<?=htmlspecialchars($data->password);?>">
        </div>
        <div class="input-group my-4">
                <input type="file" name="file" id="file">
            </div>
        <div class="input-group my-4">
            <button class="btn btn-primary m-auto" style="width: -webkit-fill-available;">Submit</button>
        </div>
    </form>
</div>