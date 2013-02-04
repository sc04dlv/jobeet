<?php // print_r($questions->toArray()) ?>

<table>
  <tr>
    <th>Вопрос</th>
    <th>Ответ</th>
  </tr>
<?php foreach ($questions as $question): ?>
    <tr>
      <td><?php echo $question->getQuestion() ?></td>
      <td><?php echo ($question->getAnswer() ? $question->getAnswer() : null) ?></td>
    </tr>
<?php endforeach; ?>
</table>

<h2>Задайте свой вопрос</h2>

<form method="post" action="<?php echo url_for('@question_create') ?>">
  <?php echo $form ?>
  <input type="submit" value="ok">
</form>


