<?php
defined('BASEPATH') or exit('No direct script access allowed');
    
    class Admin_model extends CI_Model{
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }
        public function verify_credentials_for_admin_user($username,$password,$email){
            
            $admin_user_information_array = array('login_success_status'=>'','username'=>'','password'=>'','message'=>'','priviledge_id'=>'','priviledge_title'=>'');
            
            $query = $this->db->get_where('users',array('user_name'=>$username,'user_email'=>$email));
            
            if($query->num_rows()==1){
        
                $row = $query->row();
                
                if(password_verify($password,$row->user_password)){
                    echo "password matches!";
                    $admin_user_information_array=array(
                        'login_success_status'=>TRUE,
                        'userid'=>"$row->user_id",
                        'username'=> "$row->user_name",
                        'password'=>"$row->user_password",
                        'priviledge_id'=>"$row->user_priviledge_id",
                        'priviledge_title'=>"$row->user_priviledge_title",
                        'message'=>'Login Successful!'
                    );
                    return $admin_user_information_array;
                }
                
                else{
                    $admin_user_information_array=array(
                        'login_success_status'=>FALSE,
                        'username'=>"$username",
                        'password'=>"$password",
                        'message'=>'Invalid username or password'
                    );
                    return $admin_user_information_array;
                }
                
            }
            
            else{
                $admin_user_information_array=array(
                    'login_success_status'=>FALSE,
                    'username'=> "$username",
                    'password'=>"$password",
                    'message'=>'You are not authorized to proceed'
                    
                );
                return $admin_user_information_array;
            }
        }
        
       /* public function fetch_contents_for($username,$email,$password){
            $result = array('username'=>'','email'=>'','password'=>'','priviledge'=>'','message'=>'');
            
            $query=$this->db->get_where('users',array('user_name'=>$username,'user_email'=>$email));
            if($query->num_rows()==1){
                $row = $query->row();
                if(password_verify($password,$row->user_password)){
                    echo "user verified";
                }
                else{
                    echo "Fuck off you imposter!";
                }
                $result = array('username'=>$row->user_name,'email'=>$row->user_email,'password'=>$row->user_password,'priviledge'=>$row->user_priviledge_title,'message'=>'fuck yeah!');
            }
            else{
                $result = array('username'=>'die!','email'=>'die!','password'=>'wrong','priviledge'=>'denied','message'=>'booyeah');
            }
            return $result;
        }*///alternate login test function in the model, let it be here
        
        public function return_admin_dashboard_articles($priviledge_id,$by_author=null,$date_published=null){
            $index = 0;
            $query_articles = null;
            //fetching list of articles
            include 'includes/posts_query.inc.php';
            return $data;
        }
        
        public function return_admin_dashboard_users($priviledge_id){//fetching list of users
            $this->db->select('users.user_id,users.user_name,users.user_email,users.user_priviledge_title,date(users.member_since) as mem_since');
            $this->db->from('users');
            $this->db->where('users.user_priviledge_id=',$priviledge_id);
            $query_users = $this->db->get();
            
            if($query_users->num_rows()>0){
                $index=0;
                foreach($query_users->result_array() as $row){
                    $data['users'][$index]=array(
                        'id'=>$row['user_id'],
                        'name'=>$row['user_name'],
                        'email'=>$row['user_email'],
                        'role'=>$row['user_priviledge_title'],
                        'member_since'=>$row['mem_since']
                    );
                    $index++;
                }
            }
            else{
                $data['error']['users']='No users to show';
            }
            $query_users->free_result();
            return $data;
        }
        
        public function return_admin_dashboard_media(){
            //fetching media 
            $this->db->select('media.media_id,media.media_name,media.media_type,media.media_url,date(media.media_added_on) as date_added_on'); //add date and time stamp to the table
            $this->db->from('media');
            $query_media = $this->db->get();
            
            if($query_media->num_rows()>0){
                $index=0;
                foreach($query_media->result_array() as $row){
                    $data['media'][$index]=array(
                        'media_id'=>$row['media_id'],
                        'media_name'=>$row['media_name'],
                        'media_type'=>$row['media_type'],
                        'media_url'=>$row['media_url'],
                        'media_added_on'=>$row['date_added_on']
                    );
                    $index++;
                }
            }
            else{
                $data['error']['media']="No media to fetch";
            }
            $query_media->free_result();
            return $data;
        }
            
        public function return_Admin_dashboard_comments(){
            //fetching comments
            $this->db->select('comments.comment_id,comments.comment_body,comments.commnet_user as comment_user,comments.comment_user_email,date(comments.comment_date) as comm_date,articles.title');//add the date and time stamp to the table
            $this->db->from('comments');
            $this->db->join('articles','comments.article_id=articles.id');
            $query_comments = $this->db->get();
            
            if($query_comments->num_rows()>0){
                $index=0;
                foreach($query_comments->result_array() as $row){
                    $data['comments'][$index]=array(
                        'comment_id'=>$row['comment_id'],
                        'comment_body'=>$row['comment_body'],
                        'comment_user'=>$row['comment_user'],
                        'comment_user_email'=>$row['comment_user_email'],
                        'comment_date'=>$row['comm_date'],
                        'article'=>$row['title']
                    );
                    $index++;
                }
            }
            else{
                $data['error']['comments']="No comment to fetch";
            }
            $query_comments->free_result();
            return $data;
       }
        
        public function count_new_items(){
            $data = array();
            $this->db->select('count(articles.id) as num_new_articles');
            $this->db->from('articles');
            $this->db->where(array('articles.if_article_new='=>true,'articles.if_article_accepted'=>false));
            $new_articles = $this->db->get();
            if($new_articles->num_rows()>0){
                $article_row = $new_articles->row_array();
                return $data['article']['count']=$article_row['num_new_articles'];
            }
            else{
                return $data['article']['error']="";
            }
        }
        
        public function get_by_id($request,$id){
            $query = null;
            $query_categories = null;
            $query_tags = null;
            $query_all_categories = null;
            $query_all_tags = null;
            $tags = null;
            $categories = null;
            switch($request){
                case 'articles':
                    
                    $this->db->select('articles.id,articles.title,articles.content,date(articles.draft_date) as draft_date,articles.keywords,articles.description,articles.publish_state');
                    $this->db->from('articles');
                    $this->db->where('articles.id',$id);
                    $query = $this->db->get();
                   // print_r($query->result_array());
                    
                    $this->db->select('categories.cat_title,categories.cat_id');
                    $this->db->from('categories');
                    $this->db->join('articles_categories','categories.cat_id=articles_categories.cat_id');
                    $this->db->join('articles','articles_categories.p_id=articles.id');
                    $this->db->where('articles.id=',$id);
                    $query_categories = $this->db->get();
                    //print_r($query_categories->result_array());
                    
                    $this->db->select('tags.tag_title,tags.tag_id');
                    $this->db->from('tags');
                    $this->db->join('articles_tags','articles_tags.tag_id=tags.tag_id');
                    $this->db->join('articles','articles_tags.p_id=articles.id');
                    $this->db->where('articles.id=',$id);
                    $query_tags = $this->db->get();
                    
                    $this->db->select('categories.cat_title,categories.cat_id');
                    $this->db->from('categories');
                    $query_all_categories = $this->db->get();
                    
                    $this->db->select('tags.tag_title,tags.tag_id');
                    $this->db->from('tags');
                    $query_all_tags = $this->db->get();
                   // print_r($query_all_tags->result_array());
                    
                    if($query->num_rows()==1){
                        $row = $query->row_array();
                        $data['articles']=array(
                            'id'=>$row['id'],
                            'title'=>$row['title'],
                            'content'=>$row['content'],
                            'date'=>$row['draft_date'],
                            'keywords'=>$row['keywords'],
                            'description'=>$row['description'],
                            'publish_state'=>$row['publish_state']
                        );
                    }
                    if($query_categories->num_rows()>0){
                        $index = 0;
                        //echo "inside if";
                        //echo "<br />";
                        //print_r($query_categories->result_array);
                        foreach($query_categories->result_array() as $row){
                            $categories['articles'][$index]=array(
                                'id'=>$row['cat_id'],
                                'title'=>$row['cat_title']
                            );
                            $index++;
                        }
                    }
                    //var_dump($categories);
                    if($query_all_categories->num_rows()>0){
                        $index = 0;
                        foreach($query_all_categories->result_array() as $row){
                            $categories['all'][$index]=array(
                                'id'=>$row['cat_id'],
                                'title'=>$row['cat_title']
                            );
                            $index++;
                        }
                    }
                    if($query_tags->num_rows()>0){
                        $index = 0;
                        foreach($query_tags->result_array() as $row){
                            $tags['articles'][$index]=array(
                                'id'=>$row['tag_id'],
                                'title'=>$row['tag_title']
                            );
                            $index++;
                        }
                    }
                    if($query_all_tags->num_rows()>0){
                        $index = 0;
                        foreach($query_all_tags->result_array() as $row){
                            $tags['all'][$index]=array(
                                'id'=>$row['tag_id'],
                                'title'=>$row['tag_title']
                            );
                            $index++;
                        }
                    }
                    //print_r($tags['all']);
            
                    $query->free_result();
                    $query_categories->free_result();
                    $query_tags->free_result();
                    $query_all_categories->free_result();
                    $query_all_tags->free_result();
                    break;
                    
            }
            
            return array($data,$tags,$categories);
        }
        
        public function update_article_data($to_update){
            $id = $to_update['id'];
            
            $flag = 1;
            /*$cat_length = count($to_update['categories']);
            $tag_length = count($to_update['tags']);*/
            try {            
                $table_articles= array(
                    'title'=>$to_update['title'],
                    'content'=>$to_update['content'],
                    'keywords'=>$to_update['keywords'],
                    'description'=>$to_update['description'],
                    'publish_state'=>$to_update['publish_status'],
                    'publish_date'=>$to_update['date_of_publishing']
                );
            
                $this->db->where('id',$id);
                $this->db->update('articles',$table_articles);
            
                $this->db->where('p_id',$id);
                $this->db->delete('articles_categories');
            
                foreach($to_update['categories'] as $category) {
                    $this->db->set('cat_id',$category);
                    $this->db->set('p_id',$id);
                    $this->db->insert('articles_categories');
                }
            
                $this->db->where('p_id',$id);
                $this->db->delete('articles_tags');
            
                foreach($to_update['tags'] as $tag) {
                    $this->db->set('tag_id',$tag);
                    $this->db->set('p_id',$id);
                    $this->db->insert('articles_tags');
                }
            }
            catch($err){
                $flag = 0;
                $error_string = $err . $this->db->error();
                return array($flag,$error_string);
            }
        }
            
            //$query_articles->free();
            //$query_users->free();
            //$query_media->free();
            //$query_comments->free();
            
            
}

?>