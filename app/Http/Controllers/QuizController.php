<?php

namespace App\Http\Controllers;

use App\Repositories\Quiz\QuizRepository;
use App\Http\Requests\CreateQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Http\Requests\AnswerQuizRequest;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    private $QuizRepository;

    public function __construct(QuizRepository $QuizRepository)
    {
        $this->QuizRepository = $QuizRepository;
    }

    public function index()
    {
        return $this->QuizRepository->getAllQuiz();
    }

    public function create(CreateQuizRequest $request)
    {
        return $this->QuizRepository->createQuiz($request);
    }

    public function update(UpdateQuizRequest $request, $id)
    {
        return $this->QuizRepository->updateQuiz($request, $id);
    }

    public function detail($id)
    {
        return $this->QuizRepository->getQuizById($id);
    }

    public function delete($id)
    {
        return $this->QuizRepository->deleteQuiz($id);
    }

    public function answer(AnswerQuizRequest $request, $id)
    {
        return $this->QuizRepository->answerQuiz($request, $id);
    }
    //
}
