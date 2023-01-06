<?PHP

if($_SESSION['user']['permission']=="admin"){}
elseif($_SESSION['user']['permission']=="procurement"){}
else{
   header('Location: 404.php'); 
}

?>

<div class="text-center my-5 p-5">
    <h1 class="border-bottom border-3 m-auto w-50"><i class="fa-solid fa-house-laptop"></i> out-of-stock</h1>
</div>

<div class="container row my-5 m-auto gap-5">

    <?PHP foreach ($data as $item) :?>


    <div class="card col-4 m-auto" style="width: 18rem;height:23rem;border: 11px groove #115DFF;border-radius: 25px;">
        <img src="resources/views/photos/<?=$item->item_image;?>" style="width:100%; height:15rem;" class="card-img-top p-3 border-bottom border-primary" alt="item image">
        <div class="card-body">
            <h5 class="card-title text-center mb-3"><?=htmlspecialchars($item->item_name);?></h5>
            <a href="/single-item?id=<?=$item->id;?>" class="btn btn-primary position-absolute bottom-8 start-50 translate-middle-x" style="width: -webkit-fill-available;"><i class="fa-solid fa-binoculars"></i> View item</a>
        </div>
    </div>

    <?PHP endforeach;?>
</div>