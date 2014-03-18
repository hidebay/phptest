<?php
function smarty_modifier_unescape($string, $compiler)
{
  if (!isset($compiler) || 'html' == $compiler) {
    return html_entity_decode($string);
  }
  else if ('htmlall' == $compiler) {
    return htmlspecialchars_decode($string);
  }
}

?>