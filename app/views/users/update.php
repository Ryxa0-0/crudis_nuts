<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-100 via-rose-100 to-pink-200 min-h-screen flex items-center justify-center font-sans text-pink-900">

  <div class="bg-white/80 backdrop-blur-md p-8 rounded-3xl shadow-2xl w-full max-w-md border border-pink-100 animate-fadeIn">
    <h2 class="text-3xl font-bold text-center text-pink-600 mb-6">💖 Update Record</h2>

    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST" class="space-y-5">
      <!-- First Name -->
      <div>
        <label class="block text-pink-700 mb-1 font-medium">First Name</label>
        <input type="text" name="first_name" value="<?= html_escape($user['first_name'])?>" required
               class="w-full px-4 py-3 border border-pink-200 rounded-xl bg-pink-50 text-pink-900 placeholder-pink-400
                      focus:ring-2 focus:ring-pink-400 focus:outline-none focus:bg-white transition">
      </div>

      <!-- Last Name -->
      <div>
        <label class="block text-pink-700 mb-1 font-medium">Last Name</label>
        <input type="text" name="last_name" value="<?= html_escape($user['last_name'])?>" required
               class="w-full px-4 py-3 border border-pink-200 rounded-xl bg-pink-50 text-pink-900 placeholder-pink-400
                      focus:ring-2 focus:ring-pink-400 focus:outline-none focus:bg-white transition">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-pink-700 mb-1 font-medium">Email Address</label>
        <input type="email" name="email" value="<?= html_escape($user['email'])?>" required
               class="w-full px-4 py-3 border border-pink-200 rounded-xl bg-pink-50 text-pink-900 placeholder-pink-400
                      focus:ring-2 focus:ring-pink-400 focus:outline-none focus:bg-white transition">
      </div>

      <!-- Button -->
      <button type="submit"
              class="w-full bg-gradient-to-r from-pink-400 to-rose-400 hover:from-pink-500 hover:to-rose-500 text-white font-semibold py-3 rounded-xl shadow-md hover:shadow-lg transition duration-300">
        💅 Update
      </button>
    </form>
  </div>

  <!-- Soft fade-in animation -->
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(25px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.9s ease;
    }
  </style>
</body>
</html>