<?php


namespace App\Controllers;


use App\Models\TaskModel;
use App\Services\EditTask\EditTask;
use TestFramework\Components\HttpComponents\AuthComponent;
use TestFramework\Components\HttpComponents\Request;
use App\Services\AdminSingIn\AdminSingIn;

class UserController
{
    public function adminSingInPage()
    {
        require_once(ROOT . '/src/Views/admin/singIn.php');
    }

    public function adminSingIn(Request $request)
    {
        if ($request->isAjax()) {
            $service = new AdminSingIn($request->getPost());

            echo json_encode($service->getResult(), true);
        } else {
            echo json_encode([
                "errors" => "Не верный запрос",
                "status" => "error",
                "code" => 404
            ], true);
        }
    }

    public function editor()
    {
        if ((new AuthComponent())->hasRoles(["admin"])) {
            $tasks = (new TaskModel())->getTaskAll();

            require_once(ROOT . '/src/Views/admin/editor.php');
        } else {
            var_dump("404");
        }
    }

    /**
     * @param Request $request
     */
    public function editForm(Request $request)
    {
        if ((new AuthComponent())->hasRoles(["admin"]) && $request->isAjax()) {

            echo json_encode([
                "data" => $this->getContent($request->getGet()["id"]),
                "status" => "success",
                "code" => 200
            ], true);
        } else {
            echo json_encode([
                "errors" => "Не верный запрос",
                "status" => "error",
                "code" => 404
            ], true);
        }
    }

    /**
     * @param int $id
     * @return false|string
     */
    private function getContent(int $id)
    {
        $task = (new TaskModel())->getTaskById($id);

        ob_start();
        require_once(ROOT . '/src/Views/admin/formEdit.php');
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    /**
     * @param Request $request
     */
    public function editTask(Request $request)
    {
        if ((new AuthComponent())->hasRoles(["admin"]) && $request->isAjax()) {
            $service = new EditTask($request->getPost());

            echo json_encode($service->getResult(), true);
        } else {
            echo json_encode([
                "errors" => "Не верный запрос",
                "status" => "error",
                "code" => 404
            ], true);
        }
    }
}