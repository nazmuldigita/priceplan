<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing Plan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .tab-pane {
            display: none;
        }
        .tab-pane.active {
            display: block;
        }
        .package-btn.active {
            background-color: #007bff; /* Change to desired color */
            color: white;
            border-color: #007bff;
        }
        /*h2.orderForm:after {position: absolute; display: block; content: ''; height: 2px; width: 20px; background-color: #007bff;}*/
        h2.orderForm {position: relative; display: block;}
        h2.orderForm span{position: relative; display: block; font-size: 19px; font-weight: 400;}
        #orderForm label{font-weight: 500;}
        #orderForm input{border: 1px solid #0000002d;}
        #message {
            transition: height 0.5s ease; /* Adjust the duration and timing as desired */
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Pricing Plan</h1>
        
        <!-- Step 1: Billing Period -->
        <ul class="nav nav-tabs" id="billingPeriodTabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#hourly" data-period="hourly">Hourly</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#weekly" data-period="weekly">Weekly</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#monthly" data-period="monthly">Monthly</a>
            </li>
        </ul>

        <!-- Second Level (Item Count Tabs) -->
        <div class="mt-3" id="itemCountTabsContainer">
            <!-- Content will be updated here based on selected period -->
            <ul class="nav nav-pills mt-3" id="itemCountTabs">
                <!-- Default content for "Hourly" (will be replaced dynamically) -->
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#items1">Graphic Design</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#items2">Packaging & Merchandise Design</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#items3">Marketing Design</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#items4">Branding Design</a>
                </li>
            </ul>
        </div>
        
        <!-- Step 3: Pricing Packages -->
        <div class="row mt-4" id="pricingPackages">
            <!-- Personal Package -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Personal Package</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$<span id="personalPrice">100</span></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>1 website</li>
                            <li>1 MySQL</li>
                            <li>100 Ready-made pages</li>
                            <li>24/7 support</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary package-btn" data-package="Personal Package">Get started</button>
                    </div>
                </div>
            </div>
            
            <!-- Business Package -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Business Package</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$<span id="businessPrice">150</span></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>5 websites</li>
                            <li>3 MySQL</li>
                            <li>200 Ready-made pages</li>
                            <li>24/7 priority support</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary package-btn" data-package="Business Package">Get started</button>
                    </div>
                </div>
            </div>
            
            <!-- Developer Package -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">Developer Package</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$<span id="developerPrice">200</span></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Unlimited websites</li>
                            <li>10 MySQL</li>
                            <li>500 Ready-made pages</li>
                            <li>24/7 VIP support</li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-block btn-outline-primary package-btn" data-package="Developer Package">Get started</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div class="mt-5">
            <h2 class="text-center mt-2 mb-5 orderForm"><span>Order Form</span>Start a Project</h2>
            <?php
                // Display the message based on the status in the URL
                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 'success') {
                        echo '<div class="alert alert-success fs-5">Your Order has been submitted Successfully!</div>';
                    } elseif ($_GET['status'] == 'error') {
                        echo '<div class="alert alert-danger fs-5">Order Submission Failed! please try again.</div>';
                    }
                }
            ?>
            <form id="orderForm" action="sendmail.php" method="POST">
                <div class="row">
                    <!-- Selected Type Dropdown -->
                    <div class="mb-3 col-12 col-md-4">
                        <label for="selectedType" class="form-label">Selected Type</label>
                        <select class="form-select" id="selectedType" name="selectedType" required disabled>
                            <option value="hourly" selected>Hourly</option>
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                        </select>
                    </div>
                    <!-- Support Type Dropdown -->
                    <div class="mb-3 col-12 col-md-4">
                        <label for="supportType" class="form-label">Support Type</label>
                        <select class="form-select" id="supportType" name="supportType" required disabled>

                        </select>
                    </div>
                    <!-- Selected Package Dropdown -->
                    <div class="mb-3 col-12 col-md-4">
                        <label for="selectedPackage" class="form-label">Selected Package</label>
                        <select class="form-select" id="selectedPackage" name="selectedPackage" required disabled>
                            <option value="Personal Package" selected>Personal Package</option>
                            <option value="Business Package">Business Package</option>
                            <option value="Developer Package">Developer Package</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-12 col-md-4">
                        <label for="name" class="form-label">Name <sup>*</sup></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="email" class="form-label">Email <sup>*</sup></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="phone" class="form-label">Phone <sup>*</sup></label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>                    
                </div>
                <div class="row">
                    <div class="mb-3 col-12 col-md-4">
                        <label for="company" class="form-label">Company Name <sup>*</sup></label>
                        <input type="text" class="form-control" id="company_name" name="company_name" required>
                    </div>  
                    <div class="mb-3 col-12 col-md-4">
                        <label for="website" class="form-label">Website Address</label>
                        <input type="text" class="form-control" id="website_address" name="website_address">
                    </div>  
                    <div class="mb-3 col-12 col-md-4">
                        <label for="socialmedia" class="form-label">Social Link</label>
                        <input type="text" class="form-control" id="social_link" name="social_link">
                    </div>                   
                </div>
                <div class="row">
                    <div class="mb-3 col-12 col-md-12">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="1"></textarea>
                    </div>                    
                </div>

                <!-- Hidden fields to submit form data -->
                <input type="hidden" id="hiddenSelectedType" name="selectedType">
                <input type="hidden" id="hiddenSupportType" name="supportType">
                <input type="hidden" id="hiddenSelectedPackage" name="selectedPackage">

                <button type="submit" class="btn btn-primary">Submit Order</button>
            </form>
        </div>
    </div>
    <br/>
    <br/>
    <br/>

    <!-- Bootstrap JS Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
        // Pricing data
        const pricingData = {
            hourly: {
                'Graphic Design': { personal: 10, business: 15, developer: 20 },
                'Packaging & Merchandise Design': { personal: 12, business: 18, developer: 24 },
                'Marketing Design': { personal: 14, business: 21, developer: 28 },
                'Branding Design': { personal: 16, business: 24, developer: 32 }
            },
            weekly: {
                'Web Design': { personal: 50, business: 75, developer: 100 },
                'Print Design': { personal: 70, business: 105, developer: 140 },
                'Logo Design': { personal: 90, business: 135, developer: 180 }
            },
            monthly: {
                'UI/UX Design': { personal: 100, business: 150, developer: 200 },
                'UX Research and Analysis': { personal: 120, business: 180, developer: 240 },
                'Web App Design': { personal: 140, business: 210, developer: 280 },
                'Mobile App Design': { personal: 160, business: 240, developer: 320 }
            }
        };

        // Form data for support types and web designs (if needed for further extensions)
        // Currently, selections are handled directly via the select fields

        // Function to update prices based on form selections
        function updatePricesFromForm() {
            const selectedType = document.getElementById('selectedType').value; // hourly, weekly, monthly
            const supportType = document.getElementById('supportType').value; // Graphic Design, etc.
            const selectedPackage = document.getElementById('selectedPackage').value; // personal, business, developer

            // Get the pricing based on selections
            const prices = pricingData[selectedType][supportType];

            // Update the prices in the cards
            document.getElementById('personalPrice').textContent = prices.personal;
            document.getElementById('businessPrice').textContent = prices.business;
            document.getElementById('developerPrice').textContent = prices.developer;
        }

        // Function to populate the form with default selections
        function initializeForm() {
            // Already set via HTML with selected attributes
            updatePricesFromForm();
        }

        // Function to handle form select changes
        function handleFormSelectChanges() {
            document.getElementById('selectedType').addEventListener('change', updatePricesFromForm);
            document.getElementById('supportType').addEventListener('change', updatePricesFromForm);
            document.getElementById('selectedPackage').addEventListener('change', updatePricesFromForm);
        }

        // Function to update form fields when package buttons are clicked
        function handlePackageButtons() {
            const packageButtons = document.querySelectorAll('.package-btn');
            packageButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const package = btn.getAttribute('data-package'); // personal, business, developer

                    // Update the Selected Package dropdown
                    document.getElementById('selectedPackage').value = package;

                    // Optionally, update other fields based on package
                    // For example, you might want to set specific support types based on package
                    // Here, we'll just update the pricing
                    updatePricesFromForm();

                    // Scroll to the form for better UX
                    document.getElementById('orderForm').scrollIntoView({ behavior: 'smooth' });
                });
            });
        }

        // Add event listeners to the billing period and design category tabs to sync with the form
        function handleTabChanges() {
            // Billing Period Tabs
            document.querySelectorAll('#billingPeriodTabs .nav-link').forEach(tab => {
                tab.addEventListener('click', (e) => {
                    e.preventDefault();
                    const billingPeriod = tab.textContent.toLowerCase();
                    
                    // Update the Selected Type dropdown
                    document.getElementById('selectedType').value = billingPeriod;

                    // Update active class
                    tab.parentElement.querySelector('.active').classList.remove('active');
                    tab.classList.add('active');

                    // Update prices
                    updatePricesFromForm();
                });
            });

            // Item Count Tabs (Support Type)
            document.querySelectorAll('#itemCountTabs .nav-link').forEach(tab => {
                tab.addEventListener('click', (e) => {
                    e.preventDefault();
                    const supportType = tab.textContent;
                    
                    // Update the Support Type dropdown
                    document.getElementById('supportType').value = supportType;

                    // Update active class
                    tab.parentElement.querySelector('.active').classList.remove('active');
                    tab.classList.add('active');

                    // Update prices
                    updatePricesFromForm();
                });
            });
        }

        // Handle form submission
        function handleFormSubmission() {
            document.getElementById('orderForm').addEventListener('submit', (e) => {
                e.preventDefault();

                // Gather form data
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const selectedType = document.getElementById('selectedType').value;
                const supportType = document.getElementById('supportType').value;
                const selectedPackage = document.getElementById('selectedPackage').value;

                // You can process the data here (e.g., send to a server)
                // For demonstration, we'll just alert the data
                alert(`
                    Order Submitted Successfully!
                    
                    Name: ${name}
                    Email: ${email}
                    Selected Type: ${capitalize(selectedType)}
                    Support Type: ${supportType}
                    Selected Package: ${capitalize(selectedPackage)} Package
                `);
            });
        }

        // Utility function to capitalize first letter
        function capitalize(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }

        // Initialize everything on DOMContentLoaded
        document.addEventListener('DOMContentLoaded', () => {
            initializeForm();
            handleFormSelectChanges();
            handlePackageButtons();
            handleTabChanges();
            handleFormSubmission();
        });

         // Design options for different billing periods
        const designOptions = {
            hourly: `
                <ul class="nav nav-pills mt-3" id="itemCountTabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#items1">Graphic Design</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#items2">Packaging & Merchandise Design</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#items3">Marketing Design</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#items4">Branding Design</a>
                    </li>
                </ul>
            `,
            weekly: `
                <ul class="nav nav-pills mt-3" id="itemCountTabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#items1">Web Design</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#items2">Print Design</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#items3">Logo Design</a>
                    </li>
                </ul>
            `,
            monthly: `
                <ul class="nav nav-pills mt-3" id="itemCountTabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#items1">UI/UX Design</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#items2">UX Research and Analysis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#items3">Web App Design</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#items4">Mobile App Design</a>
                    </li>
                </ul>
            `
        };

        // Function to update item count tabs based on selected billing period
        function updateItemCountTabs(period) {
            const container = document.getElementById('itemCountTabsContainer');
            container.innerHTML = designOptions[period];
        }

        // Event listeners for billing period tabs
        document.querySelectorAll('#billingPeriodTabs .nav-link').forEach(tab => {
            tab.addEventListener('click', function() {
                const period = this.getAttribute('data-period');
                updateItemCountTabs(period); // Update second-level tabs based on selected period
            });
        });

        // Initial load with "Hourly" as default
        document.addEventListener('DOMContentLoaded', () => {
            updateItemCountTabs('hourly'); // Set "Hourly" options on page load
        });


        // Function to update form fields based on selected billing period
        // function updateFormFields(period) {
        //     const supportTypeField = document.getElementById('supportType');
        //     const selectedTypeField = document.getElementById('selectedType');
        //     const selectedPackageField = document.getElementById('selectedPackage');

        //     // Set the selected type (hourly, weekly, monthly)
        //     selectedTypeField.value = period;

        //     // Clear existing options
        //     supportTypeField.innerHTML = ''; 

        //     // Populate support type options based on selected period
        //     let options = [];
        //     if (period === 'hourly') {
        //         options = [
        //             'Graphic Design',
        //             'Packaging & Merchandise Design',
        //             'Marketing Design',
        //             'Branding Design'
        //         ];
        //         supportTypeField.value = 'Graphic Design'; // Default to Graphic Design
        //     } else if (period === 'weekly') {
        //         options = [
        //             'Web Design',
        //             'Print Design',
        //             'Logo Design'
        //         ];
        //         supportTypeField.value = 'Web Design'; // Default to Web Design
        //     } else if (period === 'monthly') {
        //         options = [
        //             'UI/UX Design',
        //             'UX Research and Analysis',
        //             'Web App Design',
        //             'Mobile App Design'
        //         ];
        //         supportTypeField.value = 'UI/UX Design'; // Default to UI/UX Design
        //     }

        //     // Create new options
        //     options.forEach(optionText => {
        //         const option = document.createElement('option');
        //         option.value = optionText;
        //         option.textContent = optionText;
        //         supportTypeField.appendChild(option);
        //     });

        //     // Update prices based on selections
        //     updatePricesFromForm();
        // }
        function updateFormFields(period) {
            const supportTypeField = document.getElementById('supportType');
            const selectedTypeField = document.getElementById('selectedType');
            const selectedPackageField = document.getElementById('selectedPackage');
            const hiddenSelectedType = document.getElementById('hiddenSelectedType');
            const hiddenSupportType = document.getElementById('hiddenSupportType');
            const hiddenSelectedPackage = document.getElementById('hiddenSelectedPackage');

            // Set selected type
            selectedTypeField.value = period;
            hiddenSelectedType.value = period;  // Update hidden field

            // Clear existing options in support type field
            supportTypeField.innerHTML = '';

            let options = [];
            if (period === 'hourly') {
                options = ['Graphic Design', 'Packaging & Merchandise Design', 'Marketing Design', 'Branding Design'];
                supportTypeField.value = 'Graphic Design';
                hiddenSupportType.value = 'Graphic Design';  // Set default value in hidden field
            } else if (period === 'weekly') {
                options = ['Web Design', 'Print Design', 'Logo Design'];
                supportTypeField.value = 'Web Design';
                hiddenSupportType.value = 'Web Design';
            } else if (period === 'monthly') {
                options = ['UI/UX Design', 'UX Research and Analysis', 'Web App Design', 'Mobile App Design'];
                supportTypeField.value = 'UI/UX Design';
                hiddenSupportType.value = 'UI/UX Design';
            }

            // Populate support type field and hidden field
            options.forEach(optionText => {
                const option = document.createElement('option');
                option.value = optionText;
                option.textContent = optionText;
                supportTypeField.appendChild(option);
            });

            // Also update package in hidden field whenever the package changes
            updatePricesFromForm();
        }


        // Function to update the item count tabs based on selected billing period
        function updateItemCountTabs(period) {
            const container = document.getElementById('itemCountTabsContainer');
            const designOptions = {
                hourly: `
                    <ul class="nav nav-pills mt-3" id="itemCountTabs">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#items1">Graphic Design</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#items2">Packaging & Merchandise Design</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#items3">Marketing Design</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#items4">Branding Design</a></li>
                    </ul>
                `,
                weekly: `
                    <ul class="nav nav-pills mt-3" id="itemCountTabs">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#items1">Web Design</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#items2">Print Design</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#items3">Logo Design</a></li>
                    </ul>
                `,
                monthly: `
                    <ul class="nav nav-pills mt-3" id="itemCountTabs">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#items1">UI/UX Design</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#items2">UX Research and Analysis</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#items3">Web App Design</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#items4">Mobile App Design</a></li>
                    </ul>
                `
            };
            
            container.innerHTML = designOptions[period]; // Update the item count tabs
            handleSecondLevelTabs(period); // Attach the event listeners for second-level tabs
        }

        // Function to handle the design (support type) tab changes
        function handleSecondLevelTabs(period) {
            const supportTypeField = document.getElementById('supportType');
            
            // Add event listeners to the second-level tabs
            document.querySelectorAll('#itemCountTabs .nav-link').forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove 'active' class from all tabs and add to the clicked tab
                    document.querySelectorAll('#itemCountTabs .nav-link').forEach(item => item.classList.remove('active'));
                    this.classList.add('active');

                    const supportType = this.textContent; // Get the text of the clicked tab
                    supportTypeField.value = supportType; // Update Support Type dropdown
                    updatePricesFromForm(); // Update prices based on selected support type
                });
            });
        }

        // Add event listeners to the billing period tabs
        document.querySelectorAll('#billingPeriodTabs .nav-link').forEach(tab => {
            tab.addEventListener('click', function() {
                const period = this.getAttribute('data-period'); // Get selected period
                updateItemCountTabs(period); // Update item count tabs based on selected billing period
                updateFormFields(period); // Update form fields based on selected billing period
            });
        });

        // Initialize the form when the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', () => {
            updateItemCountTabs('hourly'); // Set "Hourly" options on page load
            updateFormFields('hourly'); // Update form with hourly default values
        });


        // Function to update the selected package
        function updateSelectedPackage(packageName) {
            const selectedPackageField = document.getElementById('selectedPackage');
            selectedPackageField.value = packageName; // Update the dropdown value
            // Optionally trigger any additional functions when the package changes
            updatePricesFromForm(); // Call any additional functions here
        }

        // Add event listeners to the package buttons
        document.querySelectorAll('.package-btn').forEach(button => {
            button.addEventListener('click', function() {
                // const packageName = this.getAttribute('data-package');
                // updateSelectedPackage(packageName); // Update selected package based on button clicked

                // Remove active class from all buttons
                document.querySelectorAll('.package-btn').forEach(btn => btn.classList.remove('active'));

                // Add active class to the clicked button
                this.classList.add('active');

                // Update selected package in the hidden field (optional, if you need it for form submission)
                updateSelectedPackage(this.getAttribute('data-package'));
                
                // Focus on the name text field
                document.getElementById('name').focus();
            });
        });

        const messageTextarea = document.getElementById('message');

        // Set initial height based on 1 row
        messageTextarea.style.height = `${messageTextarea.scrollHeight}px`;

        // Expand to 3 rows on click with animation
        messageTextarea.addEventListener('click', function () {
            this.style.height = ''; // Reset height to auto-adjust
            this.rows = 3; // Set rows to 3 for the desired size
            this.style.height = `${this.scrollHeight}px`; // Animate height based on content
        });

        // Optionally, shrink back to 1 row when focus is lost
        messageTextarea.addEventListener('blur', function () {
            this.style.height = ''; // Reset height
            this.rows = 1; // Set rows back to 1
            this.style.height = `${this.scrollHeight}px`; // Animate height back to initial size
        });



        // Initialize the form when the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', () => {
            // Set initial values or states if necessary
            updateSelectedPackage('Personal Package'); // Default to Personal Package on load
        });
    </script>
</body>
</html>