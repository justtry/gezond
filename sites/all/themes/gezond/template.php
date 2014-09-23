<?php

/**
 * @file
 * template.php
 *
 * Contains theme override functions and preprocess functions for the theme.
 */

define('FORM_REGISTRATION_HASH', '#b-form-registration');
/**
 * Override or insert variables into the html template.
 */
function gezond_preprocess_html(&$vars) {
  $html5 = array(
    '#tag' => 'script',
    '#attributes' => array(
      'src' => base_path() . drupal_get_path('theme', 'gezond') . '/js/lib/html5.js',
    ),
    '#prefix' => '<!--[if (lt IE 9) & (!IEMobile)]>',
    '#suffix' => '</script><![endif]-->',
  );
  drupal_add_html_head($html5, 'gezond_html5');


}

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function gezond_preprocess_page(&$vars, $hook) {

  $block = module_invoke('webform', 'block_view', 'client-block-4');
  $vars['register_webform'] = $block['content'];
  $vars['register_webform_title'] = $block['subject'];
  if (isset($vars['node'])) {
    $node = $vars['node'];
//    switch ($node->type) {
//      case "home_page":
//        break;
//      default:
//        break;
//    }
  }
}


/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function gezond_preprocess_node(&$vars) {
  $node = $vars['node'];
  switch ($node->type) {

    case 'services':
      break;
  }

}

/**
 * Theme preprocess function for theme_field() and field.tpl.php.
 *
 * @see theme_field()
 * @see field.tpl.php
 */
function gezond_preprocess_field(&$vars, $hook) {
  switch ($vars['element']['#field_name']) {
    case 'field_homesubpark_blocks' :
      $field_obj = $vars['items'];
      foreach ($field_obj as $key => $value) {
        $vars['items'][$key]['links']['#access'] = FALSE;
      }
      break;
    case 'field_activity_image' :
//      itemprop="image"
      break;

    default:
      break;
  }
}