<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập quản trị</title>
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
      <link rel="stylesheet" href="../public/datatables/css/dataTables.min.css">
      <link rel="stylesheet" href="../public/css/backend.css">'
    <style>
        body {
           background-image: linear-gradient(white,black, white);
        }
        .swapper{
            max-width: 600px;
            margin: auto;
            box-shadow: 1px 0px 3px black;  
            border-radius: 10px; 
            background-image: linear-gradient(to bottom right ,aqua,pink);
        }
    </style>
</head>
<body>
    <?php
        require_once '../vendor/autoload.php';
        use App\Models\User;
        $error = "";
        if(isset($_POST['DANGNHAP'])){
            $username = $_POST['username'];
            $password = sha1( $_POST['password']);
            $args = [
                ['password' ,'=', $password],
                ['roles','=',1],
                ['status','=',1],
            ];
            if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
                 $args[]=array('email','=',$username);
              }else{
                $args[]=array('username','=',$username);
              }
            $user = User::where($args)->first();
            if($user !== NULL){
                $_SESSION['useradmin']= $username;
                $_SESSION['user_id'] = $user->id;
                $_SESSION['name'] = $user->name;
                $_SESSION['image'] = $user->image;
                header('Location:index.php');
            }else{
                $error = "Tài khoản không hợp lệ";
            }
        }
    ?>
    <form action="login.php" method="post">
        <div class="swapper mt-5 p-4">
            <h1 class="text-danger fs-3 text-center">Đăng Nhập</h1>
            <div class="mb-3">
                <label for=""><strong>Tên tài khoản</strong> </label>
                <input class="form-control" type="text" name="username" placeholder="Tên đăng nhập hoặc email" required>
            </div>
            <div class="mb-3">
                <label for=""><strong>Mật khẩu</strong> </label>
                <input class="form-control" type="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <div class="mb-3 text-right">
            <input class="btn btn-success" type="submit" value="Đăng nhập" name = "DANGNHAP">
            </div>
            <div class="mb-3">
                <?php if($error != ""): ?>
                    <p class="text-danger"><?=$error;?></p>
                <?php endif;?>
            </div>
        </div>
    </form>
</body>
</html>