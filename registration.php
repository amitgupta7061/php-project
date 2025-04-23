<?php
session_start();
require_once 'config/db_connect.php';

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Initialize variables
$errors = [];
$success = false;

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate form data
    if (empty($name)) {
        $errors[] = "Name is required";
    }
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }

    // Check if email already exists
    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                $errors[] = "Email already exists";
            }
        } catch(PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }

    // If no errors, proceed with registration
    if (empty($errors)) {
        try {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into database
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $hashed_password]);

            // Get the new user's ID
            $user_id = $pdo->lastInsertId();

            // Create session for the new user
            $_SESSION['user_id'] = $user_id;
            $_SESSION['name'] = $name;

            $success = true;
        } catch(PDOException $e) {
            $errors[] = "Registration failed: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Clover Learning</title>
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
            <div class="max-w-md mx-auto">
                <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">Create Your Account</h1>
                
                <?php if ($success): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline"> Your account has been created successfully. You can now <a href="profile.php" class="text-green-700 underline">view your profile</a>.</span>
                    </div>
                <?php endif; ?>

                <?php if (!empty($errors)): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <ul class="list-disc list-inside">
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="registration.php" method="POST" class="bg-white rounded-2xl shadow-xl p-8">
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" required>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" required>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <input type="password" id="password" name="password" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" required>
                        </div>

                        <div>
                            <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300" required>
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white font-bold py-3 px-6 rounded-lg hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Create Account
                        </button>
                    </div>

                    <div class="mt-6 text-center">
                        <p class="text-gray-600">
                            Already have an account? <a href="login.php" class="text-green-600 hover:text-green-700 font-medium">Login here</a>
                        </p>
                    </div>
                </form>
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