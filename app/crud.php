<?php

function index($page)
{  global $config;
    $qoutes = all();
    $page = isset($page) ? $page : 1;
    $limit = $config['per_page'];
    $offset = ($page - 1) * $limit;
    $qoutes = array_splice($qoutes, $offset, $limit);
    return $qoutes;
}


function insert($request)
{
    if(!checkAuth($request)){
        return false;
    }

    if (!validation($request)) {
        return false;
    }
    store($request);
}

function store($request)
{
    $newQoute = [
        "id" => unique_id(),
        "qoute" => $request['qoute'],
        "whose_qoute" => $request['whose_qoute']
    ];

    $qoutes = all();

    $qoutes = $qoutes ? $qoutes : [];

    array_unshift($qoutes, $newQoute);

    $fp = fopen("app/db/qoute.txt", "w");

    fwrite($fp, json_encode($qoutes));

    fclose($fp);
    header("Location: index.php");
}


function all()
{
    $fp = fopen("app/db/qoute.txt", "r");
    $data = fgets($fp);
    fclose($fp);
    $data = json_decode($data, ture);
    return $data;
}


function deleteById($request)
{

    if ($request['action'] !== "delete" && isset($request['id'])) {
        return false;
    }

    $id = $request['id'];

    $qoutes = all();
    foreach ($qoutes as $key => $qoute) {
        if ($request['id'] == $qoute['id']) {
            unset($qoutes[$key]);
            break;
        }
    }

    $fp = fopen("app/db/qoute.txt", "w");

    fwrite($fp, json_encode($qoutes));

    fclose($fp);

}

