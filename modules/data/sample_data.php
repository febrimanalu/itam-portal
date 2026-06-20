<?php
$metrics = [
    ['label' => 'Total Assets', 'value' => '1,254', 'trend' => '+4.2%', 'tone' => 'blue'],
    ['label' => 'Online Endpoints', 'value' => '1,102', 'trend' => '87.9%', 'tone' => 'green'],
    ['label' => 'Software Licenses', 'value' => '187', 'trend' => '94% compliant', 'tone' => 'purple'],
    ['label' => 'Active Contracts', 'value' => '36', 'trend' => '8 vendors', 'tone' => 'teal'],
    ['label' => 'Expiring Contracts', 'value' => '7', 'trend' => 'Next 90 days', 'tone' => 'amber'],
    ['label' => 'Monthly IT Cost', 'value' => '$82.4K', 'trend' => '-2.1%', 'tone' => 'slate'],
];

$contractExpirations = [
    ['type' => 'Network Line', 'name' => 'MPLS Yard 1 Primary', 'location' => 'Yard 1 - Main Office Level 2 (PIC)', 'date' => '2026-08-15', 'status' => 'Expiring Soon'],
    ['type' => 'Copier', 'name' => 'Canon DX-7780', 'location' => 'Yard 2 - New Building Level 1 (PIC)', 'date' => '2026-09-30', 'status' => 'Review'],
    ['type' => 'Software', 'name' => 'Microsoft 365 E3', 'location' => 'Enterprise', 'date' => '2026-11-25', 'status' => 'Renewal Planned'],
];

$warranties = [
    ['asset' => 'Dell Latitude 7450', 'tag' => 'NB-10239', 'location' => 'Yard 1 - Main Office Level 2 (PIC)', 'expires' => '2026-07-20'],
    ['asset' => 'HP ProDesk 600 G6', 'tag' => 'DT-08715', 'location' => 'Yard 2 - New Building Level 1 (PIC)', 'expires' => '2026-10-05'],
    ['asset' => 'Cisco Catalyst 9300', 'tag' => 'NW-00441', 'location' => 'Yard 1 - Server Room (PIC)', 'expires' => '2027-01-14'],
];

$health = [
    ['label' => 'Healthy', 'count' => 1024, 'percent' => 82, 'class' => 'success'],
    ['label' => 'Needs Patch', 'count' => 141, 'percent' => 11, 'class' => 'warning'],
    ['label' => 'Offline > 7 Days', 'count' => 64, 'percent' => 5, 'class' => 'danger'],
    ['label' => 'Encryption Missing', 'count' => 25, 'percent' => 2, 'class' => 'info'],
];

$locations = [
    ['name' => 'Yard 1 - Main Office Level 2 (PIC)', 'assets' => 402],
    ['name' => 'Yard 2 - New Building Level 1 (PIC)', 'assets' => 318],
    ['name' => 'Yard 1 - Warehouse Level 1 (PIC)', 'assets' => 211],
    ['name' => 'Remote / Field Users', 'assets' => 323],
];

$softwareCompliance = [
    ['product' => 'Microsoft 365 E3', 'owned' => 900, 'assigned' => 872, 'status' => 'Compliant'],
    ['product' => 'Adobe Acrobat Pro', 'owned' => 180, 'assigned' => 176, 'status' => 'Compliant'],
    ['product' => 'AutoCAD LT', 'owned' => 40, 'assigned' => 45, 'status' => 'Over Allocated'],
    ['product' => 'Visio Plan 2', 'owned' => 25, 'assigned' => 21, 'status' => 'Available'],
];
