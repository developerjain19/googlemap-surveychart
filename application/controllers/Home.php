<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Survey Australia";

        $this->load->view('home', $data);
    }


    public function user()
    {
        $data['title'] = "User Form";

        if (count($_POST) > 0) {

            $post = $this->input->post();

            $user_id = 1;
            $cour =  $_POST['course'];
            $post['user_code'] =  substr($post['fname'], 0, 3) . rand(9, 99999);
            $post['course'] = implode(',', $_POST['course']);

            $insert = $this->CommonModal->insertRowReturnId('user_form', $post);
            $this->session->set_userdata(array('fname' => $post['fname'], 'lname' => $post['lname'], 'user_code' =>  $post['user_code']));

            if (!empty($cour)) {
                for ($i = 0; $i < count($cour); $i++) {
                    if (!empty($cour[$i])) {

                        $data = array('user_id' => $insert, 'course' => $cour[$i]);

                        $this->CommonModal->insertRowReturnId('user_course', $data);
                    }
                }
            }
            $message = donormail($post['fname'],  $post['user_code']);

            sendmail($post['email'], 'Registered with Survey Australia | Welcome User', $message);





            if ($insert) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Your query is successfully submit. We will contact you as soon as possible.</div>');

                redirect(base_url('Home/thankyou'));
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">We are facing technical error ,please try again later or get in touch with Email ID provided in contact section.</div>');
            }
        } else {
        }

        $this->load->view('user', $data);
    }

    public function saveLocation()
    {
        extract($this->input->post());
        $array = array(
            'address' => $address,
            'latitude' => $latitude,
            'longitude' => $longitude,
        );
        $this->session->set_userdata($array);
        // echo $address;
    }



    public function thankyou()
    {

        $data['project_name'] = 'Sri Sai Prakritik ';
        $data['title'] = 'Thankyou - Survey Australia';
        $msg = '';
        $msg .= "<p>thankyou</p>";
        $msg = '';
        $msg .= "<h4>Your form has been submited successfully </h4>";
        $msg .= "<br/>";
        $msg .= "<br/>";
        // $msg .= "<a href='#'>Check Your Orders</a>";
        $data['message'] = $msg;
        $this->load->view('thankyou_msg', $data);
    }
}
