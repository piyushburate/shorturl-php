<div class="profile_container">
    <form action="/updateAuth" method="post">
        <div class="profile_view">
            <div class="title">Profile View</div>
            <div class="input">
                <label for="profile_name">Name</label>
                <input type="text" name="name" id="profile_name" readonly>
            </div>
            <div class="input">
                <label for="profile_email">Email</label>
                <input type="email" name="email" id="profile_email" readonly>
            </div>
            <div class="input">
                <label for="profile_username">Username</label>
                <input type="text" name="username" id="profile_username" readonly>
            </div>
            <div class="input">
                <label for="profile_password">Password</label>
                <input type="password" name="password" id="profile_password" readonly>
            </div>
            <!-- <div class="input">
                <label for="profile_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="profile_confirm_password">
            </div> -->
            <div class="submit">
                <button type="button" name="edit" id="profile_edit" onclick="btnLoad(this, true)">Edit</button>
                <button type="submit" name="submit" id="profile_submit">Save</button>
            </div>
        </div>
    </form>
</div>

<script>
    
</script>