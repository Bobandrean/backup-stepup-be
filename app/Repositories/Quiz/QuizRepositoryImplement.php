<?php

namespace App\Repositories\Quiz;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Http\Controllers\BaseController;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Quiz;
use Faker\Provider\Base;

class QuizRepositoryImplement extends Eloquent implements QuizRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Quiz $model)
    {
        $this->model = $model;
    }

    public function getAllQuiz()
    {
        $query = $this->model->get();
        if ($query == NULL) {
            return BaseController::error(NULL, 'Data not found', 400);
        }

        $data = json_decode($query, true);


        $result = [];

        foreach ($data as $item) {
            $question = json_decode($item['question'], true);
            $item['question'] = $question;
            $result[] = $item;
        }

        return BaseController::success($result, "Sukses mengambil data", 200);
    }

    public function createQuiz($request)
    {

        $question = json_encode($request->questions);

        try {
            DB::beginTransaction();
            $input = new Quiz();

            $input->module_name = $request->module_name;
            $input->per_page = $request->per_page;
            $input->start_date = $request->start_date;
            $input->end_date = $request->end_date;
            $input->published_at = $request->published_at;
            $input->question = $question;

            $input->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        return BaseController::success($input, "Sukses menambah data", 200);
    }

    public function updateQuiz($request, $id)
    {
        $question = json_encode($request->questions);

        try {
            DB::beginTransaction();
            $input = $this->model->find($id);

            $input->module_name = $request->module_name;
            $input->per_page = $request->per_page;
            $input->start_date = $request->start_date;
            $input->end_date = $request->end_date;
            $input->published_at = $request->published_at;
            $input->question = $question;

            $input->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        return BaseController::success($input, "Sukses mengubah data", 200);
    }
    public function deleteQuiz($id)
    {
        $query = $this->model->find($id);
        if ($query == NULL) {
            return BaseController::error(NULL, 'Data not found', 400);
        }

        $query->delete();

        return BaseController::success($query, "Sukses menghapus data", 200);
    }

    public function getQuizById($id)
    {
        $query = $this->model->find($id);
        if ($query == NULL) {
            return BaseController::error(NULL, 'Data not found', 400);
        }

        $data = json_decode($query, true);

        $question = json_decode($data['question'], true);
        $data['question'] = $question;

        return BaseController::success($data, "Sukses mengambil data", 200);
    }


    public function answerQuiz($request, $id)
    {
        $userId = Auth::user()->id;
        $data = $request;
        $count = 0;
        $sum = 0;

        foreach ($data['answer'] as $item) {
            $count += 1;
            foreach ($item['choices'] as $choice) {
                $sum += $choice['isCorrect'];
            }
        }
        $response = [
            "total_question" => $count,
            "total_correct" => $sum,
            "total_incorrect" => $count - $sum,
            "total_score" => $sum / $count * 100,
        ];

        try {
            DB::beginTransaction();

            $input = new Answer();
            $input->user_id = $userId;
            $input->quiz_id = $id;
            $input->answer = json_encode($data['answer']);
            $input->score = $response['total_score'];
            $input->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        return BaseController::success($response, "Sukses menghitung Quiz", 200);
    }

    // Write something awesome :)
}
