let path = null

function goTo(link, page) {
    window.history.pushState(null, null, link)
    router(page)
}

let router = async (page) => {
    path = (window.location.pathname).split("/")
    switch (path[1]) {
        case "user":
            if(path.length != 3){
                console.log("redirect");
                goTo("/login")
            } else {
                switch (path[2]) {
                    case "overview":
                        $(".main").load("/static/page/user-overview.php")
                        break;
                    case "links":
                        $(".main").load("/static/page/user-links.php")
                        break;
                    case "profile":
                        $(".main").load("/static/page/user-profile.php")
                        break;
                    case "settings":
                        $(".main").load("/static/page/user-settings.php")
                        break;
                    default:
                        goTo("/login")
                        break;
                }
                if (page == "user") {
                    $(".menu").children().removeClass("active")
                    $(".menuitem." + path[2]).addClass("active")
                    $("#cancel_bg").trigger("click")
                    document.title = "User " + path[2]
                } else {
                    $("#app").load("/static/page/user.php")
                }
            }
            break;
        case "login":
            $("#app").load("static/page/login.php")
            document.title = "Login"
            break;
        case "signup":
            $("#app").load("/static/page/signup.php")
            document.title = "Signup"
            break;
        case "":
            goTo("/login")
            break;
        case "error":
            $("#app").load("/static/page/error.html")
            console.log("error page");
            break;
        default:
            goTo("/error")
            break;
    }
}

window.onpopstate = router

document.addEventListener("DOMContentLoaded", () => {
    $("body").on("click", e => {
        if (e.target.matches("[data-link]")) {
            e.preventDefault()
            goTo(e.target.href, e.target.getAttribute("data-link"))
        }
    })

    router()
})