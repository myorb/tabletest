
/////////////////////////////////////////// USE EXAMPLE /////////////////////////////////////
?>
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