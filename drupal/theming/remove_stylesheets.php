<?php
/* simple example */
function THEME_preprocess_page(&$vars)
{
  drupal_add_css(THEMEPATH.'/css/sifr.css','theme');
  $css = drupal_add_css();
  //unset($css['all']['module']['modules/system/system.css']);
  //unset($css['all']['module']['modules/system/defaults.css']);
  //unset($css['all']['module']['modules/system/system-menus.css']);
  unset($css['all']['module']['modules/user/user.css']);
  unset($css['all']['module']['modules/taxonomy/taxonomy.css']);
  unset($css['all']['module']['sites/all/modules/cck/theme/content-module.css']);
  unset($css['all']['module']['sites/all/modules/logintoboggan/logintoboggan.css']);
  unset($css['all']['module']['sites/all/modules/ubercart/uc_product/uc_product.css']);
  unset($css['all']['module']['sites/all/modules/cck/modules/fieldgroup/fieldgroup.css']);
  unset($css['all']['module']['sites/all/modules/filefield/filefield.css']);
  unset($css['all']['module']['sites/all/modules/img_assist/img_assist.css']);
  unset($css['all']['module']['sites/all/modules/link/link.css']);
  $vars['styles'] = drupal_get_css($css);
}

/* whitelist */
function THEME_preprocess_page(&$v)
{
  $css = drupal_add_css();
  foreach( $css['all']['module'] as $stylesheet => $val )
  {
    $matches = array();
    preg_match('@(devel|date|wysiwyg|tinymce|admin_menu|imce)@',$stylesheet,$matches);
    if( strpos($stylesheet,'sites/all/modules') !== false && empty($matches) )
    {
      unset($css['all']['module'][$stylesheet]);
    }
  }

  $v['styles'] = drupal_get_css($css);
}