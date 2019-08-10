<?php
require './auth.php';

function insert($request){

    if(!validation($request)){
        return false;
    }
    store($request);
}

function store($request){

    $newQoute = [
        "id" => unique_id(),
        "qoute" => $request['qoute'],
        "whose_qoute" => $request['whose_qoute']
    ];

    $qoutes = all();

    $qoutes = $qoutes ? $qoutes : [];

     array_unshift($qoutes, $newQoute);

    $fp = fopen("qoute.txt", "w");

    fwrite($fp,json_encode($qoutes));

    fclose($fp);
    header("Location: index.php");
}

function unique_id()
{
    return sprintf("%s%S",mt_rand(),time());
}

function validation($request){
    if(empty($request['qoute']) || empty($request['whose_qoute'])){
        return false;
    }

    return true;
}

function index($page)
{
    $qoutes =  all();
    $page = isset($page) ? $page : 1;
    $limit = 6;
    $offset = ($page - 1) * $limit;
    $qoutes = array_splice($qoutes, $offset, $limit);
   return $qoutes;
}
function all(){
    $fp = fopen("qoute.txt", "r");
    $data = fgets($fp);
    fclose($fp);
    $data = json_decode($data, ture);
    return $data;
}

function seed($request){
    if($_REQUEST['action'] !== 'seed'){
        return false;
    }

    $qoutes = all();

    $qoutes = $qoutes ? $qoutes : [];

    $newQoutes = include './seed.php';

    foreach ($newQoutes as $qoute){
        $qoute["id"] = unique_id();
        array_push($qoutes, $qoute);
    }

    $fp = fopen("qoute.txt", "w");

    fwrite($fp,json_encode($qoutes));

    fclose($fp);
    header("Location: index.php");
}

function deleteById($request){

    if($request['action'] !== "delete" && isset($request['id'])){
        return false;
    }

    $id = $request['id'];

    $qoutes = all();
    foreach ($qoutes as $key => $qoute){
        if($request['id'] == $qoute['id']){
            unset($qoutes[$key]);
            break;
        }
    }

    $fp = fopen("qoute.txt", "w");

    fwrite($fp,json_encode($qoutes));

    fclose($fp);

}

deleteById($_REQUEST);
seed($_REQUEST);


function paginate()
{
    $total = count(all());
    $pages = ceil($total/6);
    $paginate = '';
    for ($i=1; $i < $pages; $i++){
        $paginate .= "<li class=\"page-item\"><a class=\"page-link\" href=\"index.php?page={$i}\">{$i}</a></li>";
    }
    echo <<<EOT
    <nav aria-label="Page navigation example">
        <ul class="pagination">
        {$paginate}
        </ul>
    </nav>
EOT;
}
