<form action="/php/test.php" id="test_form" method="get">
    <button type="submit" onclick="btnLoad(this)">
        Check
    </button>
</form>

<script>
    $("#test_form").on("submit", (e)=>{
        e.preventDefault()
    })
</script>