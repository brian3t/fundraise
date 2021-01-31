<?php
/* @var $this \yii\web\View */
/* @var $model \app\models\Entity */
/* @var $page_to_edit string */
$file_content = file_get_contents(dirname(dirname(__DIR__)) . "/web/static/entity/" . $model->id . "/$page_to_edit.html")
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
  <!--    <script src="https://cdn.tiny.cloud/1/zkoyqoc2vwstwouyxzv37lyji8bm3bamozrwny2847n2omm0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>-->
  <script>
    tinymce.init({
      selector: '#mytextarea',
      height: "800"
    });
  </script>

</head>

<body>
<h1>Editing page <?= $page_to_edit ?></h1>
<form method="post" action="/entity/edithtml?id=<?= $model->id ?>" enctype="multipart/form-data">
  <label for="mytextarea"></label>
  <textarea id="mytextarea" name="new_html"><?= $file_content ?></textarea>
  <input type="hidden" name="id" value="<?= $model->id ?>">
  <input type="hidden" name="page_to_edit" value="<?= $page_to_edit ?>">
  <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
  <br>
  <button class="btn btn-primary" type="submit">Save</button>
</form>
</body>
</html>
