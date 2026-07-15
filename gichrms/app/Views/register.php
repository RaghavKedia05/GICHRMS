<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md p-8">

        <div class="bg-white shadow-xl rounded-2xl p-8">

            <div class="text-center mb-8">

                <h1 class="text-3xl font-bold text-gray-800">
                    Create Account
                </h1>

                <p class="text-gray-500 mt-2">
                    Register to access the HRMS platform
                </p>

            </div>

            <?php if (session()->getFlashdata('errors')): ?>

                <div class="bg-red-100 border border-red-300 text-red-700 rounded-lg p-3 mb-5">

                    <?php foreach (session()->getFlashdata('errors') as $error): ?>

                        <p><?= esc($error) ?></p>

                    <?php endforeach; ?>

                </div>

            <?php endif; ?>

            <form action="<?= base_url('register') ?>" method="post" class="space-y-5">

                <?= csrf_field() ?>

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Full Name
                    </label>

                    <input type="text" name="name" placeholder="Enter your full name" value="<?= old('name') ?>"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">

                </div>

                <div>

                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>

                    <input type="email" name="email" placeholder="Enter your email" value="<?= old('email') ?>" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">

                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Password
                    </label>

                    <div class="relative">

                        <input type="password" id="password" name="password" placeholder="Create a strong password"
                            required
                            class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">

                        <button type="button" onclick="togglePassword('password', this)"
                            class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-500 hover:text-indigo-600">

                            <i data-lucide="eye-off" class="eye-off-icon w-5 h-5"></i>
                            <i data-lucide="eye" class="eye-icon w-5 h-5 hidden"></i>

                        </button>

                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Confirm Password
                    </label>

                    <div class="relative">

                        <input type="password" id="confirm_password" name="confirm_password"
                            placeholder="Re-enter your password" required
                            class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">

                        <button type="button" onclick="togglePassword('confirm_password', this)"
                            class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-500 hover:text-indigo-600">

                            <i data-lucide="eye-off" class="w-5 h-5"></i>
                            <i data-lucide="eye" class="w-5 h-5 hidden"></i>

                        </button>

                    </div>
                </div>
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg transition">

                    Create Account

                </button>

                <p class="text-center text-sm text-gray-600">

                    Already have an account?

                    <a href="<?= base_url('login') ?>" class="text-indigo-600 font-medium hover:text-indigo-700">

                        Sign In

                    </a>

                </p>

            </form>

        </div>

    </div>

    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        lucide.createIcons();

        function togglePassword(inputId, button) {

            const input = document.getElementById(inputId);

            // Find the SVGs inside ONLY the clicked button
            const icons = button.querySelectorAll("svg");

            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }

            // Toggle only this button's icons
            icons[0].classList.toggle("hidden");
            icons[1].classList.toggle("hidden");
        }
    </script>


</body>

</html>