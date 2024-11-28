<!DOCTYPE html>
<html>

<head>
    <title>Unauthorized</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: #f3f4f6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-container {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            max-width: 90%;
            width: 400px;
        }

        .error-code {
            font-size: 6rem;
            font-weight: bold;
            color: #EBA49E;
            line-height: 1;
        }

        .error-title {
            font-size: 1.5rem;
            color: #1f2937;
            margin: 1rem 0;
        }

        .error-message {
            color: #6b7280;
            margin-bottom: 2rem;
        }

        .button-primary {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: #172A91;
            color: white;
            text-decoration: none;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .button-primary:hover {
            background: #1d4ed8;
        }

        @media (max-width: 640px) {
            .error-code {
                font-size: 4rem;
            }

            .error-title {
                font-size: 1.25rem;
            }

            .error-container {
                margin: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="error-container">
        <div class="error-code">401</div>
        <h1 class="error-title">Looking for a Workspace? ✨</h1>
        <p class="error-message">While this page isn't here, your next work adventure is just a click away!</p>
        <a href="/packages" class="button-primary">Find My Perfect Spot 🎯</a>
    </div>
</body>

</html>