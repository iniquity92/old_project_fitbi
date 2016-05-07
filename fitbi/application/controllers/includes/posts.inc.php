<?php 
    $html = null;
    $priviledge_id = $this->session->userdata('priviledge_id');
                
    if($by_author != null and $date_published == null){
        $data = $this->admin_model->return_admin_dashboard_articles($priviledge_id,$by_author);
    }
                
    else if($by_author == 'all' and $date_published != null){
        $data = $this->admin_model->return_admin_dashboard_articles($priviledge_id,$by_author,$date_published);
    }
                
    else{
        $data = $this->admin_model->return_admin_dashboard_articles($priviledge_id);
    }
                
    if(isset($data['error']['articles'])){
       $html =  '<p>'.$data['error']['articles'].'</p>';
    }
                
    else{
        $html = '<table class="table table-hover table-bordered">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Summary</th>
            <th>Author</th>
            <th>Date Published</th>
            </tr>';
            foreach ($data['articles'] as $article){
                $html .= '<tr>
                    <td><input class="checkbox" type="checkbox" name="articles" value="'.$article['id'].'"></td>
                    <td><a href="'.site_url('admin/edit/articles/'.$article['id']).'">'.$article['title'].'</a></td>
                    <td>'.$article['summary'].'</td>
                    <td><a href="'.site_url('admin/get_posts/'.$article['author_id']).'">'.$article['author'].'</a></td>
                    <td><a href="'.site_url('admin/get_posts/all/'.$article['date']).'">'.$article['date'].'</a></td>
                    </tr>';
            }
            $html .= '</table>';
    }
?>