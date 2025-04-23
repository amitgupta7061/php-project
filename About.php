<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Clover Learning</title>
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

    <section class="py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold text-center mb-12 text-gray-800">About Clover Learning</h1>
            
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Mission</h2>
                    <p class="text-gray-600 leading-relaxed">
                        At Clover Learning, we believe that every child deserves access to quality education that is both engaging and effective. Our mission is to create a fun, interactive learning environment where children can develop their skills and knowledge while enjoying the process of learning.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">What We Offer</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">Interactive Learning</h3>
                            <p class="text-gray-600">
                                Our platform offers interactive lessons, games, and activities that make learning fun and engaging for children of all ages.
                            </p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">Comprehensive Curriculum</h3>
                            <p class="text-gray-600">
                                We cover a wide range of subjects including Mathematics, English, Social Science, and Physical Education.
                            </p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">Fun Activities</h3>
                            <p class="text-gray-600">
                                From puzzles to art & crafts, we provide various activities to enhance creativity and problem-solving skills.
                            </p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">Learning Resources</h3>
                            <p class="text-gray-600">
                                Access to books, videos, and worksheets to support your child's learning journey.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Team</h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Our team consists of experienced educators, content creators, and technology experts who are passionate about making learning enjoyable and effective for children.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="w-32 h-32 bg-gray-200 rounded-full mx-auto mb-4"></div>
                            <h3 class="text-xl font-semibold text-gray-800">Sarah Johnson</h3>
                            <p class="text-gray-600">Education Director</p>
                        </div>
                        <div class="text-center">
                            <div class="w-32 h-32 bg-gray-200 rounded-full mx-auto mb-4"></div>
                            <h3 class="text-xl font-semibold text-gray-800">Michael Chen</h3>
                            <p class="text-gray-600">Content Creator</p>
                        </div>
                        <div class="text-center">
                            <div class="w-32 h-32 bg-gray-200 rounded-full mx-auto mb-4"></div>
                            <h3 class="text-xl font-semibold text-gray-800">Emily Rodriguez</h3>
                            <p class="text-gray-600">Technology Lead</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Contact Us</h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Have questions or suggestions? We'd love to hear from you! Reach out to us through our contact form or email us directly.
                    </p>
                    <div class="flex justify-center">
                        <a href="index.php#feedback" class="bg-gradient-to-r from-green-500 to-green-600 text-white font-bold py-3 px-8 rounded-full hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Get in Touch
                        </a>
                    </div>
                </div>
            </div>
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