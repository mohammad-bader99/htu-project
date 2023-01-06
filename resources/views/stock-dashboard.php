<?PHP

if($_SESSION['user']['permission']=="admin"){}
elseif($_SESSION['user']['permission']=="procurement"){}
else{
   header('Location: 404.php'); 
}

?>

<div class="text-center my-5">
    <h1 class="border-bottom border-3 m-auto w-50"><i class="fa-solid fa-house-laptop"></i> Stock Management</h1>
    <a href="/create-item-form" class="btn btn-info mt-5 mx-5" style="width:15rem;">Create New Item</a>
    <a href="/restock-items" class="btn btn-info mt-5 mx-5" style="width:15rem;">Restock Items</a>
    <a href="/out-of-stock" class="btn btn-info mt-5 mx-5" style="width:15rem;">Out of Stock</a>
</div>

<div class="container row  m-auto gap-5" style="margin: 50rem;">

    <?PHP foreach ($data as $item) :?>


    <div class="card m-auto col-4" style="width: 18rem;height:23rem;border: 11px groove #115DFF;border-radius: 25px;">
        <img src="resources/views/photos/<?=$item->item_image;?>" style="width:100%; height:15rem;" class="card-img-top p-3 border-bottom border-primary" alt="item image">
        <div class="card-body">
            <h5 class="card-title text-center mb-3"><?=htmlspecialchars($item->item_name);?></h5>
            <a href="/single-item?id=<?=$item->id;?>" class="btn btn-primary position-absolute bottom-8 start-50 translate-middle-x" style="width: -webkit-fill-available;"><i class="fa-solid fa-binoculars"></i> View item</a>
        </div>
    </div>

    <?PHP endforeach;?>
</div>