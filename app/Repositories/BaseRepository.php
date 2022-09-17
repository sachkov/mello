<?php

namespace App\Repositories;

use Illuminate\Container\Container as Application;
use Prettus\Repository\Eloquent\BaseRepository as Repository;

abstract class BaseRepository extends Repository
{

    public function __construct(Application $app)
    {
        parent::__construct($app);
    }
}
