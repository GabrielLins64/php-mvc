<?php

use App\Auth;
use \App\Core\Controller;


class Notes extends Controller
{
  private Array $uploadErrors;

  public function index()
  {
    $note = $this->model('Note');
    $dados = $note->getAll();

    $this->view('home/index', $dados = ['registros' => $dados]);
  }

  public function ver($id = '')
  {
    $note = $this->model('Note');
    $dados = $note->find($id);

    $this->view('notes/ver', $dados);
  }

  public function criar()
  {
    Auth::CheckLogin();

    $mensagem = array();

    if (isset($_POST['cadastrar'])):
      if (empty($_POST['titulo']) || empty($_POST['texto'])):
        $mensagem[] = "Todos os campos devem ser preenchidos.";
      else:
        $note = $this->model('Note');

        if ($_FILES['noteImage']['size'] != 0) {
          try {
            $imageName = $this->uploadImage();
            $note->image = $imageName;
          }
          catch (\Exception $e) {
            $mensagem[] = implode("<br>", $this->uploadErrors);
            $this->view('notes/criar', $dados = ['mensagem' => $mensagem]);
            return;
          }
        }
        $note->title = $_POST['titulo'];
        $note->text = $_POST['texto'];
        $mensagem[] = $note->save();
      endif;
    endif;

    $this->view('notes/criar', $dados = ['mensagem' => $mensagem]);
  }

  public function editar($id)
  {
    Auth::CheckLogin();

    $mensagem = array();
    $note = $this->model('Note');

    if (isset($_POST['atualizar'])):
      if (empty($_POST['titulo']) || empty($_POST['texto'])):
        $mensagem[] = "Todos os campos devem ser preenchidos.";
      else:
        if ($_FILES['noteImage']['size'] != 0) {
          try {
            if ($_POST['oldImageName'])
              unlink("assets/uploads/".$_POST['oldImageName']);
            $imageName = $this->uploadImage();
            $note->image = $imageName;
          }
          catch (\Exception $e) {
            $mensagem[] = implode("<br>", $this->uploadErrors);
            $this->view('notes/criar', $dados = ['mensagem' => $mensagem]);
            return;
          }
        }
        else if($_POST['oldImageName']) {
          $note->image = $_POST['oldImageName'];
        }

        $note->title = $_POST['titulo'];
        $note->text = $_POST['texto'];
        $mensagem[] = $note->update($id);
      endif;

    elseif (isset($_POST['removerImagem'])):
      $note->image = null;
      if ($_POST['oldImageName'])
        unlink("assets/uploads/".$_POST['oldImageName']);

      $note->title = $_POST['titulo'];
      $note->text = $_POST['texto'];
      $mensagem[] = $note->update($id);
    endif;

    $dados = $note->find($id);
    $this->view('notes/editar', $dados = ['mensagem' => $mensagem, 'registro' => $dados]);    
  }

  public function excluir($id)
  {
    Auth::CheckLogin();

    $mensagem = array();
    $note = $this->model('Note');

    $dbNote = $note->find($id);
    if ($dbNote['imagem'])
      unlink("assets/uploads/".$dbNote['imagem']);

    $mensagem[] = $note->delete($id);
    $dados = $note->getAll();

    $this->view('home/index', $dados = ['registros' => $dados, 'mensagem' => $mensagem]);
  }

  private function uploadImage()
  {
    $storage = new \Upload\Storage\FileSystem('./assets/uploads');
    $file = new \Upload\File('noteImage', $storage);

    // Optionally you can rename the file on upload
    $new_filename = uniqid();
    $file->setName($new_filename);

    // Validate file upload
    $file->addValidations(array(
      // Ensure file is of type "image/png"
      new \Upload\Validation\Mimetype('image/png'),

      //You can also add multi mimetype validation
      //new \Upload\Validation\Mimetype(array('image/png', 'image/gif'))

      // Ensure file is no larger than 5M (use "B", "K", M", or "G")
      new \Upload\Validation\Size('5M')
    ));

    try {
      // Access data about the file that has been uploaded
      $data = array(
        'name'       => $file->getNameWithExtension(),
        'extension'  => $file->getExtension(),
        'mime'       => $file->getMimetype(),
        'size'       => $file->getSize(),
        'md5'        => $file->getMd5(),
        'dimensions' => $file->getDimensions()
      );

      $file->upload();
      return $data['name'];
    }
    catch (\Exception $e) {
      $this->uploadErrors = $file->getErrors();
      throw $e;
    }
  }
}

?>
