<?PHP

if($_SESSION['user']['permission']=="admin"){}
elseif($_SESSION['user']['permission']=="procurement"){}
else{
   header('Location: 404.php'); 
}

?>

<div class="text-center my-5 p-5">
    <h1 class="border-bottom border-3 m-auto w-50"><i class="fa-solid fa-house-laptop"></i> Restock Items</h1>
</div>

<div class="container row  m-auto gap-5" style="margin: 50rem;">

    <?PHP foreach ($data as $item) :?>


    <form action="/update-quantity" method="POST" class="col-4 m-auto" style="width: 18rem;height:27rem;border: 11px groove #115DFF;border-radius: 25px;">
        <div class="card">
            <img src="resources/views/photos/<?=$item->item_image;?>" style="width:100%; height:15rem;" class="card-img-top p-3 border-bottom border-primary" alt="item image">
            <div class="card-body text-center">
                <h5 class="card-title mb-3"><?=htmlspecialchars($item->item_name);?></h5>
                <input type="hidden" name="id" value="<?=$item->id;?>">
                <input type="number" name="quantity" class="my-2" style="width:10rem;" min=<?=$item->quantity;?> value="<?=$item->quantity;?>">
            </div>
        </div>
        <button class="btn btn-primary" style="width: -webkit-fill-available;"><i class="fa-solid fa-pencil"></i> update item quantity</button>
    </form>

    <?PHP endforeach;?>
</div>

