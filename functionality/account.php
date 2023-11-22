<?php
function account(){
        include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
    ?>
    <div class="warpper">
            <input class="radio" id="upgrade-mode-content" name="group" type="radio" checked>
            <input class="radio" id="logs" name="group" type="radio">
        <div class="tabs">
                <label class="tab" id="upgrade-mode-content-tab" for="upgrade-mode-content">Account</label>
                <label class="tab" id="logs-tab" for="logs">Upgrade Account</label>
        </div>
      <div class="panels">
          <div class="panel" id="upgrade-mode-content-panel">
            <?php
                include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-user-info.php');
            ?>

          
          </div>

          <div class="panel" id="logs-panel">
               <div class="panel-area">
                        <div class="tab-data">
                            <input class="radio change-checked" plan="Monthly" id="monthly-mode-content" name="plan-change" type="radio" >
                            <input class="radio change-checked" plan="Yearly" id="yearly-mode-content" name="plan-change" type="radio" checked>
                            <input class="radio change-checked" plan="Lifetime" id="lifetime-mode-content" name="plan-change" type="radio">
                            <div class="tabs">
                                <label class="tab" id="monthly-mode-content-tab" for="monthly-mode-content">Monthly</label>
                                <label class="tab" id="yearly-mode-content-tab" for="yearly-mode-content">Yearly</label>
                                <label class="tab" id="lifetime-mode-content-tab" for="lifetime-mode-content">Lifetime</label>
                            </div>
                        </div>
               <div class="background">
                        <div class="container">
                        <div class="panel pricing-table">                        
                            <?php
                                    include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-free.php');
                            ?>

                            <?php
                                    include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-premium.php');
                            ?>
                        </div>
                        </div>
                        </div>
                </div>
          </div>
      </div>
    </div>
<?php    
}
include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){
            $.ajax({
               type:"GET",
               dataType: "json",
               url:"https://angry-darwin.62-151-180-40.plesk.page/openApi/api/plan",
               success:function(data)
               {
                  var plan =data.data;
                  console.log(plan);
                   var freePlan =data.data.free;
                   var premiumPlan = data.data.premium;
                   $.each( plan, function( key2, planName ) {    
                    console.log(key2);
                    if(key2 == 'free'){
                        $.each( planName, function( key, value ) {   
                            $("#free-feature").append('<li class="pricing-features-item"><?php echo $svgIcon;?>'+value+'</li>');
                        });
                    }

                    if(key2 == 'premium'){
                        $.each( planName, function( key, value ) {   
                            $("#premium-feature").append('<li class="pricing-features-item"><?php echo $svgIcon;?>'+value+'</li>');
                        });
                    }
                })

                
  
               
               }
            });
    });
</script>


<script>

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

$(document).ready(function() {
    var idValue;
    $('.audio-change-checked:radio').change(function() {
        idValue = $('input[type=radio][name=audio-change]:checked').attr('id');
        idValue = idValue+'-input';
        
        
        //console.log($("#file-data-id").find("select, textarea, input"));
        $("#file-data-id .generator-input-field-audio")
            .each(function () {
               var fileInput = this.id;
               if(idValue == fileInput ){
                $("#"+fileInput).css("display","block");
               }
               else{
                $("#"+fileInput).css("display","none");
               }

        });
        idValue='';

    });


    $('.change-checked:radio').change(function() {
        $("#span-pricing-header").text('');
        $("#span-pricing-price").text('');
        
        var planName = $('input[type=radio][name=plan-change]:checked').attr('plan');
            if(planName =="Monthly"){
                $("#span-pricing-header").text('Monthly');
                $("#span-pricing-price").text('$10');
            }    
            if(planName =="Yearly"){
                $("#span-pricing-header").text('Yearly');
                $("#span-pricing-price").text('$80');
            }
            if(planName =="Lifetime"){
                $("#span-pricing-header").text('Lifetime');
                $("#span-pricing-price").text('$200');
            }
});
});




</script>

