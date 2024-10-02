<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <style>
        body {
            background-color: #001f3f;
            font-family: Arial, sans-serif;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            width: 80%;
            max-width: 1200px;
        }

        .left {
            flex: 1;
            padding: 20px;
        }

        .right {
            flex: 1;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
        }

        .logo {
            background-color: #007bff;
            color: #001f3f;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            border-radius: 50%;
            margin-bottom: 60px;
        }

        .bullet-points {
            margin-top: 200px;
            list-style: none;
            padding: 0;
        }

        .bullet-points li {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .bullet-points svg {
            fill: #007bff;
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }

        .bullet-points p {
            margin: 0;
        }

        .bullet-points p:first-child {
            font-weight: bold;
        }

        .sub-point {
            color: #ccc;
            font-size: 0.8em;
        }

        .form-container {
            max-width: 400px;
            margin: auto;
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group input[type="checkbox"] {
            width: auto;
        }

        .form-group .checkbox-label {
            display: inline;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #001f3f;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Left Side -->
        <div class="left">
            <!-- Logo -->
            <div class="logo">A</div>

            <!-- Bullet Points -->
            <ul class="bullet-points">
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div>
                        <p>Kostenlose Testversion</p>
                        <p class="sub-point">Integrate with developer-friendly APIs or choose low-code or pre-built solutions.</p>
                    </div>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div>
                        <p>Support any business model</p>
                        <p class="sub-point">Host code that you don't want to share with the world in private.</p>
                    </div>
                </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div>
                        <p>Join millions of businesses</p>
                        <p class="sub-point">Flowbite is trusted by ambitious startups and enterprises of every size.</p>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Right Side (Form) -->
        <div class="right">
            <div class="form-container">
                <h2>Kostenlosen Account erstellen</h2>
                <form action="/form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="firm_name">Firmenname</label>
                        <input type="email" id="firm_name" name="firm_name" placeholder="name@example.com" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        @error('firm_name')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="branch_name">Branche</label>
                        <select id="branch_name" name="branch_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        </select>
                        @error('branch_name')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="postcode">Postcode</label>
                        <input type="number" id="postcode" name="postcode" placeholder="60234" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        @error('postcode')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telephone_number">Telefonnummer</label>
                        <input type="number" id="telephone_number" name="telephone_number" placeholder="United States" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        @error('telephone_number')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        @error('email')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        @error('password')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group flex items-center">
                        <input type="checkbox" id="agree" name="agree" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="agree" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Agree to conditions</label>
                        @error('agree')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kostenlos registrieren</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('/industry')
                .then(response => response.json())
                .then(data => {
                    const select = document.getElementById('branch_name');
                    data.forEach(industry => {
                        const option = document.createElement('option');
                        option.value = industry.name;
                        option.textContent = industry.name;
                        select.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching industries:', error);
                });
        });
    </script>
</body>

</html>
