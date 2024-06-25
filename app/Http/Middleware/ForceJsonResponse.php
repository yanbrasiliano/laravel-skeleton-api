<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;

class ForceJsonResponse
{
  protected $defaultAcceptHeader = 'application/json';

  public function handle(Request $request, Closure $next)
  {
    if ($request->header('Accept') !== $this->defaultAcceptHeader) {
      $request->headers->set('Accept', $this->defaultAcceptHeader);
    }
    try {
      $response = $next($request);
      if ($response instanceof Response && $response->headers->get('Content-Type') !== $this->defaultAcceptHeader) {
        $response->headers->set('Content-Type', $this->defaultAcceptHeader);
      }

      return $response;
    } catch (\Exception $exception) {
      return new JsonResponse(['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
  }
}
