<?php

require base_path('views/partials/header.php');

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $request === 'edit' ? 'Edit Blog' : 'Create Blog'; ?></title>
    <link rel="stylesheet" href="/assets/css/base.css">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
            background: #e0e7ff;
        }
        .bg-blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px) brightness(1.1);
            opacity: 0.7;
            z-index: 0;
            pointer-events: none;
        }
        .form-container {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin: 56px auto;
            background: rgba(255,255,255,0.85);
            padding: 56px 48px;
            border-radius: 28px;
            box-shadow: 0 12px 48px rgba(30, 64, 175, 0.18);
        }
        h1 {
            font-size: 2.1rem;
            font-weight: 900;
            color: #1e293b;
            margin-bottom: 32px;
            text-align: center;
        }
        .form-group { margin-bottom: 28px; }
        label { display: block; font-weight: 700; margin-bottom: 8px; color: #1e293b; }
        input, textarea {
            width: 100%;
            padding: 13px;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            background: #f8fafc;
        }
        button[type=submit] {
            background: linear-gradient(90deg, #2563eb 60%, #1d4ed8 100%);
            color: #fff;
            padding: 15px 0;
            border: none;
            border-radius: 14px;
            font-weight: 900;
            width: 100%;
            margin-top: 36px;
            transition: background 0.2s;
        }
        button[type=submit]:hover {
            background: linear-gradient(90deg, #1d4ed8 60%, #2563eb 100%);
        }
        @media (max-width: 700px) {
            .form-container { padding: 10px 1vw; }
        }
    </style>
</head>
<body>
    <div class="bg-blob bg-blob1"></div>
    <div class="bg-blob bg-blob2"></div>
    <div class="bg-blob bg-blob3"></div>
    <div class="form-container">
        <h1><?php echo $request === 'edit' ? 'Edit Blog' : 'Create Blog'; ?></h1>
        <form action="<?php echo $request === 'edit' ? '/blog/edit' : '/blog/store'; ?>" method="POST" enctype="multipart/form-data">
            <?php if ($request === 'edit'): ?>
                <input type="hidden" name="blog_id" value="<?php echo $blog['blog_id']; ?>">
            <?php endif; ?>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="<?php echo $request === 'edit' ? htmlspecialchars($blog['blog_title']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" rows="5" required><?php echo $request === 'edit' ? htmlspecialchars($blog['content']) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" value="<?= $request === 'edit' ? $blog['image'] : ''; ?>" accept="image/*" <?php echo $request === 'edit' ? '' : 'required'; ?>>
            </div>
            <button type="submit"><?php echo $request === 'edit' ? 'Update Blog' : 'Create Blog'; ?></button>
        </form>
    </div>
</body>
</html>
<?php

require base_path('views/partials/footer.php');

?>