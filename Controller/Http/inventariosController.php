<?php

namespace Controller\Http;

use Controller\Http\Controller;
use Controller\Redirecter\Redirect;
use Database\Models\Siret\Portatil;
use Database\Models\Siret\Sonido;
use Database\Models\Siret\Utilidad;
use Database\Models\Siret\Video;

class inventariosController extends Controller
{

    private $page_url;

    public function __construct()
    {
        parent::__construct();
        if ($this->session->getStatus() === PHP_SESSION_NONE || empty($this->session->get('name'))) {
            Redirect::redirect('index?session=false');
        }
    }


    public function siret($page = '', $metodo = '', $parametro = '')
    {

        switch ($page) {
            case 'portatil':
                $portatil = new Portatil();
                if ($metodo == 'editar') {
                    $this->editar_portatil($parametro);
                } else if ($metodo == 'delete') {
                    $this->delete_portatil($parametro);
                } else if ($metodo == 'update') {
                    $this->update_portatil();
                } else {
                    $data = $portatil->getAll();
                    return $this->view('inventarios/siret/' . $page, $data->fetchAll(\PDO::FETCH_ASSOC));
                }
                break;
            case 'insert_portatil':
                $this->insert_portatil();
                break;

            case 'audio':
                $audio = new Sonido();
                if ($metodo == 'editar') {
                    $this->editar_sonido($parametro);
                } else if ($metodo == 'delete') {
                    $this->delete_sonido($parametro);
                } else if ($metodo == 'update') {
                    $this->update_sonido();
                } else {
                    $data =  $audio->getAll();
                    return $this->view('inventarios/siret/' . $page, $data->fetchAll(\PDO::FETCH_ASSOC));
                }
                break;
            case 'insert_sonido':
                $this->insert_sonido();
                break;

            case 'videobeam':
                $video = new Video();
                if ($metodo == 'editar') {
                    $this->editar_video($parametro);
                } else if ($metodo == 'delete') {
                    $this->delete_video($parametro);
                } else if ($metodo == 'update') {
                    $this->update_video();
                } else {
                    $data =  $video->getAll();
                    return $this->view('inventarios/siret/' . $page, $data->fetchAll(\PDO::FETCH_ASSOC));
                }
                break;
            case 'insert_video':
                $this->insert_video();
                break;

            case 'utilidades':
                $utilidad = new Utilidad();
                if ($metodo == 'editar') {
                    $this->editar_utilidad($parametro);
                } else if ($metodo == 'delete') {
                    $this->delete_utilidad($parametro);
                } else if ($metodo == 'update') {
                    $this->update_utilidad();
                } else {
                    $data = $utilidad->getAll();
                    return $this->view('inventarios/siret/' . $page, $data->fetchAll(\PDO::FETCH_ASSOC));
                }
                break;
            case 'insert_utilidad':
                $this->insert_utilidad();
                break;
        }
    }

    public function laboratorios($page = '')
    {

        return $this->view('inventarios/laboratorios/' . $page);
    }

    public function insert_portatil()
    {
        $portatil = new Portatil();
        if (isset($_POST['cod2'])) {
            $portatil->setCodigo($portatil->clean_string($_POST['cod1']) . $portatil->clean_string($_POST['cod2']));
            $portatil->setSerial($portatil->clean_string($_POST['idserial']));
            $portatil->setDescripcion($portatil->clean_string($_POST['iddescripcion']));
            $portatil->setEstado($portatil->clean_string($_POST['estado']));
            $portatil->setFecha($portatil->clean_string($_POST['idfecha']));
            $portatil->setActivo($portatil->clean_string('1'));

            $response =  $portatil->create();
            $portatil = null;

            if ($response) {
                Redirect::redirect('inventarios/siret/portatil?response=true');
            } else {
                Redirect::redirect('inventarios/siret/portatil?response=false');
            }
        }
    }

    public function editar_portatil($parametro = '')
    {
        $portatil = new Portatil();
        $data['portatiles'] =  $portatil->getAll();
        $portatil->setId($portatil->clean_string($parametro));
        $data['portatilforid'] =  $portatil->getById();
        return $this->view('inventarios/siret/portatil', $data);
    }

    public function delete_portatil($id = '')
    {

        $portatil = new Portatil();
        $portatil->setId($portatil->clean_string($id));
        $portatil->setActivo('0');
        $response = $portatil->delete();
        if ($response) {
            Redirect::redirect('inventarios/siret/portatil?delete=true');
        } else {
            Redirect::redirect('inventarios/siret/portatil?delete=false');
        }
    }

    public function update_portatil()
    {
        $portatil = new Portatil();
        if (isset($_POST['cod2'])) {
            $portatil->setId($portatil->clean_string($_POST['idportatil']));
            $portatil->setCodigo($portatil->clean_string($_POST['cod1']) . $portatil->clean_string($_POST['cod2']));
            $portatil->setSerial($portatil->clean_string($_POST['idserial']));
            $portatil->setDescripcion($portatil->clean_string($_POST['iddescripcion']));
            $portatil->setEstado($portatil->clean_string($_POST['estado']));
            $portatil->setFecha($portatil->clean_string($_POST['idfecha']));
            $portatil->setActivo($portatil->clean_string($_POST['activo']));

            $response =  $portatil->update();
            $portatil = null;

            if ($response) {
                Redirect::redirect('inventarios/siret/portatil/editar/' . $_POST['idportatil'] . '?responsedit=true');
            } else {
                Redirect::redirect('inventarios/siret/portatil/editar/' . $_POST['idportatil'] . '?responsedit=false');
            }
        }
    }

    public function insert_sonido()
    {
        $sonido = new Sonido();
        if (isset($_POST['cod2'])) {
            $sonido->setCodigo($sonido->clean_string($_POST['cod1']) . $sonido->clean_string($_POST['cod2']));
            $sonido->setDescripcion($sonido->clean_string($_POST['iddescripcion']));
            $sonido->setEstado($sonido->clean_string($_POST['estado']));
            $sonido->setFecha($sonido->clean_string($_POST['fecha']));
            $sonido->setActivo($sonido->clean_string('1'));

            $response =  $sonido->create();
            $portatil = null;

            if ($response) {
                Redirect::redirect('inventarios/siret/audio?response=true');
            } else {
                Redirect::redirect('inventarios/siret/audio?response=false');
            }
        }
    }

    public function editar_sonido($parametro = '')
    {
        $sonido = new Sonido();
        $data['sonidos'] =  $sonido->getAll();
        $sonido->setId($sonido->clean_string($parametro));
        $data['sonidosforid'] =  $sonido->getById();
        return $this->view('inventarios/siret/audio', $data);
    }

    public function delete_sonido($id = '')
    {

        $sonido = new Sonido();
        $sonido->setId($sonido->clean_string($id));
        $sonido->setActivo('0');
        $response = $sonido->delete();
        if ($response) {
            Redirect::redirect('inventarios/siret/audio?delete=true');
        } else {
            Redirect::redirect('inventarios/siret/audio?delete=false');
        }
    }

    public function update_sonido()
    {
        $sonido = new Sonido();
        if (isset($_POST['cod2'])) {
            $sonido->setId($sonido->clean_string($_POST['idsonido']));
            $sonido->setCodigo($sonido->clean_string($_POST['cod1']) . $sonido->clean_string($_POST['cod2']));
            $sonido->setDescripcion($sonido->clean_string($_POST['iddescripcion']));
            $sonido->setEstado($sonido->clean_string($_POST['estado']));
            $sonido->setFecha($sonido->clean_string($_POST['fecha']));
            $sonido->setActivo($sonido->clean_string($_POST['activo']));

            $response =  $sonido->update();
            $sonido = null;

            if ($response) {
                Redirect::redirect('inventarios/siret/audio/editar/' . $_POST['idsonido'] . '?responsedit=true');
            } else {
                Redirect::redirect('inventarios/siret/audio/editar/' . $_POST['idsonido'] . '?responsedit=false');
            }
        }
    }


    public function insert_video()
    {
        $video = new Video();
        if (isset($_POST['cod2'])) {
            $video->setCodigo($video->clean_string($_POST['cod1']) . $video->clean_string($_POST['cod2']));
            $video->setSerial($video->clean_string($_POST['idserial']));
            $video->setDescripcion($video->clean_string($_POST['iddescripcion']));
            $video->setEstado($video->clean_string($_POST['estado']));
            $video->setFecha($video->clean_string($_POST['fecha']));
            $video->setActivo($video->clean_string('1'));

            $response =  $video->create();
            $portatil = null;

            if ($response) {
                Redirect::redirect('inventarios/siret/videobeam?response=true');
            } else {
                Redirect::redirect('inventarios/siret/videobeam?response=false');
            }
        }
    }

    public function editar_video($parametro = '')
    {
        $video = new Video();
        $data['videos'] =  $video->getAll();
        $video->setId($video->clean_string($parametro));
        $data['videoforid'] =  $video->getById();
        return $this->view('inventarios/siret/videobeam', $data);
    }

    public function delete_video($id = '')
    {

        $video = new Video();
        $video->setId($video->clean_string($id));
        $video->setActivo('0');
        $response = $video->delete();
        if ($response) {
            Redirect::redirect('inventarios/siret/videobeam?delete=true');
        } else {
            Redirect::redirect('inventarios/siret/videobeam?delete=false');
        }
    }

    public function update_video()
    {
        $video = new Video();
        if (isset($_POST['cod2'])) {
            $video->setId($video->clean_string($_POST['idvideo']));
            $video->setCodigo($video->clean_string($_POST['cod1']) . $video->clean_string($_POST['cod2']));
            $video->setSerial($video->clean_string($_POST['idserial']));
            $video->setDescripcion($video->clean_string($_POST['iddescripcion']));
            $video->setEstado($video->clean_string($_POST['estado']));
            $video->setFecha($video->clean_string($_POST['fecha']));
            $video->setActivo($video->clean_string($_POST['activo']));

            $response =  $video->update();
            $video = null;

            if ($response) {
                Redirect::redirect('inventarios/siret/videobeam/editar/' . $_POST['idvideo'] . '?responsedit=true');
            } else {
                Redirect::redirect('inventarios/siret/videobeam/editar/' . $_POST['idvideo'] . '?responsedit=false');
            }
        }
    }

    public function insert_utilidad()
    {
        $utilidad = new Utilidad();
        if (isset($_POST['cod2'])) {
            $utilidad->setCodigo($utilidad->clean_string($_POST['cod1']) . $utilidad->clean_string($_POST['cod2']));
            $utilidad->setDescripcion($utilidad->clean_string($_POST['iddescripcion']));
            $utilidad->setCantidad($utilidad->clean_string($_POST['cantidad']));
            $utilidad->setFecha($utilidad->clean_string($_POST['fecha']));
            $utilidad->setActivo($utilidad->clean_string('1'));

            $response =  $utilidad->create();
            $portatil = null;

            if ($response) {
                Redirect::redirect('inventarios/siret/utilidades?response=true');
            } else {
                Redirect::redirect('inventarios/siret/utilidades?response=false');
            }
        }
    }

    public function editar_utilidad($parametro = '')
    {
        $utilidad = new Utilidad();
        $data['utilidades'] =  $utilidad->getAll();
        $utilidad->setId($utilidad->clean_string($parametro));
        $data['utilidadforid'] =  $utilidad->getById();
        return $this->view('inventarios/siret/utilidades', $data);
    }

    public function delete_utilidad($id = '')
    {

        $utilidad = new Utilidad();
        $utilidad->setId($utilidad->clean_string($id));
        $utilidad->setActivo('0');
        $response = $utilidad->delete();
        if ($response) {
            Redirect::redirect('inventarios/siret/utilidades?delete=true');
        } else {
            Redirect::redirect('inventarios/siret/utilidades?delete=false');
        }
    }

    public function update_utilidad()
    {
        $utilidad = new Utilidad();
        if (isset($_POST['cod2'])) {
            $utilidad->setId($utilidad->clean_string($_POST['idutilida']));
            $utilidad->setCodigo($utilidad->clean_string($_POST['cod1']) . $utilidad->clean_string($_POST['cod2']));
            $utilidad->setDescripcion($utilidad->clean_string($_POST['iddescripcion']));
            $utilidad->setCantidad($utilidad->clean_string($_POST['cantidad']));
            $utilidad->setFecha($utilidad->clean_string($_POST['fecha']));
            $utilidad->setActivo($utilidad->clean_string($_POST['activo']));

            $response =  $utilidad->update();
            $utilidad = null;

            if ($response) {
                Redirect::redirect('inventarios/siret/utilidades/editar/' . $_POST['idutilida'] . '?responsedit=true');
            } else {
                Redirect::redirect('inventarios/siret/utilidades/editar/' . $_POST['idutilida'] . '?responsedit=false');
            }
        }
    }
}
