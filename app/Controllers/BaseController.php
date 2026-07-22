<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\ContactInfoModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers.
 */
abstract class BaseController extends Controller
{
    /**
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * Array of helpers to load automatically.
     *
     * @var list<string>
     */
    protected $helpers = ['url', 'form', 'html'];

    /**
     * Shared contact info available in all user-facing views.
     */
    protected array $contactInfo = [];

    /**
     * @return void
     */
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);

        // Load contact info once for all controllers
        try {
            $contactModel      = new ContactInfoModel();
            $this->contactInfo = $contactModel->getAllAsKeyedArray();
        } catch (\Throwable $e) {
            $this->contactInfo = [];
        }
    }

    /**
     * Return shared view data injected into every user-facing view.
     */
    protected function sharedData(array $extra = []): array
    {
        return array_merge(['contact_info' => $this->contactInfo], $extra);
    }
}
