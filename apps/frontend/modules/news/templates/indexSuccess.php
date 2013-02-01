<h1>News</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Enabled</th>
      <th>Created at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($newsCollection as $news): ?>
    <tr>
      <td><?php echo $news->getId() ?></td>
      <td><?php echo link_to($news->getTitle(), '@news_view?id='.$news->getId()) ?></td>
      <td><?php echo $news->getIsEnabled() ?></td>
      <td><?php echo $news->getCreatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
