<?php
class CategoryController extends BaseController
{
    private $categoryModel;
    private $html;
    public function __construct()
    {
        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel();
        $this->html = '';
    }

    public function index(){
        $checkLogin = $this->AuthLogin(['admin','manager']);
        if(!$checkLogin){
            return header('Location: login.php');
        }

        $categories = $this->categoryModel->getAll();
        return $this->view('backend.categories.show',['categories' => $categories]);
    }

    public function show(){

        $id = $_REQUEST['id'];
        $category = $this->categoryModel->findById($id);
        $optionParent = $this->categoryRecusive(0,0);
        return $this->view('backend.categories.update',['category' => $category, 'optionParent' => $optionParent]);
    }
    public function update(){
//        $checkLogin = $this->AuthLogin(['admin','manager']);
//        if(!$checkLogin){
//            return header('Location: login.php');
//        }

        $id = $_REQUEST['id'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $data = [
            'title' => $_POST['title'],
            'parent_id' => $_POST['parent_id'],
            'updated_at' => $date
        ];
        $this->categoryModel->updateData($id, $data);
        return header('Location: admin.php?controller=category&action=get_list');
    }

    public function get_list(){
        // kiem tra quyen admin
//        $checkLogin = $this->AuthLogin(['admin','manager']);
//        if(!$checkLogin){
//            return header('Location: login.php');
//        }

//        $totalItem_page = 3; // so item hien thi tren 1 trang
//        $range = 6; // so button hien thi ra man hinh
//        if (isset($_GET['page'])){
//            $paging = $this->categoryModel->paging($totalItem_page,$_GET['page'],$range);
//        }
//        else {
//            $paging = $this->categoryModel->paging($totalItem_page);
//        }
//        echo '<pre>';
//        print_r($paging);
//        die();
//        $startPage = $paging['start'];
//        $paging['limit'] = $totalItem_page;

        $categories = $this->categoryModel->getAll();
        $optionParent = $this->categoryRecusive();

        return $this->view('backend.categories.list',['categories' => $categories, 'optionParent' => $optionParent]);
    }
    public function categoryRecusive($parent_id = 1, $level = 0){
        $data = $this->categoryModel->categoryRecusive($parent_id);
        $result = [];
        foreach ($data as $item){
            if ($item['parent_id'] == $parent_id){
            $item['level'] = $level;
            $result[] = $item;
            $child = $this->categoryRecusive($item['id'], $level + 1);
            $result = array_merge($result, $child);
            }
        }
        return $result;
    }

    public function create(){
//        $checkLogin = $this->AuthLogin(['admin','manager']);
//        if(!$checkLogin){
//            return header('Location: login.php');
//        }

        return $this->view('backend.categories.create_form');
    }
    public function store(){
        $title = $_POST['title'];
        $parent_id = $_POST['parent_id'];
        $slug = $title;
        $slug = $this->convert_vi_to_en($slug);
        $slug = strtolower($slug);
        $slug = str_replace(" ","-",$slug);

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        $data = [
            'title' => $title,
            'parent_id' => $parent_id,
            'slug' => $slug,
            'created_at' => $date,
            'updated_at' => $date
        ];
        $this->categoryModel->store($data);
        return header('Location: admin.php?controller=category&action=get_list');
    }

    public function delete(){
        $checkLogin = $this->AuthLogin(['admin','manager']);
        if(!$checkLogin){
            return header('Location: login.php');
        }

        $id = $_GET['id'];

        $this->categoryModel->deleteOne($id);
        return header('Location: admin.php?controller=category&action=get_list&page=1');
    }

    // END ADMIN PAGE

    public function convert_vi_to_en($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
        $str = preg_replace("/(Đ)/", "D", $str);
        //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
        return $str;
    }

}