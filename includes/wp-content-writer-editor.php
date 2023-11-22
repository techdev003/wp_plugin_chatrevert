<div class="panel-area">
    <div class="input-label-prompt-play">
            <label for="prompt">Title</label>
            <input type="text" id="text-input-generator-play"  value="">
    </div>
    <div class="input-label-prompt-play">
            <?php
                $custom_text_value='';

                wp_editor(
                    $custom_text_value,
                    'textarea-input-generator-result',  //Editor_ID
                    array(
                        'textarea_name' => '_wporg_preview_texarea',
                        'editor_height' => 300,
                        'media_buttons' => true, 
                        'wpautop' => false, 
                        'quicktags' => true,
                        'tinymce'=> true // Textarea box// Textarea box
                    )
                );
            
            ?>
    </div>        
    
    
</div>


<button class="saveAsPagePostPublish" pagePostAttr="post"  class="generate-button">Publish as Post</button>
<button class="saveAsPagePostPublish" pagePostAttr="page"  class="generate-button">Publish as Page</button>

<script>
    $(".saveAsPagePostPublish").click(function(){
    var attrValuePagePost = $(this).attr('pagePostAttr');
        
    
        var     attrValue             =   attrValuePagePost;
        var     post_page_title       =   $("#text-input-generator-play").val();
        var     post_page_content     =   $("#textarea-input-generator-result").val();
        var     author                =   $("#author").val();
        
    
        if(post_page_title == ''){
            alert('Title can not empty');
            return false;
        }

        if(post_page_content == ''){
            alert("Content Can not empty");
            return false;
        }

        var data = {
                        'action': 'my_content_post_page',
                        'attrValue':attrValue,
                        'post_page_title': post_page_title,
                        'post_page_content':post_page_content
                    };
        jQuery.post(ajaxurl, data, function(response) {
            var responseJsonData =jQuery.parseJSON(response);
            console.log(responseJsonData.result);
                if(responseJsonData.result == 'Success'){
                     
                    alert("Your Post Publish Succesfully");
                }
                else if(responseJsonData.result=='Failure')
            {
                        alert("Something Went Wrong!!");
            }   
            });
});
</script>