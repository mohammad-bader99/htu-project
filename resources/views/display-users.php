<div class="text-center" style="margin :5rem;">
        <h1 class="border-bottom border-3 m-auto w-50"><i class="fa-solid fa-users"></i> Users management</h1>
</div>
<div class="container my-5 ml-5">
    <div>
    <a href="/create-user" class="btn btn-info" style="width:15rem;margin-left:58rem;">Create New User</a>
    </div>
    <table class="table border-success my-3">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">username</th>
        <th scope="col">display name</th>
        <th scope="col">email</th>
        <th scope="col">permission</th>
        </tr>
    </thead>
    <tbody>

    <?PHP foreach ($data as $user) :?>
        <tr class="my-3">
        <th scope="row"><?=$user->id;?></th>
        <td><?=$user->username;?></td>
        <td><?=$user->display_name;?></td>
        <td><?=$user->email;?></td> 
        <td><?=$user->permission;?></td> 
        <?PHP if($user->id!=1):?>
        <td><a href="/single-user-form?id=<?=$user->id;?>" class="btn btn-warning" style="width:5rem;"><i class="fa-solid fa-eye"></i></a></td>
        <td><a href="/delete-user?id=<?=$user->id;?>" class="btn btn-danger" style="width:5rem;"><i class="fa-solid fa-trash"></i></a></td>
        <?PHP endif;?>
        <td></td>
        </tr>
    <?PHP endforeach?> 

    </tbody>
    </table>
</div>