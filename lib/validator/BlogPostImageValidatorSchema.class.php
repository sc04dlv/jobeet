<?php
class BlogPostImageValidatorSchema extends sfValidatorSchema
{
  protected function configure($options = array(), $messages = array())
  {
    $this->addMessage('filename', 'The filename is required.');
  }

  protected function doClean($values)
  {
    $errorSchema = new sfValidatorErrorSchema($this);

    foreach($values as $key => $value)
    {
      $errorSchemaLocal = new sfValidatorErrorSchema($this);

//      // поле filename заполнено, caption - нет
//      if ($value['filename'] && !$value['caption'])
//      {
//        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'caption');
//      }
//
//      // поле caption заполнено, filename - нет
//      if ($value['caption'] && !$value['filename'])
//      {
//        $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'filename');
//      }

      // поля caption и filename не заполнены, удаляем пустые значения
      if (!$value['filename'])
      {
        unset($values[$key]);
      }

      // в этой внедрённой форме есть некоторые ошибки
      if (count($errorSchemaLocal))
      {
        $errorSchema->addError($errorSchemaLocal, (string) $key);
      }
    }

    // передаём ошибку в главную форму
    if (count($errorSchema))
    {
      throw new sfValidatorErrorSchema($this, $errorSchema);
    }

    return $values;
  }
}
?>
