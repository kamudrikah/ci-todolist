<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CI - ToDo</title>
  </head>
  <body>
    <form action="<?= site_url('main/data_update') ?>" method="post">
      Item: <input type="text" name="item" value="<?= $item; ?>">
      <input type="hidden" name="id" value="<?= $id; ?>">
      <input type="submit" value="save">
    </form>
  </body>
</html>
