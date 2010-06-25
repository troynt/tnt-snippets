<?php
/**
 * Implementation of hook_form_alter().
 */
function hook_form_alter(&$form, $form_state, $form_id) {
  //hide revision information for all content types
  if( isset($form['revision_information']) ) {
    $form['revision_information']['#access'] = FALSE;
  }

  //hide comment settings for all content types
  if( isset($form['comment_settings']) ) {
    $form['comment_settings']['#access'] = FALSE;
  }

  //hide split teaser checkbox for all content types
  if( isset($form['body_field']['teaser_include']) ) {
    $form['body_field']['teaser_include']['#access'] = FALSE;
  }
}