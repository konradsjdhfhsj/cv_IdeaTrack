<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Edytujprofilcontroller extends Controller
{
    public function edytujprofil(){
       session_start();
if($_SERVER['REQUEST_METHOD']==='POST'){
    $conn = mysqli_connect('localhost', 'root', '', 'szt');
    $folder = 'avatary/';

    if(!is_dir($folder)){
        mkdir($folder, 0777, true);
    }

    $email = $_POST['nazwa'] ?? '';
    $avatarPath = null;
    if(!empty($_FILES['avatar']['tmp_name'])){
        $tmpName = $_FILES['avatar']['tmp_name'];
        $origName = $_FILES['avatar']['name'];
        $safeName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $origName);
        $targetPath = $folder . $safeName;

        if(move_uploaded_file($tmpName, $targetPath)){
            $avatarPath = $targetPath;
        }
    }
    if($avatarPath && $email){
        $query = $conn->prepare("UPDATE osoby SET avatar = ?, email = ? WHERE email = ?");
        $query->bind_param('sss', $avatarPath, $email, $_SESSION['email']);
    }
    elseif($avatarPath){
        $query = $conn->prepare("UPDATE osoby SET avatar = ? WHERE email = ?");
        $query->bind_param('ss', $avatarPath, $_SESSION['email']);
    }
    elseif($email){
        $query = $conn->prepare("UPDATE osoby SET email = ? WHERE email = ?");
        $query->bind_param('ss', $email, $_SESSION['email']);
    }

    if(isset($query) && $query->execute()){
        if(!empty($email)){
            $_SESSION['email'] = $email; 
        }
        return redirect('/main');
    }
}


    }
}
