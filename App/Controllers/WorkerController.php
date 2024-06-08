<?php

namespace App\Controllers;

use App\Models\Worker;
use Core\CookieManager;

class WorkerController
{
    public function index()
    {
        $orderBy = $_GET['order'] ?? 'first_name';
        $dir = $_GET['dir'] ?? 'acs';

        $workers = Worker::all();
        $title = 'Workers';
        $contentView = ROOT . '/App/views/workers/ListView.php';
        $authUser = CookieManager::$authUser;


        require_once ROOT . '/App/views/layouts/MainLayoutView.php';


    }

    public function get(int $id) {
        $worker = Worker::findOne(['id' => $id]);

        if ($worker) {
            header('Content-Type: application/json');
            echo json_encode($worker);
        } else {
            http_response_code(404);
        }
    }

    public function create()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        Worker::create($data)->save();

        http_response_code(201);
    }

}