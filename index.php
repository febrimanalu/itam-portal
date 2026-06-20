<?php
$pageTitle = 'ITAM Portal Dashboard';
require __DIR__ . '/modules/data/sample_data.php';

$navigation = [
    ['label' => 'Dashboard', 'href' => 'index.php'],
    ['label' => 'Hardware Inventory', 'href' => 'pages/hardware.php'],
    ['label' => 'Endpoint Inventory', 'href' => 'pages/endpoints.php'],
    ['label' => 'Software Inventory', 'href' => 'pages/software.php'],
    ['label' => 'License Management', 'href' => 'pages/licenses.php'],
    ['label' => 'Contract Repository', 'href' => 'pages/contracts.php'],
    ['label' => 'Copier Machine Repository', 'href' => 'pages/copiers.php'],
    ['label' => 'Network Line Repository', 'href' => 'pages/network-lines.php'],
    ['label' => 'Reports', 'href' => 'pages/reports.php'],
    ['label' => 'Administration', 'href' => 'pages/administration.php'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="app-shell">
    <aside class="sidebar">
        <div class="brand">
            <span class="brand-mark">IT</span>
            <div>
                <strong>ITAM Portal</strong>
                <small>Assets & Endpoints</small>
            </div>
        </div>
        <nav class="nav-menu" aria-label="Primary navigation">
            <?php foreach ($navigation as $item): ?>
                <a class="<?= $item['label'] === 'Dashboard' ? 'active' : '' ?>" href="<?= htmlspecialchars($item['href']) ?>"><?= htmlspecialchars($item['label']) ?></a>
            <?php endforeach; ?>
        </nav>
    </aside>

    <main class="main-content">
        <header class="page-header">
            <div>
                <p class="eyebrow">Executive Overview</p>
                <h1>IT Asset & Endpoint Management Dashboard</h1>
                <p>Centralized visibility across hardware, endpoints, software, licenses, copier contracts, network lines, and future PDQ Connect telemetry.</p>
            </div>
            <div class="header-actions">
                <button type="button">Export Report</button>
                <button type="button" class="primary">Sync Inventory</button>
            </div>
        </header>

        <section class="metric-grid" aria-label="Dashboard metrics">
            <?php foreach ($metrics as $metric): ?>
                <article class="metric-card <?= htmlspecialchars($metric['tone']) ?>">
                    <span><?= htmlspecialchars($metric['label']) ?></span>
                    <strong><?= htmlspecialchars($metric['value']) ?></strong>
                    <small><?= htmlspecialchars($metric['trend']) ?></small>
                </article>
            <?php endforeach; ?>
        </section>

        <section class="dashboard-grid">
            <article class="panel span-2">
                <div class="panel-header"><h2>Contract Expiration</h2><span>Next 120 days</span></div>
                <div class="table-wrap">
                    <table>
                        <thead><tr><th>Type</th><th>Name</th><th>Location</th><th>Expiration</th><th>Status</th></tr></thead>
                        <tbody>
                        <?php foreach ($contractExpirations as $row): ?>
                            <tr><td><?= htmlspecialchars($row['type']) ?></td><td><?= htmlspecialchars($row['name']) ?></td><td><?= htmlspecialchars($row['location']) ?></td><td><?= htmlspecialchars($row['date']) ?></td><td><span class="badge warning"><?= htmlspecialchars($row['status']) ?></span></td></tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </article>

            <article class="panel">
                <div class="panel-header"><h2>Endpoint Health Summary</h2><span>Live estate</span></div>
                <?php foreach ($health as $item): ?>
                    <div class="health-row">
                        <div><strong><?= htmlspecialchars($item['label']) ?></strong><small><?= htmlspecialchars((string) $item['count']) ?> devices</small></div>
                        <div class="progress"><span class="<?= htmlspecialchars($item['class']) ?>" style="width: <?= (int) $item['percent'] ?>%"></span></div>
                    </div>
                <?php endforeach; ?>
            </article>

            <article class="panel">
                <div class="panel-header"><h2>Warranty Expiration</h2><span>Priority assets</span></div>
                <ul class="list-stack">
                    <?php foreach ($warranties as $item): ?>
                        <li><strong><?= htmlspecialchars($item['asset']) ?></strong><span><?= htmlspecialchars($item['tag']) ?> · <?= htmlspecialchars($item['expires']) ?></span><small><?= htmlspecialchars($item['location']) ?></small></li>
                    <?php endforeach; ?>
                </ul>
            </article>

            <article class="panel">
                <div class="panel-header"><h2>Asset Distribution by Location</h2><span>Combined yard/building/PIC</span></div>
                <?php foreach ($locations as $location): ?>
                    <div class="distribution-row"><span><?= htmlspecialchars($location['name']) ?></span><strong><?= (int) $location['assets'] ?></strong></div>
                <?php endforeach; ?>
            </article>

            <article class="panel span-2">
                <div class="panel-header"><h2>Software Compliance Overview</h2><span>License position</span></div>
                <div class="table-wrap">
                    <table>
                        <thead><tr><th>Product</th><th>Owned</th><th>Assigned</th><th>Status</th></tr></thead>
                        <tbody>
                        <?php foreach ($softwareCompliance as $item): ?>
                            <tr><td><?= htmlspecialchars($item['product']) ?></td><td><?= (int) $item['owned'] ?></td><td><?= (int) $item['assigned'] ?></td><td><span class="badge <?= $item['status'] === 'Over Allocated' ? 'danger' : 'success' ?>"><?= htmlspecialchars($item['status']) ?></span></td></tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </article>
        </section>
    </main>
</div>
<script src="assets/js/app.js"></script>
</body>
</html>
