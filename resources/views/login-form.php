<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTU Point of Sale</title>
</head>

<?PHP

if(isset($_COOKIE['user_id']))
    {
        header('Location:/dashboard');
    }

?>

<style>

    body{
         background-image: url(https://images.unsplash.com/photo-1671524562716-cea202ba23f1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1932&q=80);
         background-size: cover;
    }

    #login-form{
        font-size: x-large;
        margin: auto;
        width: 40vw;
        padding: 2rem;
        border: 10px ridge rgba(28,110,164,0.83);
        border-radius: 25px;
        margin-top: 10rem;
        background-color: white;
        opacity: 0.8;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
    }

    #input{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        font-size: x-large;
    }

    #button{
        background-color: #3CBC8D;
        color: white;
        width: 40%;
        margin-left: 30%;
        margin-top: 2rem;
        height: 10vh;
        padding: 12px;
        font-size: x-large;
    }

    #alert{
        background-color: red;
        border-radius: 2px;
        text-align: center;
        margin-top: 2rem;
    }

    #button:hover {
        background: blue;
        transition: 1s;
        cursor:pointer;
    }

    #label{
        margin-top: 1rem;
        margin-right: 10px;
    }

    .flex-container {
        display: flex;
        flex-direction: column;
    }

    @media (min-width: 800px) {
        .flex-container {
        flex-direction: row;
    }}

</style>

<body>

    <form action="/authenticate" method="POST" id="login-form" >

        

        <div >
            <div class="flex-container">
                <label for="username"  id="label" >Username: </label>
                <input type="text" id="input" name="username" required>
            </div>
            <div class="flex-container">
                <label for="password" id="label">Password: </label>
                <input type="password" id="input" style="margin: 0 0 0 10px;" name="password" required>
            </div>
            <div class="flex-container" style="margin-top: 2rem;">
                <input type="checkbox"  id="remember-me" name="remember_me" style="width: 30px;">
                <label class="form-check-label" for="remember-me">Remember Me</label>
            </div>
        </div>
        <div style="width:100%;">
            <button id="button">login</button>
        </div>

        <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
            <div id="alert" role='alert'>
                <?= $_SESSION['error'] ?>
            </div>
        <?php
            $_SESSION['error'] = null;
        endif; ?>

    </form>
</body>
</html>