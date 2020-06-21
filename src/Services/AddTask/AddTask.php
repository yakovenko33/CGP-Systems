<?php

namespace App\Services\AddTask;


use App\CommonModule\Service\ServiceRoot;
use App\Models\TaskModel;
use App\Services\AddTask\Validator;

class AddTask extends ServiceRoot
{
    /**
     * @var array
     */
    private $data;

    /**
     * AddTask constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
         //htmlspecialChar;
        $this->data = $data;

        parent::__construct(new Validator(), $this->data);
    }

    protected function handle()
    {
        $model = new TaskModel();
        $this->getNewTask($model->getTaskById($model->insert($this->data)));
    }

    /**
     * @param array $data
     */
    private function getNewTask(array $data)
    {
        ob_start();
        require_once(ROOT . '/src/Views/homeView/newTask.php');

        $content = ob_get_contents();
        ob_end_clean();

        $this->result = [
            "data" => $content,
            "status" => "success",
            "code" => 201
        ];
    }

    /**
     * @return array
     */
    public function getResult(): array
    {
        return $this->result;
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