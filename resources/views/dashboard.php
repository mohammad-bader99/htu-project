<style>
    @media (max-width: 1000px) {
    #media {
        display: none;
    }}
</style>

<div class="text-center align-middle d-flex flex-column" style="font-family: Lucida Console, Courier, monospace;">
    <div class="text-center">
        <img src="https://images.unsplash.com/photo-1556740714-a8395b3bf30f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="HTU image" style="width:100%;height:40rem;">
        <h1 class="border-bottom border-3 w-50 text-white" id="media" style="position: absolute;top: 12rem;left:25rem"><i class="fa-sharp fa-solid fa-house"></i> HTU Point of Sale</h1>
    </div>
    <div class="my-2">
            <h1 class="my-5">Welcome Back: <?=htmlspecialchars($_SESSION['user']['display_name'])?></h1>
            <div class="card mb-3 m-auto" style="width: 540px;height: 200px;border: 11px groove #115DFF;border-radius: 25px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="resources/views/photos/<?=$_SESSION['user']['user_image'];?>" style="width:150px;height:180px;" class="img-fluid rounded-start p-1" alt="user photo">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body mt-5">
                            <h5 class="card-title">Name: <?=htmlspecialchars($_SESSION['user']['display_name'])?></h5>
                            <h5 class="card-title">Role: <?=$_SESSION['user']['permission']?></h5>    
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
