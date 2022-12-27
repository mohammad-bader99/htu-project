<?PHP
use Core\Helpers\Helper;

if(empty($_SESSION) || !isset($_SESSION['user']))
{
    $_SESSION['error'] = "you are trying to access the code directly";
    Helper::redirect('/login');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTU Point of Sale</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['HTTP_HOST'] ?>/resources/css/styles.css">
</head>

<style>
    #effect:hover {
        background: blue;
        transition: 1s;
        cursor:pointer;
    }
</style>

<body style="font-family: cursive;" style="min-height: 100vh;display: flex;flex-direction: column;">

    <nav class="navbar navbar-expand-lg bg-primary ">
  <div class="container-fluid">
    <a class="navbar-brand text-white"  href="/dashboard" id="effect">HTU POS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav gap-4">
        <li class="nav-item">
          <a class="nav-link active text-white border-end" aria-current="page" href="/dashboard" id="effect"><i class="fa-sharp fa-solid fa-house"></i> Home</a>
        </li>

        <?PHP if ($_SESSION['user']['permission']=="admin") :?>
            <li class="nav-item">
                <a class="nav-link active text-white border-end" aria-current="page" href="/info-dashboard" id="effect"><i class="fa-solid fa-square-poll-vertical"></i> Info Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white border-end" aria-current="page" href="/users-management" id="effect"><i class="fa-solid fa-users"></i> Users management</a>
            </li>
        <?php endif;?>

        <?PHP if ($_SESSION['user']['permission']=="admin" || $_SESSION['user']['permission']=="seller") :?>
            <li class="nav-item">
                <a class="nav-link active text-white border-end" aria-current="page" href="/selling-dashboard" id="effect"><i class="fa-sharp fa-solid fa-cart-shopping"></i> Selling Dashboard</a>
            </li>
        <?php endif;?>

        <?PHP if ($_SESSION['user']['permission']=="admin" || $_SESSION['user']['permission']=="procurement") :?>
            <li class="nav-item">
                <a class="nav-link active text-white border-end" aria-current="page" href="/stock-dashboard" id="effect"><i class="fa-solid fa-house-laptop"></i> Stock Management</a>
            </li>
        <?php endif;?>

        <?PHP if ($_SESSION['user']['permission']=="admin" || $_SESSION['user']['permission']=="accountant") :?>
            <li class="nav-item">
                <a class="nav-link active text-white border-end" aria-current="page" href="/records-dashboard" id="effect"><i class="fa-solid fa-list-check"></i> Transaction Management</a>
            </li>
        <?php endif;?>

            <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="/profile" id="effect"><i class="fa-solid fa-user"></i> Profile</a>
            </li>

        
        
        <li class="nav-item">
            <a type="button" class="btn btn-danger position-absolute end-0 me-5" href="/logout" id="effect">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    