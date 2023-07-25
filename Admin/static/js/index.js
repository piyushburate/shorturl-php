let btnLoad = (btn, bool) => {
    $(btn).attr("disabled", bool)
    $(btn).toggleClass("loading-btn", bool)
}

var copyText = (txt) => {
    var copy = $('<input>').val(txt)
    $("body").append(copy)
    copy.select()
    document.execCommand("copy")
    document.activeElement.blur()
    copy.remove()
}

let setCookie = (cname, cvalue, exdays) => {
    const d = new Date()
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000))
    let expires = "expires=" + d.toUTCString()
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/"
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(cname) {
    if (getCookie(cname) != "") {
        return true
    }
    return false
}