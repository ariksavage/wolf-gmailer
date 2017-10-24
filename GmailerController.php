<?php

class GmailerController extends PluginController {
	function __construct() {
		AuthUser::load();
		if ( ! AuthUser::isLoggedIn()) {
			redirect(get_url('login'));
		}
		$this->setLayout('backend');
		$this->assignToLayout('sidebar', new View('../../plugins/gmailer/views/sidebar'));
	}
	function index() {
		$this->display('gmailer/views/index');
	}
	function settings() {
		$settings = Plugin::getAllSettings('gmailer');
		if (!$settings) {
			Flash::set('error', 'Gmailer - unable to retrieve plugin settings.');
			return;
		}
		$this->display('gmailer/views/settings', array('settings'=>$settings));
	}
	function savesettings(){
		$settings = Plugin::getAllSettings('gmailer');
		$settings['email'] = $_POST['email'];
		if ($_POST['pass1'] != '' && $_POST['pass1'] != null ){
			if ($_POST['pass1'] === $_POST['pass2']){
				$settings['password']=$_POST['pass1'];
			} else {
				Flash::set('error', 'Provided passwords do not match');
				redirect(get_url('plugin/gmailer/settings'));
			}
		}
		if (isset($_POST['from'])){
			$settings['fromname'] = $_POST['from'];
		}
		if ( Plugin::setAllSettings($settings, 'gmailer')){
			Flash::set('success', 'saved settings');
		} else {
			Flash:set('error', 'Could not save settings');
		}
		redirect(get_url('plugin/gmailer/settings'));
	}
}
