<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GalleryModel;

class Gallery extends BaseController
{
    protected GalleryModel $galleryModel;

    public function __construct()
    {
        $this->galleryModel = new GalleryModel();
    }

    public function index(): string
    {
        $items = $this->galleryModel->orderBy('id', 'DESC')->findAll();

        return view('admin/gallery/index', [
            'page_title' => 'Manage Media Gallery',
            'items'      => $items,
        ]);
    }

    public function create(): string
    {
        return view('admin/gallery/form', [
            'page_title' => 'Upload Gallery Image',
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function store(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'title' => 'required|min_length[2]|max_length[150]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please enter a title for the media item.');
        }

        $imageName = null;
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/gallery', $imageName);
        }

        $this->galleryModel->insert([
            'title'      => $this->request->getPost('title'),
            'category'   => $this->request->getPost('category') ?: 'General',
            'image'      => $imageName,
            'caption'    => $this->request->getPost('caption'),
            'is_active'  => $this->request->getPost('is_active') ? 1 : 0,
            'sort_order' => $this->request->getPost('sort_order') ?: 0,
        ]);

        return redirect()->to(base_url('admin/gallery'))->with('success', 'Media item uploaded successfully!');
    }

    public function delete(int $id): \CodeIgniter\HTTP\RedirectResponse
    {
        $this->galleryModel->delete($id);
        return redirect()->to(base_url('admin/gallery'))->with('success', 'Media item deleted successfully!');
    }
}
