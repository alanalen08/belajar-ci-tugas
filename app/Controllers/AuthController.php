<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\DiskonModel;
use CodeIgniter\I18n\Time;

class AuthController extends BaseController
{

    protected $user;
    protected $diskon;

    function __construct()
    {
        helper('form');
        $this->user = new UserModel();
        $this->diskon = new DiskonModel();
    }

    public function login()
    {
        if ($this->request->getPost()) {
            $rules = [
                'username' => 'required|min_length[6]',
                'password' => 'required|min_length[7]|numeric',
            ];

            if ($this->validate($rules)) {
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');

                $dataUser = $this->user->where(['username' => $username])->first(); //pasw 1234567

                if ($dataUser) {
                    if (password_verify($password, $dataUser['password'])) {

                        $today = Time::now('Asia/Jakarta', 'id_ID');
                        $diskonHariIni = $this->diskon->where('tanggal', $today->toDateString())->first();
                        $nominalDiskon = 0; // Nilai default jika tidak ada diskon
                        if ($diskonHariIni) {
                            $nominalDiskon = $diskonHariIni['nominal'];
                        }

                        session()->set([
                            'username' => $dataUser['username'],
                            'role' => $dataUser['role'],
                            'isLoggedIn' => TRUE,
                            'diskon' => $nominalDiskon
                        ]);

                        return redirect()->to(base_url('/'));
                    } else {
                        session()->setFlashdata('failed', 'Kombinasi Username & Password Salah');
                        return redirect()->back();
                    }
                } else {
                    session()->setFlashdata('failed', 'Username Tidak Ditemukan');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', $this->validator->listErrors());
                return redirect()->back();
            }
        }

        return view('v_login');
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}