<?php
global $svgIcon;
global $svgMic;
global $freePlanArray;
global $upgradePlanArray;
global $languageDataArray;
global $ctaDataArray;
global $styleDataArray;
global $imageDataArray;
global $promptDataArray;
global $countPromptsValue;
global $modelArray;
global $current_user;
global $wpdb;
global $promptBaseArray;
global $iconsDataArray;
global $toneDataArray;
global $openAi;
global $secertkey;

wp_get_current_user();
$user_id = $current_user->ID;

$settingTable = $wpdb->prefix.'setting';
$settingData=$wpdb->get_results("SELECT * FROM `$settingTable` where user_id=$user_id",ARRAY_A);
$singleSettingArray = $settingData[0];



if(isset($singleSettingArray['api_key'])) 
 {
    $openAi = $singleSettingArray['api_key'];
 }
 else{
   $openAi = '';
 }

$accountTable = $wpdb->prefix.'account';
$usersTable = $wpdb->prefix.'users';
 $settingAccountInfo =$wpdb->get_results("SELECT * FROM `$usersTable` JOIN `$accountTable` ON $accountTable.`user_id`=$usersTable.`ID` where user_id=$user_id",ARRAY_A);
 $singleAccountArray = $settingAccountInfo[0];
 if(isset($singleAccountArray['secert_key'])){
    $secertkey = $singleAccountArray['secert_key'];
 }
 else{
   $secertkey = '';
 }

$apiUrl = "https://api.aiharness.io/api/";
//$apiUrl = "https://wadhwa-tech.com/openApi/api/"
//$apiUrl = "https://aiharness.io/openApi/api/"
 //$apiUrl = "https://angry-darwin.62-151-180-40.plesk.page/openApi/api";

 //"https://do-else.com/openApi/api/
?>