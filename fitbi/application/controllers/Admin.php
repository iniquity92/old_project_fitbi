<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('admin_model');
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->library('parser');
        }
        public function admin_login_page(){
            $this->load->view('admin');
        }
        public function admin_login(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $admin_user_information_array = $this->admin_model->verify_credentials_for_admin_user($username,$password,$email);
            
            if($admin_user_information_array['login_success_status']){
                $this->session->set_userdata($admin_user_information_array);
                redirect("/admin/dashboard");
            }
            else{
                redirect("/admin/admin_login_page");
            }
            
        }
        
       /* public function alternate_login(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $array = array($username,$password,$email);
            print_r($array);
            $result = $this->admin_model->fetch_contents_for($username,$email,$password);
            var_dump($result);

        }*/// just a test function, let it be here
        
        public function dashboard(){
            $priviledge_id = $this->session->userdata('priviledge_id');
            $priviledge_title = $this->session->userdata('priviledge_title');
            $if_logged_in = $this->session->userdata('login_success_status');
            
            if($if_logged_in==TRUE && $priviledge_id==2 && $priviledge_title='admin'){
                //$data = $this->admin_model->return_admin_dashboard_data($priviledge_id);
                $this->load_headers_footers();
               /* $this->load->view('dashboard_header');
                $this->load->view('dashboard_side_bar');
                $this->load->view('dashboard_main');
                $this->load->view('dashboard_footer');*/
            }
            
        }
        
       /* public function ($withcontent){
            $priviledge_id = $this->session->userdata('priviledge_id');
            switch($withcontent){
                case 'articles':
                    $data = $this->admin_model->return_admin_dashboard_articles($priviledge_id);
                   if(isset($data['error']['articles'])){
                       echo "Database could not be read".$data['error']['articles'];
                   }
                   else{
                        $html = '<table><tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Summary</th>
                            <th>Author</th>
                            <th>Date</th>
                        </tr>';
                        foreach ($data['articles'] as $article){
                            $html = $html.'<tr>
                                <td>'.$article['id'].'</td>
                                <td>'.$article['title'].'</td>
                                <td>'.$article['summary'].'</td>
                                <td>'.$article['author'].'</td>
                                <td>'.$article['date'].'</td>
                            </tr>';
                        }
                        $html = $html.'</table>';
                        echo $html;
                   }
                break;
                case 'users':
                    $data = $this->admin_model->return_admin_dashboard_users($priviledge_id);
                    if(isset($data['error']['users'])){
                        echo "Database could not be read".$data['error']['users'];
                    } 
                    else{
                        $html = '<table><tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Member since</th>
                        </tr>';
                        foreach ($data['users'] as $user){
                            $html = $html.'<tr>
                                <td>'.$user['id'].'</td>
                                <td>'.$user['name'].'</td>
                                <td>'.$user['email'].'</td>
                                <td>'.$user['role'].'</td>
                                <td>'.$user['member_since'].'</td>
                            </tr>';
                        }
                        $html = $html.'</table>';
                        echo $html;
                    }
                break;
                case 'media':
                    $data = $this->admin_model->return_admin_dashboard_media();
                    if(isset($data['error']['media'])){
                        echo "Database could not be read".$data['error']['media'];
                    }
                    else{
                        $html = '<table><tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Media Type</th>
                            <th>URL</th>
                            <th>Added On</th>
                        </tr>';
                        foreach ($data['media'] as $media){
                            $html = $html.'<tr>
                                <td>'.$media['media_id'].'</td>
                                <td>'.$media['media_name'].'</td>
                                <td>'.$media['media_type'].'</td>
                                <td>'.$media['media_url'].'</td>
                                <td>'.$media['media_added_on'].'</td>
                            </tr>';
                        }
                        $html = $html.'</table>';
                        echo $html;
                    }
                break;
                case 'comments':
                    $data = $this->admin_model->return_admin_dashboard_comments();
                    if(isset($data['error']['comments'])){
                        echo "Database could not be read".$data['error']['comments'];
                    } 
                    else{
                        $html = '<table><tr>
                            <th>Id</th>
                            <th>Comment</th>
                            <th>Comment By</th>
                            <th>Comment By Email</th>
                            <th>Comment Date</th>
                            <th>Article</th>
                        </tr>';
                        foreach ($data['comments'] as $comment){
                            $html = $html.'<tr>
                                <td>'.$comment['comment_id'].'</td>
                                <td>'.$comment['comment_body'].'</td>
                                <td>'.$comment['comment_user'].'</td>
                                <td>'.$comment['comment_user_email'].'</td>
                                <td>'.$comment['comment_date'].'</td>
                                <td>'.$comment['article'].'</td>
                            </tr>';
                        }
                        $html = $html.'</table>';
                        echo $html;
                    }
                break;
            }
        }*/
        public function get_posts($by_author=null,$date_published=null){
    
            $if_logged_in = $this->session->userdata('login_success_status');
            
            if(!$if_logged_in){
                redirect('/admin/admin_login_page');
            }
            else{
                include 'includes/posts.inc.php';
                $content['html']=$html;
                $this->load_headers_footers($content);
                
            }
        }
        
        public function get_users(){
            $if_logged_in = $this->session->userdata('login_success_status');
            
            if(!$if_logged_in){
                redirect('/admin/admin_login_page');
            }
            else{
                $this->load_headers_footers();
                
            }
        }
        
        public function get_media(){
            $if_logged_in = $this->session->userdata('login_success_status');
            
            if(!$if_logged_in){
                redirect('/admin/admin_login_page');
            }
            else{
                $this->load_headers_footers();
                
            }
        }
        
        public function get_comments(){
            $if_logged_in = $this->session->userdata('login_success_status');
            
            if(!$if_logged_in){
                redirect('/admin/admin_login_page');
            }
            else{
                $this->load_headers_footers();
            
            }
        }
        
        public function edit($request,$id){
            $if_logged_in = $this->session->userdata('login_success_status');
            if(!$if_logged_in){
                redirect('/admin/admin_login_page');
            }
            else{
                $data = $this->admin_model->get_by_id($request,$id);
                $form_data = array(
                    'action'=>site_url('admin/update_post'),
                    'submit_id'=>'update',
                    'submit_name'=>'update',
                    'submit_value'=>'Update'
                );
                include "includes/editor.inc.php";
                $content['html'] = $html;
                $this->load_headers_footers($content);
            }
        }
        
        public function update_post(){
            $if_logged_in = $this->session->userdata('login_success_status');
            if(!$if_logged_in){
                redirect('admin/admin_login_page');
            }
            else{
                $id = $this->input->post('article_id');
                $title = $this->input->post('title');
                $content = $this->input->post('editor');
                $keywords = $this->input->post('keywords');
                $description = $this->input->post('description');
                $categories = $this->input->post('categories');
                $tags = $this->input->post('tags');
                $publish_status = $this->input->post('publish_status');
                $date_of_publishing = $this->input->post('dop');
                
                //$category_list = join(',',$categories);
                //$tag_list = join(',',$tags);
                
                $to_update = array(
                    'id' => $id,
                    'title' => $title,
                    'content'=>$content,
                    'keywords'=>$keywords,
                    'description'=>$description,
                    'categories'=>$categories,
                    'tags'=>$tags,
                    'publish_status'=>$publish_status,
                    'date_of_publishing'=>$date_of_publishing
                );
                
               // $return_value_from_update_article_function = update_article_data($to_update);
                $this->admin_model->update_article_data($to_update);
                
                
              /*  echo $title."<br />";
                echo $content."<br />";
                echo $keywords."<br />";
                echo $description."<br />";
                echo $category_list."<br />";
                echo $tag_list."<br />";
                echo $publish_status."<br />";
                echo $date_of_publishing."<br />";*/
                
                
            }
        }
        
        
        ///////everything below this line put in a seperate helper file and then include that file//////
        public function load_headers_footers($data=null){
            
            $this->load->view('dashboard_header');
            $this->load->view('dashboard_side_bar');
            $this->load->view('dashboard_main',$data);
            //$this->load->view('dashboard_footer');
            
        }
        
    }
?>