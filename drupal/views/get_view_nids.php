<?php
/**
 * Most of this code is lifted from cck nodereference
 */



function MODULE_get_view_nids_titles($name, $view_args = array()) {
  $nids = array();
  if ($view = views_get_view($name)) {
    $display = $view->add_display('content_references');
    $view->set_display($display);

    $view->display_handler->set_option('style_plugin', 'content_php_array_autocomplete');
    $view->display_handler->set_option('row_plugin', 'fields');
    // Used in content_plugin_style_php_array::render(), to get
    // the 'field' to be used as title.
    $view->display_handler->set_option('content_title_field', 'title');

    // Additional options to let content_plugin_display_references::query()
    // narrow the results.
    $options = array(
      'table' => 'node',
      'field_string' => 'title',
      'string' => $string,
      'match' => $match,
      'field_id' => 'nid',
      'ids' => $ids,
    );
    $view->display_handler->set_option('content_options', $options);

    // Limit result set size.
    $limit = isset($limit) ? $limit : 0;
    $view->display_handler->set_option('items_per_page', $limit);

    // We do need title field, so add it if not present (unlikely, but...)
    $fields = $view->get_items('field', $display);
    if (!isset($fields['title'])) {
      $view->add_item($display, 'field', 'node', 'title');
    }

    // If not set, make all fields inline and define a separator.
    $options = $view->display_handler->get_option('row_options');
    if (empty($options['inline'])) {
      $options['inline'] = drupal_map_assoc(array_keys($view->get_items('field', $display)));
    }
    if (empty($options['separator'])) {
      $options['separator'] = '-';
    }
    $view->display_handler->set_option('row_options', $options);

    // Make sure the query is not cached
    $view->is_cacheable = FALSE;

    // Get the results.
    $results = $view->execute_display($display, $view_args);
    foreach ( $results as $key => $result ) {
      $results[$key] = $result['title'];
    }
    return $results;
  }
  return array();
}

function MODULE_get_view_nids($name, $view_args = array()) {
  return array_keys(MODULE_get_view_nids_titles($name, $view_args));
}

