<script setup>
import { ref } from 'vue'
import { Upload, Plus, Eye } from 'lucide-vue-next' // Vue version of lucide
</script>

<template>
  <div class="p-6 space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
      <div>
        <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
        <p class="text-gray-500">Welcome back! Manage your business from one place.</p>
      </div>
      <button
        class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition"
      >
        <Plus class="h-4 w-4 mr-2" />
        Add New
      </button>
    </div>

    <!-- Grid Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
      <!-- Account Status -->
      <div class="p-6 bg-green-600 text-white rounded-xl shadow">
        <div class="flex items-center justify-between mb-4">
          <h2 class="font-semibold text-lg">Account Status</h2>
          <button class="text-white/80 hover:text-white text-sm flex items-center">
            <Eye class="h-4 w-4 mr-1" /> View Details
          </button>
        </div>
        <div>
          <h3 class="text-2xl font-bold">KYC Verification</h3>
          <p class="text-white/80 text-lg mb-4">Incomplete</p>
          <button
            class="w-full bg-white text-green-600 font-medium py-2 rounded-lg hover:bg-gray-100 transition"
          >
            <Upload class="inline-block h-4 w-4 mr-2" />
            Upload Documents
          </button>
        </div>
      </div>

      <!-- Bookings -->
      <div class="p-6 bg-white rounded-xl shadow border border-gray-200">
        <div class="flex items-center justify-between mb-4">
          <h2 class="font-semibold text-lg">Bookings</h2>
          <button class="text-sm text-gray-600 hover:text-gray-900 flex items-center">
            <Eye class="h-4 w-4 mr-1" /> View All
          </button>
        </div>
        <div class="space-y-2">
          <div v-for="(item, idx) in [
            { color: 'bg-green-500', label: 'Tours' },
            { color: 'bg-red-500', label: 'Events' },
            { color: 'bg-blue-500', label: 'Cars' },
            { color: 'bg-yellow-500', label: 'Rooms' },
            { color: 'bg-red-600', label: 'Services' }
          ]"
          :key="idx"
          class="flex items-center gap-2">
            <div :class="['w-3 h-3 rounded-full', item.color]"></div>
            <span class="text-sm">{{ item.label }}</span>
          </div>
        </div>
      </div>

      <!-- What's on Offer -->
      <div class="p-6 bg-white rounded-xl shadow border border-gray-200">
        <div class="flex items-center justify-between mb-4">
          <h2 class="font-semibold text-lg">What's on Offer</h2>
          <button class="text-sm text-gray-600 hover:text-gray-900 flex items-center">
            <Eye class="h-4 w-4 mr-1" /> View All
          </button>
        </div>
        <div class="space-y-3">
          <div v-for="(item, idx) in [
            'Packages', 'Rooms', 'Events', 'Rental Cars', 'Shop Items', 'Services'
          ]"
          :key="idx"
          class="flex items-center justify-between">
            <span class="text-sm">{{ item }}</span>
            <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded">0</span>
          </div>
        </div>
      </div>

      <!-- Wallets -->
      <div class="p-6 bg-white rounded-xl shadow border border-gray-200">
        <div class="flex items-center justify-between mb-4">
          <h2 class="font-semibold text-lg">Wallets</h2>
          <button class="text-sm text-green-600 hover:text-green-700">Open Finance</button>
        </div>
        <div class="space-y-3">
          <div v-for="(wallet, idx) in [
            { currency: 'UGX', balance: 0 },
            { currency: 'KES', balance: 0 },
            { currency: 'USD', balance: 0 }
          ]"
          :key="idx"
          class="flex items-center justify-between">
            <div>
              <span class="text-sm font-medium">{{ wallet.currency }}</span>
              <p class="text-2xl font-bold">{{ wallet.balance }}</p>
            </div>
            <span class="px-2 py-1 bg-green-600 text-white text-xs rounded">Top Up</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <!-- Inquiries -->
      <div class="p-6 bg-white rounded-xl shadow border border-gray-200 flex flex-col items-center justify-center text-center">
        <h2 class="font-semibold text-lg mb-2">Inquiries</h2>
        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mb-4">
          <span class="text-gray-500 font-bold">!</span>
        </div>
        <p class="text-gray-500">Nothing found!</p>
      </div>

      <!-- Upcoming -->
      <div class="p-6 bg-white rounded-xl shadow border border-gray-200 flex flex-col items-center justify-center text-center">
        <h2 class="font-semibold text-lg mb-2">Upcoming</h2>
        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mb-4">
          <span class="text-gray-500 font-bold">!</span>
        </div>
        <p class="text-gray-500">Nothing found!</p>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Tailwind covers everything — no extra CSS needed */
</style>
