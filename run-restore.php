<?php
/**
 * Web wrapper for CLI restore script
 */

// Security
$secret_key = 'restore2025';
if (!isset($_GET['key']) || $_GET['key'] !== $secret_key) {
    die('Access denied');
}

// Set CLI mode
$_SERVER['REQUEST_METHOD'] = 'CLI';

// Capture output
ob_start();

// Run CLI script
require_once(__DIR__ . '/webworks-theme/../../tools/restore-cli.php');

// Get output
$output = ob_get_clean();

// Display
header('Content-Type: text/plain');
echo $output;
