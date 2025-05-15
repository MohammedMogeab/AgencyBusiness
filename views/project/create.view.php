<?php

require base_path('views/partials/header.php');


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Project</title>
    <link rel="stylesheet" href="/assets/css/base.css">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
            background: #e0e7ff;
        }
        /* Animated Blobs */
        .bg-blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px) brightness(1.1);
            opacity: 0.7;
            z-index: 0;
            pointer-events: none;
            transition: box-shadow 0.4s, filter 0.4s;
        }
        .bg-blob1 {
            width: 900px; height: 900px;
            top: -200px; left: -200px;
            background: radial-gradient(circle at 30% 30%, #6366f1 0%, #7c3aed 60%, #06b6d4 100%, transparent 100%);
            animation: blobMove 12s ease-in-out infinite alternate;
        }
        .bg-blob2 {
            width: 700px; height: 700px;
            bottom: -180px; right: -180px;
            background: radial-gradient(circle at 70% 70%, #a5b4fc 0%, #f472b6 80%, #f3f6fa 100%, transparent 100%);
            filter: blur(60px) brightness(1.1);
            opacity: 0.6;
            animation: blobMove2 14s ease-in-out infinite alternate;
        }
        .bg-blob3 {
            width: 600px; height: 600px;
            top: 40%; left: 60%;
            background: radial-gradient(circle at 60% 40%, #f472b6 0%, #a21caf 60%, #6366f1 100%, transparent 100%);
            filter: blur(70px) brightness(1.1);
            opacity: 0.5;
            animation: blobMove3 18s ease-in-out infinite alternate;
        }
        @keyframes blobMove {
            0% { top: -200px; left: -200px; }
            100% { top: -100px; left: 100px; }
        }
        @keyframes blobMove2 {
            0% { bottom: -180px; right: -180px; }
            100% { bottom: -80px; right: 80px; }
        }
        @keyframes blobMove3 {
            0% { top: 40%; left: 60%; }
            100% { top: 30%; left: 50%; }
        }
        .form-container {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin: 56px auto 56px auto;
            background: rgba(255,255,255,0.85);
            padding: 56px 48px 44px 48px;
            border-radius: 28px;
            box-shadow: 0 12px 48px 0 rgba(30, 64, 175, 0.18), 0 4px 16px 0 rgba(30, 64, 175, 0.09);
            backdrop-filter: blur(8px) saturate(1.2);
            border: 1.5px solid #e0e7ef;
            transition: box-shadow 0.3s, filter 0.3s;
        }
        .form-container:hover {
            box-shadow: 0 24px 64px 0 rgba(30, 64, 175, 0.22), 0 8px 32px 0 rgba(30, 64, 175, 0.13), 0 0 60px 10px #7c3aed44;
            filter: drop-shadow(0 0 40px #6366f1aa);
        }
        h1 {
            font-size: 2.1rem;
            font-weight: 900;
            color: #1e293b;
            margin-bottom: 32px;
            letter-spacing: -1.2px;
            text-align: center;
        }
        .form-group { margin-bottom: 28px; }
        label { display: block; font-weight: 700; margin-bottom: 8px; color: #1e293b; letter-spacing: 0.2px; font-size: 1rem; }
        input, textarea, select {
            width: 100%;
            padding: 13px 15px;
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            font-size: 1rem;
            background: #f8fafc;
            transition: border 0.2s, box-shadow 0.2s;
            box-shadow: 0 1.5px 6px #2563eb0a;
        }
        input:focus, textarea:focus, select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px #2563eb22, 0 1.5px 6px #2563eb22;
            outline: none;
            background: #fff;
        }
        textarea { resize: vertical; min-height: 110px; }
        .section-title {
            font-size: 1.13rem;
            font-weight: 800;
            margin: 36px 0 18px;
            color: #1d4ed8;
            letter-spacing: 0.7px;
            border-bottom: 2px solid #e0e7ef;
            padding-bottom: 7px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .section-title .section-icon {
            font-size: 1.2rem;
            color: #2563eb;
            background: #e0e7ff;
            border-radius: 50%;
            padding: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .inline-group { display: flex; gap: 32px; }
        .inline-group > * { flex: 1; }
        .dynamic-list { margin-bottom: 18px; }
        .dynamic-list-item {
            display: flex;
            gap: 16px;
            align-items: center;
            margin-bottom: 16px;
            background: #f3f6fa;
            border-radius: 14px;
            padding: 16px 16px 16px 22px;
            box-shadow: 0 2px 8px #2563eb0a;
            position: relative;
        }
        .dynamic-list-item input[type='text'], .dynamic-list-item input[type='file'] { flex: 1; }
        .dynamic-list-item .img-preview {
            width: 60px; height: 60px; object-fit: cover; border-radius: 10px; box-shadow: 0 2px 8px #2563eb22; margin-right: 12px; background: #e5e7eb; display: none;
        }
        .dynamic-list-item.has-img .img-preview { display: block; }
        .remove-btn {
            background: linear-gradient(90deg, #f87171 60%, #ef4444 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 9px 20px;
            font-size: 1.05rem !important;
            font-weight: 800;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 1px 4px #f8717111;
        }
        .remove-btn:hover { background: linear-gradient(90deg, #ef4444 60%, #f87171 100%); box-shadow: 0 2px 8px #f8717133; }
        .add-btn {
            background: linear-gradient(90deg, #2563eb 60%, #1d4ed8 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 32px;
            font-size: 1.05rem;
            font-weight: 900;
            cursor: pointer;
            margin-bottom: 18px;
            box-shadow: 0 2px 8px #2563eb11;
            transition: background 0.2s, box-shadow 0.2s;
        }
        .add-btn:hover { background: linear-gradient(90deg, #1d4ed8 60%, #2563eb 100%); box-shadow: 0 4px 16px #2563eb22; }
        .file-upload-label {
            display: block;
            background: #f1f5f9;
            border: 2.5px dashed #cbd5e1;
            border-radius: 14px;
            padding: 24px 0;
            text-align: center;
            color: #64748b;
            font-weight: 800;
            cursor: pointer;
            margin-bottom: 14px;
            font-size: 1rem;
            transition: border 0.2s, background 0.2s;
        }
        .file-upload-label:hover, .file-upload-label:focus {
            border-color: #2563eb;
            background: #e0e7ef;
        }
        .main-img-preview {
            display: block;
            width: 140px;
            height: 140px;
            object-fit: cover;
            border-radius: 16px;
            margin: 14px auto 24px auto;
            box-shadow: 0 4px 16px #2563eb22;
            background: #e5e7eb;
        }
        button[type=submit] {
            background: linear-gradient(90deg, #2563eb 60%, #1d4ed8 100%);
            color: #fff;
            padding: 15px 0;
            border: none;
            border-radius: 14px;
            font-weight: 900;
            font-size: 1.08rem;
            width: 100%;
            margin-top: 36px;
            box-shadow: 0 4px 16px #2563eb22;
            letter-spacing: 1px;
            transition: background 0.2s, box-shadow 0.2s;
        }
        button[type=submit]:hover {
            background: linear-gradient(90deg, #1d4ed8 60%, #2563eb 100%);
            box-shadow: 0 8px 32px #2563eb33;
        }
        @media (max-width: 700px) {
            .form-container { padding: 10px 1vw; }
            .inline-group { flex-direction: column; gap: 0; }
        }
        .timeline-list {
            display: flex;
            flex-direction: column;
            gap: 24px;
            margin-bottom: 18px;
        }
        .timeline-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            background: linear-gradient(90deg, #e0e7ff 0%, #f8fafc 100%);
            border-left: 5px solid #2563eb;
            border-radius: 14px;
            box-shadow: 0 2px 8px #2563eb11;
            padding: 24px 24px 24px 32px;
            position: relative;
        }
        .timeline-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #2563eb 60%, #1d4ed8 100%);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 4px 16px #2563eb22;
            flex-shrink: 0;
            margin-right: 12px;
        }
        .timeline-fields {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .timeline-fields input[type='text'], .timeline-fields input[type='date'] {
            background: #fff;
            border: 1.5px solid #e5e7eb;
            border-radius: 9px;
            padding: 13px 15px;
            font-size: 1rem;
        }
        .timeline-fields input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px #2563eb22;
        }
        .timeline-remove-btn {
            background: linear-gradient(90deg, #f87171 60%, #ef4444 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 9px 20px;
            font-size: 1.05rem !important;
            font-weight: 800;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
            margin-left: 14px;
            align-self: flex-start;
            box-shadow: 0 1px 4px #f8717111;
        }
        .timeline-remove-btn:hover { background: linear-gradient(90deg, #ef4444 60%, #f87171 100%); box-shadow: 0 2px 8px #f8717133; }
        .team-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 18px;
        }
        .team-item {
            background: linear-gradient(90deg, #f8fafc 60%, #e0e7ff 100%);
            border-radius: 14px;
            box-shadow: 0 2px 8px #2563eb11;
            padding: 22px 22px 18px 22px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            position: relative;
        }
        .team-fields {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }
        .team-fields input[type='text'], .team-fields input[type='url'] {
            background: #fff;
            border: 1.5px solid #e5e7eb;
            border-radius: 9px;
            padding: 13px 15px;
            font-size: 1rem;
            flex: 1 1 180px;
            min-width: 0;
        }
        .team-fields input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px #2563eb22;
        }
        .team-socials {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-top: 2px;
        }
        .team-socials input[type='url'] {
            flex: 1 1 180px;
            min-width: 0;
            padding-left: 36px;
            background-repeat: no-repeat;
            background-position: 10px center;
            background-size: 20px 20px;
        }
        .team-socials input[name*='twitter'] { background-image: url('https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/twitter.svg'); }
        .team-socials input[name*='github'] { background-image: url('https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/github.svg'); }
        .team-socials input[name*='linkedin'] { background-image: url('https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/linkedin.svg'); }
        .team-remove-btn {
            background: linear-gradient(90deg, #f87171 60%, #ef4444 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 9px 20px;
            font-size: 1.05rem;
            font-weight: 800;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 1px 4px #f8717111;
            align-self: flex-end;
            margin-top: 6px;
        }
        .team-remove-btn:hover { background: linear-gradient(90deg, #ef4444 60%, #f87171 100%); box-shadow: 0 2px 8px #f8717133; }
    </style>
</head>
<body>
    <div class="bg-blob bg-blob1"></div>
    <div class="bg-blob bg-blob2"></div>
    <div class="bg-blob bg-blob3"></div>
    <div class="form-container">
        <h1>Create New Project</h1>
        <form action="/project/create" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div class="section-title"><span class="section-icon">📝</span>Project Overview</div>
            <div class="form-group">
                <textarea name="overview" id="overview" rows="5" placeholder="A detailed overview of the project..." required></textarea>
            </div>
            <div class="section-title"><span class="section-icon">📄</span>Short Description</div>
            <div class="form-group">
                <textarea name="description" id="description" rows="3" required></textarea>
            </div>
            <div class="section-title"><span class="section-icon">🖼️</span>Main Image</div>
            <div class="form-group">
                <label class="file-upload-label" for="image">Click to upload main image</label>
                <input type="file" name="image" id="image" accept="image/*" required style="display:none;">
                <img id="main-img-preview" class="main-img-preview" style="display:none;" alt="Main Image Preview">
            </div>
            <div class="section-title"><span class="section-icon">📊</span>Status & Details</div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" required>
                    <option value="Completed">Completed</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Upcoming">Upcoming</option>
                </select>
            </div>
            <div class="inline-group">
                <div class="form-group">
                    <label for="company">Company/Client Name</label>
                    <input type="text" name="company" id="company">
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date">
                </div>
            </div>
            <div class="section-title"><span class="section-icon">🖼️</span>Gallery</div>
            <div id="gallery-list" class="dynamic-list"></div>
            <button type="button" class="add-btn" onclick="addGalleryItem()">Add Gallery Image</button>

            <div class="section-title"><span class="section-icon">⏳</span>Timeline</div>
            <div id="timeline-list" class="timeline-list"></div>
            <button type="button" class="add-btn" onclick="addTimelineItem()">Add Timeline Milestone</button>

            <div class="section-title"><span class="section-icon">👥</span>Team Members</div>
            <div id="team-list" class="team-list"></div>
            <button type="button" class="add-btn" onclick="addTeamItem()">Add Team Member</button>

            <div class="section-title"><span class="section-icon">💻</span>Technologies</div>
            <div id="tech-list" class="dynamic-list"></div>
            <button type="button" class="add-btn" onclick="addTechItem()">Add Technology</button>

            <div class="inline-group">
                <div class="form-group">
                    <label for="progress">Progress (%)</label>
                    <input type="number" name="progress" id="progress" min="0" max="100">
                </div>
                <div class="form-group">
                    <label for="budget">Budget ($)</label>
                    <input type="number" name="budget" id="budget" min="0">
                </div>
                <div class="form-group">
                    <label for="months">Duration (months)</label>
                    <input type="number" name="months" id="months" min="0">
                </div>
            </div>
            <div class="inline-group">
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <input type="number" name="comments" id="comments" min="0">
                </div>
                <div class="form-group">
                    <label for="rate">Rate</label>
                    <input type="number" name="rate" id="rate" min="0">
                </div>
                <div class="form-group">
                    <label for="roi">ROI</label>
                    <input type="number" name="roi" id="roi" min="0">
                </div>
                <div class="form-group">
                    <label for="min_investment">Minimum Investment</label>
                    <input type="number" name="min_investment" id="min_investment" min="0" step="0.01">
                </div>
            </div>
            <button type="submit">Create Project</button>
        </form>
    </div>
    <script>
        // Main image preview
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('main-img-preview');
            if (file) {
                const reader = new FileReader();
                reader.onload = function(evt) {
                    preview.src = evt.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        });
        document.querySelector('.file-upload-label').addEventListener('click', function() {
            document.getElementById('image').click();
        });
        // Gallery
        function addGalleryItem() {
            const list = document.getElementById('gallery-list');
            const idx = list.children.length;
            const div = document.createElement('div');
            div.className = 'dynamic-list-item';
            div.innerHTML = `
                <img class="img-preview" id="gallery-img-preview-${idx}" style="display:none;" alt="Gallery Preview">
                <input type="file" name="gallery[${idx}][file]" accept="image/*" required onchange="previewGalleryImg(event, ${idx})">
                <input type="text" name="gallery[${idx}][caption]" placeholder="Caption" required>
                <button type="button" class="remove-btn" onclick="this.parentElement.remove()">Remove</button>
            `;
            list.appendChild(div);
        }
        function previewGalleryImg(event, idx) {
            const file = event.target.files[0];
            const preview = document.getElementById('gallery-img-preview-' + idx);
            if (file) {
                const reader = new FileReader();
                reader.onload = function(evt) {
                    preview.src = evt.target.result;
                    preview.style.display = 'block';
                    preview.parentElement.classList.add('has-img');
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
                preview.parentElement.classList.remove('has-img');
            }
        }
        // Timeline
        function addTimelineItem() {
            const list = document.getElementById('timeline-list');
            const idx = list.children.length;
            const div = document.createElement('div');
            div.className = 'timeline-item';
            div.innerHTML = `
                <div class="timeline-icon">⏳</div>
                <div class="timeline-fields">
                    <input type="text" name="timeline[${idx}][title]" placeholder="Milestone Title" required>
                    <input type="date" name="timeline[${idx}][date]" required>
                    <input type="text" name="timeline[${idx}][description]" placeholder="Description" required>
                </div>
                <button type="button" class="timeline-remove-btn" onclick="this.parentElement.remove()">Remove</button>
            `;
            list.appendChild(div);
        }
        // Team
        function addTeamItem() {
            const list = document.getElementById('team-list');
            const idx = list.children.length;
            const div = document.createElement('div');
            div.className = 'team-item';
            div.innerHTML = `
                <div class="team-fields">
                    <input type="text" name="team[${idx}][name]" placeholder="Name" required>
                    <input type="text" name="team[${idx}][role]" placeholder="Role" required>
                    <input type="text" name="team[${idx}][avatar]" placeholder="Avatar URL" required>
                </div>
                <div class="team-socials">
                    <input type="url" name="team[${idx}][twitter]" placeholder="Twitter URL">
                    <input type="url" name="team[${idx}][github]" placeholder="GitHub URL">
                    <input type="url" name="team[${idx}][linkedin]" placeholder="LinkedIn URL">
                </div>
                <button type="button" class="team-remove-btn" onclick="this.parentElement.remove()">Remove</button>
            `;
            list.appendChild(div);
        }
        // Technologies
        function addTechItem() {
            const list = document.getElementById('tech-list');
            const idx = list.children.length;
            const div = document.createElement('div');
            div.className = 'dynamic-list-item';
            div.innerHTML = `
                <input type="text" name="technologies[${idx}]" placeholder="Technology" required>
                <button type="button" class="remove-btn" onclick="this.parentElement.remove()">Remove</button>
            `;
            list.appendChild(div);
        }
        // Parallax blob effect
        const blobs = [
            document.querySelector('.bg-blob1'),
            document.querySelector('.bg-blob2'),
            document.querySelector('.bg-blob3')
        ];
        document.addEventListener('mousemove', function(e) {
            const x = e.clientX / window.innerWidth - 0.5;
            const y = e.clientY / window.innerHeight - 0.5;
            blobs[0].style.transform = `translate(${x * 60}px, ${y * 60}px) scale(1.04)`;
            blobs[1].style.transform = `translate(${-x * 40}px, ${-y * 40}px) scale(1.02)`;
            blobs[2].style.transform = `translate(${x * 80}px, ${-y * 60}px) scale(1.06)`;
        });
        document.querySelector('.form-container').addEventListener('mouseenter', function() {
            blobs.forEach(blob => blob.style.filter = 'blur(40px) brightness(1.2) drop-shadow(0 0 60px #7c3aed88)');
        });
        document.querySelector('.form-container').addEventListener('mouseleave', function() {
            blobs[0].style.filter = 'blur(80px) brightness(1.1)';
            blobs[1].style.filter = 'blur(60px) brightness(1.1)';
            blobs[2].style.filter = 'blur(70px) brightness(1.1)';
        });
    </script>
</body>
</html>
<?php

require base_path('views/partials/footer.php');
