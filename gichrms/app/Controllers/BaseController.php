<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 *
 * Extend this class in any new controllers:
 * ```
 *     class Home extends BaseController
 * ```
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */

    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Load here all helpers you want to be available in your controllers that extend BaseController.
        // Caution: Do not put the this below the parent::initController() call below.
        // $this->helpers = ['form', 'url'];

        // Caution: Do not edit this line.
        parent::initController($request, $response, $logger);

        // Backfill company context for sessions created before multi-company support.
        if (session('user_id') && !session('company_id')) {
            try {
                $db = db_connect();
                if ($db->fieldExists('company_id', 'users')) {
                    $user = $db->table('users')
                        ->select('company_id')
                        ->where('id', (int) session('user_id'))
                        ->get()
                        ->getRowArray();

                    if (!empty($user['company_id'])) {
                        session()->set('company_id', (int) $user['company_id']);
                    }
                }
            } catch (\Throwable $e) {
                log_message('warning', 'Could not restore company session context: ' . $e->getMessage());
            }
        }

        // Preload any models, libraries, etc, here.
        // $this->session = service('session');
    }
}
