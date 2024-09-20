<?php

function basePath($path = '') {
  return __DIR__ . '/' . $path;
}

function inspect($value) {
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
}

function inspectAndDie($value) {
  echo '<pre>';
  die(var_dump($value));
  echo '</pre>';
}
