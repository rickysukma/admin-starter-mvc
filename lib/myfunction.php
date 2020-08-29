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

function tabpanel($tab){
    $count = count($tab);    
    $html = "";
    $html .="<div class='nav-tabs-custom'>";
        $html .="<ul class='nav nav-tabs'>";
            $i = 0;
            foreach($tab as $key => $val){
                if($i == 0){
                    $html .= "<li class='active'><a href='#tab_".$key."' data-toggle='tab' aria-expanded='true'>".$val['header']."</a></li>";
                }else{
                    $html .="<li class=''><a href='#tab_".$key."' data-toggle='tab' aria-expanded='false'>".$val['header']."</a></li>";
                }
                $i++;
            }
        $html .="</ul>";
        $html .="<div class='tab-content'>";
        $i = 0;
        foreach($tab as $key => $val){
            $active = '';
            if($i == 0){
                $active = 'active';
            }
            $html .= "<div class='tab-pane $active' id='tab_$key'>";
            $html .= $val['html'];
            $html .= "</div>";
            $i++;
        }
        $html .="</div>";

    $html .="</div>";
    return $html;
}
