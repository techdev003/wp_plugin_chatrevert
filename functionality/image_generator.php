
<?php

function image_generator(){
  
        include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
    ?>
    <div class="warpper">
          <input class="radio" id="image-mode-content" name="group" type="radio" checked>
          <!-- <input class="radio" id="edit-image-mode-content" name="group" type="radio">
          <input class="radio" id="variation-image-mode-content" name="group" type="radio"> -->
          <!-- <input class="radio" id="log-image-mode-content" name="group" type="radio"> -->
        <div class="tabs">
              <label class="tab" id="image-mode-content-tab" for="image-mode-content">Generate Image</label>
              <!-- <label class="tab" id="edit-image-mode-content-tab" for="edit-image-mode-content">Edit Image</label>
              <label class="tab" id="variation-image-mode-content-tab" for="variation-image-mode-content">Image Variation</label> -->
              <!-- <label class="tab" id="log-image-mode-content-tab" for="log-image-mode-content">Log</label> -->
        </div>
      <div class="panels">
        <?php
            include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-image-mode-content-panel.php');
            // include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-edit-image-mode-content-panel.php');
            // include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-variation-image-mode-content-panel.php');
            include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-log-image-mode-content-panel.php');
        ?>

         

    </div>  
</div>
<?php    
}
?>
  <?php
  include (MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
  ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#supriseMe").click(function(){
    $("#image_title").val('');
        $.getJSON( "http://localhost/custom-chat-gpt/wp-content/plugins/chat-gpt/json/prompt.json", function(data) {
          const totalNumberOfElement = (data.prompts).length;
          const startNumberOfElement = 1;
          var randomNumberSelection = Math.floor(Math.random() * (totalNumberOfElement - startNumberOfElement + 1) + startNumberOfElement)
          $("#image_title").val(data.prompts[--randomNumberSelection]);
      });
  })
})
</script>
<script>
    function generateImage(){
    var prompt = $("#image_title").val();
    var n = parseInt($("#no_of_images").val());
    var size = $("#image_size").val();
    
    if(image_title == ''){
        alert("Enter Image Title");
        return false;
    }
    $('#display-box').empty();
    $.ajax({
    url: "http://localhost/openApi/api/generate-image",
    type: 'POST',
    beforeSend: function (xhr) {  
              xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
              xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
						},
    dataType:'json',
    data: {'prompt': prompt,'n':n,'size':size}
    }).done(function(response){
      var appendImage='';
      if(response.result=='Success'){
        var images = response.data.data;
           $.each(images, function( index, value ) {
            appendImage += '<div class="img-panel"><input type="checkbox">'+
                '<img class="img" src="'+value.url+'" alt="">'+
           '</div><a href="'+value.url+'" target="_blank" download t>'+
           'download</a>';
        });   
        $("#display-box").append(appendImage);

      }
      else if(response.result=='Failure'){
        alert("Something Went Wrong!!")
      }
 
    }).fail(function(jqXHR, textStatus, errorThrown){
      alert('FAILED! ERROR: ' + errorThrown);
    });
}










$(document).ready(function() {
$('.section-title').click(function(e) {
    // Get current link value
    var currentLink = $(this).attr('href');
    if($(e.target).is('.active')) {
    	close_section();
    }else {
    	close_section();
    // Add active class to section title
    $(this).addClass('active');
    // Display the hidden content
    $('.accordion ' + currentLink).slideDown(350).addClass('open');
    }
e.preventDefault();
});
	
function close_section() {
    $('.accordion .section-title').removeClass('active');
    $('.accordion .section-content').removeClass('open').slideUp(350);
}



	
});

</script>