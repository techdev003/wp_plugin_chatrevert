<div class="panel-area">
    <div class="input-label-prompt-play">
            <label for="prompt">Enter your prompt</label>
            <input type="text" id="text-input-generator-play"  value="Write a product description about: Training Socks.">
            <button id="generatePlayGround" class="generate-button">Generate Text</button>
    </div>
    <div class="input-label-prompt-play">
            <label id="result" for="textarea-input-generator-result">Result</label>
            <textarea id="textarea-input-generator-playground" class="text-generator" cols="65" rows="10"></textarea>

        
    </div>
    <button class="saveAsPagePostPublish" pagePostAttr="post"  class="generate-button">Publish as Post</button>
    <button class="saveAsPagePostPublish" pagePostAttr="page"  class="generate-button">Publish as Page</button>     
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(".saveAsPagePostPublish").click(function(){
    var attrValuePagePost = $(this).attr('pagePostAttr');
        
    
        var     attrValue             =   attrValuePagePost;
        var     post_page_title       =   $("#text-input-generator-play").val();
        var     post_page_content     =   $("#textarea-input-generator-playground").val();
        
    
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