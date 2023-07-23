<?php
session_start();
include("../../php/connection.php");
$uid = $_SESSION['uid'];
$query = "SELECT COUNT(id) AS 'total', SUM(link_active) AS 'active_links', SUM(qr_code) AS 'qr_enabled' FROM links WHERE uid = $uid";
$data = $conn->query($query);
$row = $data->fetch_assoc();
$total = $row['total'];
$active = $row['active_links'];
if (empty($active)) {
    $active = 0;
}
$deactived = $total - $active;
$qr_enabled = $row['qr_enabled'];
if (empty($qr_enabled)) {
    $qr_enabled = 0;
}
?>
<div class="overview_container">
    <div class="links_overview">
        <div class="title">Links Overview</div>
        <div class="item links_total">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
            </svg>
            <span class="label">Total Links</span>
            <span class="count">
                <?php echo $total; ?>
            </span>
        </div>
        <div class="item links_active">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="label">Active Links</span>
            <span class="count">
                <?php echo $active; ?>
            </span>
        </div>
        <div class="item links_deactivated">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
            </svg>
            <span class="label">Deactivated Links</span>
            <span class="count">
                <?php echo $deactived; ?>
            </span>
        </div>
        <div class="item links_qrenabled">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z" />
            </svg>
            <span class="label">QR Enabled Links</span>
            <span class="count">
                <?php echo $qr_enabled; ?>
            </span>
        </div>
    </div>
    <div class="last_created_links">
        <div class="title">Last Created Links</div>
        <div class="links_container">
            <div class="link_list">
                <div class="link_list_container">
                    <?php
                    $query2 = "SELECT code, link, DATE_FORMAT(datetime, '%b %e, %Y') AS 'date', clicks, link_active FROM links WHERE uid = $uid ORDER BY datetime DESC LIMIT 5";
                    $data2 = $conn->query($query2);

                    if ($data2->num_rows > 0) {
                        while ($row = $data2->fetch_assoc()) {
                            $onclick_param = "'links?code=" . $row['code'] . "', 'user'";
                            echo '
                            <div class="link" onclick="goTo(' . $onclick_param . ')">
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
                    }
                    ?>
                </div>
            </div>
        </div>
        <a href="links" class="view_all_links" data-link="user">View All Links</a>
    </div>
    <div class="links_performance_overview">
        <div class="title">Links Performance Overview</div>
        <div class="most_clicks_links">
            <table class="table">
                <thead>
                    <tr>
                        <th>Short Link</th>
                        <th>Clicks</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                <tbody>
                    <tr>
                        <td>pract28</td>
                        <td>20</td>
                        <td>Active</td>
                        <td><button class="view">View</button></td>
                    </tr>
                    <tr>
                        <td>pract28</td>
                        <td>20</td>
                        <td>Active</td>
                        <td><button class="view">View</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
</script>