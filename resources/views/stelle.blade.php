<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erstelle neue Stellenanzeige</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/flowbite@1.4.3/dist/flowbite.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            /* Grey background */
            color: #1a202c;
            /* Dark text */
            min-height: 100vh;
            /* Full viewport height */
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            /* Adjust max-width to your preference */
            background-color: #ffffff;
            /* White background */
            border-radius: 0.5rem;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
            /* Spacing between form groups */
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #1a202c;
            /* Dark text */
        }

        .form-input {
            /* Full width input */
            padding: 0.75rem;
            border-radius: 0.375rem;
            border: 1px solid #d2d6dc;
            /* Grey border */
            background-color: #ffffff;
            /* White background */
            color: #1a202c;
            /* Dark text */
        }

        .accordion-button {
            background-color: #edf2f7;
            /* Light grey background for accordion headers */
            border: 1px solid #cbd5e0;
            /* Border color */
            color: #1a202c;
            /* Dark text */
            padding: 1rem;
            margin-bottom: 1px;
            /* Spacing between accordion headers */
            cursor: pointer;
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .accordion-body {
            display: none;
            /* Initially hide accordion bodies */
            background-color: #ffffff;
            /* White background for accordion content */
            border: 1px solid #cbd5e0;
            /* Border color */
            padding: 1rem;
        }

        .accordion-body.active {
            display: block;
            /* Show active accordion body */
        }
    </style>
</head>

<body>
@livewire('joblisting')
</body>

</html>
