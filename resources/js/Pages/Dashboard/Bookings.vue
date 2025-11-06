<template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-semibold text-foreground">Bookings</h1>
          <p class="text-sm text-muted-foreground">Bookings</p>
        </div>
        <div class="flex items-center gap-2">
          <Button variant="outline" class="bg-green-600 text-white">
            <Calendar class="h-4 w-4 mr-2" />
            View Calendar
          </Button>
          <Button class="bg-green-600 text-white">
            <span class="mr-2">+</span>
            Create Booking
          </Button>
        </div>
      </div>

      <!-- Booking Tabs -->
      <div class="flex gap-1 border-b border-border">
        <button
          v-for="tab in bookingTabs"
          :key="tab.name"
          class="px-4 py-2 text-sm font-medium border-b-2 transition-colors"
          :class="{
            'border-primary text-primary bg-primary/5': tab.active,
            'border-transparent text-muted-foreground hover:text-foreground': !tab.active
          }"
          @click="selectTab(tab.name)"
        >
          {{ tab.name }}
        </button>
      </div>

      <!-- Search and Filters -->
      <div class="flex items-center gap-4">
        <div class="relative flex-1 max-w-md">
          <Search class="absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-muted-foreground" />
          <Input placeholder="Search..." class="pl-10" v-model="searchQuery" />
        </div>
        <Input placeholder="Start date" class="w-40" v-model="startDate" />
        <Input placeholder="End date" class="w-40" v-model="endDate" />
        <Button variant="ghost" size="sm">
          <MoreHorizontal class="h-4 w-4" />
        </Button>
      </div>

      <!-- Empty State -->
      <div class="flex flex-col items-center justify-center py-16">
        <div class="w-12 h-12 bg-muted rounded-full flex items-center justify-center mb-4">
          <Info class="h-6 w-6 text-muted-foreground" />
        </div>
        <h3 class="text-lg font-medium text-foreground mb-2">No bookings</h3>
      </div>

      <!-- Footer -->
      <div class="pt-8">
        <p class="text-xs text-muted-foreground">© 2025 Safari-Link, All rights Reserved</p>
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { ref } from 'vue'
import { Search, Calendar, MoreHorizontal, Info } from 'lucide-vue-next'

// Local UI Components
const Button = {
  props: ['variant', 'size', 'class'],
  template: `<button :class="['inline-flex items-center justify-center px-3 py-2 rounded-md font-medium transition', class]"><slot /></button>`
}

const Input = {
  props: ['placeholder', 'class', 'modelValue'],
  emits: ['update:modelValue'],
  template: `<input :placeholder="placeholder" :class="['px-3 py-2 border rounded-md', class]" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" />`
}

// Reactive state
const bookingTabs = ref([
  { name: "Tour Packages", active: true },
  { name: "Hotel Rooms", active: false },
  { name: "Events", active: false },
  { name: "Services", active: false },
  { name: "Car Rentals", active: false },
])

const searchQuery = ref('')
const startDate = ref('')
const endDate = ref('')

// Tab selection
const selectTab = (name) => {
  bookingTabs.value.forEach(tab => tab.active = tab.name === name)
}
</script>

<style scoped>
/* Add any scoped styles here */
</style>
