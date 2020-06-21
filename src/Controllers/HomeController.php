<?php

namespace App\Controllers;


use App\Models\TaskModel;
use App\Services\AddTask\AddTask;
use TestFramework\Components\HttpComponents\Request;

class HomeController
{
    public function home()
    {
        $tasks = (new TaskModel())->getTaskAll();

        echo require_once(ROOT . '/src/Views/homeView/HomeView.php');
    }

    public function test()
    {
        $result = \password_hash("123", \PASSWORD_BCRYPT, ['cost' => 12]);
        echo "<pre>";
        var_dump($result);
        die;
    }

    /**
     * @param Request $request
     */
    public function addTask(Request $request)
    {
        if ($request->isAjax()) {
            $service = new AddTask($request->getPost());

            echo json_encode($service->getResult(), true);
        } else {
            echo json_encode([
                "errors" => "Не верный запрос",
                "status" => "error",
                "code" => 404
            ], true);
        }
    }

    /**
     * @param $data
     */
    private function debug($data): void
    {
        $file = "D:/ProgramFiles/OSPanel/domains/CGP-Systems/test.txt";
        file_put_contents($file, print_r($data, true));
    }
}