<div class="text-center my-5">
        <h1 class="border-bottom border-3 m-auto w-50"><?=$data->item_name;?></h1>
</div>
<div class="container w-100 d-flex flex-row" >
    <div class="text-center align-middle w-50 h-50" >
        <img src="resources/views/photos/<?=$data->item_image;?>" style="height:25rem;width:25rem;" class="p-3 border border-primary" alt="item image">
    </div>
    <div class="text-center w-50">
        <div class="input-group my-4">
            <span class="input-group-text">Item name</span>
            <input type="text" aria-label="item_name" disabled class="form-control" name="item_name" value="<?=$data->item_name;?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text">Cost price</span>
            <input type="text" aria-label="cost_price" disabled class="form-control" name="cost_price" value="<?=$data->cost_price;?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text">Selling price</span>
            <input type="text" aria-label="selling_price" disabled class="form-control" name="selling_price" value="<?=$data->selling_price;?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text">Quantity</span>
            <input type="text" aria-label="quantity" disabled class="form-control" name="quantity" value="<?=$data->quantity;?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text">Updated by</span>
            <input type="text" aria-label="updated_by" disabled class="form-control" name="updated_by" value="<?=$data->updated_by;?>">
        </div>
        <div class="input-group my-4 d-flex justify-content-around">
            <a href="/update-item-form?id=<?=$data->id;?>" class="btn btn-warning"><i class="fa-solid fa-eye"> Update item</i></a>
            <a href="/delete-item?id=<?=$data->id;?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete item</a>
        </div>
    </div>
</div>
