<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>goTo('/login');</script>";
}
?>

<div class="dashboard">
    <div class="navbar">
        <div class="sidebar_toggle">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
            </svg>
        </div>
        <div class="brand">
            <img src="/static/img/geolife-logo.png" alt="">
        </div>
        <div class="search_box">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 search_icon"
                onclick="$('.navbar .search_box').toggleClass('active')">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
            <input type="search" name="search" id="search_box" placeholder="Search..." autocomplete="off">
        </div>
        <div class="profile">
            <div class="profile_label" onclick="$('.navbar .profile').toggleClass('active')">
                <span class="icon">
                    <?php echo substr($_SESSION['name'], 0, 1); ?>
                </span>
                <span class="name">
                    <?php echo $_SESSION['name']; ?>
                </span>
            </div>
            <div class="profile_popup">
                <div class="section_one">
                    <span class="icon">
                        <?php
                        $name_split = explode(' ', $_SESSION['name'], 2);
                        foreach ($name_split as $value) {
                            echo substr($value, 0, 1);
                        }
                        ?>
                    </span>
                    <span class="name single-line-text">
                        <?php echo $_SESSION['name']; ?>
                    </span>
                    <span class="email single-line-text">
                        <?php echo $_SESSION['email']; ?>
                    </span>
                </div>
                <div class="section_two">
                    <span class="label">Username</span>
                    <span class="username">
                        <?php echo $_SESSION['username']; ?>
                    </span>
                    <span class="btn_edit" onclick="goTo('profile', 'user');$('.navbar .profile').removeClass('active')">Edit</span>
                </div>
                <div class="section_three">
                    <span class="btn_signout" onclick="location.href = '/php/authSignout.php'">Sign out</span>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <div class="create_new">
            <button id="create_new_btn">Create new</button>
        </div>
        <div class="menu">
            <a href="overview" class="menuitem overview" data-link="user">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="icon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                </svg>
                <span class="title">Overview</span>
            </a>
            <a href="links" class="menuitem links" data-link="user">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="icon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                </svg>
                <span class="title">Links</span>
            </a>
            <a href="profile" class="menuitem profile" data-link="user">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="icon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="title">Profile</span>
            </a>
            <a href="settings" class="menuitem settings" data-link="user">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="icon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="title">Settings</span>
            </a>
        </div>
    </div>
    <div id="main" class="main">
    </div>

    <!-- Create New Dialog -->
    <form id="create_new_form" action="/createShortLink" method="post">
        <div id="create_new_dialog" class="dialog">
            <div class="dialog_box">
                <div class="dialog_header">
                    <div class="title">Create new</div>
                    <div class="close_btn" onclick="$('#cancel_bg').trigger('click')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>
                <div class="dialog_body">
                    <div class="input longurl">
                        <label for="form_longurl">Long URL</label>
                        <input type="url" name="long_url" id="form_longurl" required>
                    </div>
                    <div class="input title">
                        <label for="form_title">Title</label>
                        <input type="text" name="title" id="form_title" required>
                    </div>
                    <div class="input shorturl">
                        <label for="form_shorturl">Short URL code</label>
                        <span class="input_prefix">geolife.click</span>
                        <span class="divider">/</span>
                        <input type="text" name="short_url" id="form_shorturl" size="1" required>
                    </div>
                    <div class="linkactive">
                        <label for="form_linkactive">Link Active</label>
                        <input type="checkbox" name="link_active" id="form_linkactive" checked=true>
                    </div>
                </div>
                <div class="dialog_footer">
                    <button type="submit" id="form_submit">Create</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    router("user")
    $(".sidebar_toggle").click(() => {
        $(".sidebar").addClass("show")
        $("#cancel_bg").css("display", "block")
        $("#cancel_bg").click(() => {
            $(".sidebar").removeClass("show")
            $("#cancel_bg").css("display", "none")
            $("#cancel_bg").click(null)
        })
    })


    var openLinkDialog = () => {
        $("#create_new_form").trigger("reset")
        $("#cancel_bg").trigger("click")
        $("#create_new_dialog").addClass("show")
        $("#cancel_bg").css("display", "block")
        $("#cancel_bg").click(() => {
            $("#create_new_dialog").removeClass("show")
            $("#cancel_bg").css("display", "none")
            $("#cancel_bg").click(null)
        })
    }
    $("#create_new_btn").on("click", () => {
        openLinkDialog()
        if (!/Mobile/g.test(window.navigator.userAgent)) {
            $("#form_longurl").trigger("focus")
        }
        $("#create_new_form").attr("action", "/php/createLink.php")
        $(".dialog_box .dialog_header .title").text("Create new")
        $(".dialog_box .dialog_body #form_shorturl").attr("readonly", false)
        $(".dialog_box .dialog_body #form_shorturl").removeClass("readonly")
        $(".dialog_box .dialog_body .linkactive").css("display", "none")
        $(".dialog_box .dialog_body #form_linkactive").attr("checked", true)
        $(".dialog_box .dialog_footer #form_submit").text("Create")
    })


    $("#create_new_form").on("submit", (e) => {
        // e.preventDefault()
        $(".dialog_box .dialog_body #form_shorturl").attr("readonly", false)
        $(".dialog_box .dialog_body #form_shorturl").removeClass("readonly")
        $('#cancel_bg').trigger('click')
    })

    $(".dashboard .navbar .search_box input[type=search]").on("keyup", (e)=>{
        if (path[2] !='links') {
            if(e.key.toLowerCase() == 'enter'){
                goTo('/user/links', 'user')
            }
        } else {
            searchLinks()
        }
    })
</script>