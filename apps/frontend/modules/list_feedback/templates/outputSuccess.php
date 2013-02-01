<h1>Feed backs List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Content</th>
      <th>Created at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($feed_backs as $feed_back): ?>
    <tr>
      <td><?php echo $feed_back->getId() ?></td>
      <td><?php echo $feed_back->getEmail() ?></td>
      <td><?php echo $feed_back->getPhone() ?></td>
      <td><?php echo $feed_back->getContent() ?></td>
      <td><?php echo $feed_back->getCreatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
