<?php
require_once '../config/db.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}
?>
<?php include '../includes/header.php'; ?>

<div class="min-h-screen bg-gray-900 text-white">
    <div class="container mx-auto py-8 px-4">
        <!-- Call Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold">Voice Chat</h1>
            <a href="profile.php" class="text-blue-400 hover:text-blue-300">
                <i class="fas fa-times text-2xl"></i>
            </a>
        </div>

        <!-- Audio Visualization -->
        <div class="bg-gray-800 rounded-lg p-6 mb-8">
            <canvas id="audioVisualizer" class="w-full h-32 bg-gray-700 rounded"></canvas>
        </div>

        <!-- Call Controls -->
        <div class="fixed bottom-0 left-0 right-0 bg-gray-800 p-6">
            <div class="flex justify-center space-x-8">
                <button id="startCall" class="bg-green-500 hover:bg-green-600 text-white rounded-full p-4 transition">
                    <i class="fas fa-phone-alt text-xl"></i>
                </button>
                <button id="endCall" class="bg-red-500 hover:bg-red-600 text-white rounded-full p-4 transition hidden">
                    <i class="fas fa-phone-slash text-xl"></i>
                </button>
                <button id="muteMic" class="bg-blue-500 hover:bg-blue-600 text-white rounded-full p-4 transition">
                    <i class="fas fa-microphone text-xl"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script src="../scripts/webrtc.js"></script>
<?php include '../includes/footer.php'; ?>