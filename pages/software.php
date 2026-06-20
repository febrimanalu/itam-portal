<?php
$pageTitle = 'Software';
$records = [
    ['name' => 'Yard 1 - Main Office Level 2 (PIC)', 'detail' => 'Sample operational record', 'status' => 'Active'],
    ['name' => 'Yard 2 - New Building Level 1 (PIC)', 'detail' => 'Dummy data ready for database binding', 'status' => 'Review'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?> | ITAM Portal</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<main class="main-content" style="margin-left:0;width:100%;">
    <header class="page-header">
        <div><p class="eyebrow">Repository</p><h1><?= htmlspecialchars($pageTitle) ?></h1><p>Sample page with dummy records for the ITAM Portal foundation.</p></div>
        <div class="header-actions"><a href="../index.php"><button type="button">Back to Dashboard</button></a></div>
    </header>
    <article class="panel">
        <div class="panel-header"><h2><?= htmlspecialchars($pageTitle) ?> Records</h2><span>Dummy data</span></div>
        <div class="table-wrap"><table><thead><tr><th>Name</th><th>Detail</th><th>Status</th></tr></thead><tbody>
        <?php foreach ($records as $record): ?>
            <tr><td><?= htmlspecialchars($record['name']) ?></td><td><?= htmlspecialchars($record['detail']) ?></td><td><span class="badge success"><?= htmlspecialchars($record['status']) ?></span></td></tr>
        <?php endforeach; ?>
        </tbody></table></div>
    </article>
</main>
<script src="../assets/js/app.js"></script>
</body>
</html>
