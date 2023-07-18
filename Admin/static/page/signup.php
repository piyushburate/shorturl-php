<?php
session_start();
if(isset($_SESSION['username'])){
    echo "<script>goTo('/user/overview');</script>";
}
?>
<div class="box">
    <div class="title">Signup Form</div>
    <form class="form" action="/php/authSignup.php" method="post" name="signup_form" autocomplete="on">
        <div class="input name">
            <label for="form_name">Name</label>
            <input type="text" name="name" id="form_name" required autocomplete="on">
        </div>
        <div class="input email">
            <label for="form_email">Email</label>
            <input type="email" name="email" id="form_email" required autocomplete="on">
        </div>
        <div class="input username">
            <label for="form_username">Username</label>
            <input type="text" name="username" id="form_username" minlength="3" maxlength="20" required
                autocomplete="on">
        </div>
        <div class="input password">
            <label for="form_password">Password</label>
            <input type="password" name="password" id="form_password" minlength="8" maxlength="15" required
                autocomplete="on">
        </div>
        <!-- <div class="input confirm_password">
            <label for="form_confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="form_confirm_password" minlength="8" maxlength="15"
                required autocomplete="on">
        </div> -->
        <div class="submit">
            <button type="submit" id="form_submit">Submit</button>
        </div>
    </form>
    <div class="extra">
        Already a user? <a href="/login" data-link>Login now</a>
    </div>
</div>
<script>
    $(".form").on("submit", e => {
        // e.preventDefault()
        btnLoad($("#form_submit"), true)
    })

</script>