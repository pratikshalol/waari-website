<?php

namespace App\Controllers;

use App\Models\GalleryModel;

class Gallery extends BaseController
{
    public function index(): string
    {
        $model  = new GalleryModel();
        $filter = $this->request->getGet('filter') ?? 'all';

        if ($filter !== 'all') {
            $items = $model->getByCategory($filter);
        } else {
            $items = $model->getActiveItems();
        }

        $categories = $model->getDistinctCategories();

        $data = $this->sharedData([
            'page_title'      => 'Media Gallery',
            'meta_description'=> 'Explore Waari\'s media gallery — photos of our natural jaggery products, production process, and happy customers.',
            'items'           => $items,
            'categories'      => $categories,
            'active_filter'   => $filter,
        ]);

        return view('pages/gallery', $data);
    }
}
