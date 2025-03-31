<?php
require_once '../config/db.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

$user = $_SESSION['user'];
?>
<?php include '../includes/header.php'; ?>

<div class="min-h-screen bg-gray-100">
    <div class="container mx-auto py-8 px-4">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Profile Header -->
            <div class="bg-blue-500 p-6 text-white">
                <div class="flex items-center">
                    <img src="<?= htmlspecialchars($user['profile_image']) ?>" 
                         class="w-20 h-20 rounded-full border-4 border-white">
                    <div class="ml-6">
                        <h1 class="text-2xl font-bold"><?= htmlspecialchars($user['name']) ?></h1>
                        <p class="text-blue-100"><?= htmlspecialchars($user['email']) ?></p>
                    </div>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Voice Call Section -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold mb-4">Start Voice Call</h2>
                        <a href="call.php" class="inline-flex items-center px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                            <i class="fas fa-phone-alt mr-2"></i> New Call
                        </a>
                    </div>

                    <!-- Account Settings -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold mb-4">Account Settings</h2>
                        <a href="#" class="block mb-2 text-blue-500 hover:underline">
                            <i class="fas fa-user-edit mr-2"></i> Edit Profile
                        </a>
                        <a href="../scripts/logout.php" class="block text-red-500 hover:underline">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>