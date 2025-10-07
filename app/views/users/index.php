<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <link rel="stylesheet" href="<?=base_url();?>/public/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-100 via-rose-100 to-pink-200 text-pink-900 font-sans min-h-screen">

  <!-- Navbar -->
  <nav class="bg-gradient-to-r from-pink-400 to-rose-400 shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <a href="#" class="text-white font-bold text-2xl tracking-wide">💗 User Management</a>
      <a href="<?=site_url('users/create')?>"
         class="bg-white text-pink-600 font-semibold px-4 py-2 rounded-full shadow hover:bg-pink-50 transition duration-200">
        ➕ Add User
      </a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-white/80 backdrop-blur-md shadow-2xl rounded-3xl p-8 border border-pink-100 animate-fadeIn">
      
      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-pink-600">🧁 User Directory</h1>
      </div>

      <!-- Search Bar -->
      <form method="get" action="<?=site_url()?>" class="flex mb-6">
        <input 
          type="text" 
          name="q" 
          value="<?=html_escape($_GET['q'] ?? '')?>" 
          placeholder="Search student..." 
          class="w-full px-4 py-2 border border-pink-200 rounded-l-full bg-pink-50 placeholder-pink-400 text-pink-800 focus:ring-2 focus:ring-pink-400 focus:outline-none">
        <button type="submit" class="bg-gradient-to-r from-pink-400 to-rose-400 text-white px-4 py-2 rounded-r-full hover:opacity-90 transition duration-200">
          🔍
        </button>
      </form>

      <!-- Table -->
      <div class="overflow-x-auto rounded-2xl shadow">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="bg-gradient-to-r from-pink-300 to-rose-300 text-white">
              <th class="py-3 px-4">ID</th>
              <th class="py-3 px-4">Last Name</th>
              <th class="py-3 px-4">First Name</th>
              <th class="py-3 px-4">Email</th>
              <th class="py-3 px-4">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach(html_escape($users) as $user): ?>
              <tr class="hover:bg-pink-100 transition duration-200">
                <td class="py-3 px-4"><?=($user['id']);?></td>
                <td class="py-3 px-4"><?=($user['last_name']);?></td>
                <td class="py-3 px-4"><?=($user['first_name']);?></td>
                <td class="py-3 px-4">
                  <span class="bg-pink-50 text-pink-600 text-sm font-medium px-3 py-1 rounded-full border border-pink-200">
                    <?=($user['email']);?>
                  </span>
                </td>
                <td class="py-3 px-4 space-x-2">
                  <a href ="<?=site_url('users/update/'.$user['id']);?>" 
                     class="text-yellow-600 hover:underline font-medium">✏️ Update</a>
                  <a href ="<?=site_url('users/delete/'.$user['id']);?>"
                     onclick="return confirm('Are you sure you want to delete this record?');"
                     class="text-red-500 hover:underline font-medium">🗑️ Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-6 flex justify-center">
        <div class="pagination flex space-x-2">
          <?=$page ?? ''?>
        </div>
      </div>

    </div>
  </div>

  <!-- Soft fade-in animation -->
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.9s ease;
    }
  </style>

</body>
</html>