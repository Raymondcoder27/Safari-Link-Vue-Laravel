<!-- <template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-semibold text-foreground">Clients</h1>
          <p class="text-sm text-muted-foreground">Clients</p>
        </div>
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

        <Select v-model="sortBy">
          <SelectTrigger class="w-40">
            <SelectValue placeholder="Sort by" />
          </SelectTrigger>
          <SelectContent>
            <SelectItem value="name">Name</SelectItem>
            <SelectItem value="date">Date Added</SelectItem>
            <SelectItem value="status">Status</SelectItem>
          </SelectContent>
        </Select>
      </div>

      <div class="flex flex-col items-center justify-center py-16">
        <div class="w-12 h-12 bg-muted rounded-full flex items-center justify-center mb-4">
          <Info class="h-6 w-6 text-muted-foreground" />
        </div>
        <h3 class="text-lg font-medium text-foreground mb-2">No Customers</h3>
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
import { Search, MoreHorizontal, Info } from 'lucide-vue-next'

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

const Select = {
  props: ['modelValue'],
  emits: ['update:modelValue'],
  template: `<div class="relative inline-block w-full"><slot /></div>`
}

const SelectTrigger = {
  props: ['class'],
  template: `<button :class="['w-full px-3 py-2 border rounded-md text-left', class]" @click="$emit('toggle')"><slot /></button>`
}

const SelectValue = {
  props: ['placeholder'],
  template: `<span><slot>{{ placeholder }}</slot></span>`
}

const SelectContent = {
  template: `<div class="absolute z-10 mt-1 w-full bg-white border rounded-md shadow-lg"><slot /></div>`
}

const SelectItem = {
  props: ['value'],
  template: `<div class="px-3 py-2 hover:bg-gray-100 cursor-pointer" @click="$emit('select', value)"><slot /></div>`
}

// Reactive state
const searchQuery = ref('')
const startDate = ref('')
const endDate = ref('')
const sortBy = ref('')
</script>

<style scoped>
/* Add any scoped styles here */
</style> -->








































<template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-semibold text-foreground">Clients</h1>
          <p class="text-sm text-muted-foreground">Manage your clients</p>
        </div>
        <button
          class="bg-green-600 text-white px-3 py-2 rounded flex items-center gap-2"
          @click="showModal = true"
        >
          + Add Client
        </button>
      </div>

      <!-- Search -->
      <div class="flex items-center gap-4">
        <div class="relative flex-1 max-w-md">
          <Search class="absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-muted-foreground" />
          <input
            type="text"
            placeholder="Search..."
            v-model="searchQuery"
            class="px-3 py-2 border rounded w-full pl-10"
          />
        </div>
        <input type="date" class="px-3 py-2 border rounded w-40" v-model="startDate" />
        <input type="date" class="px-3 py-2 border rounded w-40" v-model="endDate" />
      </div>

      <!-- Customers Table -->
      <div v-if="customers.length" class="border rounded overflow-x-auto">
        <table class="min-w-full divide-y divide-border">
          <thead class="bg-muted">
            <tr>
              <th class="px-4 py-2 text-left text-sm font-medium text-muted-foreground">Name</th>
              <th class="px-4 py-2 text-left text-sm font-medium text-muted-foreground">Email</th>
              <th class="px-4 py-2 text-left text-sm font-medium text-muted-foreground">Phone</th>
            </tr>
          </thead>
          <tbody class="bg-background divide-y divide-border">
            <tr v-for="customer in customers" :key="customer.id">
              <td class="px-4 py-2">{{ customer.name }}</td>
              <td class="px-4 py-2">{{ customer.email }}</td>
              <td class="px-4 py-2">{{ customer.phone }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Empty State -->
      <div v-else class="flex flex-col items-center justify-center py-16">
        <div class="w-12 h-12 bg-muted rounded-full flex items-center justify-center mb-4">
          <Info class="h-6 w-6 text-muted-foreground" />
        </div>
        <h3 class="text-lg font-medium text-foreground mb-2">No Customers</h3>
      </div>

      <!-- Add Customer Modal -->
      <div v-if="showModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md space-y-4">
          <h2 class="text-lg font-semibold">Add Customer</h2>
          <input type="text" placeholder="Name" v-model="newCustomer.name" class="px-3 py-2 border rounded w-full" />
          <input type="email" placeholder="Email" v-model="newCustomer.email" class="px-3 py-2 border rounded w-full" />
          <input type="text" placeholder="Phone" v-model="newCustomer.phone" class="px-3 py-2 border rounded w-full" />
          <div class="flex justify-end gap-2">
            <button class="px-3 py-2 border rounded" @click="showModal=false">Cancel</button>
            <button class="px-3 py-2 bg-green-600 text-white rounded" @click="createCustomer">Save</button>
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
import { Search, Info } from 'lucide-vue-next'

const customers = ref([])
const showModal = ref(false)
const newCustomer = ref({ name: '', email: '', phone: '' })
const searchQuery = ref('')
const startDate = ref('')
const endDate = ref('')

const API_URL = import.meta.env.VITE_API_URL + '/api/customers'

const loadCustomers = async () => {
  const res = await fetch(API_URL)
  customers.value = await res.json()
}

const createCustomer = async () => {
  if (!newCustomer.value.name || !newCustomer.value.email || !newCustomer.value.phone) return alert('Fill all fields')

  await fetch(API_URL, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(newCustomer.value)
  })

  newCustomer.value = { name: '', email: '', phone: '' }
  showModal.value = false
  await loadCustomers()
}

onMounted(loadCustomers)
</script>
