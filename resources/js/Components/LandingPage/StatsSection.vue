<script setup>
import { ref } from 'vue'

const stats = ref([
  {
    value: '500+',
    label: 'Tourism operators trust Safari-Link',
    company: 'Across Uganda & East Africa',
  },
  {
    value: '85%',
    label: 'Faster booking processing',
    company: 'Compared to manual systems',
  },
  {
    value: '200%',
    label: 'Increase in online bookings',
    company: 'Average customer growth',
  },
  {
    value: '24/7',
    label: 'Customer support',
    company: 'Local East African team',
  },
])
</script>

<template>
  <section class="py-16 bg-black text-white">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div
          v-for="(stat, index) in stats"
          :key="index"
          class="text-center space-y-2"
        >
          <div class="text-3xl lg:text-4xl font-bold text-amber-400">
            {{ stat.value }}
          </div>
          <div class="text-lg font-medium">{{ stat.label }}</div>
          <div class="text-sm opacity-80">{{ stat.company }}</div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
/* All styling handled with Tailwind */
</style>
