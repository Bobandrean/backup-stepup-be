<?php

namespace App\Repositories\News;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\News;
use App\Models\Files;
use App\Models\NewsSchedule;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class NewsRepositoryImplement extends Eloquent implements NewsRepository
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

    public function getAllNews()
    {
        $searchTitle = request()->query('searchTitle');
        $orderBy = request()->query('orderBy');
        $query = $this->model->with('files', 'newsSchedule')
            ->where(function ($query) use ($searchTitle) {
                $query->where('title', 'LIKE', '%' . $searchTitle . '%');
            })
            ->where(function ($query) use ($orderBy) {
                if ($orderBy == 'newest') {
                    $query->orderBy('created_at', 'desc');
                } else if ($orderBy == 'oldest') {
                    $query->orderBy('created_at', 'asc');
                }
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return BaseController::success($query, "Sukses mengambil data", 200);
    }
    public function getShowedNews()
    {
        $query = $this->model->with('files', 'newsSchedule')
            ->where('hidden_flag', 1)
            ->orderBy('created_at', 'desc')
            ->take(6) // Limit the result to 5 records
            ->get();

        return BaseController::success($query, "Sukses mengambil data", 200);
    }

    public function createNews($request)
    {
        // On Proggress Fixing**
        // $file = $request->file('image');

        // // Generate a unique file name
        // $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

        // // Upload the file to the S3 bucket and make it publicly accessible
        // Storage::disk('s3')->put($fileName, file_get_contents($file), 'public');

        // // Generate the publicly accessible URL
        // $fileUrl = Storage::disk('s3')->url($fileName);

        // // Return the URL or perform additional actions
        // return $fileUrl;

        DB::beginTransaction();
        try {
            $input = new News();
            $input->title = $request->title;
            $input->content = $request->content;
            $input->slug = $request->slug;
            $input->short_content = $request->short_content;
            $input->hidden_flag = 0;
            $input->image = "https://upload.wikimedia.org/wikipedia/commons/1/11/Test-Logo.svg";
            $input->save();
            $input->id;

            if ($request->has('files')) {
                foreach ($request->files as $key => $filesArray) {
                    foreach ($filesArray as $file) {
                        if (is_array($file)) {
                            $pathFile = $file['file']->getPath();
                            $fileName = $file['file']->getClientOriginalName();
                            $fileExtension = $file['file']->getClientOriginalExtension();
                        } else {
                            $pathFile = $file->getPath();
                            $fileName = $file->getClientOriginalName();
                            $fileExtension = $file->getClientOriginalExtension();
                        }

                        $files = new Files();

                        $files->news_id = $input->id;
                        $files->filepath = $pathFile; // Get the path of the uploaded file
                        $files->filename = $fileName; // Get the original file name
                        $files->extension = $fileExtension; // Get the file extension
                        $files->save();
                    }
                }
            }


            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }

        return BaseController::success($input, "Sukses menambah data", 200);
    }

    public function updateNews($request, $id)
    {

        $query = $this->model::with('files')->find($id);
        if (!$query) {
            return BaseController::error(null, "Data tidak ditemukan", 404);
        }

        DB::beginTransaction();

        try {
            $query->title = $request->title;
            $query->content = $request->content;
            $query->slug = $request->slug;
            $query->short_content = $request->short_content;
            $query->image = "https://upload.wikimedia.org/wikipedia/commons/1/11/Test-Logo.svg";
            $query->save();

            if ($request->has('files')) {

                $files = Files::where('news_id', $id)->get();

                foreach ($files as $file) {
                    $file->delete();
                }

                foreach ($request->files as $key => $filesArray) {
                    foreach ($filesArray as $file) {
                        if (is_array($file)) {
                            $pathFile = $file['file']->getPath();
                            $fileName = $file['file']->getClientOriginalName();
                            $fileExtension = $file['file']->getClientOriginalExtension();
                        } else {
                            $pathFile = $file->getPath();
                            $fileName = $file->getClientOriginalName();
                            $fileExtension = $file->getClientOriginalExtension();
                        }

                        $files = new Files();

                        $files->news_id = $query->id;
                        $files->filepath = $pathFile; // Get the path of the uploaded file
                        $files->filename = $fileName; // Get the original file name
                        $files->extension = $fileExtension; // Get the file extension
                        $files->save();
                    }
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }

        return BaseController::success($query, "Sukses mengubah data", 200);
    }

    public function deleteNews($id)
    {
        $query = $this->model::find($id);
        if (!$query) {
            return BaseController::error(null, "Data tidak ditemukan", 404);
        }

        $files = Files::where('news_id', $id)->get();

        foreach ($files as $file) {
            $file->delete();
        }

        $query->delete();
        return BaseController::success($query, "Sukses menghapus data", 200);
    }

    public function getNewsById($id)
    {
        $query = $this->model::with('files', 'newsSchedule')->find($id);
        if (!$query) {
            return BaseController::error(null, "Data tidak ditemukan", 404);
        }

        return BaseController::success($query, "Sukses menarik data", 200);
    }

    public function showNews($id)
    {
        $query = $this->model::find($id);
        if (!$query) {
            return BaseController::error(null, "Data tidak ditemukan", 404);
        }
        if ($query->hidden_flag == 1) {
            return BaseController::error(null, "Data sudah tampil", 404);
        }

        $query->hidden_flag = 1;
        $query->save();

        return BaseController::success($query, "Sukses update data", 200);
    }

    public function hideNews($id)
    {
        $query = $this->model::find($id);
        if (!$query) {
            return BaseController::error(null, "Data tidak ditemukan", 404);
        }
        if ($query->hidden_flag == 0) {
            return BaseController::error(null, "Data sudah di hilangkan", 404);
        }

        $query->hidden_flag = 0;
        $query->save();

        return BaseController::success($query, "Sukses menyembunyikan data", 200);
    }

    public function createNotification($request, $id)
    {
        $query = $this->model::find($id);
        if (!$query) {
            return BaseController::error(null, "Data tidak ditemukan", 404);
        }

        $input = new NewsSchedule();
        $input->news_id = $id;
        $input->interval = $request->interval;
        $input->start_at = $request->start_at;
        $input->end_at = $request->end_at;
        $input->save();

        return BaseController::success($input, "Sukses menambah data", 200);
    }

    public function detailNotification($id)
    {
        $query = NewsSchedule::find($id);
        if (!$query) {
            return BaseController::error(null, "Data tidak ditemukan", 404);
        }

        return BaseController::success($query, "Sukses menarik data", 200);
    }
    public function updateNotification($request, $id)
    {
        $query = NewsSchedule::find($id);
        if (!$query) {
            return BaseController::error(null, "Data tidak ditemukan", 404);
        }

        $query->interval = $request->interval;
        $query->start_at = $request->start_at;
        $query->end_at = $request->end_at;
        $query->interval_type = $request->interval_type;
        $query->save();

        return BaseController::success($query, "Sukses mengubah data", 200);
    }

    public function notificationNow($id)
    {
        $query = News::find($id);
        if (!$query) {
            return BaseController::error(null, "Data tidak ditemukan", 404);
        }


        return BaseController::success($query, "Notifikasi Berhasil", 200);
    }
    // Write something awesome :)
}
