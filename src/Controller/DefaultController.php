<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController {

    /**
     * Index page action
     * @return Symfony\Component\HttpFoundation\JsonResponse
     */
    public function Index() {
        
        return new JsonResponse("Hello World");
    }
}