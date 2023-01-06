<?PHP

if($_SESSION['user']['permission']=="admin"){}
elseif($_SESSION['user']['permission']=="procurement"){}
else{
   header('Location: 404.php'); 
}

?>

<div class="container w-50 border border-primary" style="margin-top:4rem;">
    <form action="/create-item" method="POST" enctype="multipart/form-data">
            <div class="input-group my-4">
                <span class="input-group-text" style="width:8rem;">Item name</span>
                <input type="text" aria-label="item_name" class="form-control" name="item_name" required>
            </div>
            <div class="input-group my-4">
                <span class="input-group-text" style="width:8rem;">Cost price</span>
                <input type="number" aria-label="cost_price" class="form-control" name="cost_price" required>
            </div>
            <div class="input-group my-4">
                <span class="input-group-text" style="width:8rem;">Selling price</span>
                <input type="number" aria-label="selling_price" class="form-control" name="selling_price" required>
            </div>
            <div class="input-group my-4">
                <span class="input-group-text" style="width:8rem;">Quantity</span>
                <input type="number" aria-label="quantity" class="form-control" name="quantity" required>
            </div>

                <input type="hidden" aria-label="updated_by" class="form-control" name="updated_by" value="<?=$_SESSION['user']['username']?>">

            <div class="input-group my-4">
                <input type="file" name="file" id="file">
            </div>
            <div class="input-group my-4">
                <button class="btn btn-primary m-auto" style="width: -webkit-fill-available;">Create item</button>
            </div>
    </form>
</div>