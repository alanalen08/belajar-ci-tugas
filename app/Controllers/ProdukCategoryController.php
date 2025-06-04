<?php

namespace App\Controllers;

use App\Models\ProductCategoryModel;

class ProdukCategoryController extends BaseController
{
    protected $product_category; 

    function __construct()
    {
        $this->product_category = new ProductCategoryModel();
    }

    public function index()
    {
        $product_category = $this->product_category->findAll();
        $data['product'] = $product_category;

        return view('v_produk_kategori', $data);
    }

    public function create()
{
    $dataForm = [
        'kategori' => $this->request->getPost('nama')
    ];

    $this->product_category->insert($dataForm);

    return redirect('produk_category')->with('success', 'Data Berhasil Ditambah');
} 
public function edit($id)
{
    $dataProduk = $this->product_category->find($id);

    $dataForm = [
        'kategori' => $this->request->getPost('nama')
    ];

    $this->product_category->update($id, $dataForm);

    return redirect('produk_category')->with('success', 'Data Berhasil Diubah');
}

public function delete($id)
{
    $dataProduk = $this->product_category->find($id);

    $this->product_category->delete($id);

    return redirect('produk_category')->with('success', 'Data Berhasil Dihapus');
}
}