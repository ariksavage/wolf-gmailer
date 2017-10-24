<?php
if (!defined('IN_CMS')) { exit(); }

if (Plugin::deleteAllSettings('gmailer')) {
  Flash::set('success', 'Gmailer - '.__('uninstalled.'));
} else {
  Flash::set('error', 'Gmailer - '.__('unable to remove stored settings!'));
}
