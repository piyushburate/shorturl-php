<div class="links_container">
    <div class="title">Links</div>
    <div class="link_list">
        <div class="title">Overview</div>
        <div class="link_list_container">
            <?php
            session_start();
            include("../../php/connection.php");
            $uid = $_SESSION['uid'];
            $query = "SELECT id, title, code, link, DATE_FORMAT(datetime, '%b %e, %Y') AS 'date', DATE_FORMAT(datetime, '%l:%i %p') AS 'time', clicks, qr_code, link_active FROM links WHERE uid = $uid ORDER BY datetime DESC";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="link" data-id="' . $row['id'] . '" data-code="' . $row['code'] . '" data-url="' . $row['link'] . '" data-title="' . $row['title'] . '" data-datetime="' . $row['date'] . ' at ' . $row['time'] . '" data-clicks="' . $row['clicks'] . '" data-link-active="' . $row['link_active'] . '" data-qr-code="' . $row['qr_code'] . '" onclick="linkClick(this)">
                        <span class="link_active active' . $row['link_active'] . '"></span>
                        <span class="date_created">' . $row['date'] . '</span>
                        <span class="long_url">' . $row['link'] . '</span>
                        <span class="short_url">geolife.click/' . $row['code'] . '</span>
                        <div class="clicks">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 19.5v-.75a7.5 7.5 0 00-7.5-7.5H4.5m0-6.75h.75c7.87 0 14.25 6.38 14.25 14.25v.75M6 18.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                            <span>' . $row['clicks'] . '</span>
                            </div>
                        </div>
                    ';
                }
            } else {
                echo '<div class="link_list_placeholder">No Links Found</div>';
            }
            ?>
        </div>

    </div>
    <div class="link_info">
        <div class="link_header">
            <span class="title">Link Overview</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
        <div class="link_details">
            <div class="title">
                <span>Study Drive Folder</span>
                <button id="edit_link_btn" class="edit">Edit</button>
            </div>
            <div class="datetime_created">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>
                <span>August 23, 2022 7:33 PM GMT+5:30</span>
            </div>
            <div class="clicks">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12.75 19.5v-.75a7.5 7.5 0 00-7.5-7.5H4.5m0-6.75h.75c7.87 0 14.25 6.38 14.25 14.25v.75M6 18.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
                <span> Engagements</span>
            </div>
        </div>
        <div class="link_data">
            <div class="short_url">
                <span></span>
                <button class="copy">Copy</button>
            </div>
            <div class="clicks">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                </svg>
                <span> clicks</span>
            </div>
            <div class="long_url">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                </svg>
                <a href="#" target="_blank">link</a>
            </div>
            <div class="qr_section">
                <div class="title">QR Code</div>
                <div class="qr_code">
                    <img src="" alt="QR Code">
                </div>
                <div class="qr_actions">
                    <button class="share">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                        </svg>
                        <span>Share</span>
                    </button>
                    <button class="download">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        <span>Download</span>
                    </button>
                    <button class="activation">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z" />
                        </svg>
                        <span>Create QR Code</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var linkClick = async (link) => {
        await $(".link").each((i, l) => {
            $(l).removeClass("active")
        })
        $(link).addClass("active")
        $(".link_info").addClass("active")
        $(".link_info .link_header svg").on("click", () => {
            $(link).removeClass("active")
            $(".link_info").removeClass("active")
            $(".link_info .link_header svg").on("click", null)
            var url = window.location.origin + window.location.pathname
            window.history.replaceState(null, null, url)
        })
        var code = $(link).attr("data-code")
        var long_url = $(link).attr("data-url")
        var clicks = $(link).attr("data-clicks")
        var qr_code = $(link).attr("data-qr-code")
        var title = $(link).attr("data-title")
        var datetime = $(link).attr("data-datetime")
        $(".link_details .title span").html(title)
        $(".link_details .datetime_created span").html(datetime)
        $(".link_info .link_details .clicks span").html(clicks + " Engagements")
        $(".link_info .link_data .clicks span").html(clicks + " clicks")
        $(".link_info .short_url span").text("geolife.click/" + code)
        $(".link_info .long_url a").html(long_url)
        $(".link_info .long_url a").attr("href", long_url)
        $(".link_info .qr_section .activation").on("click", () => {
            location.href = "/php/createQRCode.php?code=" + code
        })
        $(".link_info .short_url .copy").on("click", () => {
            copyText($(".link_info .short_url span").text())
            $(".link_info .short_url .copy").text("Copied!")
            setTimeout(() => {
                $(".link_info .short_url .copy").text("Copy")
            }, 5000);
        })
        $(".link_info .qr_section .qr_actions button.download").on("click", () => {
            var a = document.createElement("a")
            a.href = $(".link_info .qr_section .qr_code img").attr("src")
            a.download = "QR Code.png"
            a.click()
            a = null
        })
        if (qr_code == 1) {
            $(".link_info .qr_section").addClass("active")
            $(".link_info .qr_section .qr_code img").attr("src", "/static/img/qrcodes/" + code + ".png")
        } else {
            $(".link_info .qr_section").removeClass("active")
            $(".link_info .qr_section .qr_code img").attr("src", "")
        }
        var url = window.location.origin + window.location.pathname + "?code=" + code
        window.history.replaceState(null, null, url)
    }
    var setLinkClick = () => {
        $(".link").each((i, l) => {
            $(l).on("click", () => {
                linkClick(l)
            })
        })
        var code = window.location.search.replace("?code=", "")
        if (code != '' && $("[data-code=" + code + "]")) {
            $("[data-code=" + code + "]").trigger("click")
        } else {
            if (window.matchMedia("(min-width: 551px)").matches && $(".link").first().length != 0) {
                $(".link").first()[0].click()
            }
        }
    }
    setLinkClick()
</script>

<script>
    $("#edit_link_btn").on("click", async () => {
        openLinkDialog()
        $("#create_new_form").attr("action", "/php/updateLink.php")
        $(".dialog_box .dialog_header .title").text("Edit link")
        $(".dialog_box .dialog_body #form_shorturl").attr("readonly", true)
        $(".dialog_box .dialog_body #form_shorturl").addClass("readonly")
        $(".dialog_box .dialog_body .linkactive").css("display", "flex")
        $(".dialog_box .dialog_footer #form_submit").text("Save")
        var code = window.location.search.replace("?code=", "")
        var link = $("[data-code=" + code + "]")
        let id = $(".link.active").attr("data-id")
        var code = $(link).attr("data-code")
        var long_url = $(link).attr("data-url")
        var clicks = $(link).attr("data-clicks")
        var title = $(link).attr("data-title")
        var datetime = $(link).attr("data-datetime")
        var link_active = $(link).attr("data-link-active")
        $(".dialog_box .dialog_body #form_longurl").val(long_url)
        $(".dialog_box .dialog_body #form_title").val(title)
        $(".dialog_box .dialog_body #form_shorturl").val(code)
        $(".dialog_box .dialog_body #form_linkactive").attr("checked", link_active == 1)
    })

</script>