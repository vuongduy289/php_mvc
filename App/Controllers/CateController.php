<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Category;

class CateController extends BaseController {
    public function index() 
    {   
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

        if (empty($keyword)) {
            $categories = Category::get();
        }else{
            $categories = Category::where('name', 'like', "%keyword%")->get();
        }

        $count = Category::count();
        
        return $this->render('category.index', compact('categories', 'keyword', 'count'));
    }

    public function create() 
    {
        return $this->render('category.create', []);
    }

    public function store() 
    {
        $category = new Category();
        $category->name = $_POST['name'];
        $category->status = (int) $_POST['status'];
        $category->save();

        $url = BASE_URL . 'categories';
        header("location: $url");
    }

    public function edit($id) 
    {
        $category = Category::find($id);
        return $this->render('category.edit', compact('category'));
    }
    
    public function update($id) 
    {
        $category = Category::find($id);
        $category->name = $_POST['name'];
        $category->status = (int) $_POST['status'];
        $category->save();

        $url = BASE_URL . 'categories';
        header("location: $url");
    }

    public function destroy($id) 
    {
        $category = Category::find($id);
        $category->delete();

        $url = BASE_URL. 'categories';
        header("location: $url");
    }
}
