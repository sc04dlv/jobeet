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

<?php if ($sf_user->isAuthenticated() && $sf_user->hasCredential('can-question')): ?>

    <h2>Задайте свой вопрос</h2>

  <?php include_partial('user/flash', array('sf_user' => $sf_user)) ?>

  <form method="post" action="<?php echo url_for('@question_create') ?>">
    <?php echo $form ?>
    <input type="submit" value="ok">
  </form>
<?php else: ?>
    <?php if (!$sf_user->isAuthenticated()): ?>
      <?php echo 'auth before' ?>
    <?php elseif (!$sf_user->hasCredential('can-question')): ?>
      <?php echo 'нет прав для размещения вопроса' ?>
    <?php endif; ?>
<?php endif; ?>


