<?php

namespace App\Http\Controllers;

use App\Repositories\Dashboard\DashboardRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $DashboardRepository;

    public function __construct(DashboardRepository $DashboardRepository)
    {
        $this->DashboardRepository = $DashboardRepository;
    }

    public function index()
    {
        return $this->DashboardRepository->getNews();
    }
}
