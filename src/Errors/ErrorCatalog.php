<?php
declare(strict_types=1);

require __DIR__ . '/ErrorCodes.php';

final class ErrorCatalog {

    public static function get(string $code): array {
        $codeMap = [

            // Auth
            ErrorCodes::AUTH_MISSING_KEY       => ['status' => 401, 'message' => 'API key requerida'],
            ErrorCodes::AUTH_INVALID_KEY       => ['status' => 401, 'message' => 'API key inválida'],
            ErrorCodes::AUTH_DISABLED          => ['status' => 403, 'message' => 'API key deshabilitada'],
            ErrorCodes::AUTH_FORBIDDEN         => ['status' => 403, 'message' => 'Acceso denegado'],

            // Request / routing
            ErrorCodes::REQ_BAD_REQUEST        => ['status' => 400, 'message' => 'Petición inválida'],
            ErrorCodes::REQ_NOT_FOUND          => ['status' => 404, 'message' => 'Recurso no encontrado'],
            ErrorCodes::REQ_METHOD_NOT_ALLOWED => ['status' => 405, 'message' => 'Método no permitido'],
            ErrorCodes::REQ_UNSUPPORTED_TYPE   => ['status' => 415, 'message' => 'Content-Type no soportado'],
            ErrorCodes::REQ_INVALID_JSON       => ['status' => 400, 'message' => 'JSON inválido'],
            ErrorCodes::REQ_MISSING_FIELD      => ['status' => 422, 'message' => 'Falta un campo requerido'],
            ErrorCodes::REQ_INVALID_FIELD      => ['status' => 422, 'message' => 'Campo inválido'],

            // Ingest
            ErrorCodes::INGEST_TS_INVALID      => ['status' => 422, 'message' => 'Timestamp inválido'],
            ErrorCodes::INGEST_DUPLICATE       => ['status' => 409, 'message' => 'Medición duplicada'],

            // Server / DB
            ErrorCodes::DB_ERROR               => ['status' => 500, 'message' => 'Error de base de datos'],
        ];

        return $codeMap[$code] ?? ['status' => 500, 'message' => 'Error interno'];
    }
}
