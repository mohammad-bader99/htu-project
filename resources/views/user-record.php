<?PHP

if($_SESSION['user']['permission']=="admin"){}
elseif($_SESSION['user']['permission']=="seller"){}
else{
   header('Location: 404.php'); 
}

?>


<div class="input-group w-100 my-5">
            <button id="get-record" class="btn btn-secondary position-absolute top-0 end-0" style="margin-right: 200px;"><i class="fa-solid fa-database"></i> Transaction Record</button>
</div>
<div class="container mb-5 ml-5" style="margin-top: 100px;">
    <table class="table border-success my-3">
    <thead>
        <tr> 
        <th scope="col">id</th>
        <th scope="col">item id</th>
        <th scope="col">item qty</th>
        <th scope="col">item price</th>
        <th scope="col">totla</th>
        </tr>
    </thead>
    <tbody id="table-row">
    </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script>
    
    $('#get-record').click(function() {
        $.ajax({
            type: "get",
            url: "/api/get-transaction",
            success: function(response) {
                response.body.forEach(record => { 
                    if(record['0']==''){return;}
                    $('#table-row').append(`
                    <tr class="my-3">
                        <th scope="row">${record['0']['id']}</th>
                        <td>${record['0']['item_id']}</td>
                        <td>${record['0']['item_qty']}</td>
                        <td>${record['0']['item_price']}</td> 
                        <td>${record['0']['total']}</td> 
                        <td><a href="/get-single-transaction?id=${record['0']['id']}" class="btn btn-warning" style="width:5rem;"><i class="fa-solid fa-eye"></i></a></td>
                        <td></td>
                    </tr>

                    `);
            });
            }
        });
    });



</script>