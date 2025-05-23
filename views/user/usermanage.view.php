<?php
// User info: $user
// Portfolio: $portfolio
// Active investments: $active_investments
// Investment history: $investment_history
// Project details: $project_details
?>
<div class="container py-5">
    <!-- User Profile -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-center shadow">
                <div class="card-body">
                    <img src="<?= $user['photo'] ?? '/assets/images/default-avatar.png' ?>" class="rounded-circle mb-2" width="80" height="80" alt="Profile">
                    <h5><?= htmlspecialchars($user['user_name']) ?></h5>
                    <div class="text-muted"><?= htmlspecialchars($user['email']) ?></div>
                    <span class="badge bg-primary"><?= htmlspecialchars($user['role']) ?></span>
                </div>
            </div>
        </div>
        <!-- Portfolio Overview -->
        <div class="col-md-9">
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <div class="text-muted">Total Invested</div>
                            <h4>$<?= number_format($portfolio['total_invested'] ?? 0, 2) ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <div class="text-muted">Total Returns</div>
                            <h4>$<?= number_format($portfolio['total_returns'] ?? 0, 2) ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <div class="text-muted">Current Value</div>
                            <h4>$<?= number_format($portfolio['current_value'] ?? 0, 2) ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <div class="text-muted">Success Rate</div>
                            <h4><?= $portfolio['success_rate'] ?? '0' ?>%</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Investments -->
    <div class="card mb-4 shadow">
        <div class="card-header bg-light"><strong>Active Investments</strong></div>
        <div class="card-body">
            <div class="row g-3">
                <?php foreach ($active_investments as $inv): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-<?= $inv['roi_percentage'] >= 0 ? 'success' : 'danger' ?>">
                        <img src="<?= htmlspecialchars($inv['product_image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($inv['product_name']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($inv['product_name']) ?></h5>
                            <div class="mb-2 text-muted">Invested: <?= date('M d, Y', strtotime($inv['investment_date'])) ?></div>
                            <ul class="list-unstyled mb-2">
                                <li>Amount: <strong>$<?= number_format($inv['amount'], 2) ?></strong></li>
                                <li>Current Value: <strong>$<?= number_format($inv['current_value'], 2) ?></strong></li>
                                <li>ROI: <span class="<?= $inv['roi_percentage'] >= 0 ? 'text-success' : 'text-danger' ?>">
                                    <?= $inv['roi_percentage'] >= 0 ? '+' : '' ?><?= number_format($inv['roi_percentage'], 2) ?>%</span></li>
                                <li>Expected Return: $<?= number_format($inv['expected_return'], 2) ?></li>
                                <li>Maturity: <?= date('M d, Y', strtotime($inv['maturity_date'])) ?></li>
                            </ul>
                            <div class="progress mb-1" style="height:8px;">
                                <div class="progress-bar bg-primary" style="width: <?= $inv['progress'] ?>%"></div>
                            </div>
                            <small class="text-muted">Progress: <?= $inv['progress'] ?>%</small>
                            <div class="mt-2">
                                <span class="badge bg-<?= $inv['roi_percentage'] >= 0 ? 'success' : 'danger' ?>">
                                    <?= $inv['roi_percentage'] >= 0 ? 'Success' : 'Loss' ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Investment History -->
    <div class="card mb-4 shadow">
        <div class="card-header bg-light"><strong>Investment History</strong></div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Project</th>
                            <th>Amount</th>
                            <th>Return</th>
                            <th>ROI</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($investment_history as $h): ?>
                        <tr>
                            <td><?= date('M d, Y', strtotime($h['investment_date'])) ?></td>
                            <td><?= htmlspecialchars($h['product_name']) ?></td>
                            <td>$<?= number_format($h['amount'], 2) ?></td>
                            <td>$<?= number_format($h['actual_return'], 2) ?></td>
                            <td class="<?= $h['roi_percentage'] >= 0 ? 'text-success' : 'text-danger' ?>">
                                <?= $h['roi_percentage'] >= 0 ? '+' : '' ?><?= number_format($h['roi_percentage'], 2) ?>%
                            </td>
                            <td>
                                <span class="badge bg-<?= $h['status'] === 'completed' ? 'success' : ($h['status'] === 'pending' ? 'warning text-dark' : 'danger') ?>">
                                    <?= ucfirst($h['status']) ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Project Details (Optional: Expandable/Modal) -->
    <?php if (!empty($project_details)): ?>
    <div class="card mb-4 shadow">
        <div class="card-header bg-light"><strong>Project Details</strong></div>
        <div class="card-body">
            <div class="row g-3">
                <?php foreach ($project_details as $proj): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="<?= htmlspecialchars($proj['main_image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($proj['product_name']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($proj['product_name']) ?></h5>
                            <div class="mb-2"><?= htmlspecialchars($proj['short_description']) ?></div>
                            <div><strong>Features:</strong> <?= htmlspecialchars($proj['features']) ?></div>
                            <div><strong>Technologies:</strong> <?= htmlspecialchars($proj['technologies']) ?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

        