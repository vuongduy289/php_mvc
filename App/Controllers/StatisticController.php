<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Statistic;

class StatisticController extends BaseController {
    public function index() {
        $viewName = 'statistic.index';
        $data = [];

        return $this->render($viewName, $data);
    }
}
