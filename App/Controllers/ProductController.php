<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Product;

class ProductController extends BaseController {
    public function index() 
    {   
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

        if (empty($keyword)) {
            $products = Product::get();
        }else{
            $products = Product::where('name', 'like', "%keyword%")->get();
        }

        $count = Product::count();
        
        return $this->render('product.index', compact('products', 'keyword', 'count'));
    }

    public function create() 
    {
        return $this->render('product.create', []);
    }

    public function store() 
    {   
        $product = new Product();
        $product->name = $_POST['name'];
        $product->price = (int) $_POST['price'];
        $product->category_id = (int) $_POST['category_id'];
        $product->status = (int) ($_POST['status']);

        $fileName = '';
        $imageFile = $_FILES['image_url'];
        if ($imageFile['size'] > 0){
            $path = './public/dist/img/products/';
            $fileName = $path . uniqid() . '_' . $imageFile['name'];
            move_uploaded_file($imageFile['tmp_name'], $fileName);
        }
        $product->image_url = $fileName;

        $product->save();
        $url = BASE_URL . 'products';
        header("location: $url");
        die;
        
    }

    public function show($id) 
    {
        $product = Product::find($id);

        return $this->render('product.detail', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return $this->render('product.edit', compact('product'));
    }

    public function update($id) {
        $product = Product::find($id);
        $product->name = $_POST['name'];
        $product->price = (int) $_POST['price'];
        $product->category_id = (int) $_POST['category_id'];
        $product->status = (int) ($_POST['status']);

        $fileName = '';
        $imageFile = $_FILES['image_url'];
        if ($imageFile['name'] != '') {
            if ($imageFile['size'] > 0){
                $path = './public/dist/img/products/';
                $fileName = $path . uniqid() . '_' . $imageFile['name'];
                move_uploaded_file($imageFile['tmp_name'], $fileName);
                $product->image_url = $fileName;
            }
            $product->save();
        }else{
            $product->save();
        }

        $url = BASE_URL . 'products';
        header("location: $url");
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        $url = BASE_URL . 'products';
        header("location: $url");
    }
}