<!-- Đây là nơi định nghĩa danh sách route -->
<?php
// Sử dụng thư viện Phroute
use Phroute\Phroute\RouteCollector;
use App\Controllers\ProductController;
use App\Controllers\DashboardController;
use App\Controllers\CateController;
use App\Controllers\OrderController;
use App\Controllers\UserController;
use App\Controllers\StatisticController;


// Khởi tạo đối tượng quản lý danh sách cách đường dẫn
$router = new RouteCollector();
// phương thức: get, post, put, patch, delete, any

// $router->phuong_thuc('duong dan', function () {return xxx;});
// $router->get('/', function () {
//     return 'Trang chu';
// });

// $router->phuong_thuc('duong dan', [Controller, 'ten ham']);
$router->get('/', [DashboardController::class, 'getDashboards']);
$router->get('/dashboards', [DashboardController::class, 'getDashboards']);

//Products
$router->group(['prefix' => 'products'], function ($router) {
    $router->get('/', [ProductController::class, 'index']);
    $router->get('create', [ProductController::class, 'create']);
    $router->post('store', [ProductController::class, 'store']);
    $router->get('detail/{id}', [ProductController::class, 'show']);
    $router->get('edit/{id}', [ProductController::class, 'edit']);
    $router->post('update/{id}', [ProductController::class, 'update']);
    $router->get('delete/{id}', [ProductController::class, 'destroy']);
});


//Categories
$router->group(['prefix' => 'categories'], function ($router) {
    $router->get('/', [CateController::class, 'index']);
    $router->get('create', [CateController::class, 'create']);
    $router->post('store', [CateController::class, 'store']);
    $router->get('edit/{id}', [CateController::class, 'edit']);
    $router->post('update/{id}', [CateController::class, 'update']);
    $router->get('delete/{id}', [CateController::class, 'destroy']);
});

//Orders
$router->group(['prefix' => 'orders'], function ($router) {
    $router->get('/', [OrderController::class, 'index']);
    $router->get('create', [OrderController::class, 'create']);
    $router->post('store', [OrderController::class, 'store']);
    $router->get('detail/{id}', [OrderController::class, 'show']);
    $router->get('edit/{id}', [OrderController::class, 'edit']);
    $router->post('update/{id}', [OrderController::class, 'update']);
    $router->get('delete/{id}', [OrderController::class, 'destroy']);
});


//User
$router->group(['prefix' => 'users'], function ($router) {
    $router->get('/', [UserController::class, 'index']);
    $router->get('create', [UserController::class, 'create']);
    $router->post('store', [UserController::class, 'store']);
    $router->get('detail/{id}', [UserController::class, 'show']);
    $router->get('edit/{id}', [UserController::class, 'edit']);
    $router->post('update/{id}', [UserController::class, 'update']);
    $router->get('delete/{id}', [UserController::class, 'destroy']);
});


//Statistical
$router->get('/statistics', [StatisticController::class, 'index']);

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

// lấy ra đường dẫn hiện tại người dùng đang gõ vào bằng ?url=ds-san-pham
// Nếu kết hợp thêm file .htaccess có thể gõ luôn /ds-san-pham thì webserver sẽ tự hiểu sang đường dẫn bên trên
$url = isset($_GET['url']) ? ($_GET['url']) : '/';
// phát đi sự kiện đọc đường dẫn để route biết đang gọi đến hàm nào
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);
// Hiển thị kết quả return của hàm được gọi
echo $response;
