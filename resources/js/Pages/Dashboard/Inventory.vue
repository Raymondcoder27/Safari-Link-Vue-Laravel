<template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-semibold text-foreground">What's on offer</h1>
          <p class="text-sm text-muted-foreground">What's on offer</p>
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
        <!-- Flights Card -->
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

        <!-- Add Inventory Card -->
        <Card class="border-dashed border-2 border-muted-foreground/25">
          <CardContent class="flex flex-col items-center justify-center py-12">
            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mb-4">
              <Plus class="h-6 w-6 text-primary-foreground" />
            </div>
            <h3 class="text-lg font-medium text-foreground mb-2">ADD INVENTORY</h3>
          </CardContent>
        </Card>
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
import { Settings, Plus, MoreHorizontal } from 'lucide-vue-next'

// Local UI Components

// onMounted(() => {
//   // fetch data from API


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
</style>
