<script setup>
import Button from "@/Components/Ui/Button.vue"
import Card from "@/Components/Ui/Card.vue"
import { ArrowRight, Play } from "lucide-vue-next"
</script>

<template>
  <section class="relative overflow-hidden bg-gradient-to-b from-amber-100/20 to-white py-20 lg:py-32">
    <div class="absolute inset-0 grid-pattern opacity-30" />

    <div class="container mx-auto px-4 relative">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <!-- Hero Text -->
        <div class="space-y-4">
          <div class="space-y-4">
            <div class="inline-flex items-center rounded-full border px-3 py-1 text-xs font-medium">
              🌍 Trusted by 500+ East African Tourism Operators
            </div>
            <h1 class="text-4xl font-bold tracking-tight lg:text-6xl text-gray-900">
              The complete platform for <span class="text-green-600">East African</span> tourism operations
            </h1>
            <p class="text-lg text-gray-700 max-w-lg">
              Streamline bookings, accept payments, and grow your safari, hotel, or tour business with our all-in-one
              platform designed specifically for Uganda and East Africa.
            </p>
          </div>

          <div class="flex flex-col sm:flex-row gap-4">
            <Button size="lg" class="bg-green-600 hover:bg-green-700 text-white">
              Start Free Trial
              <ArrowRight class="ml-2 h-4 w-4" />
            </Button>
            <Button size="lg" variant="outline" class="border-gray-300 text-gray-900 hover:bg-gray-100">
              <Play class="mr-2 h-4 w-4" />
              Watch Demo
            </Button>
          </div>

          <div class="flex items-center space-x-8 text-sm text-gray-600">
            <div class="flex items-center space-x-2">
              <div class="h-2 w-2 rounded-full bg-green-600" />
              <span>No setup fees</span>
            </div>
            <div class="flex items-center space-x-2">
              <div class="h-2 w-2 rounded-full bg-green-600" />
              <span>14-day free trial</span>
            </div>
            <div class="flex items-center space-x-2">
              <div class="h-2 w-2 rounded-full bg-green-600" />
              <span>Cancel anytime</span>
            </div>
          </div>
        </div>

        <!-- Hero Dashboard Card -->
        <div class="relative">
          <Card class="p-6 bg-white/10 backdrop-blur border-green-600/20">
            <div class="space-y-4">
              <div class="flex items-center justify-between">
                <h3 class="font-semibold text-gray-900">Safari Dashboard</h3>
                <div class="flex space-x-1">
                  <div class="h-3 w-3 rounded-full bg-red-500" />
                  <div class="h-3 w-3 rounded-full bg-yellow-500" />
                  <div class="h-3 w-3 rounded-full bg-green-600" />
                </div>
              </div>

              <div class="space-y-3">
                <!-- Example Booking Items -->
                <div class="flex items-center justify-between p-3 rounded-lg bg-amber-100/50">
                  <div class="flex items-center space-x-3">
                    <img
                      src="/african-elephant-in-savanna.jpg"
                      alt="Murchison Falls Safari"
                      class="h-10 w-10 rounded-lg object-cover"
                    />
                    <div>
                      <p class="font-medium text-sm">Murchison Falls Safari</p>
                      <p class="text-xs text-gray-600">3 Days, 2 Nights</p>
                    </div>
                  </div>
                  <div class="text-right">
                    <p class="font-semibold text-green-600">$850</p>
                    <p class="text-xs text-gray-600">Confirmed</p>
                  </div>
                </div>

                <div class="flex items-center justify-between p-3 rounded-lg bg-orange-100/50">
                  <div class="flex items-center space-x-3">
                    <img
                      src="/mountain-gorilla-in-forest.jpg"
                      alt="Gorilla Trekking"
                      class="h-10 w-10 rounded-lg object-cover"
                    />
                    <div>
                      <p class="font-medium text-sm">Gorilla Trekking Experience</p>
                      <p class="text-xs text-gray-600">1 Day</p>
                    </div>
                  </div>
                  <div class="text-right">
                    <p class="font-semibold text-orange-500">$600</p>
                    <p class="text-xs text-gray-600">Pending</p>
                  </div>
                </div>

                <div class="flex items-center justify-between p-3 rounded-lg bg-gray-100/50">
                  <div class="flex items-center space-x-3">
                    <img
                      src="/african-cultural-dance-performance.jpg"
                      alt="Cultural Tour"
                      class="h-10 w-10 rounded-lg object-cover"
                    />
                    <div>
                      <p class="font-medium text-sm">Cultural Village Tour</p>
                      <p class="text-xs text-gray-600">Half Day</p>
                    </div>
                  </div>
                  <div class="text-right">
                    <p class="font-semibold text-gray-900">$120</p>
                    <p class="text-xs text-gray-600">Available</p>
                  </div>
                </div>
              </div>

              <Button class="w-full bg-green-600 hover:bg-green-700 text-white" size="sm">
                Manage Bookings
              </Button>
            </div>
          </Card>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
/* Tailwind handles all styling; optional: add grid-pattern background */
.grid-pattern {
  background-image: 
    linear-gradient(rgba(0, 0, 0, 0.05) 1px, transparent 1px),
    linear-gradient(90deg, rgba(0, 0, 0, 0.05) 1px, transparent 1px);
  background-size: 20px 20px;
}

</style>
