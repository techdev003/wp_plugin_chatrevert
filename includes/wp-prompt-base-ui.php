<div class="loaderoverlay">
  <div class="loader-cv-spinner">
    <span class="loader-spinner"></span>
  </div>
</div>
<?php
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
<style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  z-index: 9999 !important; /* Sit on top */
  padding-top: unset !important; /* Location of the box */
  left:0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.my-modal-content {
    width: 70%;
    height: calc(100vh - 10em);
    margin-top: 3em;
    overflow-x: hidden;
    overflow-y: scroll
}
</style>
<!-- Google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


<div class="plugins-accounts-wrapper prompt-base-ui-wrapper">
    <div class="top-header">
        <h1>Prompt Base</h1>
        <span>Need Help? Watch our <a href="#">video tutorial.</a></span>
    </div>
    

    <div class="plugins-accounts-info">
        <div class="left-sec-wrap">
            <div class="logo-info">
                <div class="icon-info"><?php echo $iWhitelogo;?></div>
            </div>
            <ul>
                <li><a href="#" class="menu-link-info active" data-target="tabs-1">Prompt Base</a></li>
                <!-- <li><a href="#" class="menu-link-info" data-target="tabs-2">Logs</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-3">Settings</a></li> -->
               
              
            </ul>
        </div>


        
        <div class="right-sec-wrap">            
            <div class="main-content-wrap">
                <div class="main-content-info tabs active" data-tab="tabs-1">
                    <h3>Prompt Base</h3>                   
                        <div class="content-area-info single-content-area-info">
                            <div class="left-data-info">
                            <div class="panels">
                                <div class="panel-full-body-prompt">
                                    <div class="panel-left-side-prompt">
                                            <!-- <div class="left-side-bar-heading">
                                                <h5>Author</h5>
                                                <ul>
                                                    <li><input type="checkbox" class="text-generator" value="gpt_ai_power">GPT AI Power</li>
                                                </ul>
                                            </div> -->
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
                            <div class="right-data-info empty-data-info">                         
                            </div>                            
                        </div>                         
                                        
                </div>
                <!-- <div class="main-content-info tabs" data-tab="tabs-2">
                    <h3>Logs</h3>
                    <div class="content-area-info single-content-area-info">
                            <div class="left-data-info search-data-wrap">                               
                                                                   
                                    <div class="input-data full-wid">                                        
                                        <div class="input-info">
                                            <span>Search</span>
                                            <input type="text" id="" name="0" value="">
                                            
                                        </div>
                                    </div>                                                       
                                  
                                <div class="save-cta-info search-cta-info">
                                    <a href="#">Search</a>
                                </div>                                                                              
                                
                            </div>
                            <div class="right-data-info empty-data-info">

                                

                            </div>                                                   
                      </div>
                      <div class="full-wid-content-area-info log-datatable-wrap">
                            <div class="full-wid-data-info">
                                <div class="log-datatable-info">
                                    <table>
                                        <tbody><tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Duration</th>
                                            <th>Token</th>
                                            <th>Estimated</th>
                                            <th>Model</th>
                                            <th>Author</th>
                                            <th>Source</th>
                                            <th>Category</th>
                                            <th>Word Count</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>
                                            <td>6</td>
                                            <td>7</td>
                                            <td>8</td>
                                            <td>9</td>
                                            <td>10</td>
                                            <td>11</td>
                                        </tr>
                                        
                                        </tbody></table>   
                                    </div>                   
                            </div>

                        </div>
                        
                    

                  </div>    
                  
                  
                  <div class="main-content-info tabs" data-tab="tabs-3">
                    <h3>Settings</h3> 
                  </div>  -->
            </div>
        </div>
    </div>
</div>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content my-modal-content ">
    <span class="close">&times;</span>
        <div class="header">
            <div class="modal_img">
                    <span id="img_span">
                        imag here
                    </span>

            </div>    
            <div class="modal_title">
                    <span id="title_span">
                        Title here 
                    </span>
            </div> 
        </div>
        <hr>
        <div class="content-area">
                <div class="content-area-left-part">
                    <div class="content-area-left">
                        <div class="label-left">
                            <label for="Prompt">Prompt:</label>
                        </div>
                        <div class="label-left-text">
                            <textarea name=""  id="prompt" class="form-control" rows="5" style="width:100%"></textarea>
                        </div>
                    </div>
                    <div class="content-area-left">
                        <div class="label-left">
                            <label for="Prompt">Output:</label>
                        </div>
                        <div class="label-left-text">
                        <?php
                            $custom_text_value='';
                                        wp_editor(
                                            $custom_text_value,
                                            'myTextArea',  //Editor_ID
                                            array(
                                                'textarea_name' => '_wporg_preview_texarea',
                                                'editor_height' => 300,
                                                'media_buttons' => true, 
                                                'wpautop' => false, 
                                                'quicktags' => true,
                                                'tinymce'=> true, // Textarea box// Textarea box
                                                'textarea_class'=>'preview_textarea'
                                            )
                                        );
                        ?>
                        </div>
                    </div>
                </div>
                <div class="content-area-right-part">
                    <h5>Setting</h5>
                    <div class="content-area-right">
                            <div class="label-right">
                                    <label for="engine">Engine:</label>
                            </div>
                            <div class="label-right-text">
                                <input type="text" id="engine">
                            </div>
                    </div>
                    <div class="content-area-right">
                            <div class="label-right">
                                    <label for="max_tokens">Max Tokens:</label>
                            </div>
                            <div class="label-right-text">
                                <input type="text" id="max_tokens">
                            </div>
                    </div>
                    <div class="content-area-right">
                            <div class="label-right">
                                    <label for="temperature">Temperature:</label>
                            </div>
                            <div class="label-right-text">
                                <input type="text" id="temperature">
                            </div>
                    </div>
                    <div class="content-area-right">
                            <div class="label-right">
                                    <label for="top_p">Top Of:</label>
                            </div>
                            <div class="label-right-text">
                                <input type="text" id="top_p">
                            </div>
                    </div>
                    <div class="content-area-right">
                            <div class="label-right">
                                    <label for="best_of">Best Of:</label>
                            </div>
                            <div class="label-right-text">
                                <input type="text" id="best_of">
                            </div>
                    </div>
                    <div class="content-area-right">
                            <div class="label-right">
                                    <label for="frequency_penalty">Frequency Penalty:</label>
                            </div>
                            <div class="label-right-text">
                                <input type="text" id="frequency_penalty">
                            </div>
                    </div>
                    <div class="content-area-right">
                            <div class="label-right">
                                    <label for="presence_penalty">Presence Penalty:</label>
                            </div>
                            <div class="label-right-text">
                                <input type="text" id="presence_penalty">
                            </div>
                    </div>
                </div>
       
        </div>
`    <button id="generatePromptBase"  class="btn-primary-info" > Generate </button>
  </div>
</div>

<!-- Trigger/Open The Modal -->
<button id="myBtn">Open Modal</button>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script type="text/javascript">
    $('.menu-link-info').on('click', function(e) {
      e.preventDefault();
      $('.menu-link-info').removeClass('active');
      $(this).addClass('active');
      $('.tabs').removeClass('active');
      var tabID = $(this).attr('data-target');
      $('.tabs[data-tab="' + tabID + '"]').addClass('active');
    });
</script>


<script>
$(document).ready(function(){
 
function getPrompt(){
  $(".loaderoverlay").fadeIn(300);

  $.ajax({
  url: "<?php echo $apiUrl;?>get-prompt",
  type: 'Get',
  beforeSend: function (xhr) {  
              xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
              xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
              
                        },
  dataType:'json'
    }).done(function(response){
      setTimeout(function(){
        $(".loaderoverlay").fadeOut(300);
      },500);
     
      if(response.result=='Success'){
        var dataPrompt = response.data;
        

         var data = {
                         'action': 'my_prompt_content',
                         'promptData': dataPrompt
                     };
                         jQuery.post(ajaxurl, data, function(response) {
                             $("#ajax-right-panel").html(response);   
                             promptBaseId();
                                 
                     });
        
      }
      else if(response.result=='Failure'){
        alert("Something Went Wrong!!")
      }
 
    }).fail(function(jqXHR, textStatus, errorThrown){
      alert('FAILED! ERROR: ' + errorThrown);
    });
}   
getPrompt();

    $(".category-check-box").change(function() {

                 var objectGranted = [];

                 $("#ajax-right-panel").empty();
                 $(".loaderoverlay").fadeIn(300);

                 $(".category-check-box").each(function() {
                     if ($(this).is(":checked")) {
                         objectGranted.push($(this).attr("id"));
                     } 
                 });     
                 objectGranted =  JSON.stringify(objectGranted);
                 objectGranted = objectGranted.substring(1, objectGranted.length-1);

                 objectGranted = objectGranted.replace(/['"]/g, '')

                 $.ajax({
                    url: "<?php echo $apiUrl;?>check-box-filter",
                    type: 'Post',
                    beforeSend: function (xhr) {  
                                xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
                                xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
                                xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
                                xhr.setRequestHeader( "Access-Control-Allow-Methods", "GET,PUT,POST,DELETE,PATCH,OPTIONS");
                                            },
                    dataType:'json',
                    data: {'category': objectGranted}
                      }).done(function(response){
                        setTimeout(function(){
                          $(".loaderoverlay").fadeOut(300);
                        },500);
                        if(response.result=='Success'){
                          
                   
                            var dataPrompt = response.data;
                            var data = {
                                    'action': 'my_prompt_content',
                                    'promptData': dataPrompt
                                };
                         jQuery.post(ajaxurl, data, function(response) {
                             $("#ajax-right-panel").html(response);   
                             promptBaseId();

                                 
                     })
                                   
                        }
                        else if(response.result=='Failure'){
                          alert("Something Went Wrong!!")
                        }
                    
                      }).fail(function(jqXHR, textStatus, errorThrown){
                        getPrompt();
                      });
                                   
                 
           });
 
});


function searchPrompt(){

   
  var searchkeyword = $("#search").val();
  if(searchkeyword == ""){
    alert("Please enter search keyword");
    return false;
  }
  $(".loaderoverlay").fadeIn(300);
  
  $.ajax({
                    url: "<?php echo $apiUrl;?>search-prompt",
                    type: 'Post',
                    beforeSend: function (xhr) {  
                                xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
                                xhr.setRequestHeader("openai", "<?php echo $openAi;?>");

                                
                                
                                            },
                    dataType:'json',
                    data: {'searchkeyword': searchkeyword}
                      }).done(function(response){
                        setTimeout(function(){
                          $(".loaderoverlay").fadeOut(300);
                        },500);
                        if(response.result=='Success'){
                            $("#ajax-right-panel").empty();
                            var dataPrompt = response.data;
                            var data = {
                                    'action': 'my_prompt_content',
                                    'promptData': dataPrompt
                                };
                         jQuery.post(ajaxurl, data, function(response) {
                             $("#ajax-right-panel").html(response);   
                             promptBaseId();
                                 
                     });
                                   
                        }
                        else if(response.result=='Failure'){
                          alert("Something Went Wrong!!")
                        }
                    
                      }).fail(function(jqXHR, textStatus, errorThrown){
                        alert('FAILED! ERROR: ' + errorThrown);
                      });


}

function promptBaseId(){

        $(".promptBaseId").click(function(){
            $("#title_span").empty();
            $("#img_span").empty();
            $("#prompt").val('');
            $("#engine").val('');
            $("#max_tokens").val('');
            $("#temperature").val('');
            $("#frequency_penalty").val('');
            $("#presence_penalty").val('');
            $("#top_p").val('');
            $("#best_of").val('');
            var  id = $(this).attr("attrId");
            $(".loaderoverlay").fadeIn(300);
            $.ajax({
                    url: "<?php echo $apiUrl;?>search-by-id",
                    type: 'Post',
                    beforeSend: function (xhr) {  
                                xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
                                xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
                                xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
                                xhr.setRequestHeader( "Access-Control-Allow-Methods", "GET,PUT,POST,DELETE,PATCH,OPTIONS");
   
                                            },
                    dataType:'json',
                    data: {'id': id}
                      }).done(function(response){
                        setTimeout(function(){
                          $(".loaderoverlay").fadeOut(300);
                        },500);
                        if(response.result=='Success'){
                            $("#title_span").text(response.data.response[0].title);
                            $("#img_span").html(response.data.response[0].icon_svg);
                            $("#prompt").val(response.data.response[0].prompt);
                            $("#engine").val('text-davinci-003');
                            $("#top_p").val('1');
                            $("#best_of").val('1');
                            $("#max_tokens").val(response.data.response[0].max_tokens)
                            $("#temperature").val(response.data.response[0].temperature);
                            $("#frequency_penalty").val(response.data.response[0].frequency_penalty);
                            $("#presence_penalty").val(response.data.response[0].presence_penalty);
                            $("#myBtn").trigger('click');
                        }
                        else if(response.result=='Failure'){
                          alert("Something Went Wrong!!")
                        }
                    
                      }).fail(function(jqXHR, textStatus, errorThrown){
                        alert('FAILED! ERROR: ' + errorThrown);
                      });
        })
}

                

                 

</script>


<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


<script>
    $("#generatePromptBase").click(function(){

        var prompt              =     $("#prompt").val();
        var engine              =     $("#engine").val();
        var max_tokens          =     $("#max_tokens").val()
        var temperature         =     $("#temperature").val();
        var frequency_penalty   =     $("#frequency_penalty").val();
        var presence_penalty    =     $("#presence_penalty").val();
        var top_p             =     $("#top_p").val();
        var best_of              =     $("#best_of").val();

        if(prompt == '' || engine == '' || max_tokens == '' || temperature == '' || frequency_penalty == '' || presence_penalty =='' || top_p=="" || best_of==""){
            alert("All fields are required.");
            return false;
        }
        $(".loaderoverlay").fadeIn(300);
        $.ajax({
                    url: "<?php echo $apiUrl;?>prompt-base",
                    type: 'Post',
                    beforeSend: function (xhr) {  
                                xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
                                xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
                                xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
                                xhr.setRequestHeader( "Access-Control-Allow-Methods", "GET,PUT,POST,DELETE,PATCH,OPTIONS");
                                            },
                    dataType:'json',
                    data: {'prompt': prompt,'model':engine,'maxtoken':max_tokens,'temperature':temperature,
                    "frequency_penalty":frequency_penalty,"presence_penalty":presence_penalty,"top_p":top_p,"best_of":best_of}
                      }).done(function(response){
                        setTimeout(function(){
                          $(".loaderoverlay").fadeOut(300);
                        },500);
                        
                        if(response.result=='Success'){
                            tinymce.get("myTextArea").setContent(response.data.choices[0].text);
                        }
                        else if(response.result=='Failure'){
                          alert("Something Went Wrong!!")
                        }
                    
                      }).fail(function(jqXHR, textStatus, errorThrown){
                        alert('FAILED! ERROR: ' + errorThrown);
            });


    })
</script>




