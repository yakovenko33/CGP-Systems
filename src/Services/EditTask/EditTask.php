<?php


namespace App\Services\EditTask;


use App\CommonModule\Service\ServiceRoot;
use App\Models\TaskModel;
use \App\Services\EditTask\Validator;

class EditTask extends ServiceRoot
{
    /**
     * EditTask constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct(new Validator(), $data);
    }

    protected function handle()
    {
        $model = new TaskModel();
        $model->adminEditTask($this->data);

        $this->result = [
            "data" => $model->getTaskById($this->data["id"]),
            "status" => "success",
            "code" => 200
        ];
    }
}