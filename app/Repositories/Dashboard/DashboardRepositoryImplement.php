<?php

namespace App\Repositories\Dashboard;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\News;
use App\Http\Controllers\BaseController;

class DashboardRepositoryImplement extends Eloquent implements DashboardRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(News $model)
    {
        $this->model = $model;
    }

    public function getNews()
    {
        $query = $this->model
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        if ($query == NULL) {
            return BaseController::error(NULL, 'Data not found', 400);
        }

        return BaseController::success($query, "Sukses mengambil data", 200);
    }
    // Write something awesome :)
}
