<?php

?>
<style>
.cancel-container {
  min-height: 80vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #f8fafc;
}
.cancel-card {
  background: #fff;
  border-radius: 18px;
  box-shadow: 0 8px 32px rgba(30,41,59,0.10);
  padding: 48px 36px 36px 36px;
  max-width: 400px;
  width: 95vw;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.cancel-icon {
  font-size: 3.5rem;
  color: #dc2626;
  margin-bottom: 18px;
}
.cancel-title {
  font-size: 2rem;
  font-weight: 800;
  color: #1e293b;
  margin-bottom: 10px;
}
.cancel-message {
  color: #64748b;
  font-size: 1.1rem;
  margin-bottom: 28px;
}
.cancel-btn {
  padding: 12px 28px;
  background: linear-gradient(90deg, #2563eb 60%, #1d4ed8 100%);
  color: #fff;
  border: none;
  border-radius: 8px;
  font-weight: 700;
  font-size: 1.05rem;
  cursor: pointer;
  transition: background 0.2s;
  text-decoration: none;
  display: inline-block;
}
.cancel-btn:hover {
  background: linear-gradient(90deg, #1d4ed8 60%, #2563eb 100%);
}
</style>
<div class="cancel-container">
  <div class="cancel-card">
    <div class="cancel-icon">
      <ion-icon name="close-circle-outline"></ion-icon>
    </div>
    <div class="cancel-title">Payment Cancelled</div>
    <div class="cancel-message">
      Your payment was not completed.<br>
      If you cancelled by mistake, you can try again or return to the homepage.
    </div>
    <a href="/" class="cancel-btn">Return to Home</a>
  </div>
</div>
<!-- Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>  