<?php

namespace App\Repositories\Quiz;

use LaravelEasyRepository\Repository;

interface QuizRepository extends Repository
{

    // Write something awesome :)

    public function getAllQuiz();
    public function createQuiz($request);
    public function updateQuiz($request, $id);
    public function getQuizById($id);
    public function deleteQuiz($id);
    public function answerQuiz($request, $id);
}
