<?php
include('./includes/header.php');

 if(isset($_POST['login_submit'])){
//        echo print_r($_POST);
     $login->login();
 }
session_start();
 if(isset($_SESSION["id"]))
     header("Location:home.php");
?>

    <header>
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
            <div class="font-14">
                <a href="/Task/index.php" class="px-3 border-right borer-left text-dark">Register</a>
                <!-- <a href="#" class="px-3 border-right text-dark">Register</a> -->
                <?php if(isset($_SESSION["id"])) echo '<a href="logout.php" class="px-3 border-right text-dark">Logout</a>'?>

            </div>
        </div>
    </header>

    <main>
        <form action="login.php" id="login-form" method="post">
            <h2 class="text-black">Sign In</h2>
            <p class="text-danger font-14 text-center" id="error"><?php if(isset($_SESSION["error"])) echo $_SESSION["error"];unset($_SESSION['error']);?></p>
            <p>
                <label for="Email" class="">Email</label>
                <input id="Email" name="email" type="text">
            </p>
            <p>
                <label for="password" class="">Password</label>
                <input id="password" name="password" type="password">
            </p>
            <p>
                <input type="submit" name="login_submit" value="Sign In" id="login_submit">
            </p>
        </form>
    </main>
<?php
include('./includes/footer.php')
?>