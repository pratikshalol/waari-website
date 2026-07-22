<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Categories extends BaseController
{
    protected CategoryModel $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index(): string
    {
        $categories = $this->categoryModel->getCategoriesWithProductCount();

        return view('admin/categories/index', [
            'page_title' => 'Manage Product Categories',
            'categories' => $categories,
        ]);
    }

    public function create(): string
    {
        return view('admin/categories/form', [
            'page_title' => 'Add Category',
            'category'   => null,
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function store(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please enter a valid category name.');
        }

        $name = $this->request->getPost('name');
        $slug = url_title($name, '-', true);

        $this->categoryModel->insert([
            'name'        => $name,
            'slug'        => $slug,
            'description' => $this->request->getPost('description'),
            'icon'        => $this->request->getPost('icon') ?: 'fa-mortar-pestle',
            'is_active'   => $this->request->getPost('is_active') ? 1 : 0,
            'sort_order'  => $this->request->getPost('sort_order') ?: 0,
        ]);

        return redirect()->to(base_url('admin/categories'))->with('success', 'Category created successfully!');
    }

    public function edit(int $id): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $category = $this->categoryModel->find($id);
        if (! $category) {
            return redirect()->to(base_url('admin/categories'))->with('error', 'Category not found.');
        }

        return view('admin/categories/form', [
            'page_title' => 'Edit Category — ' . $category['name'],
            'category'   => $category,
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function update(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $category = $this->categoryModel->find($id);
        if (! $category) {
            return redirect()->to(base_url('admin/categories'))->with('error', 'Category not found.');
        }

        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please enter a valid category name.');
        }

        $this->categoryModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'icon'        => $this->request->getPost('icon') ?: 'fa-mortar-pestle',
            'is_active'   => $this->request->getPost('is_active') ? 1 : 0,
            'sort_order'  => $this->request->getPost('sort_order') ?: 0,
        ]);

        return redirect()->to(base_url('admin/categories'))->with('success', 'Category updated successfully!');
    }

    public function delete(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $this->categoryModel->delete($id);
        return redirect()->to(base_url('admin/categories'))->with('success', 'Category deleted successfully!');
    }
}
