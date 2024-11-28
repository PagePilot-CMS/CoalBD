<?php

namespace App\Controllers;

class Home extends BaseController {

    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    /**
     * @description This method provides home page view
     * @return void
     */
    public function index(){
        $settings = get_settings();
        $theme = $settings['Theme'];
        $data['theme']= $this->$theme();

        $table = DB()->table('cc_blog');
        $data['blogArray'] = $table->where('status','1')->get()->getResult();

        $tableBan = DB()->table('cc_blog');
        $data['blogBan'] = $tableBan->where('status','1')->orderBy('blog_id','DESC')->limit(2)->get()->getResult();

        $tableFeat = DB()->table('cc_blog');
        $data['featured'] = $tableFeat->where('status','1')->where('cat_id','3')->get()->getResult();

        $tableBus = DB()->table('cc_blog');
        $data['business'] = $tableBus->where('status','1')->where('cat_id','4')->get()->getResult();

        $tableTec = DB()->table('cc_blog');
        $data['technology'] = $tableTec->where('status','1')->where('cat_id','5')->get()->getResult();

        $tableEnt = DB()->table('cc_blog');
        $data['entertainment'] = $tableEnt->where('status','1')->where('cat_id','6')->get()->getResult();

        $tableSpo = DB()->table('cc_blog');
        $data['sports'] = $tableSpo->where('status','1')->where('cat_id','7')->get()->getResult();

        $tablePop = DB()->table('cc_blog');
        $data['popular'] = $tablePop->where('status','1')->where('cat_id','8')->limit(2)->get()->getResult();

        $tableTra = DB()->table('cc_blog');
        $data['tranding'] = $tableTra->where('status','1')->where('cat_id','9')->limit(5)->get()->getResult();

        $tableLat = DB()->table('cc_blog');
        $data['latest'] = $tableLat->where('status','1')->where('cat_id','10')->limit(2)->get()->getResult();

        $data['home_menu'] = true;
        $data['theme'] = $theme;

        $data['keywords'] = $settings['meta_keyword'];
        $data['description'] = $settings['meta_description'];
        $data['title'] = !empty($settings['meta_title'])?$settings['meta_title']:$settings['store_name'];

        echo view('Theme/'.$settings['Theme'].'/header',$data);
        echo view('Theme/'.$settings['Theme'].'/Home/index',$data);
        echo view('Theme/'.$settings['Theme'].'/footer');
    }

    /**
     * @description This method provides default theme function
     * @return array
     */
    private function Default(){
        $theme_settings = get_theme_settings();
        $data = '';

        return $data;
    }

    public function detail($blog_id){
        $settings = get_settings();
        $theme = $settings['Theme'];
        $data['theme']= $this->$theme();

        $table = DB()->table('cc_blog');
        $data['blog'] = $table->where('blog_id',$blog_id)->get()->getRow();

        $tableTra = DB()->table('cc_blog');
        $data['tranding'] = $tableTra->where('status','1')->where('cat_id','9')->limit(5)->get()->getResult();

        $data['home_menu'] = true;
        $data['theme'] = $theme;

        $data['keywords'] = $settings['meta_keyword'];
        $data['description'] = $settings['meta_description'];
        $data['title'] = !empty($settings['meta_title'])?$settings['meta_title']:$settings['store_name'];

        echo view('Theme/'.$settings['Theme'].'/header',$data);
        echo view('Theme/'.$settings['Theme'].'/Home/detail',$data);
        echo view('Theme/'.$settings['Theme'].'/footer');
    }

    /**
     * @description This method provides user subscription store
     * @return void
     */
    public function user_subscribe(){
        $email = $this->request->getPost('email');

        if (!empty($email)){
            if(is_exists('cc_newsletter','email',$email) == true) {
                $newData['email'] = $email;
                $newAd = DB()->table('cc_newsletter');
                $newAd->insert($newData);

                print "Thank you.Your subscription has been successfully completed";

                $subject = 'Subscription';
                $message = "Thank you.Your subscription has been successfully completed";
//            email_send($email,$subject,$message);
            }else{
                print 'Your email already exists';
            }
        }else{
            print 'Email required';
        }
    }


}
