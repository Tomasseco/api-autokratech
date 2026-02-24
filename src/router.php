<?php

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
$parts = explode('/', trim($path, '/'));

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if (($parts[0] ?? '') !== 'api' || ($parts[1] ?? '') !== 'v1') {
  http_response_code(404);
  echo json_encode(['ok'=>false,'error'=>'not_found']);
  exit;
}

$recurso = $parts[2] ?? '';

switch ($recurso) {
  case 'ingest':
    // Si viene por el metodo incorrecto
    if ($method !== 'POST') {
      http_response_code(405);
      echo json_encode(['ok'=>false,'error'=>ErrorCatalog::get(ErrorCodes::REQ_METHOD_NOT_ALLOWED)]);
      break;
    }


    http_response_code(200);
    echo json_encode(['ok'=>true,'info'=>'Chachi']);
    break;

  case 'data':
    // TODO: implementar el controlador de consulta
    break;

  case 'users':
    if ($method !== 'POST') {
      http_response_code(405);
      echo json_encode(['ok'=>false,'error'=>'method_not_allowed']);
      break;
    }
  
    // Lo que llega por curl (body crudo)
    $raw = file_get_contents('php://input');
  
    // Intento de parseo JSON
    $json = json_decode($raw, true);
  
    // Cabeceras (si existe getallheaders)
    $headers = function_exists('getallheaders') ? getallheaders() : [];
  
    http_response_code(200);
    echo json_encode([
      'ok' => true,
      'mensaje' => 'Esto es lo que me has enviado por curl',
      'method' => $method,
      'raw' => $raw,                 // texto exacto recibido
      'json' => $json,               // JSON parseado (array)
      'json_error' => json_last_error_msg(),
      'headers' => $headers
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    break;

  default:
    http_response_code(404);
    echo json_encode(['ok'=>false,'error'=>'resource_not_found']);
    break;
}
