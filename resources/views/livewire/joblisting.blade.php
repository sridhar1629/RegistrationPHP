<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <title>Erstelle neue Stellenanzeige</title>
    <style>
        .ql-editor {
            min-height: 150px;
        }
        .delete-skill-icon {
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-gray-200 min-h-screen p-4">
    <div class="container mx-auto p-4 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl mb-4 font-bold text-left">Erstelle neue Stellenanzeige</h2>

        <!-- Form Start -->
        <form id="joblisting-form" method="POST" action="/joblisting">
            <!-- Hidden fields for user and company information -->
            <input type="hidden" id="user_id" name="user_id" value="{{ $user_id }}">
            <input type="hidden" id="company_id" name="company_id" value="{{ $company_id }}">
            <input type="hidden" id="company_name" name="company_name" value="{{ $company_name }}">
            <input type="hidden" id="location" name="location" value="{{ $location }}">

            <!-- Allgemeine Informationen Accordion -->
            <div id="accordion-collapse-1" data-accordion="collapse" class="mb-4">
                <h2 id="accordion-collapse-heading-1">
                    <button type="button" class="accordion-button" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                        Allgemeine Informationen
                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-1" class="accordion-body active" aria-labelledby="accordion-collapse-heading-1">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <label for="jobtitle" class="block m-2 font-bold">Jobbezeichnung</label>
                            <input type="text" id="jobtitle" name="jobtitle" placeholder="Maurer" class="w-full p-2 border rounded">
                        </div>
                        <div class="col-span-1">
                            <label for="type" class="block m-2 font-bold">Schulabschluss</label>
                            <select id="type" name="type" class="w-full p-2 border rounded">
                                <option value="Abitur">Abitur</option>
                                <option value="Fachabitur">Fachabitur</option>
                                <option value="Realschule">Realschule</option>
                                <option value="Hauptschule">Hauptschule</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="salary" class="block m-2 font-bold">Gehalt (1.Jahr)</label>
                            <input type="number" id="salary" name="salary" placeholder="1000 euro" class="w-full p-2 border rounded">
                        </div>
                        <div class="col-span-1">
                            <label for="industry" class="block m-2 font-bold">Branche</label>
                            <select id="industry" name="industry" class="w-full p-2 border rounded"></select>
                        </div>
                        <div class="col-span-1">
                            <label for="job_type" class="block m-2 font-bold">Art</label>
                            <select id="job_type" name="job_type" class="w-full p-2 border rounded">
                                <option value="Ausbildung" selected>Ausbildung</option>
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="duration" class="block m-2 font-bold">Dauer in Jahren</label>
                            <select id="duration" name="duration" class="w-full p-2 border rounded">
                                @for($i = 0.5; $i <= 5; $i += 0.5)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Information Accordion -->
            <div id="accordion-collapse-2" data-accordion="collapse">
                <h2 id="accordion-collapse-heading-2">
                    <button type="button" class="accordion-button" data-accordion-target="#accordion-collapse-body-2" aria-expanded="true" aria-controls="accordion-collapse-body-2">
                        Additional Information
                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-2" class="accordion-body" aria-labelledby="accordion-collapse-heading-2">
                    <div class="flowbite-form space-y-4">
                        <div>
                            <h3 class="text-lg">Vorausgesetzte Fähigkeiten</h3>
                            <p class="text-gray-400">Wähle 3 bis 5 aus!</p>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4" id="skill-selects">
                                <!-- Skills will be populated dynamically -->
                            </div>
                            <button type="button" class="bg-blue-500 text-white py-1 px-2 rounded mt-2" id="add-skill-btn">+ Weitere Fähigkeiten hinzufügen</button>
                        </div>
                        <div class="form-group">
                            <label class="form-label font-bold m-2" for="requirements">Stellenbeschreibung</label>
                            <div id="editor-requirements" class="border rounded"></div>
                            <p class="text-red-600 hidden" id="requirements-warning">Must be 150 characters minimum</p>
                        </div>
                        <div class="form-group">
                            <label class="form-label font-bold m-2" for="benefits">Benefits</label>
                            <div id="editor-benefits" class="border rounded"></div>
                            <p class="text-red-600 hidden" id="benefits-warning">Must be 150 characters minimum</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end mt-4 space-x-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Erstelle Stellenanzeige</button>
                <button type="reset" class="bg-red-500 text-white py-2 px-4 rounded">Verwerfen</button>
            </div>
        </form>
    </div>

    <script src="https://unpkg.com/flowbite@1.4.3/dist/flowbite.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const skillSelects = document.getElementById('skill-selects');
            const quillRequirements = new Quill('#editor-requirements', {
                theme: 'snow',
                placeholder: 'Schreiben Sie hier...',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                        ['blockquote', 'code-block'],
                        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                        [{ 'direction': 'rtl' }],                         // text direction
                        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                        [{ 'font': [] }],
                        [{ 'align': [] }],
                        ['clean']                                         // remove formatting button
                    ]
                }
            });

            const quillBenefits = new Quill('#editor-benefits', {
                theme: 'snow',
                placeholder: 'Schreiben Sie hier...',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                        ['blockquote', 'code-block'],
                        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
                        [{ 'direction': 'rtl' }],                         // text direction
                        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
                        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                        [{ 'font': [] }],
                        [{ 'align': [] }],
                        ['clean']                                         // remove formatting button
                    ]
                }
            });

            // Populate industry dropdown
            const industrySelect = document.getElementById('industry');
            fetch('/industry')
                .then(response => response.json())
                .then(data => {
                    data.forEach(industry => {
                        const option = document.createElement('option');
                        option.value = industry.id;
                        option.textContent = industry.name;
                        industrySelect.appendChild(option);
                    });
                    // Trigger event to fetch skills based on initial industry selection
                    industrySelect.dispatchEvent(new Event('change'));
                })
                .catch(error => {
                    console.error('Error fetching industry:', error);
                });

            // Function to fetch skills based on selected industry
            function fetchSkillsByIndustry(industryId) {
                fetch(`/skills?industry_id=${industryId}`)
                    .then(response => response.json())
                    .then(data => {
                        skillSelects.innerHTML = ''; // Clear previous selects

                        // Create new selects for skills
                        for (let i = 0; i < 3; i++) {
                            const select = document.createElement('select');
                            select.name = 'state[]';
                            select.classList.add('w-full', 'p-2', 'border', 'rounded');
                            skillSelects.appendChild(select);

                            data.forEach(skill => {
                                const option = document.createElement('option');
                                option.value = skill.id;
                                option.textContent = skill.name;
                                select.appendChild(option);
                            });

                            select.addEventListener('change', updateSkillOptions);
                            addDeleteIcon(select); // Add delete icon for each select
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching skills:', error);
                    });
            }

            // Function to add delete icon for each skill select
            function addDeleteIcon(select) {
                const deleteIcon = document.createElement('span');
                deleteIcon.innerHTML = '<svg class="delete-skill-icon w-4 h-4 ml-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>';
                deleteIcon.classList.add('delete-skill-icon', 'hidden'); // Initially hide delete icon

                select.parentNode.appendChild(deleteIcon);

                // Show delete icon when there are more than 3 skill selects
                updateSkillControls();
            }

            // Event listener for industry change
            industrySelect.addEventListener('change', function () {
                const selectedIndustryId = this.value;
                if (selectedIndustryId) {
                    fetchSkillsByIndustry(selectedIndustryId);
                } else {
                    skillSelects.innerHTML = ''; // Clear selects if no industry is selected
                }
            });

            // Function to update skill options based on selected skills
            function updateSkillOptions() {
                const selectedOptions = Array.from(skillSelects.querySelectorAll('select[name="state[]"]'))
                    .map(select => select.value);

                skillSelects.querySelectorAll('select[name="state[]"]').forEach(select => {
                    Array.from(select.options).forEach(option => {
                        option.disabled = selectedOptions.includes(option.value) && !option.selected;
                    });
                });

                updateSkillControls();
            }

            // Function to update visibility of skill controls (delete icons and add button)
            function updateSkillControls() {
                const skillSelectCount = skillSelects.querySelectorAll('select[name="state[]"]').length;

                // Show delete icons if more than 3 skills, otherwise hide them
                const deleteIcons = document.querySelectorAll('.delete-skill-icon');
                deleteIcons.forEach((icon, index) => {
                    if (index < skillSelectCount - 3) {
                        icon.classList.remove('hidden');
                    } else {
                        icon.classList.add('hidden');
                    }
                });

                // Show "Add Skill" button if less than 5 skills, otherwise hide it
                const addSkillBtn = document.getElementById('add-skill-btn');
                if (skillSelectCount < 5) {
                    addSkillBtn.style.display = 'inline-block';
                } else {
                    addSkillBtn.style.display = 'none';
                }
            }

            // Event listener for requirements input validation
            quillRequirements.on('text-change', function () {
                if (quillRequirements.getText().trim().length < 150) {
                    document.getElementById('requirements-warning').classList.remove('hidden');
                } else {
                    document.getElementById('requirements-warning').classList.add('hidden');
                }
            });

            // Event listener for benefits input validation
            quillBenefits.on('text-change', function () {
                if (quillBenefits.getText().trim().length < 150) {
                    document.getElementById('benefits-warning').classList.remove('hidden');
                } else {
                    document.getElementById('benefits-warning').classList.add('hidden');
                }
            });

            // Add skill button functionality
            const addSkillBtn = document.getElementById('add-skill-btn');
            addSkillBtn.addEventListener('click', function () {
                const currentSelects = skillSelects.querySelectorAll('select[name="state[]"]');
                if (currentSelects.length < 5) {
                    const newSelect = document.createElement('select');
                    newSelect.name = "state[]";
                    newSelect.classList.add('w-full', 'p-2', 'border', 'rounded');

                    // Clone options from the first select
                    const options = Array.from(currentSelects[0].options); // Fixed typo: changed `.option` to `.options`
                    options.forEach(option => {
                        const newOption = option.cloneNode(true);
                        newSelect.appendChild(newOption);
                    });

                    skillSelects.appendChild(newSelect);

                    newSelect.addEventListener('change', updateSkillOptions);
                    addDeleteIcon(newSelect); // Add delete icon for the new select
                    updateSkillControls(); // Update controls after adding a new skill
                }
            });

            // Event delegation for deleting skills
            skillSelects.addEventListener('click', function (event) {
                if (event.target.classList.contains('delete-skill-icon')) {
                    const selectToRemove = event.target.parentNode.querySelector('select[name="state[]"]');
                    if (selectToRemove) {
                        selectToRemove.remove();
                        event.target.remove(); // Remove the delete icon associated with the select
                        updateSkillOptions(); // Update options and controls after removing a skill
                    }
                }
            });

            // Initial form submission listener
            const jobListingForm = document.getElementById('joblisting-form');
            jobListingForm.addEventListener('submit', submitForm);

            // Function to submit the form
            function submitForm(event) {
                event.preventDefault(); // Prevent default form submission

                const jobListingForm = document.getElementById('joblisting-form');
                const requirements = quillRequirements.root.innerHTML;
                const benefits = quillBenefits.root.innerHTML;

                // Validation logic
                let isValid = true;
                if (quillRequirements.getText().trim().length < 150) {
                    document.getElementById('requirements-warning').classList.remove('hidden');
                    isValid = false;
                } else {
                    document.getElementById('requirements-warning').classList.add('hidden');
                }

                if (quillBenefits.getText().trim().length < 150) {
                    document.getElementById('benefits-warning').classList.remove('hidden');
                    isValid = false;
                } else {
                    document.getElementById('benefits-warning').classList.add('hidden');
                }

                if (!isValid) return;

                // Prepare FormData
                const formData = new FormData(jobListingForm);
                formData.set('requirements', requirements);
                formData.set('benefits', benefits);

                // Add CSRF token to headers
                const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                // Example of sending formData to server
                fetch('/joblisting', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Include CSRF token
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                    resetForm();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }

            // Function to reset the form
            function resetForm() {
                document.getElementById('joblisting-form').reset();
                quillRequirements.root.innerHTML = '';
                quillBenefits.root.innerHTML = '';
                document.getElementById('requirements-warning').classList.add('hidden');
                document.getElementById('benefits-warning').classList.add('hidden');
                skillSelects.innerHTML = ''; // Clear skill selects
                updateSkillControls(); // Reset skill controls visibility
            }
        });
    </script>
</body>
</html>
