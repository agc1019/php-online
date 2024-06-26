const cardContainer = document.querySelector('.card-container');
const cards = cardContainer.querySelectorAll('.flip-card');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');
const cardNumberElement = document.getElementById('card-number');
const totalCardsElement = document.getElementById('total-cards');

const form = document.getElementById('testPopup');
    const checkboxes = document.querySelectorAll('.form-check-input');
    const checkboxContainer = document.getElementById('checkboxContainer');
    const checkboxError = document.getElementById('checkboxError');
    const counterInput = document.getElementById('counter');
    const counterError = document.getElementById('counterError');
    const decreaseButton = document.getElementById('decreaseBtn');
    const increaseButton = document.getElementById('increaseBtn');
    const selectPrompt = document.getElementById('validationSelectPrompt');
    const MIN_COUNT = 1;
    const MAX_COUNT = 99;
    const errorMessage = `Please enter a number between ${MIN_COUNT} and ${MAX_COUNT}.`;

let currentCardIndex = 0;

// Set total number of cards
totalCardsElement.textContent = cards.length;

function showCard(index) {
    cards.forEach((card, i) => {
        card.classList.toggle('active', i === index);
    });

    // Update button states and colors
    updateButtonState();

    // Update card counter
    updateCardCounter();
}

function updateButtonState() {
    prevBtn.disabled = currentCardIndex === 0;
    nextBtn.disabled = currentCardIndex === cards.length - 1;
}

function updateCardCounter() {
    // Update the card counter text
    cardNumberElement.textContent = currentCardIndex + 1; // +1 because array index starts from 0
}

function handleFlip() {
    speechSynthesis.cancel(); // Stop any ongoing TTS
    this.classList.toggle('is-flipped'); // Toggle the is-flipped class
}

nextBtn.addEventListener('click', () => {
    speechSynthesis.cancel(); // Stop any ongoing TTS
    currentCardIndex = (currentCardIndex + 1) % cards.length;
    showCard(currentCardIndex);
});

prevBtn.addEventListener('click', () => {
    speechSynthesis.cancel(); // Stop any ongoing TTS
    currentCardIndex = (currentCardIndex - 1 + cards.length) % cards.length;
    showCard(currentCardIndex);
});

// Show the initial card and update the counter
showCard(currentCardIndex);
updateCardCounter();

// Function to detect content type and call the appropriate function
function speakText(button) {
    const contentType = button.getAttribute('data-type');
    if (contentType === 'card') {
        speakCardContent(button);
    } else if (contentType === 'qa') {
        speakQAContent(button);
    }
}

// Function to speak the question and answer content
function speakQAContent(button) {
    const card = button.closest('.card');
    const questionText = card.querySelector('.col-md-7 .card-text').textContent;
    const answerText = card.querySelector('.col-md-4 .card-text').textContent;

    const fullTextToSpeak = `Question: ${questionText}. Answer: ${answerText}`;

    if ('speechSynthesis' in window) {
        const utterance = new SpeechSynthesisUtterance(fullTextToSpeak);
        window.speechSynthesis.speak(utterance);
    } else {
        alert('Text-to-speech not supported in your browser.');
    }
}

(() => {
    'use strict';

    

    // Ensure counter input only accepts numbers between MIN_COUNT and MAX_COUNT
  

    function isCheckboxSelected() {
        return Array.from(checkboxes).some(checkbox => checkbox.checked);
    }

    function validateCheckboxes() {
        if (!isCheckboxSelected()) {
            checkboxContainer.classList.add('invalid-checkbox');
            checkboxError.style.display = 'block';
            return false;
        } else {
            checkboxContainer.classList.remove('invalid-checkbox');
            checkboxError.style.display = 'none';
            return true;
        }
    }

    function decreaseCount() {
        let currentValue = parseInt(counterInput.value);
        if (currentValue > MIN_COUNT) {
            currentValue--;
            counterInput.value = currentValue;
            validateCount(currentValue);
        }
    }

    function increaseCount() {
        let currentValue = parseInt(counterInput.value);
        if (currentValue < MAX_COUNT) {
            currentValue++;
            counterInput.value = currentValue;
            validateCount(currentValue);
        }
    }

    function updateCount() {
        let currentValue = parseInt(counterInput.value);
        validateCount(currentValue);
    }

    function validateCount(value) {
        if (value < MIN_COUNT || value > MAX_COUNT || isNaN(value)) {
            counterInput.classList.add('is-invalid');
            counterInput.classList.remove('is-valid');
            counterError.textContent = errorMessage;
            if (value < MIN_COUNT) {
                counterInput.value = MIN_COUNT;
            } else if (value > MAX_COUNT) {
                counterInput.value = MAX_COUNT;
            }
        } else {
            counterInput.classList.remove('is-invalid');
            counterInput.classList.add('is-valid');
            counterError.textContent = '';
        }
    }

    function validateForm() {
        const isCheckboxesValid = validateCheckboxes();
        const isCounterValid = counterInput.classList.contains('is-valid');
        const isSelectPromptValid = selectPrompt.value !== '';

        if (!isSelectPromptValid) {
            selectPrompt.classList.add('is-invalid');
        } else {
            selectPrompt.classList.remove('is-invalid');
        }

        return isCheckboxesValid && isCounterValid && isSelectPromptValid;
    }

    decreaseButton.addEventListener('click', decreaseCount);
    increaseButton.addEventListener('click', increaseCount);
    counterInput.addEventListener('change', updateCount);

    form.addEventListener('submit', event => {
        event.preventDefault();
        event.stopPropagation();

        if (validateForm()) {
            // Form is valid, redirecting
            GotoTest();
        } else {
            form.classList.add('was-validated');
        }
    });

    validateCount(parseInt(counterInput.value));
})();






document.addEventListener('DOMContentLoaded', () => {
    const cardContainer = document.querySelector('.card-container');
    const cards = Array.from(cardContainer.querySelectorAll('.flip-card'));
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const playBtn = document.getElementById('Play');
    const shuffleBtn = document.querySelector('.icon-btn[title="Shuffle"]');
    const cardNumberElement = document.getElementById('card-number');
    const totalCardsElement = document.getElementById('total-cards');

    let currentCardIndex = 0;
    let autoPlayInterval = null;

    // Shuffle cards
    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    function updateCardsInDOM(cards) {
        // Remove all child nodes
        while (cardContainer.firstChild) {
            cardContainer.removeChild(cardContainer.firstChild);
        }

        // Append shuffled cards
        cards.forEach(card => cardContainer.appendChild(card));
    }

    // Shuffle and update the flashcards in the DOM
    function shuffleAndDisplayCards() {
        const shuffledCards = shuffle(cards);
        updateCardsInDOM(shuffledCards);
        currentCardIndex = 0; // Reset to the first card
        showCard(currentCardIndex);
    }

    // Set total number of cards
    totalCardsElement.textContent = cards.length;

    function showCard(index) {
        cards.forEach((card, i) => {
            card.classList.toggle('active', i === index);
        });

        // Update button states and colors
        updateButtonState();

        // Update card counter
        updateCardCounter();
    }

    function updateButtonState() {
        prevBtn.disabled = currentCardIndex === 0;
        nextBtn.disabled = currentCardIndex === cards.length - 1;
    }

    function updateCardCounter() {
        // Update the card counter text
        cardNumberElement.textContent = currentCardIndex + 1; // +1 because array index starts from 0
    }

    function handleFlip(event) {
        // Ensure the click is not coming from the TTS button
        if (!event.target.classList.contains('tts-btn')) {
            speechSynthesis.cancel(); // Stop any ongoing TTS
            this.classList.toggle('is-flipped'); // Toggle the is-flipped class
        }
    }

    // Autoplay function
    function startAutoplay() {
        autoPlayInterval = setInterval(() => {
            currentCardIndex = (currentCardIndex + 1) % cards.length;
            showCard(currentCardIndex);
        }, 3000); // Change card every 3 seconds
    }

    function stopAutoplay() {
        clearInterval(autoPlayInterval);
        autoPlayInterval = null;
    }

    // Add event listener to the play button
    playBtn.addEventListener('click', () => {
        if (autoPlayInterval) {
            stopAutoplay();
            playBtn.innerHTML = '<i class="fas fa-play"></i>';
        } else {
            startAutoplay();
            playBtn.innerHTML = '<i class="fas fa-pause"></i>';
        }
    });

    // Add event listener to the shuffle button
    shuffleBtn.addEventListener('click', shuffleAndDisplayCards);

    // Show the initial card and update the counter
    showCard(currentCardIndex);
    updateCardCounter();

    // Ensure all cards are flippable
    cards.forEach(card => {
        const flipCardInner = card.querySelector('.flip-card-inner');
        if (flipCardInner) {
            flipCardInner.addEventListener('click', handleFlip);
        }
    });

    // Do not start autoplay on page load
    playBtn.innerHTML = '<i class="fas fa-play"></i>'; // Set the initial state to play

    counterInput.addEventListener('input', function() {
        let currentValue = parseInt(this.value);
        if (isNaN(currentValue) || currentValue < MIN_COUNT) {
            this.value = MIN_COUNT;
        } else if (currentValue > MAX_COUNT) {
            this.value = MAX_COUNT;
        } else {
            this.value = currentValue;
        }
        validateCount(currentValue);
    });
});

// Function to speak the text content (front or back)
function speakText(button, event) {
    event.stopPropagation(); // Stop the event from propagating to the card flip event
    const side = button.getAttribute('data-side');
    const card = button.closest('.flip-card-inner');
    const textElement = card.querySelector(`.flip-card-${side} .card-text`);
    const textToSpeak = textElement.textContent;

    if ('speechSynthesis' in window) {
        const utterance = new SpeechSynthesisUtterance(textToSpeak);
        window.speechSynthesis.speak(utterance);
    } else {
        alert('Text-to-speech not supported in your browser.');
    }
}





