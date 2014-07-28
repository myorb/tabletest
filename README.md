array to table class 
===========

## Description ##

This is adress book whish allow add/edd/del contacts in pro book
The probook has only admin part


## Use example ##
```
<?php
require_once('table.php')
$data = array(
   array(
       'Name' => 'Trixie',
       'Color' => 'Green',
       'Element' => 'Earth',
       'Likes' => 'Flowers'
   ),
   array(
       'Name' => 'Tinkerbell',
       'Element' => 'Air',
       'Likes' => 'Singning',
       'Color' => 'Blue'
   ),
   array(
       'Element' => 'Water',
       'Likes' => 'Dancing',
       'Name' => 'Blum',
       'Color' => 'Pink'
   ),
);

$table = new Table($data);
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<pre><?php $table->render(); ?></pre>

</body>
</html>
```
