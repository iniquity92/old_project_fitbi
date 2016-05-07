<?php
if($priviledge_id==1 || $priviledge_id==2){
                
    $this->db->select('articles.id,articles.title,articles.summary,users.user_name,date(articles.draft_date) as 
    draft_date,articles.author');//add date and time stamp to the table
                
    $this->db->from('articles');
                
    $this->db->join('users','articles.author=users.user_id');
                
    if($by_author and $date_published==null){
                
                   
        $this->db->where('articles.author',$by_author);
                
    }
                
    else if($by_author=='all' and $date_published){
                    
        $this->db->where('date(articles.pub_date)=',$date_published);
                
    }
    $this->db->where('users.user_priviledge_id=',$priviledge_id); //change this to user_priviledge_id>$priviledge_id to see articles by all the users
    $query_articles = $this->db->get();
}
            //echo $query_articles;
else{
    $this->db->select('articles.id,articles.title,articles.summary,users.user_name,date(articles.pub_date) as pubs_date,articles.author');//add date and time stamp to the table:done
    $this->db->from('articles');
    $this->db->join('users','articles.author=users.user_id');
    $this->db->where('users.user_priviledge_id=',$priviledge_id);
    $query_articles = $this->db->get();
}
            
if($query_articles->num_rows()>0){
    foreach($query_articles->result_array() as $row){
        $data['articles'][$index]=array(
            'id'=>$row['id'],
            'title'=>$row['title'],
            'summary'=>$row['summary'],
            'author'=>$row['user_name'],
            'date'=>$row['draft_date'],
            'author_id'=>$row['author']
                        //'time'=>$row['time']
        );
        $index++;
    }     
}
else{
    $data['error']['articles']='Could not fetch articles';
}
?>            