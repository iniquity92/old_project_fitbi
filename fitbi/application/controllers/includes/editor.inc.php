<?php
    $html = '
        <form id="editorform" name="editorform" class="form" action="'.$form_data['action'].'" method="post">
        <div id="tabs">
                <ul>
                <li><a href="#edit">Editor</a></li>
                <li><a href="#meta">Meta Content</a></li>
                <li><a href="#publish">Publisher</a></li>
                </ul>
            <div id="edit">
                 <input type="hidden" id="article_id" name="article_id" value="'.$data[0]['articles']['id'].'">
                 <label for="title">Title</label><br />
                 <input type="text" id="title" name="title" value="'.$data[0]['articles']['title'].'" class="input input-lg admin-input" size="55">
                 <br /><br />
                 <textarea id="editor" name="editor" name="editor" rows="20" cols="60">'.
                    $data[0]['articles']['content'].
            
                '</textarea>
                <br /><br />
                
                <script>
                    CKEDITOR.replace(\'editor\');
                </script>
        
            </div>
            <div id="meta">
                <label for="meta_keywords">Keywords<br />
                <input type="text" id="meta_keywords" name="meta_keywords" class="input input-lg admin-input" placeholder="Enter a comma separated list of keywords" size="50" value="'.$data[0]['articles']['keywords'].'">
                <br /><br />
                <label for="meta_description">Description<br />
                <textarea id="meta_description" name="meta_description" rows="5" cols="55">'.
                    $data[0]['articles']['description']
                .'</textarea>
                <br /><br />
                <label for="categories">Categories</label><br />
                <ul id="categories" class="list-group">
                ';
                    foreach($data[2]['all'] as $category_element){
                        if(in_array($category_element,$data[2]['articles'])){
                            $html.='<li class="list-group-item"><input type="checkbox" id="'.$category_element['title'].'" name="categories[]" value="'.$category_element['id'].'" checked>'.$category_element['title'].'</li>';
                        }
                        else{
                            $html.='<li class="list-group-item"><input type="checkbox" id="'.$category_element['title'].'" name="categories[]" value="'.$category_element['id'].'">'.$category_element['title'].'</li>';
                        }
                    }    
                
            $html .= '</ul>
            
            <br /><br />
             <label for="tags">Tags</label><br />
            <ul id="tags" class="list-group">';
                    foreach($data[1]['all'] as $tag_element){
                        if(in_array($tag_element,$data[1]['articles'])){
                            $html.='<li class="list-group-item"><input type="checkbox" id="'.$tag_element['title'].'" name="tags[]" value="'.$tag_element['id'].'" checked>'.$tag_element['title'].'</li>';
                        }
                        else{
                            $html.='<li class="list-group-item"><input type="checkbox" id="'.$tag_element['title'].'" name="tags[]" value="'.$tag_element['id'].'">'.$tag_element['title'].'</li>';
                        }
                    }    
            $html .= '</ul>
            <br /><br />
            </div>
            <div id="publish">
                    Status : 
                    <select id="publish-status" name="publish_status">';
                       switch($data[0]['articles']['publish_state']){
                           case 0:
                                $html .= '<option id="published" name="published" value="2">Published</option>
                                <option id="pending-review" name="pending-review" value="1">Pending Review</option>
                                <option id="draft" name="draft" value="0" selected>Draft</option>';
                               break;
                           case 1:
                                $html .= '<option id="published" name="published" value="2">Published</option>
                                <option id="pending-review" name="pending-review" value="1" selected>Pending Review</option>
                                <option id="draft" name="draft" value="0">Draft</option>';
                               break;
                           case 2:
                                $html .= '<option id="published" name="published" value="2" selected>Published</option>
                                <option id="pending-review" name="pending-review" value="1">Pending Review</option>
                                <option id="draft" name="draft" value="0">Draft</option>';
                               break;
                       }
                    $html .= '</select>
                    Date of publishing:
                    <input id="dop" name="dop" value="'.$data[0]['articles']['date'] .'" type="text">
            </div>
    </div>
    
    <input type="submit" class="btn btn-lg" id="'.$form_data['submit_id'].'" name="'.$form_data['submit_name'].'" value="'.$form_data['submit_value'].'">
    </form>

<script>
    $(function(){
        $("#tabs").tabs();
    });
    $(function(){
        $("#dop").datepicker({
            showOn : "button",
            buttonImage : "/fitbi/static/jui/images/calendar.gif",
            buttonText : "Select Date",
            dateFormat: "yy-mm-dd"
        });
    });
</script>
        ';
   /* echo "<br />";
    print_r($data);*/
    
?> 