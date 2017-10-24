<?php

if (!defined('IN_CMS')) { exit(); }

Plugin::setInfos(array(
    'id'          => 'gmailer',
    'title'       => 'Gmailer',
    'description' => 'Send email via Gmail SMTP',
    'version'     => '1.0.0', 
    'author'      => 'Arik Savage'
    //'website'     => 'http://www.wolfcms.org/',
    //'update_url'  => 'http://www.wolfcms.org/plugin-versions.xml'
));

Plugin::addController('gmailer', null, 'admin_view', false);
require(dirname(__FILE__).'/gmailer.class.php');

function gmailer(){
  $settings = Plugin::getAllSettings('gmailer');
  if ($settings['email'] == null || $settings['email'] == ''){
    echo "You must provide a gmail account in the plugin settings";
  } else if ($settings['password'] == null || $settings['password'] == '') {
    echo "You must provide a gmail account password in the plugin settings";
  } else {
    $gmailer = new Gmailer(true, $settings['email'],$settings['password'], $settings['fromname']);
    return $gmailer;
  }
}