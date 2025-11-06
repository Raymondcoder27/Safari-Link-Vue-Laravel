<script setup>
import { ref } from 'vue'
import Button from '@/Components/Ui/Button.vue'
import Card from '@/Components/Ui/Card.vue'
import { ArrowRight, CheckCircle } from 'lucide-vue-next'


const benefits = ref([
  'Set up in under 10 minutes',
  'No long-term contracts',
  'Local East African support team',
  'Mobile money & card payments',
  'Multi-language interface',
])
</script>

<template>
  <section class="py-20 bg-green-800 text-white">
    <div class="container mx-auto px-4">
      <Card class="bg-white/10 backdrop-blur border-white/20 p-8 lg:p-12">
        <div class="grid lg:grid-cols-2 gap-8 items-center">
          <!-- Benefits Text -->
          <div class="space-y-6">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-50">
              Ready to transform your tourism business?
            </h2>
            <p class="text-lg opacity-90 text-gray-100">
              Join hundreds of successful tourism operators across East Africa. Start your free trial today and see
              the difference Safari-Link can make.
            </p>

            <div class="space-y-3">
              <div v-for="(benefit, index) in benefits" :key="index" class="flex items-center space-x-3">
                <CheckCircle class="h-5 w-5 text-orange-500 flex-shrink-0" />
                <span class="text-sm">{{ benefit }}</span>
              </div>
            </div>
          </div>

          <!-- Trial Card -->
          <div class="space-y-6">
            <div class="bg-white/20 backdrop-blur rounded-lg p-6 space-y-4">
              <h3 class="text-xl font-semibold text-gray-50">Start Your Free Trial</h3>
              <div class="space-y-3 text-gray-50">
                <div class="flex justify-between items-center">
                  <span>14-day free trial</span>
                  <span class="text-orange-500 font-semibold">$0</span>
                </div>
                <div class="flex justify-between items-center">
                  <span>Setup & onboarding</span>
                  <span class="text-orange-500 font-semibold">Free</span>
                </div>
                <div class="flex justify-between items-center">
                  <span>Local support</span>
                  <span class="text-orange-500 font-semibold">Included</span>
                </div>
                <hr class="border-white/20" />
                <div class="flex justify-between items-center font-semibold">
                  <span>Total to start</span>
                  <span class="text-orange-500 text-xl">$0</span>
                </div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-3">
              <Button size="lg" class="w-full bg-orange-500 hover:bg-orange-600 text-white">
                Start Free Trial
                <ArrowRight class="ml-2 h-4 w-4" />
              </Button>
              <Button
                size="lg"
                variant="outline"
                class="w-full border-white/30 text-white hover:bg-white/10 bg-transparent"
              >
                Schedule a Demo
              </Button>
            </div>

            <p class="text-xs opacity-70 text-center">
              No credit card required • Cancel anytime • Local support in English & Swahili
            </p>
          </div>
        </div>
      </Card>
    </div>
  </section>
</template>

<style scoped>
/* Tailwind handles all styling */
</style>
