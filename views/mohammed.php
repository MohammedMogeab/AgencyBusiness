<?php
// view('project/create.view.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .dropzone {
            border: 2px dashed #cbd5e0;
            border-radius: 0.5rem;
            background: #f8fafc;
            min-height: 150px;
            padding: 20px;
            transition: all 0.3s ease;
        }
        .dropzone:hover {
            border-color: #3b82f6;
            background: #f0f9ff;
        }
        .dropzone .dz-preview .dz-image {
            border-radius: 0.5rem;
        }
        .tab-content {
            display: none;
            animation: fadeIn 0.3s ease;
        }
        .tab-content.active {
            display: block;
        }
        .drag-handle {
            cursor: move;
            transition: color 0.2s ease;
        }
        .drag-handle:hover {
            color: #3b82f6;
        }
        .sortable-ghost {
            opacity: 0.5;
            background: #c8ebfb;
        }
        #sidebar {
            scrollbar-width: thin;
            scrollbar-color: #cbd5e0 #f1f5f9;
        }
        #sidebar::-webkit-scrollbar {
            width: 8px;
        }
        #sidebar::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        #sidebar::-webkit-scrollbar-thumb {
            background-color: #cbd5e0;
            border-radius: 4px;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        .btn-primary {
            background: #3b82f6;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-1px);
        }
        .btn-danger {
            color: #ef4444;
            transition: all 0.2s ease;
        }
        .btn-danger:hover {
            color: #dc2626;
            transform: scale(1.1);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }
        .form-input:hover, .form-select:hover, .form-textarea:hover {
            border-color: #9ca3af;
        }
        .card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 1rem;
        }
        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .input-error {
            border-color: #ef4444 !important;
        }
        .success-message {
            color: #10b981;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }
        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 1.5rem;
            height: 1.5rem;
            border: 2px solid #3b82f6;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Navigation -->
        <div id="sidebar" class="w-64 bg-white border-r border-gray-200 flex flex-col h-full overflow-y-auto">
            <div class="p-4 border-b border-gray-200">
                <h1 class="text-xl font-bold text-gray-800">Create New Project</h1>
            </div>
            <nav class="flex-1 p-4 space-y-1">
                <button data-tab="basic" class="tab-btn w-full text-left px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors active">
                    <i class="fas fa-info-circle mr-2"></i> Basic Information
                </button>
                <button data-tab="media" class="tab-btn w-full text-left px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    <i class="fas fa-images mr-2"></i> Media & Gallery
                </button>
                <button data-tab="team" class="tab-btn w-full text-left px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    <i class="fas fa-users mr-2"></i> Team Members
                </button>
                <button data-tab="technical" class="tab-btn w-full text-left px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    <i class="fas fa-code mr-2"></i> Technical Details
                </button>
                <button data-tab="resources" class="tab-btn w-full text-left px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    <i class="fas fa-link mr-2"></i> Resources & Links
                </button>
                <button data-tab="faq" class="tab-btn w-full text-left px-4 py-2 rounded-lg font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    <i class="fas fa-question-circle mr-2"></i> FAQs
                </button>
            </nav>
            <div class="p-4 border-t border-gray-200">
                <button type="submit" form="projectForm" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                    Create Project
                </button>
            </div>
        </div>

        <!-- Central Input Area -->
        <div class="flex-1 overflow-y-auto p-6">
            <form id="projectForm" class="max-w-4xl mx-auto">
                <!-- Basic Information Tab -->
                <div id="basic" class="tab-content active space-y-6">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Project Details</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Project Name*</label>
                                <input type="text" name="project_name" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Category*</label>
                                <select name="category_id" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select a category</option>
                                    <!-- Categories would be populated from PHP variable -->
                                    <option value="1">Web Development</option>
                                    <option value="2">Mobile App</option>
                                    <option value="3">Desktop Software</option>
                                    <option value="4">AI/ML</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    <option value="Planning">Planning</option>
                                    <option value="In Development">In Development</option>
                                    <option value="Beta">Beta</option>
                                    <option value="Released" selected>Released</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Version</label>
                                <input type="text" name="version" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="1.0.0">
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Short Description*</label>
                            <textarea name="short_description" required rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Detailed Description</label>
                            <textarea name="large_description" rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Project Timeline</h2>
                        <div id="timeline-container" class="space-y-4">
                            <div class="timeline-item flex items-start space-x-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
                                <div class="drag-handle mt-1 text-gray-400 hover:text-gray-600 cursor-move">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Title*</label>
                                        <input type="text" name="timeline[0][title]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Date*</label>
                                        <input type="date" name="timeline[0][date]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                        <input type="text" name="timeline[0][description]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>
                                <button type="button" class="remove-btn text-red-500 hover:text-red-700 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button type="button" id="add-timeline" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add Timeline Event
                        </button>
                    </div>
                </div>

                <!-- Media & Gallery Tab -->
                <div id="media" class="tab-content space-y-6">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Main Project Image</h2>
                        <div class="dropzone" id="main-image-dropzone">
                            <div class="dz-message text-center py-8">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="mt-2 text-sm text-gray-600">Drag & drop your main project image here or click to browse</p>
                                <p class="text-xs text-gray-500 mt-1">Recommended size: 1200x630px</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Project Gallery</h2>
                        <div class="dropzone" id="gallery-dropzone" onclick="document.getElementById('gallery-file-input').click();">
                            <div class="dz-message text-center py-8">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="mt-2 text-sm text-gray-600">Drag & drop multiple images here or click to browse</p>
                                <p class="text-xs text-gray-500 mt-1">Images will be displayed in the order they're uploaded</p>
                            </div>
                            <input type="file" id="gallery-file-input" name="gallery_images[]" multiple accept="image/*" style="display:none;">
                            <div id="gallery-preview" class="flex flex-wrap mt-4"></div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Project Video</h2>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">YouTube Video URL</label>
                                <input type="url" name="youtube_url" placeholder="https://youtube.com/watch?v=..." class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Members Tab -->
                <div id="team" class="tab-content space-y-6">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Project Developers</h2>
                        <div id="developers-container" class="space-y-4">
                            <div class="developer-item flex items-start space-x-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
                                <div class="drag-handle mt-1 text-gray-400 hover:text-gray-600 cursor-move">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Name*</label>
                                        <input type="text" name="developers[0][name]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Email*</label>
                                        <input type="email" name="developers[0][email]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Profile Link</label>
                                        <input type="url" name="developers[0][link]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>
                                <button type="button" class="remove-btn text-red-500 hover:text-red-700 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button type="button" id="add-developer" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add Developer
                        </button>
                    </div>
                </div>

                <!-- Technical Details Tab -->
                <div id="technical" class="tab-content space-y-6">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Technologies Used</h2>
                        <div id="technologies-container" class="space-y-4">
                            <div class="technology-item flex items-start space-x-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
                                <div class="drag-handle mt-1 text-gray-400 hover:text-gray-600 cursor-move">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Technology Name*</label>
                                        <input type="text" name="technologies[0][name]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                        <input type="text" name="technologies[0][description]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>
                                <button type="button" class="remove-btn text-red-500 hover:text-red-700 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button type="button" id="add-technology" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add Technology
                        </button>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Programming Languages</h2>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Select Languages*</label>
                                <select id="languages-select" name="languages[]" multiple="multiple" class="w-full">
                                    <!-- Languages would be populated from PHP variable -->
                                    <option value="1">JavaScript</option>
                                    <option value="2">Python</option>
                                    <option value="3">Java</option>
                                    <option value="4">C#</option>
                                    <option value="5">PHP</option>
                                    <option value="6">C++</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Add New Language</label>
                                <div class="flex space-x-2">
                                    <input type="text" id="new-language" placeholder="Language name" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    <button type="button" id="add-language" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Related Projects</h2>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Select Related Projects</label>
                                <select id="related-projects" name="related_projects[]" multiple="multiple" class="w-full">
                                    <!-- Projects would be populated from PHP variable -->
                                    <option value="1">CodeMaster IDE</option>
                                    <option value="2">DataAnalyzer Pro</option>
                                    <option value="3">SecureVault</option>
                                    <option value="4">MobilePay</option>
                                    <option value="5">GameEngine 3D</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resources & Links Tab -->
                <div id="resources" class="tab-content space-y-6">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Project Resources</h2>
                        <div id="resources-container" class="space-y-4">
                            <div class="resource-item flex items-start space-x-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
                                <div class="drag-handle mt-1 text-gray-400 hover:text-gray-600 cursor-move">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Resource Name*</label>
                                        <input type="text" name="resources[0][name]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">URL*</label>
                                        <input type="url" name="resources[0][url]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Type*</label>
                                        <select name="resources[0][type]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                            <option value="Documentation">Documentation</option>
                                            <option value="API">API</option>
                                            <option value="Download">Download</option>
                                            <option value="GitHub">GitHub</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="button" class="remove-btn text-red-500 hover:text-red-700 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button type="button" id="add-resource" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add Resource
                        </button>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">File Uploads</h2>
                        <div class="dropzone" id="files-dropzone">
                            <div class="dz-message text-center py-8">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mt-2 text-sm text-gray-600">Drag & drop files here or click to browse</p>
                                <p class="text-xs text-gray-500 mt-1">PDFs, ZIPs, and other document formats</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQs Tab -->
                <div id="faq" class="tab-content space-y-6">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Frequently Asked Questions</h2>
                        <div id="faqs-container" class="space-y-4">
                            <div class="faq-item flex items-start space-x-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
                                <div class="drag-handle mt-1 text-gray-400 hover:text-gray-600 cursor-move">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Question*</label>
                                        <input type="text" name="faqs[0][question]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Answer*</label>
                                        <textarea name="faqs[0][answer]" required rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                                    </div>
                                </div>
                                <button type="button" class="remove-btn text-red-500 hover:text-red-700 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <button type="button" id="add-faq" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add FAQ
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Required JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        Dropzone.autoDiscover = false; // Ensure Dropzone does not auto-initialize
        $(document).ready(function() {
            // Initialize counters for dynamic fields
            let timelineCount = 1;
            let developerCount = 1;
            let technologyCount = 1;
            let resourceCount = 1;
            let faqCount = 1;

            // Function to create new dynamic field
            function createNewField(type, count) {
                let template, container, itemClass;
                
                switch(type) {
                    case 'timeline':
                        template = `
                            <div class="timeline-item flex items-start space-x-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
                                <div class="drag-handle mt-1 text-gray-400 hover:text-gray-600 cursor-move">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Title*</label>
                                        <input type="text" name="timeline[${count}][title]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Date*</label>
                                        <input type="date" name="timeline[${count}][date]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                        <input type="text" name="timeline[${count}][description]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>
                                <button type="button" class="remove-btn text-red-500 hover:text-red-700 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        `;
                        container = '#timeline-container';
                        itemClass = 'timeline-item';
                        break;
                    case 'developer':
                        template = `
                            <div class="developer-item flex items-start space-x-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
                                <div class="drag-handle mt-1 text-gray-400 hover:text-gray-600 cursor-move">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Name*</label>
                                        <input type="text" name="developers[${count}][name]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Email*</label>
                                        <input type="email" name="developers[${count}][email]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Profile Link</label>
                                        <input type="url" name="developers[${count}][link]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>
                                <button type="button" class="remove-btn text-red-500 hover:text-red-700 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        `;
                        container = '#developers-container';
                        itemClass = 'developer-item';
                        break;
                    case 'technology':
                        template = `
                            <div class="technology-item flex items-start space-x-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
                                <div class="drag-handle mt-1 text-gray-400 hover:text-gray-600 cursor-move">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Technology Name*</label>
                                        <input type="text" name="technologies[${count}][name]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                        <input type="text" name="technologies[${count}][description]" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                </div>
                                <button type="button" class="remove-btn text-red-500 hover:text-red-700 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        `;
                        container = '#technologies-container';
                        itemClass = 'technology-item';
                        break;
                    case 'resource':
                        template = `
                            <div class="resource-item flex items-start space-x-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
                                <div class="drag-handle mt-1 text-gray-400 hover:text-gray-600 cursor-move">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Resource Name*</label>
                                        <input type="text" name="resources[${count}][name]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">URL*</label>
                                        <input type="url" name="resources[${count}][url]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Type*</label>
                                        <select name="resources[${count}][type]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                            <option value="Documentation">Documentation</option>
                                            <option value="API">API</option>
                                            <option value="Download">Download</option>
                                            <option value="GitHub">GitHub</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="button" class="remove-btn text-red-500 hover:text-red-700 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        `;
                        container = '#resources-container';
                        itemClass = 'resource-item';
                        break;
                    case 'faq':
                        template = `
                            <div class="faq-item flex items-start space-x-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
                                <div class="drag-handle mt-1 text-gray-400 hover:text-gray-600 cursor-move">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Question*</label>
                                        <input type="text" name="faqs[${count}][question]" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Answer*</label>
                                        <textarea name="faqs[${count}][answer]" required rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                                    </div>
                                </div>
                                <button type="button" class="remove-btn text-red-500 hover:text-red-700 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        `;
                        container = '#faqs-container';
                        itemClass = 'faq-item';
                        break;
                }

                const newField = template.replace(/\${count}/g, count);
                $(container).append(newField);
                
                // Initialize Sortable for the new item
                new Sortable(document.querySelector(container), {
                    handle: '.drag-handle',
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    itemClass: itemClass
                });
            }

            // Add event listeners for adding new fields
            $('#add-timeline').on('click', function() {
                createNewField('timeline', timelineCount++);
            });

            $('#add-developer').on('click', function() {
                createNewField('developer', developerCount++);
            });

            $('#add-technology').on('click', function() {
                createNewField('technology', technologyCount++);
            });

            $('#add-resource').on('click', function() {
                createNewField('resource', resourceCount++);
            });

            $('#add-faq').on('click', function() {
                createNewField('faq', faqCount++);
            });

            // Remove item functionality with confirmation
            $(document).on('click', '.remove-btn', function(e) {
                e.preventDefault();
                e.stopPropagation();
                // More robust selector for parent item
                const item = $(this).parents('.timeline-item, .developer-item, .technology-item, .resource-item, .faq-item').first();
                console.log('Trying to remove:', item);
                if (item.length && confirm('Are you sure you want to remove this item?')) {
                    item.fadeOut(300, function() {
                        $(this).remove();
                    });
                } else if (!item.length) {
                    alert('Could not find the item to remove.');
                }
            });

            // Form validation
            const projectForm = $('#projectForm');
            let isSubmitting = false;

            projectForm.on('submit', function(e) {
                e.preventDefault();
                
                if (isSubmitting) return;
                
                // Basic validation
                const requiredFields = projectForm.find('[required]');
                let isValid = true;
                
                requiredFields.each(function() {
                    if (!$(this).val()) {
                        isValid = false;
                        $(this).addClass('input-error');
                        $(this).next('.error-message').remove();
                        $(this).after('<span class="error-message">This field is required</span>');
                    } else {
                        $(this).removeClass('input-error');
                        $(this).next('.error-message').remove();
                    }
                });
                
                if (!isValid) {
                    alert('Please fill in all required fields');
                    return;
                }
                
                // Validate file uploads
                const mainImage = mainImageDropzone.getAcceptedFiles();
                if (mainImage.length === 0) {
                    alert('Please upload a main project image');
                    return;
                }
                
                // Show loading state
                isSubmitting = true;
                projectForm.addClass('loading');
                
                // Collect form data
                const formData = new FormData(this);
                
                // Add files from dropzones
                formData.append('main_image', mainImage[0]);
                
                const galleryImages = galleryDropzone.getAcceptedFiles();
                galleryImages.forEach((file, index) => {
                    formData.append(`gallery_images[${index}]`, file);
                });
                
                const projectFiles = filesDropzone.getAcceptedFiles();
                projectFiles.forEach((file, index) => {
                    formData.append(`project_files[${index}]`, file);
                });
                
                // Submit form
                $.ajax({
                    url: '/api/projects',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Show success message
                        const successMessage = $('<div class="success-message">Project created successfully!</div>');
                        projectForm.prepend(successMessage);
                        
                        // Redirect after delay
                        setTimeout(() => {
                            window.location.href = '/projects';
                        }, 2000);
                    },
                    error: function(xhr) {
                        const errors = xhr.responseJSON?.errors || {};
                        Object.keys(errors).forEach(field => {
                            const input = $(`[name="${field}"]`);
                            input.addClass('input-error');
                            input.next('.error-message').remove();
                            input.after(`<span class="error-message">${errors[field].join(', ')}</span>`);
                        });
                        
                        // Reset loading state
                        isSubmitting = false;
                        projectForm.removeClass('loading');
                    }
                });
            });

            // Tab functionality with validation
            $('.tab-btn').click(function() {
                const currentTab = $('.tab-content.active');
                const requiredFields = currentTab.find('[required]');
                let isValid = true;
                
                requiredFields.each(function() {
                    if (!$(this).val()) {
                        isValid = false;
                        $(this).addClass('input-error');
                        $(this).next('.error-message').remove();
                        $(this).after('<span class="error-message">This field is required</span>');
                    }
                });
                
                if (!isValid) {
                    alert('Please fill in all required fields in the current tab before proceeding');
                    return;
                }
                
                $('.tab-btn').removeClass('active text-blue-600 bg-blue-50');
                $(this).addClass('active text-blue-600 bg-blue-50');
                
                const tabId = $(this).data('tab');
                $('.tab-content').removeClass('active');
                $(`#${tabId}`).addClass('active');
            });

            // Initialize Select2 with search and validation
            $('#languages-select, #related-projects').select2({
                placeholder: "Select options",
                width: '100%',
                allowClear: true,
                tags: true,
                theme: 'classic'
            }).on('change', function() {
                if ($(this).val() && $(this).hasClass('input-error')) {
                    $(this).removeClass('input-error');
                    $(this).next('.error-message').remove();
                }
            });

            // Add new language with validation
            $('#add-language').click(function() {
                const newLang = $('#new-language').val().trim();
                if (!newLang) {
                    $('#new-language').addClass('input-error');
                    $('#new-language').next('.error-message').remove();
                    $('#new-language').after('<span class="error-message">Please enter a language name</span>');
                    return;
                }
                
                const $select = $('#languages-select');
                const newOption = new Option(newLang, newLang, true, true);
                $select.append(newOption).trigger('change');
                $('#new-language').val('').removeClass('input-error');
                $('#new-language').next('.error-message').remove();
            });

            // Initialize Dropzones with validation
            Dropzone.autoDiscover = false;
            
            const mainImageDropzone = new Dropzone("#main-image-dropzone", {
                url: "/api/upload",
                paramName: "main_image",
                maxFiles: 1,
                acceptedFiles: "image/*",
                maxFilesize: 5, // MB
                dictDefaultMessage: "",
                addRemoveLinks: true,
                init: function() {
                    this.on("maxfilesexceeded", function(file) {
                        this.removeAllFiles();
                        this.addFile(file);
                    });
                    this.on("error", function(file, errorMessage) {
                        alert(errorMessage);
                    });
                    this.on("success", function(file) {
                        file.previewElement.classList.add('dz-success');
                    });
                }
            });

            const filesDropzone = new Dropzone("#files-dropzone", {
                url: "/api/upload",
                paramName: "project_files",
                maxFilesize: 10, // MB
                dictDefaultMessage: "",
                addRemoveLinks: true,
                parallelUploads: 10,
                uploadMultiple: false,
                init: function() {
                    this.on("error", function(file, errorMessage) {
                        alert(errorMessage);
                    });
                    this.on("success", function(file) {
                        file.previewElement.classList.add('dz-success');
                    });
                }
            });

            // Make items sortable with animation and validation
            const sortableOptions = {
                handle: '.drag-handle',
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function(evt) {
                    // Update indices after sorting
                    const container = evt.to;
                    const items = container.getElementsByClassName(container.dataset.itemClass);
                    Array.from(items).forEach((item, index) => {
                        const inputs = item.getElementsByTagName('input');
                        Array.from(inputs).forEach(input => {
                            const name = input.name;
                            input.name = name.replace(/\[\d+\]/, `[${index}]`);
                        });
                    });
                }
            };

            new Sortable(document.getElementById('timeline-container'), {
                ...sortableOptions,
                itemClass: 'timeline-item'
            });

            new Sortable(document.getElementById('developers-container'), {
                ...sortableOptions,
                itemClass: 'developer-item'
            });

            new Sortable(document.getElementById('technologies-container'), {
                ...sortableOptions,
                itemClass: 'technology-item'
            });

            new Sortable(document.getElementById('resources-container'), {
                ...sortableOptions,
                itemClass: 'resource-item'
            });

            new Sortable(document.getElementById('faqs-container'), {
                ...sortableOptions,
                itemClass: 'faq-item'
            });

            // Input validation on blur
            $(document).on('blur', 'input[required], textarea[required], select[required]', function() {
                if (!$(this).val()) {
                    $(this).addClass('input-error');
                    $(this).next('.error-message').remove();
                    $(this).after('<span class="error-message">This field is required</span>');
                } else {
                    $(this).removeClass('input-error');
                    $(this).next('.error-message').remove();
                }
            });

            // Clear validation on input
            $(document).on('input', 'input, textarea, select', function() {
                $(this).removeClass('input-error');
                $(this).next('.error-message').remove();
            });

            // Initialize tooltips
            $('[data-tooltip]').each(function() {
                const tooltip = $(this).attr('data-tooltip');
                $(this).append(`<span class="tooltip">${tooltip}</span>`);
            });

            // Native file input and preview logic for gallery images
            const input = document.getElementById('gallery-file-input');
            const preview = document.getElementById('gallery-preview');
            const dropzone = document.getElementById('gallery-dropzone');

            input.addEventListener('change', function() {
                preview.innerHTML = '';
                for (const file of input.files) {
                    if (!file.type.startsWith('image/')) continue;
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-24 h-24 object-cover m-2 rounded shadow';
                        preview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });

            dropzone.addEventListener('dragover', function(e) {
                e.preventDefault();
                dropzone.classList.add('border-blue-500');
            });
            dropzone.addEventListener('dragleave', function(e) {
                e.preventDefault();
                dropzone.classList.remove('border-blue-500');
            });
            dropzone.addEventListener('drop', function(e) {
                e.preventDefault();
                dropzone.classList.remove('border-blue-500');
                input.files = e.dataTransfer.files;
                input.dispatchEvent(new Event('change'));
            });
        });
    </script>
</body>
</html>