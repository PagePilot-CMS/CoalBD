<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;
use CodeIgniter\HTTP\RedirectResponse;

class Category extends BaseController
{

    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    private $module_name = 'Category';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->crop = \Config\Services::image();
        $this->permission = new Permission();
    }

    /**
     * @description This method provides Product category page view
     * @return RedirectResponse|void
     */
    public function index()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $table = DB()->table('cc_category');
            $data['category'] = $table->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Category/index', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    /**
     * @description This method provides create page view
     * @return RedirectResponse|void
     */
    public function create()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $table = DB()->table('cc_category');
            $data['category'] = $table->get()->getResult();

            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['create']) and $data['create'] == 1) {
                echo view('Admin/Category/create', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    /**
     * @description This method store product category
     * @return RedirectResponse
     */
    public function create_action()
    {
        $data['category_name'] = $this->request->getPost('category_name');
        $data['icon_id'] = !empty($this->request->getPost('icon_id')) ? $this->request->getPost('icon_id') : null;
        $data['parent_id'] = !empty($this->request->getPost('parent_id')) ? $this->request->getPost('parent_id') : null;
        $data['createdBy'] = $this->session->adUserId;

        $this->validation->setRules([
            'category_name' => ['label' => 'Category Name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('admin/category_create');
        } else {
            if (!empty($_FILES['image']['name'])) {
                $target_dir = FCPATH . '/uploads/category/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                //new image uplode
                $pic = $this->request->getFile('image');
                $namePic = $pic->getRandomName();
                $pic->move($target_dir, $namePic);
                $news_img = 'category_' . $pic->getName();
                $this->crop->withFile($target_dir . $namePic)->fit(166, 208, 'center')->save($target_dir . $news_img);
                unlink($target_dir . $namePic);
                $data['image'] = $news_img;
            }

            $table = DB()->table('cc_category');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('admin/category_create');
        }
    }

    /**
     * @description This method provides update page view
     * @param int $cat_id
     * @return RedirectResponse|void
     */
    public function update($cat_id)
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $table = DB()->table('cc_category');
            $data['category'] = $table->where('cat_id', $cat_id)->get()->getRow();

            $table2 = DB()->table('cc_category');
            $data['allcategory'] = $table2->where('cat_id !=', $cat_id)->get()->getResult();

            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['update']) and $data['update'] == 1) {
                echo view('Admin/Category/update', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    /**
     * @description This method update product category
     * @return RedirectResponse
     */
    public function update_action()
    {
        $cat_id = $this->request->getPost('cat_id');
        $popular = $this->request->getPost('popular');
        $data['category_name'] = $this->request->getPost('category_name');
        $data['icon_id'] = !empty($this->request->getPost('icon_id')) ? $this->request->getPost('icon_id') : null;
        $data['parent_id'] = !empty($this->request->getPost('parent_id')) ? $this->request->getPost('parent_id') : null;
        $data['description'] = $this->request->getPost('description');
        $data['updatedBy'] = $this->session->adUserId;

        $this->validation->setRules([
            'category_name' => ['label' => 'Category Name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('admin/category_update/' . $cat_id);
        } else {

            $checkPop = is_exists('cc_category_popular', 'cat_id', $cat_id);
            if ($popular == 'on') {
                if ($checkPop == true) {
                    $polulerData['cat_id'] = $cat_id;
                    $tabPoluler = DB()->table('cc_category_popular');
                    $tabPoluler->insert($polulerData);
                }
            } else {
                if ($checkPop == false) {
                    $tabPoluler = DB()->table('cc_category_popular');
                    $tabPoluler->where('cat_id', $cat_id)->delete();
                }
            }



            if (!empty($_FILES['image']['name'])) {
                $target_dir = FCPATH . '/uploads/category/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                //old image unlink
                $old_img = get_data_by_id('image', 'cc_category', 'cat_id', $cat_id);
                if (!empty($old_img)) {
                    $imgPath = $target_dir . $old_img;
                    if (file_exists($imgPath)) {
                        unlink($target_dir .  $old_img);
                    }
                }

                //new image uplode
                $pic = $this->request->getFile('image');
                $namePic = $pic->getRandomName();
                $pic->move($target_dir, $namePic);
                $news_img = 'category_' . $pic->getName();
                $this->crop->withFile($target_dir . $namePic)->fit(166, 208, 'center')->save($target_dir . $news_img);
                unlink($target_dir . $namePic);
                $data['image'] = $news_img;
            }

            $table = DB()->table('cc_category');
            $table->where('cat_id', $cat_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('admin/category_update/' . $cat_id);
        }
    }

    /**
     * @description This method update product category
     * @return RedirectResponse
     */
    public function update_action_others()
    {
        $cat_id = $this->request->getPost('cat_id');
        $data['meta_title'] = $this->request->getPost('meta_title');
        $data['meta_keyword'] = $this->request->getPost('meta_keyword');
        $data['meta_description'] = $this->request->getPost('meta_description');
        $data['sort_order'] = $this->request->getPost('sort_order');
        $data['header_menu'] = $this->request->getPost('header_menu');
        $data['side_menu'] = $this->request->getPost('side_menu');


        $data['updatedBy'] = $this->session->adUserId;

        $this->validation->setRules([
            'header_menu' => ['label' => 'Header Menu', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('admin/category_update/' . $cat_id);
        } else {

            $table = DB()->table('cc_category');
            $table->where('cat_id', $cat_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('admin/category_update/' . $cat_id);
        }
    }

    /**
     * @description This method delete product category
     * @param int $cat_id
     * @return RedirectResponse
     */
    public function delete($cat_id)
    {

        $target_dir = FCPATH . '/uploads/category/';
        //old image unlink
        $old_img = get_data_by_id('image', 'cc_category', 'cat_id', $cat_id);
        if (!empty($old_img)) {
            $imgPath = $target_dir . $old_img;
            if (file_exists($imgPath)) {
                unlink($target_dir . $old_img);
            }
        }

        $checkPopuCat = is_exists('cc_category_popular', 'cat_id', $cat_id);
        if ($checkPopuCat == false) {
            $tablePopuCat = DB()->table('cc_category_popular');
            $tablePopuCat->where('cat_id', $cat_id)->delete();
        }


        $table = DB()->table('cc_category');
        $table->where('cat_id', $cat_id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('admin/category');
    }

    /**
     * @description This method update product category
     * @return void
     */
    public function sort_update_action()
    {
        $cat_id = $this->request->getPost('cat_id');
        $value = $this->request->getPost('value');

        $data['sort_order'] = $value;

        $table = DB()->table('cc_category');
        $table->where('cat_id', $cat_id)->update($data);
        print '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }


}
