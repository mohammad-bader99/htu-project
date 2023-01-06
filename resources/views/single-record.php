<?PHP

if($_SESSION['user']['permission']=="admin"){}
elseif($_SESSION['user']['permission']=="seller"){}
else{
   header('Location: 404.php'); 
}

?>

    <div id="single-record-form" class="text-center w-50 m-auto my-5 p-5">
        <div class="input-group my-4">
            <span class="input-group-text" style="width:8rem;">ID</span>
            <input type="text" aria-label="id" disabled class="form-control" value="<?=$data->id;?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" style="width:8rem;">Item ID</span>
            <input type="text" aria-label="item_id" disabled class="form-control" value="<?=$data->item_id;?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" style="width:8rem;">Item Quantity</span>
            <input type="text" aria-label="item_qty" disabled class="form-control" value="<?=$data->item_qty;?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" style="width:8rem;">Selling Price</span>
            <input type="text" aria-label="item_price" disabled class="form-control" value="<?=$data->item_price;?>">
        </div>
        <div class="input-group my-4">
            <span class="input-group-text" style="width:8rem;">Total</span>
            <input type="text" aria-label="total" disabled class="form-control" value="<?=$data->total;?>">
        </div>
        <div class="input-group my-5 d-flex justify-content-around">
            <button id="update-form-button" class="btn btn-warning"><i class="fa-solid fa-eye"> Update record</i></button>
            <button id="delete-button" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete record</button>
        </div>
    </div>

    <div id="update-form" class="d-none my-5 p-5">
        <div class="container w-50 border border-primary" style="margin-top:8rem;">
                    <div class="input-group my-4">
                        <span class="input-group-text" style="width:8rem;">Selling Price</span>
                        <input type="number" id="item_price" aria-label="selling_price" class="form-control" required name="selling_price" min=0 value="<?=$data->item_price;?>">
                    </div>
                    <div class="input-group my-4">
                        <span class="input-group-text" style="width:8rem;">Quantity</span>
                        <input type="number" id="item_qty" aria-label="quantity" class="form-control" required name="quantity" min=0 value="<?=$data->item_qty;?>">
                    </div>
                    
                    <input type="hidden" id="transaction_id" name="id" value="<?=$data->id?>">

                <div class="input-group my-4">
                    <button class="btn btn-primary m-auto" id="update-button" style="width: -webkit-fill-available;">Update Record</button>
                </div>
        </div>  
    </div>



    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <script>

        $('#update-form-button').click(function(e){
            e.preventDefault;
            $('#single-record-form').addClass('d-none');
            $('#update-form').removeClass('d-none');
        });

        $('#update-button').click(function() {

 
            let data = {
             'id':$('#transaction_id').val(),
             'item_qty': $('#item_qty').val(),
             'item_price': $('#item_price').val(),
             'total':$('#item_price').val()* $('#item_qty').val()
            };

            $.ajax({
                type: "put",
                url: "/api/update-transaction",
                data: JSON.stringify(data),
                success:function(){
                    window.location.replace("http://htu-project.local/user-record");
                }
            });
            
        });$('#delete-button').click(function() {
 
            let data = {
             'id':$('#transaction_id').val(),
            };

            $.ajax({
                type: "delete",
                url: "/api/delete-transaction",
                data: JSON.stringify(data),
                success:function(){
                    window.location.replace("http://htu-project.local/user-record");
                }
            });
            
        });

    </script>
