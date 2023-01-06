<?PHP

if($_SESSION['user']['permission']=="admin"){}
elseif($_SESSION['user']['permission']=="accountant"){}
else{
   header('Location: 404.php'); 
}

?>

<div class="container w-50 border border-primary" style="margin-top:8rem;">
    <form action="/update-record" method="POST">
            
            
            <div class="input-group my-4">
                <span class="input-group-text" style="width:8rem;">Selling price</span>
                <input type="number" aria-label="selling_price" class="form-control" required name="selling_price" min=0 value="<?=$data->item_price;?>">
            </div>
            <div class="input-group my-4">
                <span class="input-group-text" style="width:8rem;">Quantity</span>
                <input type="number" aria-label="quantity" class="form-control" required name="quantity" min=0 value="<?=$data->item_qty;?>">
            </div>
            
            <input type="hidden" name="id" value="<?=$data->id?>">

        <div class="input-group my-4">
            <button class="btn btn-primary m-auto" style="width: -webkit-fill-available;">Update Record</button>
        </div>
    </form>
</div>