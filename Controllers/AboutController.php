<?php
class AboutController extends BaseController
{
    private $aboutModel;
    public function __construct()
    {
        $this->loadModel('aboutModel');
        $this->aboutModel = new aboutModel();
    }

    public function index(){
        $checkLogin = $this->AuthLogin(['admin','manager']);
        if(!$checkLogin){
            return header('Location: login.php');
        }

        $abouts = $this->aboutModel->getAll();
        return $this->view('backend.abouts.show',['abouts' => $abouts]);
    }

    public function show(){
        $checkLogin = $this->AuthLogin(['admin','manager']);
        if(!$checkLogin){
            return header('Location: login.php');
        }

        $id = $_REQUEST['id'];
        $about = $this->aboutModel->findById($id);
//        echo '<pre>';
//        print_r($about);
//        die();
        return $this->view('backend.abouts.update',['about' => $about]);
    }
    public function update(){
        $checkLogin = $this->AuthLogin(['admin','manager']);
        if(!$checkLogin){
            return header('Location: login.php');
        }

        $id = $_REQUEST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $image = $_POST['image'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $data = [
            'title' => $title,
            'content' => $content,
            'image' => $image,
            'status' => 'active',
            'updated_at' => $date
        ];
        $this->aboutModel->updateData($id, $data);
        return header('Location: admin.php?controller=about&action=get_list&page=1');
    }

    public function get_list(){
        // kiem tra quyen admin
        $checkLogin = $this->AuthLogin(['admin','manager']);
        if(!$checkLogin){
            return header('Location: login.php');
        }

        $totalItem_page = 5; // so item hien thi tren 1 trang
        $range = 6; // so button hien thi ra man hinh
        if (isset($_GET['page'])){
            $paging = $this->aboutModel->paging($totalItem_page,$_GET['page'],$range);
        }
        else {
            $paging = $this->aboutModel->paging($totalItem_page);
        }
//        echo '<pre>';
//        print_r($paging);
//        die();
        $startPage = $paging['start'];
        $paging['limit'] = $totalItem_page;

        $abouts = $this->aboutModel->getAll(['*'],['id'],$startPage,$totalItem_page);
        return $this->view('backend.abouts.show',['abouts' => $abouts, 'pagination' => $paging]);
    }

    public function create(){
        $checkLogin = $this->AuthLogin(['admin','manager']);
        if(!$checkLogin){
            return header('Location: login.php');
        }

        return $this->view('backend.abouts.create_form');
    }
    public function store(){
        $checkLogin = $this->AuthLogin(['admin','manager']);
        if(!$checkLogin){
            return header('Location: login.php');
        }




        $title = $_POST['title'];
        $content = $_POST['content'];
        $image = $_POST['image'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $data = [
            'title' => $title,
            'content' => $content,
            'image' => $image,
            'status' => 'active',
            'created_at' => $date,
            'updated_at' => $date
        ];
        $this->aboutModel->store($data);
        return header('Location: admin.php?controller=about&action=get_list&page=1');
    }

    public function delete(){
        $checkLogin = $this->AuthLogin(['admin','manager']);
        if(!$checkLogin){
            return header('Location: login.php');
        }

        $id = $_GET['id'];

        $this->aboutModel->deleteOne($id);
        return header('Location: admin.php?controller=about&action=get_list&page=1');
    }
    public function activeStatus(){
        $id = $_GET['id'];
        $this->aboutModel->activeStatusData($id);
        return header('Location: admin.php?controller=about&action=get_list&page=1');
    }
    public function inActiveStatus(){
        $id = $_GET['id'];
        $this->aboutModel->inActiveStatusData($id);
        return header('Location: admin.php?controller=about&action=get_list&page=1');
    }

}