<?php include '../includes/header.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gray-100" style="background-image: url('https://images.pexels.com/photos/34950/pexels-photo.jpg'); background-size: cover;">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Create Account</h2>
        <?php if (isset($_GET['error'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>
        <form action="../scripts/register.php" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="name">Full Name</label>
                <input type="text" id="name" name="name" required
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="email">Email</label>
                <input type="email" id="email" name="email" required
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 mb-2" for="password">Password</label>
                <input type="password" id="password" name="password" required minlength="8"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-xs text-gray-500 mt-1">Minimum 8 characters</p>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                Register
            </button>
        </form>
        <div class="mt-4 text-center">
            <a href="index.php" class="text-blue-500 hover:underline">Already have an account? Login</a>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>