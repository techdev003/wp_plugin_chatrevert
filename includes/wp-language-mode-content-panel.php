<div class="panel-area-content"> 
    <label for="preview_textarea_original" id="language-mode">Enter Text</label>
    <textarea id="text"class="preview_textarea" name="_wporg_preview_texarea" rows="15" cols="50"></textarea>
    <label for="preview_textarea_translate" id="language-mode">Translate Text</label>
    <?php

                $custom_text_value='';
                wp_editor(
                    $custom_text_value,
                    'textarea-input-translate-language',  //Editor_ID
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
    <button onclick="translateLanguage()" class="generate-button">Translate Language</button>
</div>