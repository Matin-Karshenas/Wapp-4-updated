<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loading Screen</title>
  <link href="https://fonts.googleapis.com/css2?family=Doto:wght@100..900&display=swap" rel="stylesheet">
  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body, html {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "Doto",s-serif;
        background-color: black; /* Set background to black */
    }

    #loadingScreen {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        color: red; /* Set text color to red */
        text-shadow: 0 0 7px red, 0 0 7px red, 0 0 7px red, 0 0 7px red, 0 0 7px red, 0 0 7px red;
    }

    #loadingText {
        display: inline-block;
        transition: all 0.3s ease-in-out;
    }
  </style>
</head>
<body>
  <div id="loadingScreen">
    <p id="loadingText">Please Wait</p>
  </div>

  <script >
    let loadingText = document.getElementById('loadingText');
    let dotsCount = 0;
    let maxDots = 3;

    function updateLoadingText() {
        dotsCount = (dotsCount + 1) % (maxDots + 1); // This will reset after 3 dots
        let text = "Please Wait" + ".".repeat(dotsCount);
        loadingText.textContent = text;
    }

    // Update the loading text every 0.5 seconds
    let interval = setInterval(updateLoadingText, 500);

    // After 3 seconds, stop the loading animation and redirect to another website
    setTimeout(function() {
        clearInterval(interval); // Stop updating dots
        window.location.href = "Trump.php"; // Change this to the URL you want to redirect to
    }, 3000);
  </script>
</body>
</html>