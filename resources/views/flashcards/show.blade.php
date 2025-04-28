<!-- <!DOCTYPE html>
<html>
<head>
    <title>Flashcard</title>
</head>
<body>
    <h1>Question:</h1>
    <p>{{ $flashcard->question }}</p>

    <h1>Answer:</h1>
    <p>{{ $flashcard->answer }}</p>

    <a href="{{ route('flashcards.index') }}">Back to All Flashcards</a>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flashcard</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f0f4f8;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Container */
        .flashcard-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 40px;
            transition: all 0.3s ease;
        }
        
        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            padding-bottom: 16px;
            border-bottom: 1px solid #eaeaea;
        }
        
        .app-title {
            font-size: 28px;
            font-weight: 700;
            color: #2d3748;
            letter-spacing: -0.5px;
        }
        
        .app-subtitle {
            color: #718096;
            font-size: 16px;
            font-weight: 500;
        }
        
        /* Flashcard styles */
        .card {
            width: 100%;
            height: 340px;
            perspective: 1500px;
            margin-bottom: 24px;
            position: relative;
        }
        
        .flashcard {
            width: 100%;
            height: 100%;
            cursor: pointer;
            transform-style: preserve-3d;
            transition: transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            position: relative;
        }
        
        .card.flipped .flashcard {
            transform: rotateY(180deg);
        }
        
        .flashcard-front, .flashcard-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 32px;
            border-radius: 16px;
            overflow: hidden;
        }
        
        .flashcard-front {
            background: linear-gradient(145deg, #f0f7ff 0%, #e6f0fd 100%);
            border: 1px solid rgba(66, 133, 244, 0.2);
        }
        
        .flashcard-front::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #4285f4, #34a853);
            z-index: 1;
        }
        
        .flashcard-back {
            background: linear-gradient(145deg, #f0fff4 0%, #e6faf0 100%);
            border: 1px solid rgba(52, 168, 83, 0.2);
            transform: rotateY(180deg);
        }
        
        .flashcard-back::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #34a853, #4285f4);
            z-index: 1;
        }
        
        .card-label {
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1.5px;
            color: #64748b;
            margin-bottom: 16px;
            font-weight: 600;
            position: relative;
            padding-bottom: 8px;
        }
        
        .card-label::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 2px;
            background-color: #64748b;
        }
        
        .card-content {
            font-size: 24px;
            text-align: center;
            color: #2d3748;
            font-weight: 500;
            max-width: 100%;
            line-height: 1.5;
        }
        
        /* Card icons */
        .card-icon {
            position: absolute;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            bottom: 20px;
            right: 20px;
            font-size: 20px;
            color: #4285f4;
        }
        
        .card-counter {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 14px;
            font-weight: 500;
            color: #64748b;
        }
        
        /* Flip hint */
        .hint {
            text-align: center;
            margin: 16px 0;
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        
        .hint svg {
            width: 16px;
            height: 16px;
        }
        
        /* Navigation */
        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 24px;
            gap: 16px;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            font-size: 16px;
            transition: all 0.2s ease;
            gap: 8px;
            cursor: pointer;
        }
        
        .btn-primary {
            background-color: #4285f4;
            color: white;
            border: none;
            box-shadow: 0 4px 6px rgba(66, 133, 244, 0.25);
        }
        
        .btn-primary:hover {
            background-color: #3367d6;
            box-shadow: 0 6px 8px rgba(66, 133, 244, 0.3);
            transform: translateY(-2px);
        }
        
        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(66, 133, 244, 0.2);
        }
        
        .btn-back {
            background-color: white;
            color: #64748b;
            border: 1px solid #e2e8f0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        
        .btn-back:hover {
            background-color: #f8fafc;
            color: #4a5568;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }
        
        .btn-back:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        
        /* Progress indicator */
        .progress-container {
            width: 100%;
            height: 6px;
            background-color: #e2e8f0;
            border-radius: 3px;
            margin-top: 32px;
            overflow: hidden;
        }
        
        .progress-bar {
            height: 100%;
            width: 33%;
            background: linear-gradient(90deg, #4285f4, #34a853);
            border-radius: 3px;
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            .flashcard-container {
                padding: 24px;
            }
            
            .card {
                height: 280px;
            }
            
            .card-content {
                font-size: 20px;
            }
            
            .app-title {
                font-size: 24px;
            }
        }
        
        @media (max-width: 480px) {
            body {
                padding: 12px;
            }
            
            .flashcard-container {
                padding: 16px;
                border-radius: 12px;
            }
            
            .card {
                height: 240px;
            }
            
            .flashcard-front, .flashcard-back {
                padding: 20px;
            }
            
            .card-content {
                font-size: 18px;
            }
            
            .app-title {
                font-size: 20px;
            }
            
            .actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
        
        /* Card animation */
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(66, 133, 244, 0.4);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(66, 133, 244, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(66, 133, 244, 0);
            }
        }
        
        .flashcard:hover {
            animation: pulse 1.5s infinite;
        }
    </style>
</head>
<body>
    <div class="flashcard-container">
        <div class="header">
            <div>
                <h1 class="app-title">Flashcard</h1>
                <p class="app-subtitle">Tap to reveal the answer</p>
            </div>
        </div>
        
        <div class="card" id="flashcard">
            <div class="flashcard">
                <div class="flashcard-front">
                    <div class="card-label">Question</div>
                    <div class="card-content">{{ $flashcard->question }}</div>
                    <div class="card-icon">Q</div>
                    <div class="card-counter">1/3</div>
                </div>
                <div class="flashcard-back">
                    <div class="card-label">Answer</div>
                    <div class="card-content">{{ $flashcard->answer }}</div>
                    <div class="card-icon">A</div>
                    <div class="card-counter">1/3</div>
                </div>
            </div>
        </div>
        
        <p class="hint">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10 12h4m-2-2v4m0-11a9 9 0 1 0 0 18 9 9 0 0 0 0-18z"></path>
            </svg>
            Click the card to flip
        </p>
        
        <div class="actions">
            <a href="{{ route('flashcards.index') }}" class="btn btn-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7"></path>
                </svg>
                Back to All Flashcards
            </a>
            <button class="btn btn-primary" id="flipButton">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 2v6h-6M3 12a9 9 0 0 1 15-6.7L21 8M3 22v-6h6M21 12a9 9 0 0 1-15 6.7L3 16"></path>
                </svg>
                Flip Card
            </button>
        </div>
        
        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>
    </div>

    <script>
        // Flip card functionality
        const card = document.getElementById('flashcard');
        const flipButton = document.getElementById('flipButton');
        
        function toggleFlip() {
            card.classList.toggle('flipped');
            
            if (card.classList.contains('flipped')) {
                flipButton.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 2v6h-6M3 12a9 9 0 0 1 15-6.7L21 8M3 22v-6h6M21 12a9 9 0 0 1-15 6.7L3 16"></path>
                    </svg>
                    Show Question
                `;
            } else {
                flipButton.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 2v6h-6M3 12a9 9 0 0 1 15-6.7L21 8M3 22v-6h6M21 12a9 9 0 0 1-15 6.7L3 16"></path>
                    </svg>
                    Show Answer
                `;
            }
        }
        
        card.addEventListener('click', toggleFlip);
        flipButton.addEventListener('click', toggleFlip);
        
        // Add touch animation effect
        card.addEventListener('mousedown', function() {
            this.style.transform = 'scale(0.98)';
        });
        
        card.addEventListener('mouseup', function() {
            this.style.transform = 'scale(1)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    </script>
</body>
</html>