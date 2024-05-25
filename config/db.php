<?php

const DB_HOST = '127.0.0.1';
const DB_PORT = '3306';
const DB_NAME = 'crm_db';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'root';
const DB_CHARSET = 'utf8';
const DB_PDO_OPTIONS = [
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES      => false,
];