<?php require base_path('views/partials/header.php') ?>

<div class="error-page">
    <div class="error-container">
        <div class="error-content">
            <div class="error-icon">
                <ion-icon name="lock-closed-outline"></ion-icon>
            </div>
            <h1>403</h1>
            <h2>Access Forbidden</h2>
            <p>Sorry, you don't have permission to access this page.</p>
            <div class="error-actions">
                <button class="back-btn" onclick="window.history.back()">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                    <span>Go Back</span>
                </button>
                <button class="home-btn" onclick="window.location.href='/'">
                    <ion-icon name="home-outline"></ion-icon>
                    <span>Go Home</span>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.error-page {
    margin-top: 60px;
    min-height: calc(100vh - 60px);
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
    padding: 2rem;
}

.error-container {
    background-color: white;
    border-radius: 1rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    padding: 3rem;
    text-align: center;
    max-width: 500px;
    width: 100%;
}

.error-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
}

.error-icon {
    font-size: 4rem;
    color: #4361ee;
    margin-bottom: 1rem;
}

.error-content h1 {
    font-size: 4rem;
    font-weight: 700;
    color: #2b2d42;
    margin: 0;
    line-height: 1;
}

.error-content h2 {
    font-size: 1.75rem;
    font-weight: 600;
    color: #2b2d42;
    margin: 0;
}

.error-content p {
    color: #8d99ae;
    font-size: 1.1rem;
    margin: 0;
}

.error-actions {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}

.error-actions button {
    display: flex;
    align-items: center;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 0.5rem;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.error-actions button ion-icon {
    font-size: 1.25rem;
    margin-right: 0.5rem;
}

.back-btn {
    background-color: #f8f9fa;
    color: #2b2d42;
}

.back-btn:hover {
    background-color: #e9ecef;
    color: #4361ee;
}

.home-btn {
    background-color: #4361ee;
    color: white;
}

.home-btn:hover {
    background-color: #3f37c9;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .error-container {
        padding: 2rem;
    }

    .error-content h1 {
        font-size: 3rem;
    }

    .error-content h2 {
        font-size: 1.5rem;
    }

    .error-actions {
        flex-direction: column;
        width: 100%;
    }

    .error-actions button {
        width: 100%;
        justify-content: center;
    }
}
</style>

<?php require base_path('views/partials/footer.php') ?>
