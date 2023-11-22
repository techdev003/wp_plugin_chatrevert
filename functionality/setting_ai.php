
<?php
 function setting_ai(){
    include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
    ?>

     <div class="warpper">
            <input class="radio" id="upgrade-mode-content" name="group" type="radio" checked>
        <div class="tabs">
                <label class="tab" id="upgrade-mode-content-tab" for="upgrade-mode-content">Setting</label>
        </div>
      <div class="panels">
          <div class="panel" id="upgrade-mode-content-panel">
            <?php
                include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-setting.php');
            ?>

          
          </div>
      </div>
    </div>
<?php    
}
?>