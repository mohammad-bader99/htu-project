<?PHP

if($_SESSION['user']['permission']=="admin"){}
else{
   header('Location: 404.php'); 
}

?>

<div class="text-center" style="margin :5rem;">
        <h1 class="border-bottom border-3 m-auto w-50"><i class="fa-solid fa-square-poll-vertical"></i> Info Dashboard</h1>
</div>
<div class="container">
    <div class="text-center w-50 m-auto">
            <div class="input-group my-4">
                <span class="input-group-text" style="width:12rem;">Available Money: </span>
                <input type="text" aria-label="username" disabled class="form-control" value="<?=$data->money?>">
            </div>
            <div class="input-group my-4">
                <span class="input-group-text" style="width:12rem;">Total Transactions: </span>
                <input type="text" aria-label="display_name" disabled class="form-control" value="<?=$data->transaction_rows?>">
            </div>
            <div class="input-group my-4">
                <span class="input-group-text" style="width:12rem;">Wearhouse Items: </span>
                <input type="text" aria-label="email" disabled class="form-control" value="<?=$data->items_qty?>">
            </div>
            <div class="input-group my-4">
                <span class="input-group-text" style="width:12rem;">Total Users: </span>
                <input type="text" aria-label="password" disabled class="form-control" value="<?=$data->users_qty?>">
            </div>
    </div>
    <div class="text-center" style="margin :5rem;">
        <h1 class="border-bottom border-3 m-auto w-50"><i class="fa-solid fa-hand-holding-dollar"></i> Top Expensive Items</h1>
    </div>
    <table class="table border-success my-3">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Item Image</th>
        <th scope="col">Item ID</th>
        <th scope="col">Item Name</th>
        <th scope="col">Selling Price</th>
        <th scope="col">Quantity</th>
        </tr>
    </thead>
    <tbody>

    <?PHP $i=1; foreach ($data->top_expensive as $item) :?>
        <tr class="my-3">
        <th scope="row"><?=$i;?></th>
        <td><img src="resources/views/photos/<?=$item->item_image;?>" style="width:150px;height:150px;" class="img-fluid rounded-start" alt="user photo"></td>
        <td><?=$item->id;?></td>
        <td><?=htmlspecialchars($item->item_name);?></td> 
        <td><?=$item->selling_price;?></td> 
        <td><?=$item->quantity;?></td> 
        <td></td>
        </tr>
    <?PHP $i++; endforeach?> 

    </tbody>
    </table>
</div>