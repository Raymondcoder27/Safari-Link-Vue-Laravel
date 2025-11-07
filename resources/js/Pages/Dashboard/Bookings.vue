<!-- <template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
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

      <div class="flex flex-col items-center justify-center py-16">
        <div class="w-12 h-12 bg-muted rounded-full flex items-center justify-center mb-4">
          <Info class="h-6 w-6 text-muted-foreground" />
        </div>
        <h3 class="text-lg font-medium text-foreground mb-2">No bookings</h3>
      </div>

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

 -->






































<template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-semibold text-foreground">Bookings</h1>
          <p class="text-sm text-muted-foreground">Manage all your bookings</p>
        </div>

        <div class="flex items-center gap-2">
          <button class="bg-green-600 text-white px-3 py-2 rounded flex items-center gap-2">
            <Calendar class="h-4 w-4" />
            View Calendar
          </button>
          <button
            class="bg-green-600 text-white px-3 py-2 rounded flex items-center gap-2"
            @click="showModal = true"
          >
            <span>+</span> Create Booking
          </button>
        </div>
      </div>

      <!-- Bookings Table -->
      <div v-if="bookings.length" class="overflow-x-auto border rounded-lg">
        <table class="min-w-full divide-y divide-border">
          <thead class="bg-muted">
            <tr>
              <th class="px-4 py-2 text-left text-sm font-medium text-muted-foreground">Customer</th>
              <th class="px-4 py-2 text-left text-sm font-medium text-muted-foreground">Service</th>
              <th class="px-4 py-2 text-left text-sm font-medium text-muted-foreground">Date</th>
              <th class="px-4 py-2 text-left text-sm font-medium text-muted-foreground">Status</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-border bg-background">
            <tr v-for="booking in bookings" :key="booking.id">
              <td class="px-4 py-2">{{ booking.customer }}</td>
              <td class="px-4 py-2">{{ booking.service_type }}</td>
              <td class="px-4 py-2">{{ booking.date }}</td>
              <td class="px-4 py-2 capitalize">{{ booking.status }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Empty State -->
      <div v-else class="flex flex-col items-center justify-center py-16">
        <div class="w-12 h-12 bg-muted rounded-full flex items-center justify-center mb-4">
          <Info class="h-6 w-6 text-muted-foreground" />
        </div>
        <h3 class="text-lg font-medium text-foreground mb-2">No bookings found</h3>
      </div>

      <!-- Create Booking Modal -->
      <div v-if="showModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md space-y-4">
          <h2 class="text-lg font-semibold">Create Booking</h2>
          
          <div class="flex flex-col space-y-2">
            <input
              type="text"
              placeholder="Customer Name"
              v-model="newBooking.customer"
              class="px-3 py-2 border rounded w-full"
            />
            <input
              type="text"
              placeholder="Service Type"
              v-model="newBooking.service_type"
              class="px-3 py-2 border rounded w-full"
            />
            <input
              type="date"
              v-model="newBooking.date"
              class="px-3 py-2 border rounded w-full"
            />
            <input
              type="text"
              placeholder="Status"
              v-model="newBooking.status"
              class="px-3 py-2 border rounded w-full"
            />
          </div>

          <div class="flex justify-end gap-2">
            <button class="px-3 py-2 border rounded" @click="showModal = false">Cancel</button>
            <button class="px-3 py-2 bg-green-600 text-white rounded" @click="createBooking">Save</button>
          </div>
        </div>
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
import { ref, onMounted } from 'vue'
import { Calendar, Info } from 'lucide-vue-next'

const bookings = ref([])
const showModal = ref(false)
const newBooking = ref({
  customer: '',
  service_type: '',
  date: '',
  status: 'pending'
})

const API_URL = import.meta.env.VITE_API_URL + '/api/bookings'

const loadBookings = async () => {
  const res = await fetch(API_URL)
  bookings.value = await res.json()
}

const createBooking = async () => {
  if (!newBooking.value.customer || !newBooking.value.service_type || !newBooking.value.date) {
    alert('Please fill all fields')
    return
  }

  await fetch(API_URL, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(newBooking.value)
  })

  // reset
  newBooking.value = { customer: '', service_type: '', date: '', status: 'pending' }
  showModal.value = false
  await loadBookings()
}

// Load bookings on mount
onMounted(() => loadBookings())
</script>
