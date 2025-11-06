<script setup>
// No reactive state needed for Footer
</script>

<template>
  <footer class="bg-black text-white py-16">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Logo + Info -->
        <div class="space-y-4">
          <div class="flex items-center space-x-2">
            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-green-600">
              <span class="text-lg font-bold text-white">S</span>
            </div>
            <span class="text-xl font-bold text-white">Safari-Link</span>
          </div>
          <p class="text-sm opacity-80 max-w-xs">
            Empowering East African tourism operators with modern technology to streamline operations and grow their
            businesses.
          </p>
          <div class="space-y-1 text-sm">
            <p>📍 Kampala, Uganda</p>
            <p>📞 +256 700 123 456</p>
            <p>✉️ hello@safari-link.com</p>
          </div>
        </div>

        <!-- Platform -->
        <div class="space-y-4">
          <h3 class="font-semibold text-orange-500">Platform</h3>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="hover:text-orange-500 transition-colors">Booking Management</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors">Payment Processing</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors">Customer Management</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors">Analytics & Reports</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors">Mobile App</a></li>
          </ul>
        </div>

        <!-- Industries -->
        <div class="space-y-4">
          <h3 class="font-semibold text-orange-500">Industries</h3>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="hover:text-orange-500 transition-colors">Safari Operators</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors">Hotels & Lodges</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors">Tour Companies</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors">Activity Providers</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors">Cultural Tours</a></li>
          </ul>
        </div>

        <!-- Support -->
        <div class="space-y-4">
          <h3 class="font-semibold text-orange-500">Support</h3>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="hover:text-orange-500 transition-colors">Help Center</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors">Getting Started</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors">API Documentation</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors">Contact Support</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors">System Status</a></li>
          </ul>
        </div>
      </div>

      <hr class="my-8 border-amber-100/20" />

      <!-- Footer Bottom -->
      <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
        <div class="text-sm opacity-80">© 2025 Safari-Link. Proudly serving East African tourism operators.</div>
        <div class="flex space-x-6 text-sm">
          <a href="#" class="hover:text-orange-500 transition-colors">Privacy Policy</a>
          <a href="#" class="hover:text-orange-500 transition-colors">Terms of Service</a>
          <a href="#" class="hover:text-orange-500 transition-colors">Cookie Policy</a>
        </div>
      </div>
    </div>
  </footer>
</template>

<style scoped>
/* All styling handled by Tailwind */
</style>
