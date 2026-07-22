<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class Products extends BaseController
{
    protected ProductModel  $productModel;
    protected CategoryModel $categoryModel;

    public function __construct()
    {
        $this->productModel  = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index(): string
    {
        $products = $this->productModel->select('products.*, categories.name as category_name')
                                       ->join('categories', 'categories.id = products.category_id', 'left')
                                       ->orderBy('products.id', 'DESC')
                                       ->findAll();

        return view('admin/products/index', [
            'page_title' => 'Manage Products',
            'products'   => $products,
        ]);
    }

    public function create(): string
    {
        $categories = $this->categoryModel->orderBy('name', 'ASC')->findAll();

        return view('admin/products/form', [
            'page_title' => 'Add New Product',
            'categories' => $categories,
            'product'    => null,
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function store(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'name'        => 'required|min_length[2]|max_length[200]',
            'category_id' => 'required|integer',
            'price'       => 'required|numeric',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please fill in all required fields.');
        }

        $imageName = null;
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/products', $imageName);
        }

        $name = $this->request->getPost('name');
        $slug = $this->productModel->generateSlug($name);

        $this->productModel->insert([
            'category_id'       => $this->request->getPost('category_id'),
            'name'              => $name,
            'slug'              => $slug,
            'short_description' => $this->request->getPost('short_description'),
            'description'       => $this->request->getPost('description'),
            'benefits'          => $this->request->getPost('benefits'),
            'ingredients'       => $this->request->getPost('ingredients'),
            'weight'            => $this->request->getPost('weight'),
            'price'             => $this->request->getPost('price'),
            'image'             => $imageName,
            'is_featured'       => $this->request->getPost('is_featured') ? 1 : 0,
            'is_available'      => $this->request->getPost('is_available') ? 1 : 0,
            'is_active'         => $this->request->getPost('is_active') ? 1 : 0,
            'sort_order'        => $this->request->getPost('sort_order') ?: 0,
        ]);

        return redirect()->to(base_url('admin/products'))->with('success', 'Product created successfully!');
    }

    public function edit(int $id): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $product = $this->productModel->find($id);
        if (! $product) {
            return redirect()->to(base_url('admin/products'))->with('error', 'Product not found.');
        }

        $categories = $this->categoryModel->orderBy('name', 'ASC')->findAll();

        return view('admin/products/form', [
            'page_title' => 'Edit Product — ' . $product['name'],
            'categories' => $categories,
            'product'    => $product,
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function update(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $product = $this->productModel->find($id);
        if (! $product) {
            return redirect()->to(base_url('admin/products'))->with('error', 'Product not found.');
        }

        $rules = [
            'name'        => 'required|min_length[2]|max_length[200]',
            'category_id' => 'required|integer',
            'price'       => 'required|numeric',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please fill in all required fields.');
        }

        $imageName = $product['image'];
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/products', $imageName);
        }

        $this->productModel->update($id, [
            'category_id'       => $this->request->getPost('category_id'),
            'name'              => $this->request->getPost('name'),
            'short_description' => $this->request->getPost('short_description'),
            'description'       => $this->request->getPost('description'),
            'benefits'          => $this->request->getPost('benefits'),
            'ingredients'       => $this->request->getPost('ingredients'),
            'weight'            => $this->request->getPost('weight'),
            'price'             => $this->request->getPost('price'),
            'image'             => $imageName,
            'is_featured'       => $this->request->getPost('is_featured') ? 1 : 0,
            'is_available'      => $this->request->getPost('is_available') ? 1 : 0,
            'is_active'         => $this->request->getPost('is_active') ? 1 : 0,
            'sort_order'        => $this->request->getPost('sort_order') ?: 0,
        ]);

        return redirect()->to(base_url('admin/products'))->with('success', 'Product updated successfully!');
    }

    public function delete(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $this->productModel->delete($id);
        return redirect()->to(base_url('admin/products'))->with('success', 'Product deleted successfully!');
    }
}
