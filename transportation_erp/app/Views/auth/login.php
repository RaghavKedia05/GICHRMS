<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md p-8">
        <div class="bg-white shadow-xl rounded-2xl p-8">
            
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Welcome Back</h1>
                <p class="text-gray-500 mt-2">Sign in to your account</p>
            </div>

            <form action="<?= base_url('login') ?>" method="post" class="space-y-5">
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        placeholder="Enter your email"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    />
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <a href="#" class="text-sm text-indigo-600 hover:text-indigo-700">
                            Forgot Password?
                        </a>
                    </div>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
                    />
                </div>

                <div class="flex items-center">
                    <input
                        id="remember"
                        type="checkbox"
                        class="h-4 w-4 text-indigo-600 border-gray-300 rounded"
                    />
                    <label for="remember" class="ml-2 text-sm text-gray-600">
                        Remember me
                    </label>
                </div>

                <button
                    type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg transition duration-300"
                >
                    Sign In
                </button>

                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="bg-white px-4 text-gray-500">or continue with</span>
                    </div>
                </div>

                <div class="flex justify-center">
                    <button
                     type="button"
                     class="flex justify-center items-center py-3 px-6 border border-gray-300 rounded-lg hover:bg-gray-50 transition"
                    >
                     Google
                    </button>
                </div>

                <p class="text-center text-sm text-gray-600">
                    Don't have an account?
                    <a href="#" class="text-indigo-600 font-medium hover:text-indigo-700">
                        Sign Up
                    </a>
                </p>

            </form>
        </div>
    </div>

</body>
</html>