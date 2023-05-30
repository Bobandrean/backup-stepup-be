<?php

namespace App\Repositories\Quiz;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Http\Controllers\BaseController;
use App\Models\Answer;
use App\Models\AnswerChoice;
use App\Models\AnswerQuestion;
use App\Models\Question;
use App\Models\Choice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Quiz;
use Carbon\Carbon;
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
        $query = $this->model->with('question.choice')->get();
        if ($query == NULL) {
            return BaseController::error(NULL, 'Data not found', 400);
        }


        return BaseController::success($query, "Sukses mengambil data", 200);
    }

    public function getShowedQuiz()
    {
        $now = Carbon::now()->format('Y-m-d');

        $query = $this->model->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->take(6) // Limit the result to 5 records
            ->get();

        if ($query == NULL) {
            return BaseController::error(NULL, 'Data not found', 400);
        }

        return BaseController::success($query, "Sukses mengambil data", 200);
    }

    public function createQuiz($request)
    {



        $questionsData = $request->questions;


        try {
            DB::beginTransaction();
            $input = new Quiz();

            $input->module_name = $request->module_name;
            $input->per_page = $request->per_page;
            $input->start_date = $request->start_date;
            $input->end_date = $request->end_date;
            $input->published_at = carbon::now();
            $input->save();
            $input->id;

            foreach ($questionsData as $key => $value) {
                $question = new Question();
                $question->quiz_id = $input->id;
                $question->title = $value['title'];
                $question->save();
                $question->id;

                foreach ($value['choices'] as $key2 => $value2) {
                    $choice = new Choice();
                    $choice->question_id = $question->id;
                    $choice->choice_text = $value2['text'];
                    $choice->is_correct = $value2['isCorrect'];
                    $choice->save();
                }
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        return BaseController::success($input, "Sukses menambah data", 200);
    }

    public function updateQuiz($request, $id)
    {
        $query = $this->model->find($id);

        if ($query == NULL) {
            return BaseController::error(NULL, 'Data not found', 400);
        }

        $query->module_name = $request->module_name;
        $query->per_page = $request->per_page;
        $query->start_date = $request->start_date;
        $query->end_date = $request->end_date;
        $query->published_at = carbon::now();
        $query->save();
        $query->id;

        $questionsData = $request->questions;

        $find_question_id = Question::where('quiz_id', $query->id)->first();

        $refresh_choice = Choice::where('question_id', $find_question_id->id)->delete();

        $refresh_question = Question::where('quiz_id', $query->id)->delete();


        foreach ($questionsData as $key => $value) {
            $question = new Question();
            $question->quiz_id = $query->id;
            $question->title = $value['title'];
            $question->save();
            $question->id;

            foreach ($value['choices'] as $key2 => $value2) {
                $choice = new Choice();
                $choice->question_id = $question->id;
                $choice->choice_text = $value2['text'];
                $choice->is_correct = $value2['isCorrect'];
                $choice->save();
            }
        }

        return BaseController::success(NULL, "Sukses mengubah data", 200);
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
        $query = $this->model->with('question.choice')->find($id);

        if ($query == NULL) {
            return BaseController::error(NULL, 'Data not found', 400);
        }

        return BaseController::success($query, "Sukses mengambil data", 200);
    }

    public function getAnswerById($id)
    {
        $query = Answer::with('quiz', 'user', 'answerQuestion.answerChoice')->where('quiz_id', $id)->get();

        if ($query == NULL) {
            return BaseController::error(NULL, 'Data not found', 400);
        }

        return BaseController::success($query, "Sukses mengambil data", 200);
    }

    public function answerQuiz($request, $id)
    {
        $userId = Auth::user()->id;
        $data = $request;
        $total_question = 0;
        $count = 0;
        $sum = 0;



        $query = Answer::with('quiz', 'user', 'answerQuestion.answerChoice')->first();

        if ($query == NULL) {
            return BaseController::error(NULL, 'Data not found', 400);
        }

        try {
            DB::beginTransaction();

            $answer = new Answer();
            $answer->user_id = $userId;
            $answer->quiz_id = $id;
            $answer->save();
            $answer->id;


            foreach ($data->answer as $key => $value) {
                $question = new AnswerQuestion();
                $question->answer_id = $answer->id;
                $question->title = $value['title'];
                $question->save();
                $question->id;

                if ($question->title == $value['title']) {
                    $total_question++;
                }

                foreach ($value['answer_choice'] as $key2 => $value2) {
                    $choice = new AnswerChoice();
                    $choice->answer_question_id = $question->id;
                    $choice->choice_text = $value2['choice_text'];
                    $choice->is_correct = $value2['is_correct'];
                    $choice->is_selected = $value2['is_selected'];
                    $choice->save();

                    if ($choice->is_correct == 1 && $choice->is_selected == 1) {
                        $count++;
                    }
                }
            }

            $sum = $count / $total_question * 100;

            $score = Answer::find($answer->id);
            $score->score = $sum;
            $score->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        $response = [
            'score' => $sum,
            'total_question' => $total_question,
            'correct_answer' => $count,
            'wrong_answer' => $total_question - $count
        ];


        return BaseController::success($response, "Sukses menghitung Quiz", 200);
    }

    // Write something awesome :)
}
