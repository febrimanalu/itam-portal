<?php
$pageTitle = "ITAM Portal Dashboard";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?></title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }
        .sidebar {
            width: 240px;
            height: 100vh;
            background: #1f2937;
            color: white;
            position: fixed;
            padding: 20px;
        }
        .sidebar h2 {
            font-size: 20px;
            margin-bottom: 30px;
        }
        .sidebar a {
            display: block;
            color: #d1d5db;
            text-decoration: none;
            margin: 15px 0;
        }
        .main {
            margin-left: 280px;
            padding: 30px;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }
        .card h3 {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }
        .card p {
            font-size: 30px;
            font-weight: bold;
            margin: 10px 0 0;
        }
        .section {
            margin-top: 30px;
            background: white;
            padding: 20px;
            border-radius: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }
        th {
            background: #f9fafb;
        }
        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
        .green { background: #dcfce7; color: #166534; }
        .red { background: #fee2e2; color: #991b1b; }
        .yellow { background: #fef9c3; color: #854d0e; }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>ITAM Portal</h2>
    <a href="#">Dashboard</a>
    <a href="#">Hardware Assets</a>
    <a href="#">Endpoint Details</a>
    <a href="#">Software Inventory</a>
    <a href="#">Contracts</a>
    <a href="#">Network Repository</a>
    <a href="#">Reports</a>
</div>

<div class="main">
    <h1>Dashboard</h1>
    <p>IT Asset & Endpoint Management Overview</p>

    <div class="cards">
        <div class="card">
            <h3>Total Assets</h3>
            <p>1,254</p>
        </div>
        <div class="card">
            <h3>Online Endpoints</h3>
            <p>1,102</p>
        </div>
        <div class="card">
            <h3>Software Licenses</h3>
            <p>187</p>
        </div>
        <div class="card">
            <h3>Active Contracts</h3>
            <p>36</p>
        </div>
    </div>

    <div class="section">
        <h2>Critical Information</h2>
        <table>
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Item</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Owner</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Software License</td>
                    <td>Microsoft Visio Plan 2</td>
                    <td>25 Nov 2026</td>
                    <td><span class="badge yellow">Expiring Soon</span></td>
                    <td>IT</td>
                </tr>
                <tr>
                    <td>Copier Machine</td>
                    <td>Yard 2 - New Building Level 1</td>
                    <td>Contract Active</td>
                    <td><span class="badge green">Active</span></td>
                    <td>Ismail</td>
                </tr>
                <tr>
                    <td>Endpoint</td>
                    <td>15 Devices Not Seen</td>
                    <td>Today</td>
                    <td><span class="badge red">Need Check</span></td>
                    <td>IT Support</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
