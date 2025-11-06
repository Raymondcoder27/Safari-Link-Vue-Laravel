<script setup>
import { ref } from 'vue'
import Header from '@/Components/LandingPage/Header.vue'
import Footer from '@/Components/LandingPage/Footer.vue'
import Button from '@/Components/Ui/Button.vue'
import Card from '@/Components/Ui/Card.vue'
import { Check, X, Percent, CreditCard } from 'lucide-vue-next'

const billingModel = ref('subscription') // 'subscription' or 'commission'

const plans = ref([
  {
    name: 'Operator',
    description: 'Perfect for solo guides, small lodges, or local tour operators.',
    price: { subscription: 50000, commission: 5 }, // UGX / %
    features: [
      'Up to 20 bookings/month',
      'Mobile app access',
      'Basic analytics',
      'Email & WhatsApp notifications',
      'Multi-currency payments',
      '1 user account',
    ],
    cta: 'Get Started',
    popular: false,
  },
  {
    name: 'Agency',
    description: 'Ideal for mid-sized travel agencies managing multiple tours.',
    price: { subscription: 150000, commission: 4 },
    features: [
      'Unlimited bookings',
      'Advanced analytics & reports',
      'Loyalty program tools',
      'Team accounts (up to 5 users)',
      'Priority support',
      'Custom branding',
    ],
    cta: 'Start Free Trial',
    popular: true,
  },
  {
    name: 'Company',
    description: 'For large tour companies and hotel chains across East Africa.',
    price: { subscription: 300000, commission: 3 },
    features: [
      'Unlimited bookings & users',
      'Dedicated account manager',
      'API access & integrations',
      'Multi-location management',
      'Custom contract terms',
      '24/7 premium support',
    ],
    cta: 'Contact Sales',
    popular: false,
  },
])
</script>

<template>
  <div class="min-h-screen flex flex-col">
    <Header />

    <main class="flex-grow">
      <!-- Hero -->
      <section class="py-16 bg-gradient-to-b from-amber-100/30 to-white">
        <div class="container mx-auto px-4 text-center">
          <h1 class="text-3xl lg:text-5xl font-bold text-gray-900 mb-4">
            Simple, Transparent Pricing
          </h1>
          <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
            Choose how you pay: fixed monthly subscription or low commission per booking.
            All plans include core features — no hidden fees.
          </p>

          <!-- Billing Toggle -->
          <div class="inline-flex rounded-lg bg-gray-100 p-1 mb-12">
            <button
              :class="`px-4 py-2 text-sm font-medium rounded-md transition ${
                billingModel === 'subscription'
                  ? 'bg-white text-gray-900 shadow-sm'
                  : 'text-gray-600 hover:text-gray-900'
              }`"
              @click="billingModel = 'subscription'"
            >
              <CreditCard class="inline h-4 w-4 mr-1" />
              Monthly Subscription
            </button>
            <button
              :class="`px-4 py-2 text-sm font-medium rounded-md transition ${
                billingModel === 'commission'
                  ? 'bg-white text-gray-900 shadow-sm'
                  : 'text-gray-600 hover:text-gray-900'
              }`"
              @click="billingModel = 'commission'"
            >
              <Percent class="inline h-4 w-4 mr-1" />
              Pay Per Booking
            </button>
          </div>
        </div>
      </section>

      <!-- Plans Grid -->
      <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <Card
              v-for="(plan, index) in plans"
              :key="index"
              :class="`relative p-6 border-2 ${
                plan.popular
                  ? 'border-amber-500 ring-2 ring-amber-500/20 scale-[1.02]'
                  : 'border-gray-200'
              }`"
            >
              <!-- Popular Badge -->
              <div v-if="plan.popular" class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                <span class="bg-amber-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                  MOST POPULAR
                </span>
              </div>

              <div class="space-y-6">
                <!-- Plan Header -->
                <div>
                  <h3 class="text-xl font-bold text-gray-900">{{ plan.name }}</h3>
                  <p class="text-gray-600 text-sm mt-1">{{ plan.description }}</p>
                </div>

                <!-- Price -->
                <div class="text-center py-4">
                  <div v-if="billingModel === 'subscription'" class="space-y-1">
                    <div class="text-3xl font-bold text-gray-900">
                      {{ (plan.price.subscription / 1000).toFixed(0) }}K UGX
                    </div>
                    <div class="text-gray-600 text-sm">per month</div>
                    <div class="text-xs text-gray-500">(~${{ (plan.price.subscription / 3700).toFixed(2) }} USD*)</div>
                  </div>
                  <div v-else class="space-y-1">
                    <div class="text-3xl font-bold text-gray-900">
                      {{ plan.price.commission }}%
                    </div>
                    <div class="text-gray-600 text-sm">per booking</div>
                    <div class="text-xs text-gray-500">No monthly fee</div>
                  </div>
                </div>

                <!-- Features -->
                <ul class="space-y-3">
                  <li v-for="(feature, i) in plan.features" :key="i" class="flex items-start">
                    <Check class="h-5 w-5 text-green-600 mt-0.5 flex-shrink-0 mr-2" />
                    <span class="text-gray-700 text-sm">{{ feature }}</span>
                  </li>
                </ul>

                <!-- CTA -->
                <Button
                  :size="plan.popular ? 'lg' : 'md'"
                  :class="`w-full ${
                    plan.popular
                      ? 'bg-amber-500 hover:bg-amber-600 text-white'
                      : 'bg-gray-100 hover:bg-gray-200 text-gray-900'
                  }`"
                >
                  {{ plan.cta }}
                </Button>
              </div>
            </Card>
          </div>

          <!-- Note -->
          <div class="mt-12 text-center text-sm text-gray-500 max-w-2xl mx-auto">
            <p>
              *USD equivalent based on approximate exchange rate (1 USD ≈ 3,700 UGX). Actual rate may vary.
              All plans include a 14-day free trial. No credit card required to start.
            </p>
          </div>
        </div>
      </section>
    </main>

    <Footer />
  </div>
</template>

<style scoped>
/* Optional subtle hover */
.card:hover {
  transform: translateY(-4px);
  transition: transform 0.2s ease;
}
</style>