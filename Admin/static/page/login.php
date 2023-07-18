<?php
session_start();
if(isset($_SESSION['username'])){
    echo "<script>goTo('/user/overview');</script>";
}
?>

<div class="box">
    <div class="title">Login Form</div>
    <form class="form" action="/php/authLogin.php" method="post" name="login_form" autocomplete="on">
        <div class="input username">
            <label for="form_username">Username</label>
            <input type="text" name="username" id="form_username" minlength="3" maxlength="20" required
                autocomplete="on">
        </div>
        <div class="input password">
            <label for="form_password">Password</label>
            <input type="password" name="password" id="form_password" minlength="8" maxlength="15" required
                autocomplete="on">
            <a href="#">Forgot password?</a>
        </div>
        <div class="submit">
            <button type="submit" name="submit" id="form_submit">Submit</button>
        </div>
    </form>
    <div class="extra">
        Not a user? <a href="/signup" data-link>Signup now</a>
    </div>
</div>
<script>
    console.log();
    $(".form").on("submit", async (e) => {
        // e.preventDefault()
        btnLoad($("#form_submit"), true)
    })

</script>