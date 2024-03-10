<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the phone number is provided
    if (!empty($_POST['number'])) {
        $url = "https://app.mynagad.com:20002/api/user/check-user-status-for-log-in?msisdn=" . $_POST['number'];

        $headers = array(
            "X-KM-User-AspId: 100012345612345",
            "X-KM-User-Agent: ANDROID/1152",
            "X-KM-DEVICE-FGP: 19DC58E052A91F5B2EB59399AABB2B898CA68CFE780878C0DB69EAAB0553C3C6",
            "X-KM-Accept-language: bn",
            "X-KM-AppCode: 01",
        );

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);

        curl_close($ch);

        // Decode JSON response into an associative array
        $data = json_decode($response, true);

        // HTML and CSS for styling
        echo "<html>
                <head>
                    <meta name='viewport' content='width=device-width, initial-scale=1'>
                    <style>
                        body {
                            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                            background-color: #f8f8f8;
                            padding: 20px;
                            color: #333;
                            line-height: 1.6;
                        }
                        .container {
                            max-width: 400px;
                            margin: auto;
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 10px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }
                        h2 {
                            color: #007bff; /* Blue */
                            font-size: 1.5em;
                            margin-bottom: 10px;
                        }
                        .info {
                            font-size: 1.2em;
                            margin-bottom: 15px;
                        }
                        form {
                            margin-top: 20px;
                        }
                        input {
                            padding: 10px;
                            width: 100%;
                            margin-bottom: 10px;
                            box-sizing: border-box;
                        }
                        button {
                            background-color: #007bff; /* Blue */
                            color: #fff;
                            padding: 10px;
                            border: none;
                            cursor: pointer;
                            width: 100%;
                        }
                        .developer {
                            font-size: 0.8em;
                            margin-top: 10px;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <h2>NAGAD INFO</h2>
                        <div class='info'><strong>Name:</strong> " . $data['name'] . "</div>
                        <div class='info'><strong>User ID:</strong> " . $data['userId'] . "</div>
                        <div class='info'><strong>Status:</strong> " . $data['status'] . "</div>
                        <form method='post'>
                            <input type='text' name='number' placeholder='Enter Phone Number' required>
                            <button type='submit'>Submit</button>
                        </form>
                        <div class='developer'>Developer: <a href='https://t.me/TonmoyThunder' target='_blank'>TR THUNDER</a></div>
                    </div>
                </body>
            </html>";
    } else {
        echo "Error: Phone number not provided.";
    }
} else {
    // Display the initial form
    echo "<html>
            <head>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <style>
                    body {
                        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                        background-color: #f8f8f8;
                        padding: 20px;
                        color: #333;
                        line-height: 1.6;
                    }
                    .container {
                        max-width: 400px;
                        margin: auto;
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    h2 {
                        color: #007bff; /* Blue */
                        font-size: 1.5em;
                        margin-bottom: 10px;
                    }
                    .info {
                        font-size: 1.2em;
                        margin-bottom: 15px;
                    }
                    form {
                        margin-top: 20px;
                    }
                    input {
                        padding: 10px;
                        width: 100%;
                        margin-bottom: 10px;
                        box-sizing: border-box;
                    }
                    button {
                        background-color: #007bff; /* Blue */
                        color: #fff;
                        padding: 10px;
                        border: none;
                        cursor: pointer;
                        width: 100%;
                    }
                    .developer {
                        font-size: 0.8em;
                        margin-top: 10px;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h2>NAGAD INFO</h2>
                    <form method='post'>
                        <input type='text' name='number' placeholder='Enter Phone Number' required>
                        <button type='submit'>Submit</button>
                    </form>
                    <div class='developer'>Developer: <a href='https://t.me/TonmoyThunder' target='_blank'>TR THUNDER</a></div>
                </div>
            </body>
        </html>";
}
?>
