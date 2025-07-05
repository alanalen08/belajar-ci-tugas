<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\DiskonModel;
use CodeIgniter\I18n\Time;

class DiskonController extends BaseController
{
    protected $diskon;

    function __construct()
    {
        $this->diskon = new DiskonModel();
    }

    public function index()
    {
        $diskon = $this->diskon->findAll();
        $data['diskon'] = $diskon;
        $data['waktu_sekarang'] = Time::now('Asia/Jakarta', 'id_ID');

        return view('v_diskon', $data);
    }

    public function create()
    {
        $rules = [
            'tanggal' => 'required|is_unique[diskon.tanggal]',
            'nominal' => 'required|numeric'
        ];

        $dataForm = [
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal')
        ];

        foreach ($this->diskon as $key => $value) {
            # code...
            if (!$this->validate($rules)) {
                return redirect('diskon')->back()->withInput()->with('failed', 'Tanggal tidak bisa sama! Pilih tanggal lain!');
            }
        }

        $this->diskon->insert($dataForm);

        return redirect('diskon')->with('success', 'Data Berhasil Ditambah!');
    }

    public function edit($id)
    {
        $diskon = $this->diskon->find($id);

        $dataForm = [
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal')
        ];

        $this->diskon->update($id, $dataForm);

        return redirect('diskon')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $diskon = $this->diskon->find($id);

        $this->diskon->delete($id);

        return redirect('diskon')->with('success', 'Data Berhasil Dihapus');
    }
}