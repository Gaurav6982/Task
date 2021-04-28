<?php
include('./includes/header.php');
session_start();
if(!isset($_SESSION["id"]))
    header("Location:login.php");
?>
<header>
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <div class="font-14">
            <a href="/Task/login.php" class="px-3 border-right borer-left text-dark">Login</a>
            <!-- <a href="#" class="px-3 border-right text-dark">Register</a> -->
            <a href="logout.php" class="px-3 border-right text-dark">Logout</a>
        </div>
    </div>
</header>

<main>
    <h4 class="text-center text-white">Welcome <?php echo $_SESSION['name']?></h4>
</main>
<?php
include('./includes/footer.php')
?>
