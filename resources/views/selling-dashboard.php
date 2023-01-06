<?PHP

if($_SESSION['user']['permission']=="admin"){}
elseif($_SESSION['user']['permission']=="seller"){}
else{
   header('Location: 404.php'); 
}

?>

<div class="text-center my-5 p-5">
    <h1 class="border-bottom border-3 m-auto w-50"><i class="fa-sharp fa-solid fa-cart-shopping"></i> Selling Dashboard</h1>

    <?PHP if($_SESSION['qty_error']=="true"):$_SESSION['qty_error']=" "?>
        <div class="alert alert-danger m-auto my-3 w-25" role="alert"><i class="fa-solid fa-triangle-exclamation"></i> Resubmit The Transaction Again</div>
    <?PHP elseif($_SESSION['qty_error']=="false"):?>
        <div class="alert alert-success m-auto my-3 w-25" role="alert"><i class="fa-solid fa-check"></i> Done</div>
    <?PHP $_SESSION['qty_error']=""; endif;?>
</div>

<div class="container d-flex flex-row justify-content-around w-100 border-bottom border-3 p-3">
    

    <div class="input-group w-25 d-flex flex-row">
            <span class="input-group-text">Choose Item:</span>
            <select name="item_name" id="item_name" value="">

                <?PHP foreach ($data as $item) :?>
                <option value="<?=htmlspecialchars($item->item_name)?>"><?=htmlspecialchars($item->item_name)?></option>
                <?PHP endforeach;?>

            </select>
    </div>
    <div class="input-group w-25">
            <span class="input-group-text">Quantity</span>
            <input type="number" aria-label="quantity" id="qty" required class="form-control" name="quantity" min=0>
    </div>
    <div class="input-group w-25">
            <button class="btn btn-primary m-auto" id="sell_button"><i class="fa-solid fa-dollar-sign"></i> Sell</button>
    </div>
</div>

    <div class="input-group w-100 my-5">
            <a href="/user-record" class="btn btn-secondary position-absolute top-0 end-0" style="margin-right: 200px;"><i class="fa-solid fa-database"></i> Transaction Record</a>
    </div>


<div class="container row  m-auto gap-5 mt-5" style="margin: 50rem;">

    <?PHP foreach ($data as $item) :?>

        <div class="card text-bg-light mb-3 p-0" style="width: 25rem;height: 12rem;">
            <div class="card-header">
                <?=htmlspecialchars($item->item_name);?>
            </div>
            <div class="d-flex flex-row ">
                <div class="text-center my-2 ms-2">
                    <img src="resources/views/photos/<?=$item->item_image;?>" alt="item image" style="width:8rem;height:8rem;">
                </div>
                <div class="m-auto">
                    <div class="card-body text-center">
                        <p class="card-text">Item: <?=htmlspecialchars($item->item_name);?><br>Price: <?=$item->selling_price;?><br>QTY: <?=$item->quantity;?></p>
                    </div>
                   
                </div>
            </div>
        </div>
    <?PHP endforeach;?>
</div>

<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script>

    $('#sell_button').click(function(e) {
         e.preventDefault();
         let data = {
             'item_name': $('#item_name').val(),
             'item_quantity': $('#qty').val(),
         };

        $('#qty').val('');

        $.ajax({
            type: "post",
            url: "/api/create-transaction",
            data: JSON.stringify(data),
            
         });
        window.location.reload()
    });
</script>