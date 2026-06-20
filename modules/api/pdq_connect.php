<?php
/**
 * Future PDQ Connect integration placeholder.
 *
 * This module intentionally avoids making live API calls. It documents the
 * expected boundary for a future service class that can synchronize endpoint
 * inventory, package deployment status, patch state, and device health from
 * PDQ Connect into the local ITAM schema.
 */
class PdqConnectClient
{
    public function __construct(private string $apiKey = '', private string $baseUrl = 'https://api.pdq.com')
    {
    }

    public function syncEndpoints(): array
    {
        return [
            'status' => 'not_configured',
            'message' => 'PDQ Connect integration is prepared but not yet enabled.',
            'synced_records' => 0,
        ];
    }
}
