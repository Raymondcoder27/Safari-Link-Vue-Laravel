<script setup>
import { ref } from 'vue'
import { Calendar, CreditCard, Users, BarChart3, Globe, Shield, Smartphone, MessageSquare, Gift } from 'lucide-vue-next'

const features = ref([
  { icon: Calendar, title: 'Smart Booking Management', description: 'Manage safari tours, hotel reservations, and activity bookings from one unified dashboard.', color: 'text-green-600' },
  { icon: CreditCard, title: 'Multi-Currency Payments', description: 'Accept payments in USD, UGX, KES, and more. Integrated with Mobile Money and international cards.', color: 'text-orange-500' },
  { icon: Users, title: 'Customer Loyalty Programs', description: 'Build repeat business with automated loyalty rewards and personalized offers for returning guests.', color: 'text-amber-700' },
  { icon: BarChart3, title: 'Business Analytics', description: 'Track revenue, popular tours, seasonal trends, and customer insights with detailed reporting.', color: 'text-green-600' },
  { icon: Globe, title: 'Multi-Language Support', description: 'Serve international guests with support for English, Swahili, French, and local languages.', color: 'text-orange-500' },
  { icon: Shield, title: 'Secure & Compliant', description: 'Bank-level security with compliance for East African financial regulations and data protection.', color: 'text-amber-700' },
  { icon: Smartphone, title: 'Mobile-First Design', description: 'Manage your business on-the-go with our mobile app, perfect for field guides and remote locations.', color: 'text-green-600' },
  { icon: MessageSquare, title: 'Guest Communication', description: 'Automated SMS and WhatsApp messaging for booking confirmations, reminders, and updates.', color: 'text-orange-500' },
  { icon: Gift, title: 'Dynamic Pricing & Discounts', description: 'Seasonal pricing, group discounts, and promotional codes to maximize revenue and bookings.', color: 'text-amber-700' },
])
</script>

<template>
  <section id="features" class="py-20 bg-yellow-100/30">
    <div class="container mx-auto px-4">
      <!-- Section Header -->
      <div class="text-center space-y-4 mb-16">
        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
          Everything you need to run your tourism business
        </h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
          From safari operators to luxury lodges, Safari-Link provides all the tools you need to streamline
          operations and grow your East African tourism business.
        </p>
      </div>

      <!-- Features Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="(feature, index) in features"
          :key="index"
          class="border rounded-lg p-6 bg-white shadow hover:shadow-lg transition-all"
        >
          <!-- Feature Icon & Title -->
          <div class="flex items-center space-x-4 mb-4">
            <div :class="`inline-flex h-12 w-12 items-center justify-center rounded-lg bg-yellow-100 ${feature.color}`">
              <component :is="feature.icon" class="h-6 w-6" />
            </div>
            <h3 class="text-xl font-semibold text-gray-900">{{ feature.title }}</h3>
          </div>

          <!-- Feature Description -->
          <p class="text-gray-600 text-base">{{ feature.description }}</p>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
/* Optional: hover effect already added with Tailwind */
</style>
