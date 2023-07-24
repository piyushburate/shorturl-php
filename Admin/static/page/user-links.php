<div class="links_container">
    <div class="title">Links</div>
    <div class="link_list">
        <div class="title">Overview</div>
        <div class="link_list_container">
            <?php
            session_start();
            include("../../php/connection.php");
            $uid = $_SESSION['uid'];
            $query = "SELECT id, title, code, link, DATE_FORMAT(datetime, '%b %e, %Y') AS 'date', DATE_FORMAT(datetime, '%l:%i %p') AS 'time', clicks, qr_code, qr_scans, link_active FROM links WHERE uid = $uid ORDER BY datetime DESC";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="link" data-id="' . $row['id'] . '" data-code="' . $row['code'] . '" data-url="' . $row['link'] . '" data-title="' . $row['title'] . '" data-datetime="' . $row['date'] . ' at ' . $row['time'] . '" data-clicks="' . $row['clicks'] . '" data-link-active="' . $row['link_active'] . '" data-qr-code="' . $row['qr_code'] . '" data-qr-scans="' . $row['qr_scans'] . '" onclick="linkClick(this)">
                        <span class="link_active active' . $row['link_active'] . '"></span>
                        <span class="date_created">' . $row['date'] . '</span>
                        <span class="long_url">' . $row['link'] . '</span>
                        <span class="short_url">geolife.click/' . $row['code'] . '</span>
                        <div class="clicks">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 19.5v-.75a7.5 7.5 0 00-7.5-7.5H4.5m0-6.75h.75c7.87 0 14.25 6.38 14.25 14.25v.75M6 18.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                            <span>' . ($row['clicks'] + $row['qr_scans']) . '</span>
                            </div>
                        </div>
                    ';
                }
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
            <div class="qr_scans">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z" />
                </svg>
                <span>12 scans</span>
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
                <div class="qr_code"></div>
                <div class="qr_actions">
                    <button class="activate">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" />
                        </svg>
                        <span>Deactivate</span>
                    </button>
                    <button class="download">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        <span>Download</span>
                    </button>
                    <button class="generate">
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

    $(".link_info .qr_section .qr_actions button.download").on("click", () => {
        var a = document.createElement("a")
        a.href = document.querySelector(".link_info .qr_section .qr_code canvas").toDataURL("image/jpg")
        a.download = "QR Code.png"
        a.click()
        a = null
    })
    $(".link_info .short_url .copy").on("click", () => {
        copyText($(".link_info .short_url span").text())
        $(".link_info .short_url .copy").text("Copied!")
        setTimeout(() => {
            $(".link_info .short_url .copy").text("Copy")
        }, 5000);
    })

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
        var qr_scans = $(link).attr("data-qr-scans")
        var title = $(link).attr("data-title")
        var datetime = $(link).attr("data-datetime")
        $(".link_details .title span").html(title)
        $(".link_details .datetime_created span").html(datetime)
        $(".link_info .link_details .clicks span").html((parseInt(clicks) + parseInt(qr_scans)) + " Engagements")
        $(".link_info .link_data .clicks span").html(clicks + " clicks")
        $(".link_info .link_data .qr_scans span").html(qr_scans + " scans")
        $(".link_info .short_url span").text("geolife.click/" + code)
        $(".link_info .long_url a").html(long_url)
        $(".link_info .long_url a").attr("href", long_url)
        $(".link_info .qr_section .generate").on("click", () => {
            $(".link_info .qr_section .generate").addClass("loading-btn")
            location.href = "/php/setQRCode.php?set=2&code=" + code
        })
        if (qr_code > 0) {
            $(".link_info .qr_section").addClass("active")
            $(".link_info .qr_section .qr_code").html("")
            var qr_code_options = {
                text: "https://geolife.click/" + code + "/qr",
                title: "geolife.click/" + code,
                titleFont: "normal normal bold 18px Arial",
                titleHeight: 40,
                titleTop: 15,
                quietZone: 20,
                logo: "/static/img/geolife-logo-circle-coloured.png",
                logoBackgroundTransparent: true
            }
            new QRCode(document.querySelector(".link_info .qr_section .qr_code"), qr_code_options);
            var qr_activate_set = 0
            if (qr_code == 1) {
                qr_activate_set = 2
                $(".link_info .qr_section .qr_code canvas").css("filter", "blur(2px)")
                $(".link_info .qr_section .qr_code canvas").css("-webkit-filter", "blur(2px)")
                $(".link_info .qr_section .activate span").text("Activate")
            } else {
                qr_activate_set = 1
                $(".link_info .qr_section .activate span").text("Deactivate")
            }
            $(".link_info .qr_section .activate").on("click", () => {
                $(".link_info .qr_section .activate").addClass("loading-btn")
                location.href = "/php/setQRCode.php?set=" + qr_activate_set + "&code=" + code
            })
        } else {
            $(".link_info .qr_section").removeClass("active")
            $(".link_info .qr_section .qr_code").html("")
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
            $(".link[data-code=" + code + "]").trigger("click")
        } else {
            if (window.matchMedia("(min-width: 551px)").matches && $(".link").first().length != 0) {
                $(".link").first()[0].click()
            }
        }
    }
    setLinkClick()
</script>

<script>
    // Link Edit Button
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

<script>
    // Link Search
    var search_input = $(".dashboard .navbar .search_box input[type=search]")

    var searchLinks = () => {
        var search_value = search_input.val()
        var links = $(".link_list .link")
        for (let i = 0; i < links.length; i++) {
            var openingTag = '<span class="text-highlight">'
            var closingTag = '</span>'
            var short_url = $(links.get(i)).children(".short_url")
            var long_url = $(links.get(i)).children(".long_url")
            short_url.html(short_url.text())
            long_url.html(long_url.text())
            var short_url_index = short_url.text().toUpperCase().indexOf(search_value.toUpperCase())
            var long_url_index = long_url.text().toUpperCase().indexOf(search_value.toUpperCase())
            $(links.get(i)).hide()
            if (short_url_index > -1) {
                $(links.get(i)).show()
                var newHTML = short_url.text().split('')
                newHTML.splice(short_url_index + search_value.length, 0, closingTag)
                newHTML.splice(short_url_index, 0, openingTag)
                var newHTML = newHTML.join('')
                short_url.html(newHTML)
            }
            if (long_url_index > -1) {
                $(links.get(i)).show()
                var newHTML = long_url.text().split('')
                newHTML.splice(long_url_index + search_value.length, 0, closingTag)
                newHTML.splice(long_url_index, 0, openingTag)
                var newHTML = newHTML.join('')
                long_url.html(newHTML)
            }
        }
    }

    if (document.activeElement == document.querySelector('.dashboard .navbar .search_box input[type=search]')) {
        searchLinks()
    }
</script>