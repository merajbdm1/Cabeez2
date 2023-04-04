<?php

function displayCategories($vehicleCategory, $parentId = null, $prefix = '') {

  $html = '';
  foreach ($vehicleCategory as $category) {
    if ($category->parent_id == $parentId) {
     $html .= '<option value="' . $category->_id . '">' . $prefix . $category->name . '</option>';
      $html .= displayCategories($vehicleCategory, $category->id, $prefix . '-');
    
    }
  }
  return $html;
}

// Sample $vehicleCategory array

?>