<?php require(__DIR__.'/../partials/header.php'); ?>

<main class="invest-dashboard" style="margin-top:100px;min-height:70vh;">
  <div class="container" style="max-width:1200px;margin:0 auto;padding:32px 16px;">
    <!-- Investment Summary -->
    <section class="investment-summary" style="display:flex;gap:32px;flex-wrap:wrap;margin-bottom:40px;">
      <div class="summary-card" style="flex:1;min-width:220px;background:#fff;border-radius:16px;box-shadow:0 2px 8px rgba(0,0,0,0.04);padding:32px 24px;text-align:center;">
        <div style="font-size:2.2rem;font-weight:700;color:#3b82f6;">$12,500</div>
        <div style="color:#64748b;font-size:1.1rem;">Total Invested</div>
      </div>
      <div class="summary-card" style="flex:1;min-width:220px;background:#fff;border-radius:16px;box-shadow:0 2px 8px rgba(0,0,0,0.04);padding:32px 24px;text-align:center;">
        <div style="font-size:2.2rem;font-weight:700;color:#10b981;">$2,100</div>
        <div style="color:#64748b;font-size:1.1rem;">Total Returns</div>
      </div>
      <div class="summary-card" style="flex:1;min-width:220px;background:#fff;border-radius:16px;box-shadow:0 2px 8px rgba(0,0,0,0.04);padding:32px 24px;text-align:center;">
        <div style="font-size:2.2rem;font-weight:700;color:#f59e42;">3</div>
        <div style="color:#64748b;font-size:1.1rem;">Active Investments</div>
      </div>
    </section>

    <!-- CTA Button -->
    <div style="text-align:right;margin-bottom:24px;">
      <a href="/projects" class="cta-button" style="background:linear-gradient(120deg,#3b82f6,#6366f1);color:#fff;padding:12px 28px;border-radius:10px;font-weight:600;text-decoration:none;box-shadow:0 2px 8px rgba(99,102,241,0.12);transition:all 0.2s;">+ Invest in New Project</a>
    </div>

    <!-- Investment List -->
    <section class="investment-list" style="background:#fff;border-radius:16px;box-shadow:0 2px 8px rgba(0,0,0,0.04);padding:24px;">
      <h2 style="font-size:1.3rem;font-weight:700;color:#1e293b;margin-bottom:20px;">Your Investments</h2>
      <div style="overflow-x:auto;">
        <table style="width:100%;border-collapse:collapse;">
          <thead>
            <tr style="background:#f8fafc;color:#64748b;font-size:1rem;">
              <th style="padding:12px 8px;text-align:left;">Project</th>
              <th style="padding:12px 8px;text-align:left;">Amount</th>
              <th style="padding:12px 8px;text-align:left;">Date</th>
              <th style="padding:12px 8px;text-align:left;">Status</th>
              <th style="padding:12px 8px;text-align:left;">Return</th>
              <th style="padding:12px 8px;text-align:left;">Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Example rows, replace with PHP loop -->
            <tr style="border-bottom:1px solid #f1f5f9;">
              <td style="padding:12px 8px;">CodeMaster IDE</td>
              <td style="padding:12px 8px;">$5,000</td>
              <td style="padding:12px 8px;">2024-03-10</td>
              <td style="padding:12px 8px;"><span style="color:#10b981;font-weight:600;">Active</span></td>
              <td style="padding:12px 8px;">$800</td>
              <td style="padding:12px 8px;"><a href="#" style="color:#3b82f6;text-decoration:underline;font-weight:500;">View</a></td>
            </tr>
            <tr style="border-bottom:1px solid #f1f5f9;">
              <td style="padding:12px 8px;">DataAnalyzer Pro</td>
              <td style="padding:12px 8px;">$2,500</td>
              <td style="padding:12px 8px;">2023-12-22</td>
              <td style="padding:12px 8px;"><span style="color:#64748b;font-weight:600;">Completed</span></td>
              <td style="padding:12px 8px;">$500</td>
              <td style="padding:12px 8px;"><a href="#" style="color:#3b82f6;text-decoration:underline;font-weight:500;">View</a></td>
            </tr>
            <tr style="border-bottom:1px solid #f1f5f9;">
              <td style="padding:12px 8px;">SecureVault</td>
              <td style="padding:12px 8px;">$5,000</td>
              <td style="padding:12px 8px;">2024-01-15</td>
              <td style="padding:12px 8px;"><span style="color:#f59e42;font-weight:600;">Pending</span></td>
              <td style="padding:12px 8px;">-</td>
              <td style="padding:12px 8px;"><a href="#" style="color:#3b82f6;text-decoration:underline;font-weight:500;">View</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </div>
</main>

<?php require(__DIR__.'/../partials/footer.php'); ?>
