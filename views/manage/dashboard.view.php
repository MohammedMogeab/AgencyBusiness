<?php
require base_path('views/partials/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Dashboard</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <style>
        .dashboard-container {
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .dashboard-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #1e293b;
            letter-spacing: -0.5px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        }
        .stat-title {
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .stat-value {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.25rem;
        }
        .stat-change {
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }
        .stat-change.positive {
            color: #059669;
        }
        .stat-change.negative {
            color: #dc2626;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
        }
        .projects-table {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .table-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
        }
        .table-actions {
            display: flex;
            gap: 1rem;
        }
        .search-box {
            position: relative;
        }
        .search-box input {
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.875rem;
            width: 240px;
            background: #f8fafc;
        }
        .search-box::before {
            content: '🔍';
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 0.875rem;
            color: #64748b;
        }
        .filter-btn {
            padding: 0.5rem 1rem;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.875rem;
            color: #64748b;
            cursor: pointer;
            transition: all 0.2s;
        }
        .filter-btn:hover {
            background: #e2e8f0;
            color: #1e293b;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            text-align: left;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #64748b;
            border-bottom: 1px solid #e2e8f0;
        }
        td {
            padding: 1rem;
            font-size: 0.875rem;
            color: #1e293b;
            border-bottom: 1px solid #e2e8f0;
        }
        tr:last-child td {
            border-bottom: none;
        }
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }
        .status-badge.active {
            background: #dcfce7;
            color: #059669;
        }
        .status-badge.completed {
            background: #dbeafe;
            color: #2563eb;
        }
        .status-badge.upcoming {
            background: #fef3c7;
            color: #d97706;
        }
        .action-btn {
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }
        .action-btn.edit {
            background: #e0e7ff;
            color: #4f46e5;
        }
        .action-btn.edit:hover {
            background: #c7d2fe;
        }
        .action-btn.delete {
            background: #fee2e2;
            color: #dc2626;
        }
        .action-btn.delete:hover {
            background: #fecaca;
        }
        .analytics-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }
        .analytics-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1.5rem;
        }
        .chart-container {
            height: 300px;
            margin-bottom: 1.5rem;
        }
        .status-distribution {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
        .status-item {
            text-align: center;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 12px;
        }
        .status-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.25rem;
        }
        .status-label {
            font-size: 0.875rem;
            color: #64748b;
        }
        @media (max-width: 1024px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }
        @media (max-width: 640px) {
            .dashboard-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .table-header {
                flex-direction: column;
                gap: 1rem;
            }
            .table-actions {
                width: 100%;
            }
            .search-box input {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1 class="dashboard-title">Project Dashboard</h1>
            <button class="action-btn edit" onclick="location.href='/project/create'">Create New Project</button>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-title">Total Projects</div>
                <div class="stat-value"><?= $totalProduct['totalPro'] ?? 1 ?></div>
                <div class="stat-change positive">
                    <span>↑</span>
                    <span>12% from last month</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Active Investments</div>
                <div class="stat-value">$<?= $activeInvestments['sum_mount'] ?? 1 ?></div>
                <div class="stat-change positive">
                    <span>↑</span>
                    <span>8% from last month</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Total ROI</div>
                <div class="stat-value"><?= $getRol['roi_calc'] ?? 1 ?>%</div>
                <div class="stat-change positive">
                    <span>↑</span>
                    <span>2.3% from last month</span>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Active Investors</div>
                <div class="stat-value"><?= $active_investors['active_investors'] ?? 1 ?></div>
                <div class="stat-change positive">
                    <span>↑</span>
                    <span>23% from last month</span>
                </div>
            </div>
        </div>

        <div class="dashboard-grid">
            <div class="projects-table">
                <div class="table-header">
                    <h2 class="table-title">Recent Projects</h2>
                    <div class="table-actions">
                        <form action="/manage" method="$_GET">

                            <div class="search-box">
                                <input type="text" id= "inputSearch"placeholder="Search projects..." name="search">
                            </div>
                            <!-- <button class="filter-btn" name="btnSearch">Filter</button> -->
                        </form>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Status</th>
                            <th>Investment</th>
                            <th>ROI</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php foreach($productAndInvstment as $row): ?>
                        <tr>
                            <td>
                                <div style="font-weight: 600;"><?= $row['name'] ?? '' ?></div>
                                <div style="color: #64748b; font-size: 0.75rem;"><?= $row['start_date'] ?? '' ?></div>
                            </td>
                            <td><span class="status-badge active"><?= $row['status'] ?? '' ?></span></td>
                            <td>$<?= $row['amount'] ?? 0?></td>
                            <td><?= $row['avg_roi'] ?? 0 ?>%</td>    
                            <td>
                                <button class="action-btn edit">Edit</button>
                                <button class="action-btn delete">Delete</button>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <!-- <tr>
                            <td>
                                <div style="font-weight: 600;">Blockchain Payment System</div>
                                <div style="color: #64748b; font-size: 0.75rem;">Started 5 days ago</div>
                            </td>
                            <td><span class="status-badge completed">Completed</span></td>
                            <td>$500,000</td>
                            <td>22%</td>
                            <td>
                                <button class="action-btn edit">Edit</button>
                                <button class="action-btn delete">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-weight: 600;">Smart Home Automation</div>
                                <div style="color: #64748b; font-size: 0.75rem;">Starting next week</div>
                            </td>
                            <td><span class="status-badge upcoming">Upcoming</span></td>
                            <td>$180,000</td>
                            <td>12%</td>
                            <td>
                                <button class="action-btn edit">Edit</button>
                                <button class="action-btn delete">Delete</button>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <div class="analytics-card">
                <h2 class="analytics-title">Project Analytics</h2>
                <div class="chart-container">
                    <!-- We'll add a chart here using Chart.js -->
                    <canvas id="investmentChart"></canvas>
                </div>
                <div class="status-distribution">
                    <div class="status-item">
                        <div class="status-value"><?= $totalProductActive['pro_active'] ?? 0 ?></div>
                        <div class="status-label">Active</div>
                    </div>
                    <div class="status-item">
                        <div class="status-value"><?= $totalProductCompleted ['pro_completed '] ?? 0 ?></div>
                        <div class="status-label">Completed</div>
                    </div>
                    <div class="status-item">
                        <div class="status-value"><?= $totalProductBeta['pro_Beta'] ?? 0 ?></div>
                        <div class="status-label">Upcoming</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Investment Chart
        const investmentData = <?php echo json_encode(array_values($investmentData));?>
        const ctx = document.getElementById('investmentChart').getContext('2d');
        const month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: month ,
                datasets: [{
                    label: 'Investment Amount',
                    data: investmentData,
                    borderColor: '#4f46e5',
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + (value/1000) + 'k';
                            }
                        }
                    }
                }
            }
        });

        // Search functionality
        // document.querySelector('.search-box input').addEventListener('input', function(e) {
        //     const searchTerm = e.target.value.toLowerCase();
        //     const rows = document.querySelectorAll('tbody tr');
            
        //     rows.forEach(row => {
        //         const projectName = row.querySelector('td:first-child').textContent.toLowerCase();
        //         row.style.display = projectName.includes(searchTerm) ? '' : 'none';
        //     });
        // });

        // Filter button functionality
        document.querySelector('.filter-btn').addEventListener('click', function() {
            // Add your filter logic here
            alert('Filter functionality to be implemented');
        });

        // Working the filter 
        let debounceTimer;
     document.getElementById('inputSearch').addEventListener('input', function () {
    clearTimeout(debounceTimer);
    let keyword = this.value;

    debounceTimer = setTimeout(() => {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "manage?ajax=1&search=" + encodeURIComponent(keyword), true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                document.getElementById('tableBody').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }, 300);
});

    </script>
</body>
</html>
<?php
require base_path('views/partials/footer.php');
?> 