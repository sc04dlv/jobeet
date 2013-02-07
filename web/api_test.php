<?php
$json = file_get_contents('http://jobeet.local/api_dev.php/question/list?token=ed76481183f95ced0686869997769074f3044e6b');
$a = json_decode($json);
foreach ($a as $q) {
  echo '<a href="#">'.$q->question.'</a><br />';
}
?>

<h1>Задать вопрос</h1>
<form action="http://jobeet.local/api_dev.php/question" method="POST">
  <input type="hidden" name="token" value="ed76481183f95ced0686869997769074f3044e6b" />
  <input type="text" name="question[question]" />
  <input type="submit" value="OK" />
</form>