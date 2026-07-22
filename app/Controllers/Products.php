<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\EnquiryModel;

class Products extends BaseController
{
    protected ProductModel  $productModel;
    protected CategoryModel $categoryModel;

    public function __construct()
    {
        $this->productModel  = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    // ── Product listing ──────────────────────────────────────────
    public function index(): string
    {
        $search     = $this->request->getGet('search') ?? '';
        $categorySlug = $this->request->getGet('category') ?? '';
        $categoryId = null;
        $activeCategory = null;

        if ($categorySlug !== '') {
            $activeCategory = $this->categoryModel->findBySlug($categorySlug);
            if ($activeCategory) {
                $categoryId = (int) $activeCategory['id'];
            }
        }

        $products   = $this->productModel->getPaginatedProducts(12, $categoryId, $search);
        $pager      = $this->productModel->pager;
        $categories = $this->categoryModel->getCategoriesWithProductCount();

        $data = $this->sharedData([
            'page_title'      => 'Our Products',
            'meta_description'=> 'Browse Waari\'s range of 100% natural jaggery products — powders, blocks, flavoured jaggery, syrups, and gift combos.',
            'products'        => $products,
            'pager'           => $pager,
            'categories'      => $categories,
            'active_category' => $activeCategory,
            'search'          => $search,
            'category_slug'   => $categorySlug,
        ]);

        return view('pages/products', $data);
    }

    // ── Single product detail ────────────────────────────────────
    public function detail(string $slug): string
    {
        $product = $this->productModel->findBySlug($slug);

        if (! $product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Product not found.'
            );
        }

        $related = [];
        if ($product['category_id']) {
            $related = $this->productModel->getRelatedProducts(
                (int) $product['category_id'],
                (int) $product['id'],
                4
            );
        }

        $data = $this->sharedData([
            'page_title'      => $product['name'],
            'meta_description'=> $product['short_description'] ?? 'View product details on Waari.',
            'product'         => $product,
            'related_products'=> $related,
        ]);

        return view('pages/product_detail', $data);
    }

    // ── Product enquiry (POST) ───────────────────────────────────
    public function enquire(): \CodeIgniter\HTTP\RedirectResponse
    {
        $rules = [
            'product_id' => 'required|integer',
            'name'       => 'required|min_length[2]|max_length[100]',
            'email'      => 'required|valid_email',
            'phone'      => 'permit_empty|max_length[20]',
            'message'    => 'required|min_length[10]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                             ->withInput()
                             ->with('error', 'Please check the form and try again.');
        }

        $enquiryModel = new EnquiryModel();
        $enquiryModel->insert([
            'user_id'    => session()->get('user_id'),
            'product_id' => $this->request->getPost('product_id'),
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'subject'    => 'Product Enquiry — ' . $this->request->getPost('product_name'),
            'message'    => $this->request->getPost('message'),
            'status'     => 'new',
        ]);

        return redirect()->back()
                         ->with('success', 'Your enquiry has been submitted. We will contact you shortly!');
    }
}
