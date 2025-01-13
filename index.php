<?php
// index.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $operation = $_POST['operation'];
    $id = isset($_POST['id']) ? $_POST['id'] : null;

    $url = 'http://localhost/1v0/soaptest/api.php?op=' . $operation;
    if ($operation === 'getById' && $id) {
        $url .= '&id=' . $id;
    }

    $response = file_get_contents($url);
    $result = json_decode($response, true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NO2SOAP - API Test</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body class="bg-gray-900 font-sans min-h-screen flex flex-col justify-between">
    <div class="flex-grow flex items-center justify-center">
        <div class="bg-gray-100 max-w-4xl mx-auto mt-10 p-6 rounded-lg shadow-lg">
            <header class="mb-6 text-center">
                <h1 class="text-3xl font-semibold text-gray-800 flex items-center justify-center">
                    <span class="text-indigo-500">NO2</span>
                    <img src="client/soap.png" alt="soap" class="w-7 h-7 mr-2">
                    <span>API Test</span>
                </h1>
                <p class="mt-2 text-gray-600">Version 1.0.0 - By R M Lakruwan (Noone)</p>
                <p class="text-gray-600">Welcome to the API testing interface. This tool allows you to interact with our API to retrieve product information. Follow the instructions below to get started.</p>
            </header>

            <section class="font-semibold mb-6 bg-gray-200 p-4 rounded-lg shadow-inner">
                <h2 class="text-xl font-semibold text-gray-800">How to Use:</h2>
                <p class="mt-2 text-gray-600">1. Select an operation from the dropdown menu.</p>
                <p class="text-gray-600">2. If you choose "Get Product By ID", enter the product ID in the field that appears.</p>
                <p class="text-gray-600">3. Click "Submit" to send your request to the API.</p>
                <p class="text-gray-600">4. The response from the API will be displayed below.</p>
            </section>

            <form method="POST" class="space-y-6">
                <div>
                    <label for="operation" class="block text-lg font-medium text-gray-700">Select Operation:</label>
                    <select name="operation" id="operation" class="mt-2 block w-full p-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="getAll">Get All Products</option>
                        <option value="getById">Get Product By ID</option>
                    </select>
                </div>

                <!-- ID Input (hidden by default) -->
                <div id="idInput" style="display: none;">
                    <label for="id" class="block text-lg font-medium text-gray-700">Product ID:</label>
                    <input type="number" name="id" id="id" class="mt-2 block w-full p-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter Product ID">
                </div>

                <button type="submit" class="w-full py-3 mt-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Submit</button>
            </form>

            <?php if (isset($result)): ?>
                <div class="mt-8">
                    <h2 class="text-2xl font-semibold text-gray-800">Response:</h2>
                    <pre class="mt-2 bg-gray-900 p-4 rounded-md text-white" style="overflow: auto;"><?php echo htmlspecialchars(print_r($result, true)); ?></pre>
                </div>
            <?php endif; ?>
        </div>

        <script>
            document.getElementById('operation').addEventListener('change', function() {
                var idInput = document.getElementById('idInput');
                if (this.value === 'getById') {
                    idInput.style.display = 'block';
                } else {
                    idInput.style.display = 'none';
                }
            });
        </script>
    </div>

    <footer class="text-center text-gray-600 mt-10">
        <p class="mt-2 text-gray-600">Check my website for more details: <a href="https://lakru.one/" class="text-blue-500 hover:text-blue-700" target="_blank">lakru.one</a></p>
        <p>&copy; 2025 NO2SOAP. All rights reserved.</p>
    </footer>
</body>
</html>
