<?php

function unique_id()
{
    return sprintf("%s%S", mt_rand(), time());
}

function validation($request)
{
    if (empty($request['qoute']) || empty($request['whose_qoute'])) {
        return false;
    }

    return true;
}


function seed($request)
{
    if ($_REQUEST['action'] !== 'seed') {
        return false;
    }

    $qoutes = all();

    $qoutes = $qoutes ? $qoutes : [];

    $newQoutes = include './seed.php';

    foreach ($newQoutes as $qoute) {
        $qoute["id"] = unique_id();
        array_push($qoutes, $qoute);
    }

    $fp = fopen("qoute.txt", "w");

    fwrite($fp, json_encode($qoutes));

    fclose($fp);
    header("Location: index.php");
}



function paginate()
{
    $total = count(all());
    $pages = ceil($total / 6);
    $paginate = '';
    for ($i = 1; $i < $pages; $i++) {
        $class = $i < 2 ? 'active' : '';
        $paginate .= "<li class=\"page-item $class\"><a class=\"page-link\" href=\"index.php?page={$i}\">{$i}</a></li>";
    }
    echo <<<EOT
<nav aria-label="Page navigation example" class="mt-4 border-top pt-4">
    <ul class="pagination justify-content-end">
        {$paginate}
    </ul>
</nav>
EOT;
}


function checkAuth($request){

    global $config;
    $username = $request['username'];
    if($username !== $config['username']){
        echo "<script>alert('Sorry you are not allowed to add qoute')</script>";
        return false;
    }
}
