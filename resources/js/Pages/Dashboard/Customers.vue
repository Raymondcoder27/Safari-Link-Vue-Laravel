<template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-semibold text-foreground">Clients</h1>
          <p class="text-sm text-muted-foreground">Clients</p>
        </div>
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

      <!-- Empty State -->
      <div class="flex flex-col items-center justify-center py-16">
        <div class="w-12 h-12 bg-muted rounded-full flex items-center justify-center mb-4">
          <Info class="h-6 w-6 text-muted-foreground" />
        </div>
        <h3 class="text-lg font-medium text-foreground mb-2">No Customers</h3>
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
</style>
