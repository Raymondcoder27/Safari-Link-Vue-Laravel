<!-- <template>
  <DashboardLayout>
    <div class="p-6 space-y-6">

      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-semibold text-foreground">What's on offer</h1>
          <p class="text-sm text-muted-foreground">What's on offer</p>
        </div>

        <div class="mt-6">
          <h2 class="text-lg font-semibold mb-2">Available Inventories</h2>
          <ul>
            <li v-for="inv in inventories" :key="inv.id" class="border-b py-2">
              {{ inv.item }} — {{ inv.quantity }}
            </li>
          </ul>
        </div>

        <div class="flex items-center gap-4">
          <div class="flex items-center gap-2">
            <Input placeholder="Start date" class="w-40" v-model="startDate" />
            <Input placeholder="End date" class="w-40" v-model="endDate" />
          </div>
          <Button variant="ghost" size="sm">
            <MoreHorizontal class="h-4 w-4" />
          </Button>
          <Button class="bg-green-600 text-white">
            <Plus class="h-4 w-4 mr-2" />
            Add New
          </Button>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <Card>
          <CardHeader>
            <CardTitle class="text-lg">Flights</CardTitle>
          </CardHeader>
          <CardContent class="space-y-4">
            <div class="flex gap-2">
              <Button variant="outline" size="sm" class="bg-green-600 text-white">
                <Settings class="h-4 w-4 mr-2" />
                Settings
              </Button>
              <Button variant="outline" size="sm">
                View Bookings
                <span class="ml-2">→</span>
              </Button>
            </div>
          </CardContent>
        </Card>

        <Card class="border-dashed border-2 border-muted-foreground/25">
          <CardContent class="flex flex-col items-center justify-center py-12">
            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mb-4">
              <Plus class="h-6 w-6 text-primary-foreground" />
            </div>
            <h3 class="text-lg font-medium text-foreground mb-2">ADD INVENTORY</h3>
          </CardContent>
        </Card>
      </div>

      <div class="pt-8">
        <p class="text-xs text-muted-foreground">© 2025 Safari-Link, All rights Reserved</p>
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { ref, onMounted } from 'vue'
import { Settings, Plus, MoreHorizontal } from 'lucide-vue-next'

const inventories = ref([])

onMounted(async () => {
  try {
    const res = await fetch('/api/inventories')
    inventories.value = await res.json()
  } catch (error) {
    console.error('Error fetching inventories:', error)
  }
})


const Button = {
  props: ['variant', 'size', 'class'],
  template: `<button :class="['inline-flex items-center justify-center px-3 py-2 rounded-md font-medium transition', class]"><slot /></button>`
}

const Input = {
  props: ['placeholder', 'class', 'modelValue'],
  emits: ['update:modelValue'],
  template: `<input :placeholder="placeholder" :class="['px-3 py-2 border rounded-md', class]" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" />`
}

const Card = {
  props: ['class'],
  template: `<div :class="['bg-background shadow-sm rounded-lg p-4', class]"><slot /></div>`
}

const CardHeader = {
  template: `<div class="mb-2"><slot /></div>`
}

const CardContent = {
  props: ['class'],
  template: `<div :class="class"><slot /></div>`
}

const CardTitle = {
  props: ['class'],
  template: `<h3 :class="class"><slot /></h3>`
}

// Reactive state for Inputs
const startDate = ref('')
const endDate = ref('')
</script>

<style scoped>
/* Add any scoped styles here */
</style> -->



<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { ref, onMounted } from 'vue'
import { Settings, Plus, MoreHorizontal } from 'lucide-vue-next'

const inventories = ref([])
const showForm = ref(false)
const newItem = ref('')
const newQuantity = ref('')
const startDate = ref('')
const endDate = ref('')

// Fetch inventories
async function fetchInventories() {
  const res = await fetch('/api/inventories')
  inventories.value = await res.json()
}

async function addInventory() {
  if (!newItem.value || !newQuantity.value) return alert('Please fill all fields')

  const res = await fetch('/api/inventories', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ item: newItem.value, quantity: Number(newQuantity.value) })
  })

  if (res.ok) {
    newItem.value = ''
    newQuantity.value = ''
    showForm.value = false
    await fetchInventories()
  } else {
    alert('Error adding inventory')
  }
}

onMounted(fetchInventories)
</script>

<template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-semibold text-foreground">What's on offer</h1>
          <p class="text-sm text-muted-foreground">Manage and view your inventories</p>
        </div>

        <div class="flex items-center gap-4">
          <div class="flex items-center gap-2">
            <input v-model="startDate" placeholder="Start date" class="border rounded-md px-3 py-2 w-40" />
            <input v-model="endDate" placeholder="End date" class="border rounded-md px-3 py-2 w-40" />
          </div>
          <button class="border px-3 py-2 rounded-md">
            <MoreHorizontal class="h-4 w-4" />
          </button>
          <button
            class="bg-green-600 text-white px-4 py-2 rounded-md flex items-center"
            @click="showForm = !showForm"
          >
            <Plus class="h-4 w-4 mr-2" />
            Add New
          </button>
        </div>
      </div>

      <!-- Add Inventory Form -->
      <div v-if="showForm" class="border p-4 rounded-md bg-gray-50 space-y-3">
        <h2 class="text-lg font-semibold">Add Inventory Item</h2>
        <input
          v-model="newItem"
          placeholder="Item name"
          class="border px-3 py-2 rounded w-full"
        />
        <input
          v-model="newQuantity"
          type="number"
          placeholder="Quantity"
          class="border px-3 py-2 rounded w-full"
        />
        <button class="bg-blue-600 text-white px-4 py-2 rounded" @click="addInventory">
          Save
        </button>
      </div>

      <!-- Inventory Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div
          v-for="inv in inventories"
          :key="inv.id"
          class="bg-white shadow-sm rounded-lg p-6 border hover:shadow-md transition"
        >
          <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold">{{ inv.item }}</h3>
            <span class="text-gray-500 text-sm">Qty: {{ inv.quantity }}</span>
          </div>

          <div class="mt-4 flex gap-2">
            <button class="bg-green-600 text-white px-3 py-2 rounded-md flex items-center text-sm">
              <Settings class="h-4 w-4 mr-2" /> Settings
            </button>
            <button class="border px-3 py-2 rounded-md text-sm">
              View Details →
            </button>
          </div>
        </div>

        <!-- Add New Card -->
        <div
          class="border-dashed border-2 border-gray-300 rounded-lg flex flex-col items-center justify-center py-12 hover:bg-gray-50 cursor-pointer"
          @click="showForm = true"
        >
          <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mb-4">
            <Plus class="h-6 w-6 text-white" />
          </div>
          <h3 class="text-lg font-medium text-gray-700">ADD INVENTORY</h3>
        </div>
      </div>

      <!-- Footer -->
      <div class="pt-8">
        <p class="text-xs text-muted-foreground text-center">
          © 2025 Safari-Link, All rights Reserved
        </p>
      </div>
    </div>
  </DashboardLayout>
</template>
