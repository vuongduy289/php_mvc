<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Dashboard;

class DashboardController extends BaseController {
    public function getDashboards() {
        $viewName = 'dashboard.index';
        $data = [];

        return $this->render($viewName, $data);
    }
}
