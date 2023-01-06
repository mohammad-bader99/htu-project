<?PHP

if($_SESSION['user']['permission']=="admin"){}
else{
   header('Location: 404.php'); 
}

?>

<style>

    @media (max-width: 1000px) {
    .media-2 {
        display: none;
    }}

    @media (max-width: 800px) {
    .media {
        display: none;
    }}
</style>



<div class="text-center" style="margin :5rem;">
        <h1 class="border-bottom border-3 m-auto w-50"><i class="fa-solid fa-users"></i> Users management</h1>
</div>

<div class="text-center">
    <a href="/create-user" class="btn btn-info align-midle">Create New User</a>
</div>

<div class="container my-5 ml-5">
    
    <table class="table border-success my-3">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">username</th>
        <th class="media" scope="col">display name</th>
        <th class="media media-2" scope="col">email</th>
        <th class="media" scope="col">permission</th>
        </tr>
    </thead>
    <tbody>

    <?PHP foreach ($data as $user) :?>
        <tr class="my-3">
        <th scope="row"><?=$user->id;?></th>
        <td><?=htmlspecialchars($user->username);?>
        <td class="media"><?=htmlspecialchars($user->display_name);?>
        <td class="media media-2"><?=htmlspecialchars($user->email);?>
        <td class="media"><?=$user->permission;?></td> 
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