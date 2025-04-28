<!-- <!DOCTYPE html>
<html>
<head>
    <title>Edit Flashcard</title>
</head>
<body>
    <h1>Edit Flashcard</h1>

    <a href="{{ route('flashcards.index') }}">Back</a>

    @if ($errors->any())
        <div>
            <strong>Error!</strong> Please correct the fields.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('flashcards.update', $flashcard->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Question:</label>
            <input type="text" name="question" value="{{ old('question', $flashcard->question) }}">
        </div>

        <div>
            <label>Answer:</label>
            <input type="text" name="answer" value="{{ old('answer', $flashcard->answer) }}">
        </div>

        <button type="submit">Update</button>
    </form>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Flashcard</title>
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
        .form-container {
            width: 100%;
            max-width: 600px;
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
        
        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #2d3748;
            letter-spacing: -0.5px;
        }
        
        .edit-badge {
            display: inline-flex;
            align-items: center;
            background-color: #ebf4ff;
            color: #4299e1;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin-left: 12px;
        }
        
        /* Form styles */
        .form-group {
            margin-bottom: 24px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #4a5568;
            font-size: 16px;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            color: #2d3748;
            background-color: #f8fafc;
            transition: all 0.2s ease;
        }
        
        input[type="text"]:focus {
            outline: none;
            border-color: #4285f4;
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(66, 133, 244, 0.2);
        }
        
        input[type="text"]::placeholder {
            color: #a0aec0;
        }
        
        /* Error styles */
        .error-container {
            background-color: #fff5f5;
            border: 1px solid #fed7d7;
            border-left: 4px solid #f56565;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 24px;
        }
        
        .error-title {
            color: #c53030;
            font-weight: 600;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .error-list {
            margin-left: 24px;
            color: #e53e3e;
        }
        
        .error-list li {
            margin-bottom: 4px;
        }
        
        /* Buttons */
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
        
        /* Form actions */
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 32px;
            gap: 16px;
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            .form-container {
                padding: 24px;
            }
            
            .page-title {
                font-size: 24px;
            }
        }
        
        @media (max-width: 480px) {
            body {
                padding: 12px;
            }
            
            .form-container {
                padding: 16px;
                border-radius: 12px;
            }
            
            .page-title {
                font-size: 20px;
            }
            
            .edit-badge {
                font-size: 12px;
                padding: 3px 8px;
            }
            
            .form-actions {
                flex-direction: column-reverse;
            }
            
            .btn {
                width: 100%;
            }
        }

        /* Form header section */
        .form-header {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
        }

        .form-icon {
            width: 24px;
            height: 24px;
            color: #4285f4;
        }

        /* Card preview */
        .card-preview {
            margin-top: 32px;
            padding: 20px;
            background-color: #f8fafc;
            border: 1px dashed #cbd5e0;
            border-radius: 12px;
            text-align: center;
        }

        .preview-title {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #a0aec0;
            margin-bottom: 16px;
        }

        .preview-content {
            display: flex;
            gap: 16px;
            align-items: stretch;
        }

        .preview-card {
            flex: 1;
            padding: 16px;
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            min-height: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .preview-label {
            font-size: 12px;
            font-weight: 600;
            color: #718096;
            margin-bottom: 8px;
        }

        .preview-text {
            color: #4a5568;
            font-size: 14px;
            font-style: italic;
        }

        .empty-text {
            color: #a0aec0;
        }
        
        /* History section */
        .history-info {
            font-size: 14px;
            color: #718096;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #edf2f7;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .history-icon {
            width: 16px;
            height: 16px;
            color: #718096;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="header">
            <h1 class="page-title">
                Edit Flashcard
                <span class="edit-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    Editing
                </span>
            </h1>
        </div>
        
        @if ($errors->any())
            <div class="error-container">
                <div class="error-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    Please correct the following errors:
                </div>
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('flashcards.update', $flashcard->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div class="form-header">
                    <svg class="form-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                    <label for="question">Question</label>
                </div>
                <input type="text" id="question" name="question" value="{{ old('question', $flashcard->question) }}" placeholder="Enter your question here..." autofocus>
            </div>
            
            <div class="form-group">
                <div class="form-header">
                    <svg class="form-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20z"></path>
                        <path d="M12 16v-4M12 8h.01"></path>
                    </svg>
                    <label for="answer">Answer</label>
                </div>
                <input type="text" id="answer" name="answer" value="{{ old('answer', $flashcard->answer) }}" placeholder="Enter your answer here...">
            </div>

            <div class="card-preview">
                <h3 class="preview-title">Preview</h3>
                <div class="preview-content">
                    <div class="preview-card">
                        <span class="preview-label">Question</span>
                        <p class="preview-text" id="question-preview">{{ $flashcard->question }}</p>
                    </div>
                    <div class="preview-card">
                        <span class="preview-label">Answer</span>
                        <p class="preview-text" id="answer-preview">{{ $flashcard->answer }}</p>
                    </div>
                </div>
                
                <div class="history-info">
                    <svg class="history-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    Last updated: {{ $flashcard->updated_at->diffForHumans() }}
                </div>
            </div>
            
            <div class="form-actions">
                <a href="{{ route('flashcards.index') }}" class="btn btn-back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5M12 19l-7-7 7-7"></path>
                    </svg>
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg>
                    Save Changes
                </button>
            </div>
        </form>
    </div>

    <script>
        // Live preview functionality
        const questionInput = document.getElementById('question');
        const answerInput = document.getElementById('answer');
        const questionPreview = document.getElementById('question-preview');
        const answerPreview = document.getElementById('answer-preview');
        
        function updatePreviews() {
            if (questionInput.value.trim() !== '') {
                questionPreview.innerHTML = questionInput.value;
            } else {
                questionPreview.innerHTML = '<span class="empty-text">Your question will appear here</span>';
            }
            
            if (answerInput.value.trim() !== '') {
                answerPreview.innerHTML = answerInput.value;
            } else {
                answerPreview.innerHTML = '<span class="empty-text">Your answer will appear here</span>';
            }
        }
        
        questionInput.addEventListener('input', updatePreviews);
        answerInput.addEventListener('input', updatePreviews);
        
        // Initialize with existing values
        updatePreviews();
    </script>
</body>
</html>