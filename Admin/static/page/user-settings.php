<div class="settings_container">
    <div class="title" tooltip="Sefmkd">Settings</div>
    <form action="/php/test.php" id="test_form" method="get">
        <button type="submit" onclick="btnLoad(this)">
            Check
        </button>
    </form>
</div>

<script>
    $("#test_form").on("submit", (e)=>{
        e.preventDefault()
    })
</script>