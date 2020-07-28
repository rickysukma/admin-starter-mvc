<?php

function getMenu($page){
$menu = DB::query("SELECT * FROM menu WHERE source = '$page'");
echo "<section class=\"content-header\">
    <h1>
        Menu
        <small>Manager</small>
    </h1>
    <ol class=\"breadcrumb\">
        <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Dashboard</a></li>
        <li class=\"active\">User</li>
    </ol>
</section>";
}