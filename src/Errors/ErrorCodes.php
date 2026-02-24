<?php
 
// This class defines all error codes used in the API responses.
final class ErrorCodes {
    // Auth
    public const AUTH_MISSING_KEY       = 'AUTH_MISSING_KEY';
    public const AUTH_INVALID_KEY       = 'AUTH_INVALID_KEY';
    public const AUTH_DISABLED          = 'AUTH_DISABLED';
    public const AUTH_FORBIDDEN         = 'AUTH_FORBIDDEN';
  
    // Request / routing
    public const REQ_BAD_REQUEST        = 'REQ_BAD_REQUEST';        // 400
    public const REQ_NOT_FOUND          = 'REQ_NOT_FOUND';          // 404
    public const REQ_METHOD_NOT_ALLOWED = 'REQ_METHOD_NOT_ALLOWED'; // 405
    public const REQ_UNSUPPORTED_TYPE   = 'REQ_UNSUPPORTED_TYPE';   // 415
    public const REQ_INVALID_JSON       = 'REQ_INVALID_JSON';       // 400
    public const REQ_MISSING_FIELD      = 'REQ_MISSING_FIELD';      // 422
    public const REQ_INVALID_FIELD      = 'REQ_INVALID_FIELD';      // 422
  
    // Ingest
    public const INGEST_TS_INVALID      = 'INGEST_TS_INVALID';      // 422
    public const INGEST_DUPLICATE       = 'INGEST_DUPLICATE';       // 409
  
    // Server / DB
    public const DB_ERROR               = 'DB_ERROR';               // 500
  }