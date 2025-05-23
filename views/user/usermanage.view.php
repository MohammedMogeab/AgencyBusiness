<?php require base_path('views/partials/header.php') ?>

<div class="dashboard-container">
    <!-- Sidebar -->
    <div class="dashboard-sidebar">
        <div class="user-profile">
            <div class="profile-image">
                <img src="<?= $user['photo'] ?? '/assets/images/default-avatar.png' ?>" alt="Profile">
            </div>
            <div class="profile-info">
                <h4><?= htmlspecialchars($user['user_name']) ?></h4>
                <p class="text-muted"><?= htmlspecialchars($user['email']) ?></p>
                <span class="role-badge"><?= htmlspecialchars($user['role']) ?></span>
            </div>
        </div>
        <nav class="sidebar-nav">
            <a href="#overview" class="nav-item active">
                <i class="fas fa-chart-line"></i>
                <span>Overview</span>
            </a>
            <a href="#investments" class="nav-item">
                <i class="fas fa-wallet"></i>
                <span>Investments</span>
            </a>
            <a href="#history" class="nav-item">
                <i class="fas fa-history"></i>
                <span>History</span>
            </a>
            <a href="#projects" class="nav-item">
                <i class="fas fa-project-diagram"></i>
                <span>Projects</span>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="dashboard-main">
        <!-- Overview Section -->
        <section id="overview" class="dashboard-section">
            <div class="section-header">
                <h2>Portfolio Overview</h2>
                <a href="/projects" class="btn-invest">
                    <i class="fas fa-plus"></i>
                    New Investment
                </a>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="stat-info">
                        <h3>$<?= number_format($portfolio['total_invested'] ?? 0, 2) ?></h3>
                        <p>Total Invested</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-info">
                        <h3>$<?= number_format($portfolio['total_returns'] ?? 0, 2) ?></h3>
                        <p>Total Returns</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="stat-info">
                        <h3>$<?= number_format($portfolio['current_value'] ?? 0, 2) ?></h3>
                        <p>Current Value</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="stat-info">
                        <h3><?= $portfolio['success_rate'] ?? '0' ?>%</h3>
                        <p>Success Rate</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Active Investments Section -->
        <section id="investments" class="dashboard-section">
            <div class="section-header">
                <h2>Active Investments</h2>
            </div>

            <?php if (empty($active_investments)): ?>
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h3>No Active Investments</h3>
                    <p>Start your investment journey today</p>
                    <a href="/projects" class="btn-primary">
                        <i class="fas fa-rocket"></i>
                        Start Investing
                    </a>
                </div>
            <?php else: ?>
                <div class="investments-grid">
                    <?php foreach ($active_investments as $inv): ?>
                        <div class="investment-card">
                            <div class="investment-header">
                                <img src="<?= htmlspecialchars($inv['product_image']) ?>" alt="<?= htmlspecialchars($inv['product_name']) ?>">
                                <span class="status-badge <?= $inv['status'] ?>">
                                    <?= ucfirst($inv['status']) ?>
                                </span>
                            </div>
                            <div class="investment-body">
                                <h4><?= htmlspecialchars($inv['product_name']) ?></h4>
                                <div class="investment-date">
                                    <i class="far fa-calendar-alt"></i>
                                    <?= date('M d, Y', strtotime($inv['created_at'])) ?>
                                </div>
                                <div class="investment-details">
                                    <div class="detail-item">
                                        <span class="label">Amount</span>
                                        <span class="value">$<?= number_format($inv['amount'], 2) ?></span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="label">Current Value</span>
                                        <span class="value">$<?= number_format($inv['current_value'], 2) ?></span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="label">ROI</span>
                                        <span class="value <?= $inv['roi_percentage'] >= 0 ? 'positive' : 'negative' ?>">
                                            <?= $inv['roi_percentage'] >= 0 ? '+' : '' ?><?= number_format($inv['roi_percentage'], 2) ?>%
                                        </span>
                                    </div>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-bar">
                                        <div class="progress" style="width: <?= $inv['progress'] ?>%"></div>
                                    </div>
                                    <span class="progress-text">Progress: <?= $inv['progress'] ?>%</span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>

        <!-- Investment History Section -->
        <section id="history" class="dashboard-section">
            <div class="section-header">
                <h2>Investment History</h2>
            </div>

            <?php if (empty($investment_history)): ?>
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-history"></i>
                    </div>
                    <h3>No Investment History</h3>
                </div>
            <?php else: ?>
                <div class="history-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Project</th>
                                <th>Amount</th>
                                <th>ROI</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($investment_history as $h): ?>
                                <tr>
                                    <td>
                                        <i class="far fa-calendar-alt"></i>
                                        <?= date('M d, Y', strtotime($h['created_at'])) ?>
                                    </td>
                                    <td>
                                        <div class="project-info">
                                            <?php if ($h['main_image']): ?>
                                                <img src="<?= htmlspecialchars($h['main_image']) ?>" alt="">
                                            <?php endif; ?>
                                            <span><?= htmlspecialchars($h['product_name']) ?></span>
                                        </div>
                                    </td>
                                    <td>$<?= number_format($h['amount'], 2) ?></td>
                                    <td>
                                        <span class="roi-badge <?= $h['roi_percentage'] >= 0 ? 'positive' : 'negative' ?>">
                                            <?= $h['roi_percentage'] >= 0 ? '+' : '' ?><?= number_format($h['roi_percentage'], 2) ?>%
                                        </span>
                                    </td>
                                    <td>
                                        <span class="status-badge <?= $h['status'] ?>">
                                            <?= ucfirst($h['status']) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <?php if ($pagination['total_pages'] > 1): ?>
                    <div class="pagination">
                        <?php if ($pagination['current_page'] > 1): ?>
                            <a href="?page=<?= $pagination['current_page'] - 1 ?>" class="page-link">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                            <a href="?page=<?= $i ?>" class="page-link <?= $i === $pagination['current_page'] ? 'active' : '' ?>">
                                <?= $i ?>
                            </a>
                        <?php endfor; ?>

                        <?php if ($pagination['current_page'] < $pagination['total_pages']): ?>
                            <a href="?page=<?= $pagination['current_page'] + 1 ?>" class="page-link">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </section>

        <!-- Project Details Section -->
        <?php if (!empty($project_details)): ?>
            <section id="projects" class="dashboard-section">
                <div class="section-header">
                    <h2>Project Details</h2>
                </div>
                <div class="projects-grid">
                    <?php foreach ($project_details as $proj): ?>
                        <div class="project-card">
                            <div class="project-image">
                                <img src="<?= htmlspecialchars($proj['main_image']) ?>" alt="<?= htmlspecialchars($proj['product_name']) ?>">
                            </div>
                            <div class="project-content">
                                <h4><?= htmlspecialchars($proj['product_name']) ?></h4>
                                <p><?= htmlspecialchars($proj['short_description']) ?></p>
                                
                                <?php if ($proj['features']): ?>
                                    <div class="project-features">
                                        <h5>Features</h5>
                                        <div class="feature-tags">
                                            <?php foreach (explode(',', $proj['features']) as $feature): ?>
                                                <span class="feature-tag"><?= htmlspecialchars(trim($feature)) ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($proj['technologies']): ?>
                                    <div class="project-tech">
                                        <h5>Technologies</h5>
                                        <div class="tech-tags">
                                            <?php foreach (explode(',', $proj['technologies']) as $tech): ?>
                                                <span class="tech-tag"><?= htmlspecialchars(trim($tech)) ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
</div>

<style>
/* Dashboard-specific styles */
.dashboard-container {
    --primary-color: #4361ee;
    --secondary-color: #3f37c9;
    --success-color: #4cc9f0;
    --warning-color: #f72585;
    --danger-color: #e63946;
    --text-color: #2b2d42;
    --text-muted: #8d99ae;
    --bg-color: #f8f9fa;
    --card-bg: #ffffff;
    --border-color: #e9ecef;
    --sidebar-width: 280px;
}

.dashboard-container {
    display: flex;
    min-height: calc(100vh - 60px); /* Subtract header height */
    margin-top: 60px; /* Add margin equal to header height */
    background-color: var(--bg-color);
}

/* Sidebar Styles */
.dashboard-sidebar {
    width: var(--sidebar-width);
    background-color: var(--card-bg);
    border-right: 1px solid var(--border-color);
    padding: 2rem;
    position: fixed;
    height: calc(100vh - 60px); /* Subtract header height */
    overflow-y: auto;
    top: 60px; /* Add top position equal to header height */
}

.user-profile {
    text-align: center;
    margin-bottom: 2rem;
}

.profile-image {
    width: 100px;
    height: 100px;
    margin: 0 auto 1rem;
    position: relative;
}

.profile-image img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--primary-color);
}

.profile-info h4 {
    margin: 0;
    color: var(--text-color);
}

.profile-info p {
    margin: 0.5rem 0;
    color: var(--text-muted);
}

.role-badge {
    display: inline-block;
    padding: 0.25rem 1rem;
    background-color: var(--primary-color);
    color: white;
    border-radius: 1rem;
    font-size: 0.875rem;
}

.sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.nav-item {
    display: flex;
    align-items: center;
    padding: 1rem;
    color: var(--text-color);
    text-decoration: none;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
}

.nav-item i {
    margin-right: 1rem;
    font-size: 1.25rem;
}

.nav-item:hover, .nav-item.active {
    background-color: var(--primary-color);
    color: white;
}

/* Main Content Styles */
.dashboard-main {
    flex: 1;
    margin-left: var(--sidebar-width);
    padding: 2rem;
}

.dashboard-section {
    background-color: var(--card-bg);
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 2rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.section-header h2 {
    margin: 0;
    color: var(--text-color);
}

.btn-invest {
    display: inline-flex;
    align-items: center;
    padding: 0.75rem 1.5rem;
    background-color: var(--primary-color);
    color: white;
    border-radius: 0.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-invest i {
    margin-right: 0.5rem;
}

.btn-invest:hover {
    background-color: var(--secondary-color);
    color: white;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 1.5rem;
}

.stat-card {
    background-color: var(--card-bg);
    border-radius: 1rem;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.stat-icon {
    width: 48px;
    height: 48px;
    background-color: var(--primary-color);
    color: white;
    border-radius: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.stat-info h3 {
    margin: 0;
    color: var(--text-color);
    font-size: 1.5rem;
}

.stat-info p {
    margin: 0;
    color: var(--text-muted);
}

/* Investments Grid */
.investments-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

.investment-card {
    background-color: var(--card-bg);
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.investment-header {
    position: relative;
    height: 160px;
}

.investment-header img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.status-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-size: 0.875rem;
    font-weight: 500;
}

.status-badge.completed {
    background-color: var(--success-color);
    color: white;
}

.status-badge.pending {
    background-color: var(--warning-color);
    color: white;
}

.investment-body {
    padding: 1.5rem;
}

.investment-body h4 {
    margin: 0 0 1rem;
    color: var(--text-color);
}

.investment-date {
    color: var(--text-muted);
    font-size: 0.875rem;
    margin-bottom: 1rem;
}

.investment-details {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    margin-bottom: 1rem;
}

.detail-item {
    display: flex;
    flex-direction: column;
}

.detail-item .label {
    color: var(--text-muted);
    font-size: 0.875rem;
}

.detail-item .value {
    color: var(--text-color);
    font-weight: 500;
}

.value.positive {
    color: var(--success-color);
}

.value.negative {
    color: var(--danger-color);
}

.progress-container {
    margin-top: 1rem;
}

.progress-bar {
    height: 6px;
    background-color: var(--border-color);
    border-radius: 3px;
    overflow: hidden;
    margin-bottom: 0.5rem;
}

.progress {
    height: 100%;
    background-color: var(--primary-color);
    border-radius: 3px;
    transition: width 0.3s ease;
}

.progress-text {
    color: var(--text-muted);
    font-size: 0.875rem;
}

/* History Table */
.history-table {
    overflow-x: auto;
}

.history-table table {
    width: 100%;
    border-collapse: collapse;
}

.history-table th {
    text-align: left;
    padding: 1rem;
    color: var(--text-muted);
    font-weight: 500;
    border-bottom: 1px solid var(--border-color);
}

.history-table td {
    padding: 1rem;
    border-bottom: 1px solid var(--border-color);
}

.project-info {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.project-info img {
    width: 40px;
    height: 40px;
    border-radius: 0.5rem;
    object-fit: cover;
}

.roi-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.875rem;
    font-weight: 500;
}

.roi-badge.positive {
    background-color: rgba(76, 201, 240, 0.1);
    color: var(--success-color);
}

.roi-badge.negative {
    background-color: rgba(230, 57, 70, 0.1);
    color: var(--danger-color);
}

/* Projects Grid */
.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

.project-card {
    background-color: var(--card-bg);
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.project-image {
    height: 200px;
}

.project-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.project-content {
    padding: 1.5rem;
}

.project-content h4 {
    margin: 0 0 1rem;
    color: var(--text-color);
}

.project-content p {
    color: var(--text-muted);
    margin-bottom: 1.5rem;
}

.project-features, .project-tech {
    margin-bottom: 1.5rem;
}

.project-features h5, .project-tech h5 {
    color: var(--text-color);
    margin-bottom: 0.75rem;
}

.feature-tags, .tech-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.feature-tag, .tech-tag {
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.875rem;
}

.feature-tag {
    background-color: rgba(67, 97, 238, 0.1);
    color: var(--primary-color);
}

.tech-tag {
    background-color: rgba(76, 201, 240, 0.1);
    color: var(--success-color);
}

/* Empty States */
.empty-state {
    text-align: center;
    padding: 3rem 1rem;
}

.empty-icon {
    font-size: 3rem;
    color: var(--text-muted);
    margin-bottom: 1rem;
}

.empty-state h3 {
    color: var(--text-color);
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: var(--text-muted);
    margin-bottom: 1.5rem;
}

.btn-primary {
    display: inline-flex;
    align-items: center;
    padding: 0.75rem 1.5rem;
    background-color: var(--primary-color);
    color: white;
    border-radius: 0.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-primary i {
    margin-right: 0.5rem;
}

.btn-primary:hover {
    background-color: var(--secondary-color);
    color: white;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 2rem;
}

.page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 0.5rem;
    background-color: var(--card-bg);
    color: var(--text-color);
    text-decoration: none;
    transition: all 0.3s ease;
}

.page-link:hover, .page-link.active {
    background-color: var(--primary-color);
    color: white;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .dashboard-sidebar {
        width: 80px;
        padding: 1rem;
    }

    .dashboard-main {
        margin-left: 80px;
    }

    .profile-info, .nav-item span {
        display: none;
    }

    .profile-image {
        width: 50px;
        height: 50px;
    }

    .nav-item {
        justify-content: center;
        padding: 0.75rem;
    }

    .nav-item i {
        margin: 0;
    }
}

@media (max-width: 768px) {
    .dashboard-main {
        padding: 1rem;
    }

    .dashboard-section {
        padding: 1rem;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .investments-grid, .projects-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php require base_path('views/partials/footer.php') ?>

        