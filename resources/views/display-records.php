<div class="text-center" style="margin :5rem;">
        <h1 class="border-bottom border-3 m-auto w-50"><i class="fa-solid fa-list-check"></i> Transaction Management</h1>
</div>
<div class="container my-5 ml-5">

    <table class="table border-success my-3">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">item id</th>
        <th scope="col">item qty</th>
        <th scope="col">item price</th>
        <th scope="col">total</th>
        </tr>
    </thead>
    <tbody>

    <?PHP foreach ($data as $record) :?>
        <tr class="my-3">
        <th scope="row"><?=$record->id;?></th>
        <td><?=$record->item_id;?></td>
        <td><?=$record->item_qty;?></td>
        <td><?=$record->item_price;?></td> 
        <td><?=$record->total;?></td> 
        <td><a href="/update-record-form?id=<?=$record->id;?>" class="btn btn-secondary" style="width:5rem;"><i class="fa-regular fa-pen-to-square"></i></a></td>
        <td><a href="/delete-record?id=<?=$record->id;?>" class="btn btn-danger" style="width:5rem;"><i class="fa-solid fa-trash"></i></a></td>
        <td></td>
        </tr>
    <?PHP endforeach?> 

    </tbody>
    </table>
</div>