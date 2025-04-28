<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlashLearn - Your Interactive Flashcard Learning Platform</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f7fa;
        }
        
        a {
            text-decoration: none;
            color: #3d5af1;
            transition: color 0.3s ease;
        }
        
        a:hover {
            color: #2240d9;
        }
        
        ul {
            list-style: none;
        }
        
        button {
            cursor: pointer;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header and Navigation */
        .header {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 40px;
            margin-right: 10px;
        }
        
        .logo h1 {
            font-size: 24px;
            font-weight: 700;
            color: #3d5af1;
        }
        
        .nav-links {
            display: flex;
            gap: 25px;
        }
        
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: #333;
        }
        
        .auth-buttons {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            padding: 8px 20px;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-primary {
            background-color: #3d5af1;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #2240d9;
            color: white;
        }
        
        .btn-outline {
            background-color: transparent;
            border: 2px solid #3d5af1;
            color: #3d5af1;
        }
        
        .btn-outline:hover {
            background-color: #3d5af1;
            color: white;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #3d5af1 0%, #2240d9 100%);
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 42px;
            margin-bottom: 20px;
        }
        
        .hero p {
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto 30px;
        }
        
        /* Main Content */
        .main-content {
            padding: 40px 0;
        }
        
        .section-title {
            font-size: 32px;
            text-align: center;
            margin-bottom: 40px;
            color: #333;
        }
        
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .actions {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
        
        /* Flashcards Grid */
        .flashcards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .flashcard {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        
        .flashcard:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        
        .flashcard-question {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }
        
        .flashcard-category {
            display: inline-block;
            background-color: #e9f0ff;
            color: #3d5af1;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .flashcard-actions {
            display: flex;
            justify-content: space-between;
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        
        .action-btn {
            background: none;
            border: none;
            font-size: 14px;
            font-weight: 600;
        }
        
        .view-btn {
            color: #3d5af1;
        }
        
        .edit-btn {
            color: #f1a83d;
        }
        
        .delete-btn {
            color: #f13d3d;
        }
        
        /* Features Section */
        .features {
            padding: 60px 0;
            background-color: #ffffff;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }
        
        .feature-card {
            text-align: center;
            padding: 30px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            background-color: #f9fafc;
        }
        
        .feature-icon {
            font-size: 40px;
            margin-bottom: 20px;
            color: #3d5af1;
        }
        
        .feature-title {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
        }
        
        /* Testimonials */
        .testimonials {
            padding: 60px 0;
            background-color: #f5f7fa;
        }
        
        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .testimonial-card {
            background-color: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #ccc;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        
        .author-info h4 {
            font-size: 16px;
            margin-bottom: 2px;
        }
        
        .author-info p {
            font-size: 14px;
            color: #666;
        }
        
        /* Call to Action */
        .cta {
            padding: 60px 0;
            background: linear-gradient(135deg, #3d5af1 0%, #2240d9 100%);
            color: white;
            text-align: center;
        }
        
        .cta h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }
        
        .cta p {
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto 30px;
        }
        
        /* Footer */
        .footer {
            background-color: #222;
            color: #aaa;
            padding: 50px 0 20px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .footer-column h3 {
            color: white;
            margin-bottom: 20px;
            font-size: 18px;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: #aaa;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #444;
        }
        
        /* Login Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        
        .modal.active {
            display: flex;
        }
        
        .modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            position: relative;
        }
        
        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 24px;
            color: #666;
            background: none;
            border: none;
            cursor: pointer;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .remember-me input {
            margin-right: 8px;
        }
        
        .alert {
            padding: 12px;
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 70px;
                left: 0;
                width: 100%;
                background-color: white;
                flex-direction: column;
                padding: 20px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            }
            
            .nav-links.active {
                display: flex;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .hero h1 {
                font-size: 32px;
            }
            
            .section-title {
                font-size: 26px;
            }
            
            .actions {
                justify-content: center;
            }
        }
        
        @media (max-width: 576px) {
            .auth-buttons {
                display: none;
            }
            
            .hero h1 {
                font-size: 28px;
            }
            
            .flashcards-grid {
                grid-template-columns: 1fr;
            }
            
            .feature-card, .testimonial-card {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <span style="font-size: 30px; color: #3d5af1;">📝</span>
                    <h1>FlashLearn</h1>
                </div>
                
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">My Flashcards</a></li>
                    <li><a href="#">About</a></li>
                </ul>
                
                <button class="mobile-menu-btn">☰</button>
                
                <div class="auth-buttons">
                    <button id="loginButton" class="btn btn-outline">Login</button>
                    <a href="#" class="btn btn-primary">Sign Up</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <button class="close-btn">&times;</button>
            <h2 style="text-align: center; margin-bottom: 20px; color: #3d5af1;">Login to FlashLearn</h2>
            
            @if ($errors->any())
                <div class="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember Me</label>
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
            </form>
            
            <div style="text-align: center; margin-top: 20px;">
            <a href="/password/reset">Forgot Your Password?</a>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Master Any Subject with FlashLearn</h1>
            <p>Create, study, and master your flashcards. The most effective way to memorize information and ace your exams.</p>
            <a href="{{ route('flashcards.create') }}" class="btn btn-primary">Create Your First Flashcard</a>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <h2 class="section-title">All Flashcards</h2>
            
            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="actions">
                <a href="{{ route('flashcards.create') }}" class="btn btn-primary">Create New Flashcard</a>
            </div>
            
            <div class="flashcards-grid">
                @foreach ($flashcards as $flashcard)
                    <div class="flashcard">
                        <div class="flashcard-question">{{ $flashcard->question }}</div>
                        <span class="flashcard-category">Category</span>
                        <div class="flashcard-actions">
                            <a href="{{ route('flashcards.show', $flashcard->id) }}" class="action-btn view-btn">View</a>
                            <a href="{{ route('flashcards.edit', $flashcard->id) }}" class="action-btn edit-btn">Edit</a>
                            <form action="{{ route('flashcards.destroy', $flashcard->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this flashcard?')">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2 class="section-title">Why Choose FlashLearn?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3 class="feature-title">Study Anywhere</h3>
                    <p>Access your flashcards from any device, anywhere. Perfect for studying on-the-go.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔄</div>
                    <h3 class="feature-title">Easy Review</h3>
                    <p>Flip through your cards and mark the ones you need to review again.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3 class="feature-title">Organized Learning</h3>
                    <p>Keep your flashcards organized by subject or topic for efficient studying.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">👥</div>
                    <h3 class="feature-title">Personal Library</h3>
                    <p>Build your own collection of study materials tailored to your needs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">What Our Users Say</h2>
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <p class="testimonial-text">"This flashcard app helped me organize my study materials. I love how easy it is to create and review cards!"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">JS</div>
                        <div class="author-info">
                            <h4>Jessica Smith</h4>
                            <p>Student</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-text">"I've tried many flashcard apps, but this one has the best interface. Learning has never been so easy!"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">MR</div>
                        <div class="author-info">
                            <h4>Michael Rodriguez</h4>
                            <p>Language Learner</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-text">"Creating custom flashcards has really improved my study habits. I can focus on exactly what I need to learn."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">AT</div>
                        <div class="author-info">
                            <h4>Aisha Thomas</h4>
                            <p>College Student</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Boost Your Learning?</h2>
            <p>Start creating your flashcards today and improve your study efficiency.</p>
            <a href="#" class="btn btn-outline">Get Started</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>FlashLearn</h3>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Resources</h3>
                    <ul class="footer-links">
                        <li><a href="#">How to Use</a></li>
                        <li><a href="#">Tips & Tricks</a></li>
                        <li><a href="#">Study Methods</a></li>
                        <li><a href="#">Help Center</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Legal</h3>
                    <ul class="footer-links">
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 FlashLearn. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('active');
        });
        
        // Login Modal
        const loginButton = document.getElementById('loginButton');
        const loginModal = document.getElementById('loginModal');
        const closeBtn = document.querySelector('.close-btn');
        
        loginButton.addEventListener('click', function() {
            loginModal.classList.add('active');
        });
        
        closeBtn.addEventListener('click', function() {
            loginModal.classList.remove('active');
        });
        
        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target === loginModal) {
                loginModal.classList.remove('active');
            }
        });
    </script>
</body>
</html>