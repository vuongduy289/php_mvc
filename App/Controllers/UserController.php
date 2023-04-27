<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController {
    public function index() 
    {
        //Tìm kiếm user 
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

        if (empty($keyword)) {
            $users = User::get();
        }else{
            $users = User::where('name', 'like', "%keyword%")->get();
        }

        $count = User::count();
        return $this->render('user.index', compact('users', 'keyword', 'count'));
    }

    public function create() 
    {
        return $this->render('user.create', []);
    }

    public function store()
    {
        $user = new User();
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $user->status = (int) ($_POST['status']);

        $fileName = '';
        $avatarFile = $_FILES['avatar'];
        if ($avatarFile['size'] > 0){
            $path = './public/dist/img/avatar/';
            $fileName = $path . uniqid() . '_' . $avatarFile['name'];
            move_uploaded_file($avatarFile['tmp_name'], $fileName);
        }
        $user->avatar = $fileName;

        $user->save();

        $url = BASE_URL . 'users';
        header("location: $url");

    }

    public function show($id) 
    {
        $user = User::find($id);

        return $this->render('user.detail', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return $this->render('user.edit', compact('user'));
    }

    public function update($id) 
    {
        $user = User::find($id);
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $user->status = (int) ($_POST['status']);

        $fileName = '';
        $avatarFile = $_FILES['avatar'];
        if ($avatarFile['name'] != ''){
            if ($avatarFile['size'] > 0){
                $path = './public/dist/img/avatar/';
                $fileName = $path . uniqid() . '_' . $avatarFile['name'];
                move_uploaded_file($avatarFile['tmp_name'], $fileName);
                $user->avatar = $fileName;

            }
            $user->save();
        }else{
            $user->save();
        }

        $url = BASE_URL . 'users';
        header("location: $url");
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        $url = BASE_URL . 'users';
        header("location: $url");
    }
}
