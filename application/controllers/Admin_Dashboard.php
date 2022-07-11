<?php
defined('BASEPATH') or exit('no direct access allowed');

class Admin_Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (sessionId('admin_id') == "") {
            redirect(base_url());
        }
        date_default_timezone_set("Asia/Kolkata");
    }
    public function index()
    {
        $data['employee'] =  $this->CommonModal->runQuery("SELECT COUNT(`employed`) as employee , `employed` FROM `user_form` GROUP BY `employed`");

        $data['course'] =  $this->CommonModal->runQuery("SELECT COUNT(course) as cou , course FROM `user_course` GROUP BY course");

        // print_r($data['course']);
        // exit();


        $data['title'] = 'User Info';
        $this->load->view('admin/dashboard', $data);
    }


    public function dash()
    {
        $data['employee'] =  $this->CommonModal->runQuery("SELECT COUNT(`employed`) as employee , `employed` FROM `user_form` GROUP BY `employed`");

        $data['course'] =  $this->CommonModal->runQuery("SELECT COUNT(course) as cou , course FROM `user_course` GROUP BY course");

        // print_r($data['course']);
        // exit();


        $data['title'] = 'User Info';
        $this->load->view('admin/dash2', $data);
    }



    public function course()
    {

        $employed = $this->input->get('employed');
        $course = $this->input->get('course');
        $course = str_replace('-', ' ',  $course);

        if (isset($employed)) {

            $data['user'] =  $this->CommonModal->getRowByIdInOrder('user_form',   array('employed' => $employed), 'fid', 'desc');
        } else if (isset($course)) {
            $data['user'] =  $this->CommonModal->runQuery('SELECT * FROM `user_form` WHERE course LIKE "%' . trim($course) . '%" ORDER BY fid DESC ');
        } else {
            $data['user'] =  $this->CommonModal->getAllRowsInOrder('user_form',  'fid', 'desc');
        }
        $data['title'] = 'User Info';
        $this->load->view('admin/users', $data);
    }
}
