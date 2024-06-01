<?php

namespace App\Controllers;

use App\Models\Worker;

class WorkerController
{
    public function index()
    {
        $workers = Worker::all();


    }

}