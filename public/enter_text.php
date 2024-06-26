<!DOCTYPE html>
<html>

<head>
    <title>Enter Text - Insightify</title>
    <link rel="icon" href="./logo/symbol_blue.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link for CSS -->
    <link rel="stylesheet" href="./css/enter_text.css">
    <!-- JS for font -->
    <script src="https://kit.fontawesome.com/ed08dfa832.js" crossorigin="anonymous"></script>
    <!-- Tesseract.js -->
    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@2.1.4/dist/tesseract.min.js"></script>
    <!-- PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <!-- Mammoth.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.2/mammoth.browser.min.js"></script>
    <!-- External JS -->
    <script src="./js/enter_text.js" defer></script>
</head>

<body>
    <!-- ENTER TEXT POPUP -->
    <div id="enter-text-popup" class="modal">
        <div class="enter-text-container">
            <h1>Type your text here:</h1>
            <textarea name="message" placeholder="Enter or paste your text here and then press “Next”"></textarea>
            <div class="file-upload-container">
                <input type="file" id="uploadBtn" accept=".jpeg,.jpg,.png,.pdf,.doc,.docx">
                <label for="uploadBtn"><i class="fa-solid fa-upload"></i>Upload File</label>
                <div class="progress-bar" id="progressBar"></div>
            </div>
        </div>
        <div class="button-container">
            <button type="submit" class="btn">Next</button>
        </div>
    </div>

    <!-- SIMPLIFIED TEXT POPUP -->
    <div id="simplified-popup" class="modal">
        <div class="simplified-text-container">
            <h1>
                Your text:
                <div class="icon-container">
                    <button class="edit-button"><i class="fa-solid fa-edit icon"></i></button> <!-- Edit button -->
                    <div class="dropdown">
                        <button class="copy-button"><i class="fa-solid fa-copy icon"></i></button> <!-- Copy button -->
                        <div class="dropdown-content">
                            <a href="#" class="copy-your-text">Your Text</a>
                            <a href="#" class="copy-paraphrased-text">Paraphrased Text</a>
                        </div>
                    </div>
                    <button class="delete-button"><i class="fa-solid fa-trash-alt icon"></i></button> <!-- Delete button -->
                </div>
            </h1>
            <textarea name="message" readonly></textarea>
            <h1>Paraphrased text:</h1>
            <textarea name="message" readonly></textarea>
        </div>
        <div class="button-container">
            <button type="submit" class="btn">Finish</button>
        </div>
    </div>

</body>

</html>