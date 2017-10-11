<?php

/**
 * @file
 * template.php
 */

/**
 * Implements hook_preprocess_node
 * Hidden page title for Basic page
 */
function golden_preprocess_node(&$variables){
  if ($variables['node']->type == 'page') {
    $variables['title'] = FALSE;
  }
}

// function hoangminhnhat_preprocess_page(&$vars) {
//   if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {
//     $tid = arg(2);
//     print 'Taxonomy name is: ' . $tid;
//     $vid = db_query("SELECT vid FROM {taxonomy_term_data} WHERE tid = :tid", array(':tid' => $tid))->fetchField();
//     $variables['theme_hook_suggestions'][] = 'page__vocabulary__' . $vid;
//   }
// }