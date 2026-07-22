<?php

namespace App\Controllers;

use App\Models\AboutContentModel;

class About extends BaseController
{
    public function index(): string
    {
        $model   = new AboutContentModel();
        $content = $model->getAllAsKeyedArray();

        $data = $this->sharedData([
            'page_title'      => 'About Waari',
            'meta_description'=> 'Learn about Waari\'s story, mission, and commitment to producing 100% natural, chemical-free jaggery products in Maharashtra.',
            'content'         => $content,
        ]);

        return view('pages/about', $data);
    }
}
