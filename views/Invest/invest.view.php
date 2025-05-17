<?php require(__DIR__.'/../partials/header.php'); ?>

<main class="invest-payment-page" style="margin-top:100px;min-height:70vh;">
  <div class="container" style="max-width:420px;margin:0 auto;padding:32px 16px;">
    <section class="card" style="background:#fff;border-radius:16px;box-shadow:0 2px 8px rgba(0,0,0,0.04);padding:32px 24px;">
      <h2 style="font-size:1.5rem;font-weight:700;color:#1e293b;margin-bottom:20px;text-align:center;">Invest in a Project</h2>
      <form id="investForm" action="/createorder" method="POST" style="display:flex;flex-direction:column;gap:20px;">
        <!-- Project Selection -->
        <div class="form-group">
          <label for="project" class="form-label" style="font-weight:600;">Select Project</label>
          <select id="project" name="project_id" class="form-input" required style="width:100%;padding:12px 10px;border-radius:8px;border:1px solid #e2e8f0;">
            <option value="">Choose a project</option>
            <option value="1">CodeMaster IDE</option>
            <option value="2">DataAnalyzer Pro</option>
            <option value="3">SecureVault</option>
           
            <!-- Populate with PHP -->
          </select>
        </div>
        
        <!-- Amount -->
        <div class="form-group">
          <label for="amount" class="form-label" style="font-weight:600;">Amount to Invest ($)</label>
          <input type="number" id="amount" name="amount" class="form-input" min="1" required style="width:100%;padding:12px 10px;border-radius:8px;border:1px solid #e2e8f0;">
        </div>
        <!-- PayPal Button Placeholder -->
        <div class="form-group" style="text-align:center;">
          <div id="paypal-button-container" style="margin:0 auto 10px auto;"></div>
          <button type="submit" id="fake-paypal" style="background:#ffc439;color:#111;font-weight:700;padding:12px 0;width:100%;border:none;border-radius:8px;font-size:1.1rem;box-shadow:0 2px 8px rgba(0,0,0,0.06);margin-bottom:8px;cursor:pointer;">
            <i class="fab fa-paypal" style="font-size:1.3rem;margin-right:8px;"></i> Pay with PayPal
          </button>
          <div style="color:#64748b;font-size:0.95rem;">(PayPal integration goes here)</div>
        </div>
      </form>
      <hr style="margin:28px 0 18px 0;border:none;border-top:1px solid #f1f5f9;">
      <!-- Get in Touch Section -->
      <div class="get-in-touch" style="text-align:center;">
        <div style="font-size:1.1rem;color:#1e293b;font-weight:600;margin-bottom:8px;">Need help or want to pay another way?</div>
        <div style="color:#64748b;font-size:0.98rem;margin-bottom:12px;">Contact our team for support or alternative payment options.</div>
        <a href="/contact" class="cta-button" style="background:linear-gradient(120deg,#3b82f6,#6366f1);color:#fff;padding:10px 28px;border-radius:8px;font-weight:600;text-decoration:none;box-shadow:0 2px 8px rgba(99,102,241,0.12);transition:all 0.2s;">Get in Touch</a>
      </div>

      
    </section>
  </div>
</main>

<!-- Optionally, include PayPal JS SDK here for real integration -->
<!-- <script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID"></script> -->

<?php require(__DIR__.'/../partials/footer.php'); ?>
