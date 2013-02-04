<?php // print_r($questions->toArray()) ?>
<?php if(count($questions)): ?>
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
<?php else: ?>
  Вы будете первым, кто задаст вопрос!
<?php endif; ?>

<h2>Задайте свой вопрос</h2>

<?php if ($sf_user->getFlash('error')): ?>
  <div class="alert-error">
    <?php echo $sf_user->getFlash('error') ?>
  </div>
<?php endif; ?>

<form method="post" action="<?php echo url_for('@question_create') ?>">
  <?php echo $form ?>
  <input type="submit" value="ok">
</form>


