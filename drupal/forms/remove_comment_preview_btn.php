<?php
/**
* Implementation of hook_form_alter
**/
function hook_form_alter(&$form, $form_state, $form_id) {
  if ($form_id = 'comment_form') {
    unset($form['preview']);
  }
}