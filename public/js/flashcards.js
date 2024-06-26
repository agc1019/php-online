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

    // Add event listeners to prev and next buttons
    prevBtn.addEventListener('click', () => {
        if (currentCardIndex > 0) {
            currentCardIndex--;
            showCard(currentCardIndex);
        }
    });

    nextBtn.addEventListener('click', () => {
        if (currentCardIndex < cards.length - 1) {
            currentCardIndex++;
            showCard(currentCardIndex);
        }
    });

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
