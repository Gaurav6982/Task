<?php
    include('./includes/header.php');
    if(isset($_POST['register_submit'])){
//        echo print_r($_POST);
        $login->register();
    }
session_start();
if(isset($_SESSION["id"]))
    header("Location:home.php");
?>
<header>
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <div class="font-14">
            <a href="/Task/login.php" class="px-3 border-right borer-left text-dark">Login</a>
            <!-- <a href="#" class="px-3 border-right text-dark">Register</a> -->

            <?php if(isset($_SESSION["id"])) echo '<a href="logout.php" class="px-3 border-right text-dark">Logout</a>'?>


        </div>
    </div>
</header>

<main>
    <form action="index.php" method="post">
        <h2>Sign Up</h2>
        <p>
            <label for="Name" class="">Name</label>
            <input id="Name" name="name" type="text">
        </p>
        <p>
            <label for="DOB" class="">Date of Birth</label>
            <input id="DOB" name="dob" type="date" class="form-control">
        </p>
        <p>
            <label for="Course" class="">Course</label>
            <input id="Course" name="course" type="text">
        </p>
        <p>
            <label for="Email" class="">Email</label>
            <input id="Email" name="email" type="text">
        </p>
        <p>
            <label for="password" class="">Password</label>
            <input id="password" name="password" type="password">
        </p>
        <p>
            <input type="submit" name="register_submit" value="Create My Account" id="submit">
        </p>
    </form>
</main>
<?php
include('./includes/footer.php')
?>
