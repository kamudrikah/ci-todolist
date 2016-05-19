<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>CI - ToDo</title>
</head>
<body>

  <form action="<?= site_url(); ?>/main/data_add" method="post">
    ToDo: <input type="text" name="todoItem" placeholder="Item" autofocus>
    <button type="submit">Add</button>
  </form>

  <table>
    <tr>
      <th>#</th><th>ToDo Items</th><th>Actions</th>
    </tr>
    <?php foreach ($list->result() as $row) { ?>
    <tr>
      <td><?= $row->id; ?></td>
      <td>
        <?php
        if($row->status == 'done'){
          echo '<strike>'.$row->item.'</strike>';
        } else {
          echo $row->item;
        }
        ?>
      </td>
      <td>
        <?php if($row->status == 'done'){ ?>
        <a href="<?= site_url('/main/undone/'.$row->id); ?>">Undone</a>
        <?php } else { ?>
          <a href="<?= site_url('/main/done/'.$row->id); ?>">Done</a>
        <?php } ?>
        <a href="<?= site_url('/main/edit/'.$row->id); ?>">Edit</a>
        <a href="<?= site_url('/main/delete/'.$row->id); ?>">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </table>

</body>
</html>
