<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\News\NewsRepository;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\CreateNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use App\Http\Requests\UpdateNewsRequest;



class NewsController extends Controller
{
    //
    private $NewsRepository;
    public function __construct(NewsRepository $NewsRepository)
    {
        $this->NewsRepository = $NewsRepository;
    }

    public function index()
    {
        return $this->NewsRepository->getAllNews();
    }

    public function create(CreateNewsRequest $request)
    {
        return $this->NewsRepository->createNews($request);
    }

    public function update(UpdateNewsRequest $request, $id)
    {
        return $this->NewsRepository->updateNews($request, $id);
    }

    public function detail($id)
    {
        return $this->NewsRepository->getNewsById($id);
    }

    public function delete($id)
    {
        return $this->NewsRepository->deleteNews($id);
    }

    public function show($id)
    {
        return $this->NewsRepository->showNews($id);
    }

    public function hide($id)
    {
        return $this->NewsRepository->hideNews($id);
    }

    public function notification($id)
    {
        return $this->NewsRepository->notificationNow($id);
    }
    public function createNotification(CreateNotificationRequest $request, $id)
    {
        return $this->NewsRepository->createNotification($request, $id);
    }

    public function updateNotification(UpdateNotificationRequest $request, $id)
    {
        return $this->NewsRepository->updateNotification($request, $id);
    }

    public function getShowedNews()
    {
        return $this->NewsRepository->getShowedNews();
    }
}
