<div class="settings_container">
    <div class="title">Settings</div>
    <div class="settings_view">
        <div class="item">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
            </svg>
            <span class="title">Show Most <b>Clicked</b> Links Table</span>
            <span class="input">
                <input type="checkbox" id="show_most_clicked_links" class="toggle-btn" <?php if($_COOKIE['show_most_clicked_links'] == 'true'){ echo 'checked';} ?>>
            </span>
        </div>
        <div class="item">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
            </svg>
            <span class="title">Show Most <b>Scanned</b> Links Table</span>
            <span class="input">
                <input type="checkbox" id="show_most_scanned_links" class="toggle-btn" <?php if($_COOKIE['show_most_scanned_links'] == 'true'){ echo 'checked';} ?>>
            </span>
        </div>
        <div class="item">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="title">Last created links count</span>
            <span>3 &lt;</span>
            <span class="input">
                <input type="number" id="last_created_link_count" value="<?php echo $_COOKIE['last_created_link_count']; ?>" required>
            </span>
            <span>&lt; 10</span>
        </div>
        <div class="item">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z" />
            </svg>
            <span class="title">Auto QR generate after Link Creation</span>
            <span class="input">
                <input type="checkbox" id="auto_qr_generate" class="toggle-btn" <?php if($_COOKIE['auto_qr_generate'] == 'true'){ echo 'checked';} ?>>
            </span>
        </div>
    </div>
</div>

<script>
    $("#show_most_clicked_links").on("change", (e) => {
        setCookie("show_most_clicked_links", e.target.checked, 365)
    })
    $("#show_most_scanned_links").on("change", (e) => {
        setCookie("show_most_scanned_links", e.target.checked, 365)
    })
    $("#last_created_link_count").on("keyup", (e) => {
        var data = e.target.value
        if(data > 9){
            data = 9
        }
        if(data < 4){
            data = 4
        }
        setCookie("last_created_link_count", data, 365)
    })
    $("#auto_qr_generate").on("change", (e) => {
        setCookie("auto_qr_generate", e.target.checked, 365)
    })
</script>