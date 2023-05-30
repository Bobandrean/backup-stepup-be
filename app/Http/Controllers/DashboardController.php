<?php

namespace App\Http\Controllers;

use App\Repositories\Dashboard\DashboardRepository;
use App\Repositories\News\NewsRepository;
use App\Repositories\Quiz\QuizRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $DashboardRepository;
    private $QuizRepository;

    public function __construct(DashboardRepository $DashboardRepository, QuizRepository $QuizRepository, NewsRepository $NewsRepository)
    {
        $this->DashboardRepository = $DashboardRepository;
        $this->QuizRepository = $QuizRepository;
        $this->NewsRepository = $NewsRepository;
    }

    public function index()
    {
        return $this->NewsRepository->getShowedNews();
    }

    public function indexQuiz()
    {
        return $this->QuizRepository->getShowedQuiz();
    }
}
