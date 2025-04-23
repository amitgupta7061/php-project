<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids Learning - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 font-['Poppins']">
    <header class="bg-gradient-to-r from-green-600 to-green-700 text-white p-4 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img src="images/cloverlogo.png" alt="Clover Logo" class="w-16 h-16 object-contain">
                <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-yellow-300 to-yellow-500">Clover Learning</h1>
            </div>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="index.php" class="hover:text-yellow-300 transition-all duration-300 font-medium">Home</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="profile.php" class="hover:text-yellow-300 transition-all duration-300 font-medium">Profile</a></li>
                        <li><a href="logout.php" class="hover:text-yellow-300 transition-all duration-300 font-medium">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php" class="hover:text-yellow-300 transition-all duration-300 font-medium">Login</a></li>
                        <li><a href="registration.php" class="hover:text-yellow-300 transition-all duration-300 font-medium">Registration</a></li>
                    <?php endif; ?>
                    <li><a href="About.php" class="hover:text-yellow-300 transition-all duration-300 font-medium">About</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="relative bg-gradient-to-r from-blue-500 to-blue-600 text-white py-24 overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGQ9Ik0zNiAzNGM0LjQxOCAwIDgtMy41ODIgOC04cy0zLjU4Mi04LTgtOC04IDMuNTgyLTggOCAzLjU4MiA4IDggOHoiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iLjA1Ii8+PC9nPjwvc3ZnPg==')] opacity-20"></div>
        <div class="container mx-auto text-center relative z-10">
            <h1 class="text-5xl font-bold mb-4 animate-fade-in">Welcome to Clover Learning Program</h1>
            <h2 class="text-3xl font-medium text-yellow-300">Learn & Have Fun!</h2>
            <div class="mt-8">
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a href="registration.php">
                    <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-8 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Get Started
                    </button>
                    </a>
                <?php else: ?>
                    <a href="profile.php">
                    <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-8 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Go to Profile
                    </button>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="container mx-auto py-16">
        <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Our Subjects</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <a href="maths/math.html" class="group bg-white p-8 rounded-2xl shadow-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-2xl border-t-4 border-blue-500">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-200 transition-colors">
                    <span class="text-3xl">🔢</span>
                </div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-2">Math</h3>
                <p class="text-gray-600">Explore the world of numbers and shapes!</p>
            </a>
            <a href="english/english.html" class="group bg-white p-8 rounded-2xl shadow-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-2xl border-t-4 border-green-500">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-200 transition-colors">
                    <span class="text-3xl">📚</span>
                </div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-2">English</h3>
                <p class="text-gray-600">Enhance your language skills and creativity!</p>
            </a>
            <a href="socialandscience/socialscience.html" class="group bg-white p-8 rounded-2xl shadow-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-2xl border-t-4 border-purple-500">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-200 transition-colors">
                    <span class="text-3xl">🌍</span>
                </div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-2">Social Science</h3>
                <p class="text-gray-600">Learn about societies, cultures, and history!</p>
            </a>
            <a href="phycialeducation/phycialeducation.html" class="group bg-white p-8 rounded-2xl shadow-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-2xl border-t-4 border-red-500">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-red-200 transition-colors">
                    <span class="text-3xl">⚽</span>
                </div>
                <h3 class="text-2xl font-semibold text-gray-800 mb-2">Physical Education</h3>
                <p class="text-gray-600">Stay active and healthy through sports and fitness!</p>
            </a>
        </div>
    </section>

    <section class="bg-gradient-to-br from-yellow-50 to-yellow-100 py-16">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Fun Activities</h2>
            <p class="text-center mb-8 text-gray-600 text-lg">Engage in exciting activities that make learning fun!</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <a href="Funactivities/puzzels/puzzles.html" class="block">
                        <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-4xl">🧩</span>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Puzzles</h3>
                        <p class="text-gray-600">Challenge your mind with fun puzzles!</p>
                    </a>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <a href="art&craft.html" class="block">
                        <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-4xl">🎨</span>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Art & Crafts</h3>
                        <p class="text-gray-600">Unleash your creativity with art projects!</p>
                    </a>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <a href="Funactivities/games/game.html" class="block">
                        <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-4xl">🎮</span>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Games</h3>
                        <p class="text-gray-600">Play educational games that make learning enjoyable!</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Learning Resources</h2>
            <p class="text-center mb-8 text-gray-600 text-lg">Explore our curated resources for young learners!</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-8 rounded-2xl shadow-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <a href="LearningResources/Books/books.html" class="block">
                        <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-4xl">📖</span>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Books</h3>
                        <p class="text-gray-600">Discover a variety of books for all ages!</p>
                    </a>
                </div>
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-8 rounded-2xl shadow-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <a href="LearningResources/Videos/video.html" class="block">
                        <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-4xl">🎥</span>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-800 mb-2">Videos</h3>
                        <p class="text-gray-600">Watch educational videos that explain concepts!</p>
                    </a>
                </div>
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-8 rounded-2xl shadow-xl text-center transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-4xl">📝</span>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Worksheets</h3>
                    <p class="text-gray-600">Download worksheets to practice your skills!</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-to-r from-blue-50 to-blue-100 py-16">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Feedback from Parents and Students</h2>
            <p class="text-center mb-8 text-gray-600 text-lg">We value your feedback! Share your thoughts with us.</p>

            <?php if (isset($_GET['feedback'])): ?>
                <?php if ($_GET['feedback'] === 'success'): ?>
                    <div class="max-w-2xl mx-auto bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <strong class="font-bold">Thank you!</strong>
                        <span class="block sm:inline"> Your feedback has been submitted successfully.</span>
                    </div>
                <?php elseif ($_GET['feedback'] === 'error'): ?>
                    <div class="max-w-2xl mx-auto bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline"> <?php echo htmlspecialchars($_GET['message']); ?></span>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <form action="feedback.php" method="POST" class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-xl">
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" placeholder="Your Name" required>
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" placeholder="Your Email" required>
                </div>
                <div class="mb-6">
                    <label for="feedback" class="block text-sm font-medium text-gray-700 mb-2">Feedback</label>
                    <textarea id="feedback" name="feedback" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300" placeholder="Your Feedback" required></textarea>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white font-bold py-3 px-6 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Submit Feedback
                </button>
            </form>
        </div>
    </section>

    <footer class="bg-gradient-to-r from-green-600 to-green-700 text-white py-8">
        <div class="container mx-auto text-center">
            <p class="text-lg">&copy; 2025 Clover Education. All rights reserved.</p>
            <div class="mt-4 flex justify-center space-x-6">
                <a href="#" class="hover:text-yellow-300 transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-yellow-300 transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-yellow-300 transition-colors">Contact Us</a>
            </div>
        </div>
    </footer>
</body>
</html> 