<?php

namespace App\Repositories\News;

use LaravelEasyRepository\Repository;

interface NewsRepository extends Repository
{

    // Write something awesome :)
    public function getAllNews();
    public function createNews($request);
    public function updateNews($request, $id);
    public function deleteNews($id);
    public function getNewsById($id);
    public function showNews($id);
    public function hideNews($id);
    public function createNotification($request, $id);
    public function updateNotification($request, $id);
}
