<?php
session_start();
require_once 'config/db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get user data
try {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
} catch(PDOException $e) {
    die("Error fetching user data: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Clover Learning</title>
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
            <div class="max-w-2xl mx-auto">
                <h1 class="text-4xl font-bold text-center mb-12 text-gray-800">Your Profile</h1>
                
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <div class="flex items-center justify-center mb-8">
                        <div class="w-32 h-32 bg-green-100 rounded-full flex items-center justify-center">
                            <span class="text-5xl">👤</span>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="border-b border-gray-200 pb-4">
                            <h3 class="text-sm font-medium text-gray-500">Full Name</h3>
                            <p class="mt-1 text-lg text-gray-900"><?php echo htmlspecialchars($user['name']); ?></p>
                        </div>

                        <div class="border-b border-gray-200 pb-4">
                            <h3 class="text-sm font-medium text-gray-500">Email</h3>
                            <p class="mt-1 text-lg text-gray-900"><?php echo htmlspecialchars($user['email']); ?></p>
                        </div>

                        <div class="border-b border-gray-200 pb-4">
                            <h3 class="text-sm font-medium text-gray-500">Member Since</h3>
                            <p class="mt-1 text-lg text-gray-900"><?php echo date('F j, Y', strtotime($user['created_at'])); ?></p>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-center space-x-4">
                        <a href="index.php" class="bg-gradient-to-r from-green-500 to-green-600 text-white font-bold py-2 px-6 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Back to Home
                        </a>
                        <a href="logout.php" class="bg-gradient-to-r from-red-500 to-red-600 text-white font-bold py-2 px-6 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Logout
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