<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details - Agency Business</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 text-white overflow-hidden">
        <div class="container mx-auto px-6 py-24 relative">
            <div class="flex flex-col md:flex-row items-center justify-between gap-12">
                <div class="md:w-1/2 space-y-8">
                    <span class="px-4 py-2 bg-white/10 rounded-full text-sm font-medium border border-white/20"><?= $project['status'] ?></span>
                    <h1 class="text-5xl md:text-6xl font-bold leading-tight tracking-tight"><?= $project['title'] ?></h1>
                    <p class="text-xl md:text-2xl text-blue-100 leading-relaxed"><?= $project['description'] ?></p>
                    <div class="flex flex-wrap gap-4 pt-4">
                        <div class="flex items-center space-x-2 bg-white/10 px-4 py-3 rounded-lg border border-white/20">
                            <span><?= $project['client_name'] ?></span>
                        </div>
                        <div class="flex items-center space-x-2 bg-white/10 px-4 py-3 rounded-lg border border-white/20">
                            <span><?php echo (new DateTime($project['start_date']))->format('M Y') ?></span>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 relative">
                    <img src="<?= './assets/images/' . $project['main_image'] ?>" alt="Project Preview" class="w-full h-[400px] object-cover rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
    </div>
<!-- Project Details Section -->
    <div class="bg-gray-50">
        <div class="container mx-auto px-6 py-20">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Project Description -->
            <?php if((isset($project['overviews']) && count($project['overviews']) > 0 )|| isset($project['overview'])):?>
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h2 class="text-3xl font-bold mb-8 text-gray-800">Project Overview</h2>
                    <div class="prose prose-lg max-w-none text-gray-600">
                        <p><?= isset($project['overview']) ? $project['overview'] : ''?></p>
                        <?php if(isset($project['overviews'])):?>
                        <ul>
                            <?php foreach($project['overviews'] as $overview):?>
                            <li><?= $overview['overview'] ?></li>
                            <?php endforeach;?>
                        </ul>
                        <?php endif;?>
                    </div>
                </div>
            <?php endif;?>
            <!-- Project Gallery -->
            <div class="bg-white rounded-2xl shadow-xl p-8" id="galleryy">
                <h2 class="text-3xl font-bold mb-8 text-gray-800">Project Gallery</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-6" id="gallery"></div>
            </div>
            <!-- Project Timeline -->
                    <div class="bg-white rounded-2xl shadow-xl p-8" id="timelinee">
                        <h2 class="text-3xl font-bold mb-8 text-gray-800">Project Timeline</h2>
                        <div class="relative space-y-8" id="timeline"></div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="lg:col-span-1 space-y-8">
                    <!-- Project Stats -->
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <h2 class="text-2xl font-bold mb-8 text-gray-800">Project Statistics</h2>
                        <div class="space-y-6">
                            <div class="space-y-2">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600 font-medium">Progress</span>
                                    <span class="text-gray-800 font-semibold"><?= $project['progress']?>%</span>
                                </div>
                                <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-full" style="width: <?= $project['progress']?>%"></div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-gray-50 rounded-xl p-4">
                                    <p class="text-sm text-gray-500 mb-1">Budget</p>
                                    <p class="text-xl font-bold text-gray-800"><?= $project['budget']?></p>
                                </div>
                                <div class="bg-gray-50 rounded-xl p-4">
                                    <p class="text-sm text-gray-500 mb-1">Duration</p>
                                    <p class="text-xl font-bold text-gray-800"><?= $project['duration']?> months</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team Members -->
                    <div class="bg-white rounded-2xl shadow-xl p-8" id="team">
                        <h2 class="text-2xl font-bold mb-8 text-gray-800">Project Team</h2>
                        <div class="space-y-4" id="team-members"></div>
                    </div>
                    <!-- Technologies Used -->
                    <div class="bg-white rounded-2xl shadow-xl p-8" id="techntechn">
                        <h2 class="text-2xl font-bold mb-8 text-gray-800">Technologies Used</h2>
                        <div class="flex flex-wrap gap-3" id="technologies"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action Section -->
    <div class="relative bg-gradient-to-br from-blue-900 to-indigo-900 text-white overflow-hidden">
        <div class="container mx-auto px-6 py-20 relative">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-4xl font-bold mb-6">Ready to Start Your Project?</h2>
                <p class="text-xl text-blue-100 mb-10 leading-relaxed">Let\'s transform your ideas into reality. Our team of experts is ready to help you create something amazing.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/contact" class="inline-flex items-center justify-center px-8 py-4 bg-white text-blue-900 rounded-xl font-semibold hover:bg-blue-50 transition-colors duration-300 transform hover:scale-105">Get in Touch</a>
                    <a href="/projects" class="inline-flex items-center justify-center px-8 py-4 bg-blue-800 text-white rounded-xl font-semibold hover:bg-blue-700 transition-colors duration-300 transform hover:scale-105">View All Projects</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Dark Mode Toggle -->
    <button id="darkToggle" class="fixed top-4 right-4 z-50 bg-gray-200 text-gray-800 px-4 py-2 rounded-lg shadow hover:bg-gray-300 transition-colors duration-300">🌙 Dark Mode</button>

    <!-- Contact Modal -->
    <div id="contactModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl p-8 w-full max-w-md shadow-2xl relative">
            <button onclick="toggleContactModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Contact Us</h2>
            <form onsubmit="event.preventDefault(); alert('Thank you! (Demo only)'); toggleContactModal();">
                <input type="text" placeholder="Your Name" class="w-full mb-3 px-4 py-2 rounded border border-gray-300" required>
                <input type="email" placeholder="Your Email" class="w-full mb-3 px-4 py-2 rounded border border-gray-300" required>
                <textarea placeholder="Your Message" class="w-full mb-3 px-4 py-2 rounded border border-gray-300" required></textarea>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded font-semibold hover:bg-blue-700 transition">Send</button>
            </form>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button id="backToTop" class="hidden fixed bottom-6 right-6 bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 transition">↑</button>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden">
        <div class="relative">
            <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[80vh] rounded-lg shadow-2xl">
            <button onclick="closeLightbox()" class="absolute top-2 right-2 text-white text-3xl">&times;</button>
        </div>
    </div>

    <!-- --- EXTRA FEATURES START --- -->

    <!-- Animated Counters Section -->
    <div class="bg-white py-12">
        <div class="container mx-auto flex flex-wrap justify-center gap-12">
            <div class="text-center">
                <div class="text-5xl font-bold text-blue-700" id="counter-users"><?= $project['users_impacted'] ?></div>
                <div class="text-gray-600">Users Impacted</div>
            </div>
            <div class="text-center">
                <div class="text-5xl font-bold text-blue-700" id="counter-lines"><?= $project['lines_of_code'] ?></div>
                <div class="text-gray-600">Lines of Code</div>
            </div>
            <div class="text-center">
                <div class="text-5xl font-bold text-blue-700" id="counter-countries"><?= $project['countries_deployed'] ?></div>
                <div class="text-gray-600">Countries Deployed</div>
            </div>
        </div>
    </div>

    <!-- Video Demo Section -->
    <div class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Project Video</h2>
        <div class="aspect-w-16 aspect-h-9 rounded-xl overflow-hidden shadow-xl">
            <iframe src="<?= $project['video'] ?>" title="Project Video" allowfullscreen class="w-full h-full"></iframe>
        </div>
    </div>

    <!-- Downloadable Resources -->
    <?php if (isset($project['resources'])): ?>
    <div class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Downloadable Resources</h2>
        <div class="flex flex-wrap gap-4">
            <?php foreach ($project['resources'] as $resource): ?>
            <a href="<?= isset($resource['resource_url'])? $resource['resource_url']:("../uploads/". $resource['resource_name'] .'.'. $resource['type']) ?>" download class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">Download Brochure (<?= $resource['type'] ?>)</a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
    <!-- FAQ Accordion -->
     <?php if(isset($project['faq']) && count($project['faq']) > 0):?>
        <div class="container mx-auto px-6 py-12">
            <h2 class="text-3xl font-bold mb-6 text-gray-800">Frequently Asked Questions</h2>
            <div id="faq-accordion" class="space-y-4">
                <?php foreach($project['faq'] as $faq):?>
                <div class="border rounded-lg">
                    <button class="w-full text-left px-6 py-4 font-semibold text-gray-800 focus:outline-none" aria-expanded="false"><?= $faq['question']?></button>
                    <div class="px-6 py-4 hidden text-gray-600"><?= $faq['answer']?></div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    <?php endif; ?>
    <!-- Reviews & Ratings -->
    <?php if(isset($project['previews']) && count($project['previews']) > 0):?>
    <div class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Client Reviews</h2>
        <div class="flex flex-wrap gap-8">
            <?php foreach($project['previews'] as $preview):?>
            <div class="bg-gray-50 rounded-xl p-6 shadow w-80">
                <div class="flex items-center mb-2">
                    <span class="text-yellow-400 text-xl"><?php for($i = 0; $i < $preview['rating']; $i++) echo '★'; ?></span>
                    <span class="ml-2 text-gray-700 font-semibold"><?= $preview['rating']?></span>
                </div>
                <p class="text-gray-700 mb-2">"<?= $preview['review']?>"</p>
                <div class="text-sm text-gray-500">— <?= $preview['reviewer_name']?><?= isset($preview['reviewer_role'])? ', '.$preview['reviewer_role']:''?></div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <?php endif; ?>
    <!-- Project Milestone Badges -->
     <?php if(isset($project['milestones']) && count($project['milestones']) > 0):?>
        <div class="container mx-auto px-6 py-12">
            <h2 class="text-3xl font-bold mb-6 text-gray-800">Key Milestones</h2>
            <div class="flex flex-wrap gap-4">
                <?php foreach($project['milestones'] as $milestone):?>
                <span class="inline-block text-blue-800 px-4 py-2 rounded-full font-semibold" style="background-color: <?= $milestone['badge_color']?>;"><?= $milestone['milestone']?></span>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <!-- Related Projects Carousel -->
     <?php if(isset($project['related_projects']) && count($project['related_projects']) > 0):?>
    <div class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Related Projects</h2>
        <div class="flex overflow-x-auto gap-6 pb-4" id="related-carousel">
            <?php foreach($project['related_projects'] as $related_project):?>
                <div class="min-w-[300px] bg-white rounded-xl shadow p-4 flex-shrink-0">
                    <img src="<?= '../assets/images/' . $related_project['main_image'] ?>" alt="Project" class="w-full h-40 object-cover rounded mb-2" loading="lazy">
                    <div class="font-bold text-lg"><?= $related_project['title']?></div>
                    <?php foreach ($related_project['technologies'] as $item):?>
                        <div class="text-gray-500 text-sm"><?= $item['technology']?></div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
    <!-- Share Buttons -->
    <div class="container mx-auto px-6 py-12 text-center">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Share This Project</h2>
        <?php $currentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") 
                    . $_SERVER['HTTP_HOST'] 
                    . $_SERVER['REQUEST_URI'];
        ?>
        <div class="flex justify-center gap-4">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($currentUrl) ?>" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition" aria-label="Share on Facebook">  Facebook</a>
            <a href="https://twitter.com/intent/tweet?text=<?= urlencode($currentUrl) ?>" class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-500 transition" aria-label="Share on Twitter">   Twitter </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode($currentUrl) ?>" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition" aria-label="Share on LinkedIn">  LinkedIn</a>
            <a href="https://api.whatsapp.com/send?text=<?= urlencode($currentUrl) ?>" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition" aria-label="Share on WhatsApp">WhatsApp</a>
    </div>
</div>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/+967772867128?text=I'm%20interested%20in%20your%20project" target="_blank" aria-label="Contact on WhatsApp" class="fixed bottom-8 left-8 z-50 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg flex items-center justify-center">
        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M20.52 3.48A12.07 12.07 0 0 0 12 0C5.37 0 0 5.37 0 12c0 2.11.55 4.16 1.6 5.97L0 24l6.18-1.62A12.07 12.07 0 0 0 12 24c6.63 0 12-5.37 12-12 0-3.21-1.25-6.23-3.48-8.52zM12 22c-1.85 0-3.68-.5-5.25-1.44l-.37-.22-3.67.96.98-3.58-.24-.37A9.94 9.94 0 0 1 2 12c0-5.52 4.48-10 10-10s10 4.48 10 10-4.48 10-10 10zm5.2-7.6c-.28-.14-1.65-.81-1.9-.9-.25-.09-.43-.14-.61.14-.18.28-.7.9-.86 1.08-.16.18-.32.2-.6.07-.28-.14-1.18-.44-2.25-1.4-.83-.74-1.39-1.65-1.55-1.93-.16-.28-.02-.43.12-.57.13-.13.28-.34.42-.51.14-.17.18-.29.28-.48.09-.19.05-.36-.02-.5-.07-.14-.61-1.47-.84-2.01-.22-.53-.45-.46-.62-.47-.16-.01-.35-.01-.54-.01-.19 0-.5.07-.76.34-.26.27-1 1-.97 2.43.03 1.43 1.04 2.81 1.19 3 .15.19 2.05 3.13 5.01 4.27.7.3 1.25.48 1.68.61.71.23 1.36.2 1.87.12.57-.09 1.65-.67 1.88-1.32.23-.65.23-1.2.16-1.32-.07-.12-.25-.19-.53-.33z"/></svg>
    </a>










    <!-- Invest in this Project Button -->
    <div class="container mx-auto px-6 mt-8 flex justify-center">
        <button onclick="toggleInvestModal()" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-xl shadow-lg text-lg transition">Invest in this Project</button>
    </div>














    <!-- Invest Modal -->
    <div id="investModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl p-8 w-full max-w-md shadow-2xl relative">
            <button onclick="toggleInvestModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl">&times;</button>
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Invest in this Project</h2>
            <form id="investForm" onsubmit="event.preventDefault(); showInvestThankYou();">
                <input type="number" min="1" step="any" placeholder="Amount to Invest (USD)" class="w-full mb-3 px-4 py-2 rounded border border-gray-300" required>
                <input type="text" placeholder="Your Name" class="w-full mb-3 px-4 py-2 rounded border border-gray-300" required>
                <input type="email" placeholder="Your Email" class="w-full mb-3 px-4 py-2 rounded border border-gray-300" required>
                <select class="w-full mb-3 px-4 py-2 rounded border border-gray-300" required>
                    <option value="">Select Payment Method</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="PayPal">PayPal</option>
                    <option value="Crypto">Crypto</option>
                </select>
                <textarea placeholder="Message (optional)" class="w-full mb-3 px-4 py-2 rounded border border-gray-300"></textarea>
                <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded font-semibold hover:bg-yellow-600 transition">Submit Investment</button>
            </form>
            <div id="investThankYou" class="hidden text-center">
                <div class="text-3xl text-green-500 mb-4">&#10003;</div>
                <div class="text-lg font-semibold mb-2">Thank you for your investment!</div>
                <div class="text-gray-600 mb-4">We appreciate your support. Our team will contact you soon.</div>
                <button onclick="toggleInvestModal()" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Close</button>
            </div>
    </div>
</div>

    <script>
        // Sample data
        const projectData = <?php echo json_encode($gttt);?>;
        console.log(projectData);
        // Gallery
        const gallery = document.getElementById('gallery');
        var glry = true;
        projectData.gallery.forEach(item => {
            const div = document.createElement('div');
            div.className = 'group relative rounded-xl overflow-hidden aspect-square cursor-pointer';
            div.innerHTML = `<img src="${item.url}" alt="${item.caption}" class="w-full h-full object-cover"><div class="absolute bottom-0 left-0 right-0 p-2 bg-black bg-opacity-50 text-white text-xs">${item.caption}</div>`;
            gallery.appendChild(div);
            glry = false;
        });
        if(glry){
            document.getElementById('galleryy').classList.add('hidden');
        }
        // Timeline
        const timeline = document.getElementById('timeline');
        var tmln = true;
        projectData.timeline.forEach(item => {
            const div = document.createElement('div');
            div.className = 'relative flex items-start group';
            div.innerHTML = `<div class="flex-shrink-0 w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center"><span class="text-white font-bold">&#10003;</span></div><div class="ml-8 bg-gray-50 rounded-xl p-6 flex-1"><h3 class="text-xl font-semibold text-gray-800 mb-2">${item.title}</h3><p class="text-blue-600 font-medium mb-3">${item.date}</p><p class="text-gray-600 leading-relaxed">${item.description}</p></div>`;
            timeline.appendChild(div);
            tmln = false;
        });
        if(tmln){
            document.getElementById('timelinee').classList.add('hidden');
        }
        // Team
        const team = document.getElementById('team-members');
        var bbbt = true;
        console.log(projectData.team);
        projectData.team.forEach(member => {
            const div = document.createElement('div');
            div.className = 'flex items-center space-x-4 p-3 rounded-xl hover:bg-gray-50 transition-colors duration-300';
            div.innerHTML = `<img src="${member.avatar}" alt="${member.name}" class="w-14 h-14 rounded-xl object-cover ring-2 ring-blue-100"><div><h3 class="font-semibold text-gray-800">${member.name}</h3><p class="text-sm text-blue-600">${member.role}</p></div>`;
            team.appendChild(div);
            bbbt = false;
        });
        if(projectData.team.length <= 0){
            document.getElementById('team').classList.add('hidden');
        }
        // Technologies
        const tech = document.getElementById('technologies');
        var techn = true;
        projectData.technologies.forEach(item => {
            const span = document.createElement('span');
            span.className = 'px-4 py-2 bg-blue-50 text-blue-700 rounded-lg text-sm font-medium hover:bg-blue-100 transition-colors duration-300';
            span.textContent = item['technology'];
            tech.appendChild(span);
            techn = false;
        });
        if(techn){
            document.getElementById('techntechn').classList.add('hidden');
        }

        // --- Lightbox for Gallery ---
        if (gallery) {
            Array.from(gallery.children).forEach(div => {
                div.onclick = function() {
                    const img = div.querySelector('img');
                    openLightbox(img.src, img.alt);
                };
            });
        }
        function openLightbox(url, caption) {
            document.getElementById('lightbox-img').src = url;
            document.getElementById('lightbox').classList.remove('hidden');
        }
        function closeLightbox() {
            document.getElementById('lightbox').classList.add('hidden');
        }

        // --- Animated Progress Bar ---
        window.addEventListener('DOMContentLoaded', () => {
            const bar = document.querySelector('.h-full.bg-gradient-to-r');
            if (bar) {
                bar.style.width = '0%';
                setTimeout(() => { bar.style.width = '<?= $project['progress'] ?>%'; }, 300);
            }
        });

        // --- Team Member Hover Cards (with social icons) ---
        if (team) {
            Array.from(team.children).forEach(div => {
                div.classList.add('relative', 'group');
                // Example: Add fake social icons on hover
                const socials = document.createElement('div');
                socials.className = 'absolute right-4 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex space-x-2';
                socials.innerHTML = `<a href="${div['linkedin']}" title="LinkedIn"><svg class="w-5 h-5 text-blue-700" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.76 0-5 2.24-5 5v14c0 2.76 2.24 5 5 5h14c2.76 0 5-2.24 5-5v-14c0-2.76-2.24-5-5-5zm-11 19h-3v-9h3v9zm-1.5-10.28c-.97 0-1.75-.79-1.75-1.75s.78-1.75 1.75-1.75 1.75.79 1.75 1.75-.78 1.75-1.75 1.75zm13.5 10.28h-3v-4.5c0-1.08-.02-2.47-1.5-2.47-1.5 0-1.73 1.17-1.73 2.39v4.58h-3v-9h2.89v1.23h.04c.4-.75 1.38-1.54 2.84-1.54 3.04 0 3.6 2 3.6 4.59v4.72z"/></svg></a>`;
                div.appendChild(socials);
            });
        }

        // --- Timeline Animation on Scroll ---
        function animateTimeline() {
            document.querySelectorAll('#timeline .group').forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight - 100) {
                    el.classList.remove('opacity-0', 'translate-x-8');
                    el.classList.add('opacity-100', 'translate-x-0');
                }
            });
        }
        window.addEventListener('scroll', animateTimeline);
        window.addEventListener('DOMContentLoaded', animateTimeline);

        // --- Technology Tooltips ---
        if (tech) {
            Array.from(tech.children).forEach(span => {
                span.classList.add('relative', 'cursor-pointer');
                span.onmouseenter = function() {
                    let tip = document.createElement('div');
                    tip.className = 'absolute left-1/2 -translate-x-1/2 top-full mt-2 w-48 bg-gray-800 text-white text-xs rounded p-2 shadow-lg z-50';
                    tip.textContent = span.textContent + ' technology';
                    span.appendChild(tip);
                };
                span.onmouseleave = function() {
                    if (span.lastChild) span.removeChild(span.lastChild);
                };
            });
        }
        else{
            tech.classList.add('hidden');
        }

        // --- Dark Mode Toggle ---
        const darkToggle = document.getElementById('darkToggle');
        darkToggle.onclick = () => {
            document.documentElement.classList.toggle('dark');
            darkToggle.textContent = document.documentElement.classList.contains('dark') ? '☀️ Light Mode' : '🌙 Dark Mode';
        };

        // --- Contact Modal ---
        function toggleContactModal() {
            document.getElementById('contactModal').classList.toggle('hidden');
        }
        // Add event to CTA button if exists
        const ctaBtn = document.querySelector('a[href="/contact"], button[onclick*="ContactModal"]');
        if (ctaBtn) ctaBtn.onclick = (e) => { e.preventDefault(); toggleContactModal(); };

        // --- Back to Top Button ---
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTop.classList.remove('hidden');
            } else {
                backToTop.classList.add('hidden');
            }
        });
        backToTop.onclick = () => window.scrollTo({ top: 0, behavior: 'smooth' });

        // Animated Counters
        function animateCounter(id, target) {
            let el = document.getElementById(id);
            let count = 0;
            let step = Math.ceil(target / 60);
            let interval = setInterval(() => {
                count += step;
                if (count >= target) {
                    el.textContent = target;
                    clearInterval(interval);
                } else {
                    el.textContent = count;
                }
            }, 20);
        }
        window.addEventListener('DOMContentLoaded', () => {
            animateCounter('counter-users', <?= ceil($project['users_impacted'])?>);
            animateCounter('counter-lines', <?=  ceil($project['lines_of_code']) ?> );
            animateCounter('counter-countries', <?= ceil($project['countries_deployed']) ?>);
        });

        // FAQ Accordion
        const faq = document.getElementById('faq-accordion');
        if (faq) {
            Array.from(faq.querySelectorAll('button')).forEach(btn => {
                btn.onclick = function() {
                    const expanded = btn.getAttribute('aria-expanded') === 'true';
                    btn.setAttribute('aria-expanded', !expanded);
                    const panel = btn.nextElementSibling;
                    if (panel) panel.classList.toggle('hidden');
                };
            });
        }

        // Simple Related Projects Carousel (scrolls on wheel)
        const carousel = document.getElementById('related-carousel');
        if (carousel) {
            carousel.addEventListener('wheel', (e) => {
                e.preventDefault();
                carousel.scrollLeft += e.deltaY;
            });
        }

        function toggleInvestModal() {
            const modal = document.getElementById('investModal');
            const form = document.getElementById('investForm');
            const thankYou = document.getElementById('investThankYou');
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                form.classList.remove('hidden');
                thankYou.classList.add('hidden');
            } else {
                modal.classList.add('hidden');
            }
        }
        function showInvestThankYou() {
            document.getElementById('investForm').classList.add('hidden');
            document.getElementById('investThankYou').classList.remove('hidden');
        }
    </script>
    <!-- --- EXTRA FEATURES END --- -->
</body>
</html> 