<?php

namespace Dreamaker\Entreat;

use Illuminate\Support\ServiceProvider;
use Dreamaker\Entreat\Task;

class EntreatServiceProvider extends ServiceProvider
{
    public function boot()
    {
    //    $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    //    print_r($_SERVER);
        $task = new Task;
        // print_r($task);
    }

    public function register()
    {

    }

}