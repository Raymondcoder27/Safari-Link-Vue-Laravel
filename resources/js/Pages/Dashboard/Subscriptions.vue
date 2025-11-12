<script setup>
import { ref } from 'vue'
import { Check, X, ChevronDown } from 'lucide-vue-next'
import DashboardLayout from '@/Layouts/DashboardLayout.vue'


// Current user's subscription status (mock)
const currentPlan = ref('FREE') // Can be 'FREE', 'STARTER', 'GROWTH', etc.
const subscriptions = ref([]) // Mock: empty array = no active subs

// Plan tabs
const activePlan = ref('Starter')

// Define all plans with their features
const plans = {
  Free: {
    price: 0,
    description: 'Basic features for getting started.',
    features: {
      'Agency Gallery': 600,
      'Blog': true,
      'Car rental services': true,
      'Channel manager': false,
      'Chatbot': false,
      'Custom domain': true,
      'Custom user interface': false,
      'Customer Relationship Management': false,
      'Developers': false,
      'Discounts': true,
      'Email notifications': true,
      'Events and entertainment': true,
      'Flight Booking': false,
      'Hotel and hospitality': true,
      'Inquiries': true,
      'Inventory Gallery': 600,
      'Manual Booking': false,
      'Marketing': false,
      'Marketplace': true,
      'Mobile app dashboard': true,
      'Multi page website': true,
      'Payment currencies': 'UGX, KES, USD',
      'Premium templates': false,
      'Product listing': 100,
      'Products categorisation': false,
      'Proposal PDFs / Shareable Itineraries': true,
      'Proposals': true,
      'Search and filter': false,
      'Services': true,
      'Shop': true,
      'Tours and travel': true,
      'User accounts': 1,
      'Website': true,
    }
  },
  Starter: {
    price: 25,
    description: 'Starter Tier for Tour Guides or Agents',
    features: {
      'Agency Gallery': 600,
      'Blog': true,
      'Car rental services': true,
      'Channel manager': false,
      'Chatbot': false,
      'Custom domain': true,
      'Custom user interface': false,
      'Customer Relationship Management': false,
      'Developers': false,
      'Discounts': true,
      'Email notifications': true,
      'Events and entertainment': true,
      'Flight Booking': false,
      'Hotel and hospitality': true,
      'Inquiries': true,
      'Inventory Gallery': 600,
      'Manual Booking': false,
      'Marketing': false,
      'Marketplace': true,
      'Mobile app dashboard': true,
      'Multi page website': true,
      'Payment currencies': 'UGX, KES, USD',
      'Premium templates': false,
      'Product listing': 100,
      'Products categorisation': false,
      'Proposal PDFs / Shareable Itineraries': true,
      'Proposals': true,
      'Search and filter': false,
      'Services': true,
      'Shop': true,
      'Tours and travel': true,
      'User accounts': 1,
      'Website': true,
    }
  },
  Growth: {
    price: 40,
    description: 'For established agents and boutique tour operators.',
    features: {
      'Agency Gallery': 600,
      'Blog': true,
      'Car rental services': true,
      'Channel manager': true,
      'Chatbot': true,
      'Custom domain': true,
      'Custom user interface': false,
      'Customer Relationship Management': true,
      'Developers': false,
      'Discounts': true,
      'Email notifications': true,
      'Events and entertainment': true,
      'Flight Booking': true,
      'Hotel and hospitality': true,
      'Inquiries': true,
      'Inventory Gallery': 600,
      'Manual Booking': true,
      'Marketing': true,
      'Marketplace': true,
      'Mobile app dashboard': true,
      'Multi page website': true,
      'Payment currencies': 'UGX, KES, USD',
      'Premium templates': true,
      'Product listing': 200,
      'Products categorisation': true,
      'Proposal PDFs / Shareable Itineraries': true,
      'Proposals': true,
      'Search and filter': true,
      'Services': true,
      'Shop': true,
      'Tours and travel': true,
      'User accounts': 3,
      'Website': true,
    }
  },
  Business: {
    price: 80,
    description: 'For growing operators or regional agencies, including Destination Management Companies (DMCs).',
    features: {
      'Agency Gallery': 10000,
      'Blog': true,
      'Car rental services': true,
      'Channel manager': true,
      'Chatbot': true,
      'Custom domain': true,
      'Custom user interface': true,
      'Customer Relationship Management': true,
      'Developers': true,
      'Discounts': true,
      'Email notifications': true,
      'Events and entertainment': true,
      'Flight Booking': true,
      'Hotel and hospitality': true,
      'Inquiries': true,
      'Inventory Gallery': 600,
      'Manual Booking': true,
      'Marketing': true,
      'Marketplace': true,
      'Mobile app dashboard': true,
      'Multi page website': true,
      'Payment currencies': 'UGX, KES, USD',
      'Premium templates': true,
      'Product listing': 300,
      'Products categorisation': true,
      'Proposal PDFs / Shareable Itineraries': true,
      'Proposals': true,
      'Search and filter': true,
      'Services': true,
      'Shop': true,
      'Tours and travel': true,
      'User accounts': 5,
      'Website': true,
    }
  },
  Enterprise: {
    price: 200,
    description: 'Enterprise version',
    features: {
      'Agency Gallery': 10000,
      'Blog': true,
      'Car rental services': true,
      'Channel manager': true,
      'Chatbot': true,
      'Custom domain': true,
      'Custom user interface': true,
      'Customer Relationship Management': true,
      'Developers': true,
      'Discounts': true,
      'Email notifications': true,
      'Events and entertainment': true,
      'Flight Booking': true,
      'Hotel and hospitality': true,
      'Inquiries': true,
      'Inventory Gallery': 10000,
      'Manual Booking': true,
      'Marketing': true,
      'Marketplace': true,
      'Mobile app dashboard': true,
      'Multi page website': true,
      'Payment currencies': 'UGX, KES, USD, ZAR',
      'Premium templates': true,
      'Product listing': 1000,
      'Products categorisation': true,
      'Proposal PDFs / Shareable Itineraries': true,
      'Proposals': true,
      'Search and filter': true,
      'Services': true,
      'Shop': true,
      'Tours and travel': true,
      'User accounts': 10,
      'Website': true,
    }
  }
}

// Dropdown states
const duration = ref('1 month')
const currency = ref('USD')

// Toggle plan
const selectPlan = (planName) => {
  activePlan.value = planName
}
</script>

<template>
     <DashboardLayout>
  <div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-white border-b px-6 py-4">
      <div class="flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-900">Subscription Plans</h1>
        <div class="text-sm text-gray-600">AGENCY PLAN SUBSCRIPTIONS</div>
      </div>
    </header>

    <!-- Current Subscriptions Table -->
    <div class="p-6 bg-white mb-6 rounded-lg shadow">
      <table class="w-full text-sm">
        <thead>
          <tr class="border-b">
            <th class="py-2 text-left">Plan</th>
            <th class="py-2 text-left">Start Date</th>
            <th class="py-2 text-left">End Date</th>
            <th class="py-2 text-left">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="subscriptions.length === 0" class="text-center py-4">
            <td colspan="4" class="py-6">
              <div class="flex flex-col items-center text-gray-500">
                <span class="text-xs mb-1">ℹ️</span>
                No subscriptions
              </div>
            </td>
          </tr>
          <!-- If there were subscriptions, they'd render here -->
        </tbody>
      </table>
    </div>

    <!-- Plan Tabs -->
    <div class="px-6 mb-6">
      <div class="inline-flex space-x-1 p-1 bg-gray-100 rounded-lg">
        <button
          v-for="plan in ['Free', 'Starter', 'Growth', 'Business', 'Enterprise']"
          :key="plan"
          @click="selectPlan(plan)"
          :class="`px-4 py-2 text-sm font-medium rounded-md transition ${
            activePlan === plan
              ? 'bg-teal-500 text-white'
              : 'text-teal-700 hover:bg-teal-100'
          }`"
        >
          {{ plan }}
        </button>
      </div>
    </div>

    <!-- Selected Plan Details -->
    <div class="px-6 mb-6">
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <!-- Plan Header -->
        <div class="p-6 border-b text-center">
          <h2 class="text-2xl font-bold text-gray-900">{{ activePlan }}</h2>
          <div class="mt-2 text-2xl font-bold text-gray-900">${{
            plans[activePlan].price
          }}</div>
          <div class="mt-1 text-sm text-gray-600">{{
            plans[activePlan].description
          }}</div>
        </div>

        <!-- Duration & Currency Selectors -->
        <div class="p-6 border-b grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="relative">
            <label class="block text-xs font-medium text-gray-700 mb-1">Duration</label>
            <select
              v-model="duration"
              class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-500 focus:border-transparent"
            >
              <option>1 month</option>
              <option>3 months</option>
              <option>6 months</option>
              <option>12 months</option>
            </select>
          </div>
          <div class="relative">
            <label class="block text-xs font-medium text-gray-700 mb-1">Currency</label>
            <select
              v-model="currency"
              class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-teal-500 focus:border-transparent"
            >
              <option>USD</option>
              <option>UGX</option>
              <option>KES</option>
            </select>
          </div>
        </div>

        <!-- Subscribe Button -->
        <div class="p-6">
          <button
            class="w-full bg-teal-500 hover:bg-teal-600 text-white font-medium py-2 px-4 rounded-lg transition"
          >
            Subscribe
          </button>
        </div>
      </div>
    </div>

    <!-- Feature Comparison Table -->
    <div class="px-6 pb-10">
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-sm">
            <thead class="bg-gray-100">
              <tr>
                <th class="py-3 px-4 text-left font-medium text-gray-900">Feature</th>
                <th class="py-3 px-4 text-right font-medium text-gray-900">Value</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(value, feature) in plans[activePlan].features"
                :key="feature"
                :class="[
                  'border-t',
                  $index % 2 === 0 ? 'bg-gray-50' : 'bg-white'
                ]"
              >
                <td class="py-3 px-4 font-medium text-gray-900">{{ feature }}</td>
                <td class="py-3 px-4 text-right">
                  <template v-if="typeof value === 'boolean'">
                    <Check v-if="value" class="h-5 w-5 text-green-500 inline" />
                    <X v-else class="h-5 w-5 text-red-500 inline" />
                  </template>
                  <template v-else>
                    {{ value }}
                  </template>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </DashboardLayout>
</template>

<style scoped>
/* Optional: subtle hover effect */
tr:hover {
  background-color: rgba(243, 244, 246, 0.5);
}
</style>