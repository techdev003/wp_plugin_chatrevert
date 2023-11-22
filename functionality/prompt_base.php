<?php

function prompt_base(){
    include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
    $categoaryArray = array();
    foreach($promptBaseArray as $key=>$promptBaseDataCategory){
        $explodepromptBaseDataCategory = explode(',',$promptBaseDataCategory['category']);
        for($i=0;$i<count($explodepromptBaseDataCategory);$i++){
            $categoaryArray[] =$explodepromptBaseDataCategory[$i];
        }
        
    }
    $categoryArrayUnique = array_unique($categoaryArray);

    ?>
     

    <div class="warpper">
        <input class="radio" id="expree-mode-content" name="group" type="radio" checked>
        <div class="tabs">
              <label class="tab" id="expree-mode-content-tab" for="expree-mode-content">PromptBase</label>
              
        </div>
      <div class="panels">
            <div class="panel-full-body-prompt">
                <div class="panel-left-side-prompt">
                        <div class="left-side-bar-heading">
                            <h5>Author</h5>
                            <ul>
                                <li><input type="checkbox" class="text-generator" value="gpt_ai_power">GPT AI Power</li>
                            </ul>
                        </div>
                        <div class="left-side-bar-heading">
                            <h5>Category</h5>
                            <ul>
                                <?php foreach($categoryArrayUnique as $key=>$value)
                                {
                                    ?>
                                <li><input type="checkbox" id="<?php echo $value;?>" class="category-check-box"><?php echo ucfirst($value);?></li>
                                <?php    
                                }
                                ?>
                                
                            </ul>
                        </div>
                </div>
                <div  id="ajax-right-panel">
                    
                </div>
            </div>
    </div>
</div>



<?php



}





?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
var data = {
                'action': 'my_prompt_content',
            };
                jQuery.post(ajaxurl, data, function(response) {
                    $("#ajax-right-panel").html(response);   
                        searchPrompt();
            });


            $(".category-check-box").change(function() {
                 var objectGranted = [];

                 $("#ajax-right-panel").empty();

                 $(".category-check-box").each(function() {
                     if ($(this).is(":checked")) {
                         objectGranted.push($(this).attr("id"));
                     } 
                 });


                 var categoryValues=Object.values(objectGranted);  
                 var data = {
                        'action': 'my_prompt_content_check_category',
                        'categoryValue': categoryValues,
                  };
                        jQuery.post(ajaxurl, data, function(response) {
                            $("#ajax-right-panel").html(response);
                            searchPrompt();
                        });
                });

                }) 
    function searchPrompt(){
        $("#search-prompt").click(function(){
                var searchValue = $("#search-value").val();
                if(searchValue==''){
                    alert('Please enter search value');
                    return false;
                }

                


        })
    } 

</script>
