<?php  
define('MY_CUSTOM_PLUGIN_DIR', plugin_dir_path(dirname( __FILE__ )));
$functionArray = array();
$languageDataJson = file_get_contents(MY_CUSTOM_PLUGIN_DIR.'json/language.json');
$languageDataArray = json_decode($languageDataJson, true);
$ctaDataJson = file_get_contents(MY_CUSTOM_PLUGIN_DIR.'json/cta-position.json');
$ctaDataArray = json_decode($ctaDataJson, true);
$styleDataJson = file_get_contents(MY_CUSTOM_PLUGIN_DIR.'json/style.json');
$styleDataArray = json_decode($styleDataJson, true);
$promptDataJson = file_get_contents(MY_CUSTOM_PLUGIN_DIR.'json/prompt.json');
$promptDataArray = json_decode($promptDataJson, true);
$countPromptsValue = count($promptDataArray['prompts']);
$imageDataJson = file_get_contents(MY_CUSTOM_PLUGIN_DIR.'json/image-size.json');
$imageDataArray = json_decode($imageDataJson, true);
$freePlanDataJson = file_get_contents(MY_CUSTOM_PLUGIN_DIR.'json/free-plan.json');
$freePlanArray = json_decode($freePlanDataJson, true);
$freePlanArray = $freePlanArray['free'];
$upgradePlanJson = file_get_contents(MY_CUSTOM_PLUGIN_DIR.'json/upgrade-plan.json');
$upgradePlanArray = json_decode($upgradePlanJson, true);
$upgradePlanArray = $upgradePlanArray['upgrade'];

$promptBaseJson = file_get_contents(MY_CUSTOM_PLUGIN_DIR.'json/promptbase.json');
$promptBaseArray = json_decode($promptBaseJson, true);


$styleDataJson = file_get_contents(MY_CUSTOM_PLUGIN_DIR.'json/style.json');
$styleDataArray = json_decode($styleDataJson, true);


$iconsDataJson = file_get_contents(MY_CUSTOM_PLUGIN_DIR.'json/icons.json');
$iconsDataArray = json_decode($iconsDataJson, true);
// echo "<pre>";
// print_r($iconsDataArray);
// echo "</pre>";

$toneDataJson = file_get_contents(MY_CUSTOM_PLUGIN_DIR.'json/tone.json');
$toneDataArray =  json_decode($toneDataJson,true);

$svgIcon = '<span class="svg-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" zoomAndPan="magnify" viewBox="0 0 30 30.000001" height="15" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><clipPath id="id1"><path d="M 2.328125 4.222656 L 27.734375 4.222656 L 27.734375 24.542969 L 2.328125 24.542969 Z M 2.328125 4.222656 " clip-rule="nonzero"/></clipPath></defs><g clip-path="url(#id1)"><path fill="rgb(13.729858%, 12.159729%, 12.548828%)" d="M 27.5 7.53125 L 24.464844 4.542969 C 24.15625 4.238281 23.65625 4.238281 23.347656 4.542969 L 11.035156 16.667969 L 6.824219 12.523438 C 6.527344 12.230469 6 12.230469 5.703125 12.523438 L 2.640625 15.539062 C 2.332031 15.84375 2.332031 16.335938 2.640625 16.640625 L 10.445312 24.324219 C 10.59375 24.472656 10.796875 24.554688 11.007812 24.554688 C 11.214844 24.554688 11.417969 24.472656 11.566406 24.324219 L 27.5 8.632812 C 27.648438 8.488281 27.734375 8.289062 27.734375 8.082031 C 27.734375 7.875 27.648438 7.679688 27.5 7.53125 Z M 27.5 7.53125 " fill-opacity="1" fill-rule="nonzero"/></g></svg></span>';
$svgMic =  '<span class="svg-icon"><svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mic" viewBox="0 0 16 16"> <path d="M3.5 6.5A.5.5 0 0 1 4 7v1a4 4 0 0 0 8 0V7a.5.5 0 0 1 1 0v1a5 5 0 0 1-4.5 4.975V15h3a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1h3v-2.025A5 5 0 0 1 3 8V7a.5.5 0 0 1 .5-.5z" fill="white"></path> <path d="M10 8a2 2 0 1 1-4 0V3a2 2 0 1 1 4 0v5zM8 0a3 3 0 0 0-3 3v5a3 3 0 0 0 6 0V3a3 3 0 0 0-3-3z" fill="white"></path> </svg></span>';


?>