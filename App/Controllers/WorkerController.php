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

}