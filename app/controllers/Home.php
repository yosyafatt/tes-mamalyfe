<?php

use Dompdf\Dompdf;

class Home extends Controller
{

    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->model('InterviewModel')->getAll();

        $this->view('home/index', $data);
    }
    public function tambahdata()
    {
        // var_dump($_POST);
        // die();
        if ($this->model('InterviewModel')->insert($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }

    public function editdata()
    {
        if ($this->model('InterviewModel')->update($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }

    public function getJson()
    {
        echo json_encode($this->model('InterviewModel')->getById($_POST['id']));
    }

    public function hapusdata($data)
    {
        if ($this->model('InterviewModel')->delete($data) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }

    public function pdf()
    {
        $data['user'] = $this->model('InterviewModel')->getAll();
        $this->view('home/pdf', $data);
    }

    public function printdata()
    {
        $dompdf = new Dompdf();

        $html = file_get_contents(BASEURL . '/home/pdf');
        $opt = $dompdf->getOptions();
        $opt->setIsRemoteEnabled(true);
        $opt->setDefaultMediaType('screen');
        $opt->setDefaultView();
        $opt->setIsHtml5ParserEnabled(true);
        $dompdf->setOptions($opt);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4');
        $dompdf->render();
        $dompdf->stream('Data_Interview.pdf', ['Attachment' => 0]);
    }
}
