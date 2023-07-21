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