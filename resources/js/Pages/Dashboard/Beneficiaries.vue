<!-- <template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
          <h1 class="text-2xl font-semibold text-foreground">Beneficiaries</h1>
        </div>
        <div class="flex items-center gap-2">
          <Button class="bg-green-600 text-white">
            <Plus class="h-4 w-4 mr-2" />
            Add Beneficiary
          </Button>
          <Button variant="outline" class="bg-primary/10 text-primary border-primary">
            <ArrowLeft class="h-4 w-4 mr-2" />
            Back
          </Button>
        </div>
      </div>

      <div class="border border-border rounded-lg overflow-hidden">
        <table class="w-full">
          <thead class="bg-muted/50">
            <tr>
              <th class="text-left p-4 text-sm font-medium text-muted-foreground">Name</th>
              <th class="text-left p-4 text-sm font-medium text-muted-foreground">Currency</th>
              <th class="text-left p-4 text-sm font-medium text-muted-foreground">Type</th>
              <th class="text-left p-4 text-sm font-medium text-muted-foreground">Date Added</th>
              <th class="text-left p-4 text-sm font-medium text-muted-foreground">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-if="beneficiaries.length === 0">
              <td colspan="5" class="text-center py-16">
                <div class="flex flex-col items-center">
                  <div class="w-12 h-12 bg-muted rounded-full flex items-center justify-center mb-4">
                    <span class="text-muted-foreground font-bold">!</span>
                  </div>
                  <p class="text-muted-foreground">No beneficiaries found</p>
                </div>
              </td>
            </tr>
            <tr v-for="beneficiary in beneficiaries" :key="beneficiary.id">
              <td class="p-4">{{ beneficiary.name }}</td>
              <td class="p-4">{{ beneficiary.currency }}</td>
              <td class="p-4">{{ beneficiary.type }}</td>
              <td class="p-4">{{ beneficiary.date_added }}</td>
              <td class="p-4">
                <Button class="bg-blue-600 text-white">Edit</Button>
                <Button class="bg-red-600 text-white">Delete</Button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="pt-8">
        <p class="text-xs text-muted-foreground">© 2025 Safari-Link, All rights Reserved</p>
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Plus, ArrowLeft } from 'lucide-vue-next';

// Local Button component
const Button = {
  props: ['variant', 'class'],
  template: `<button :class="['inline-flex items-center justify-center px-3 py-2 rounded-md font-medium transition', class]"><slot /></button>`
}

// Reactive state for beneficiaries
const beneficiaries = ref([]);

// Fetch beneficiaries data from API
const fetchBeneficiaries = async () => {
  try {
    const response = await fetch('/api/beneficiaries');
    beneficiaries.value = await response.json();
  } catch (error) {
    console.error('Error fetching beneficiaries:', error);
  }
};

// Fetch data on component mount
onMounted(fetchBeneficiaries);
</script>

<style scoped>
/* Component-specific styles here */
</style>
 -->

























<template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-semibold text-foreground">Beneficiaries</h1>
          <p class="text-sm text-muted-foreground">Manage all beneficiaries</p>
        </div>
        <button
          class="bg-green-600 text-white px-3 py-2 rounded flex items-center gap-2"
          @click="showModal = true"
        >
          + Add Beneficiary
        </button>
      </div>

      <!-- Beneficiaries Table -->
      <div class="border rounded overflow-x-auto">
        <table class="min-w-full divide-y divide-border">
          <thead class="bg-muted">
            <tr>
              <th class="px-4 py-2 text-left text-sm font-medium text-muted-foreground">Name</th>
              <th class="px-4 py-2 text-left text-sm font-medium text-muted-foreground">Currency</th>
              <th class="px-4 py-2 text-left text-sm font-medium text-muted-foreground">Type</th>
              <th class="px-4 py-2 text-left text-sm font-medium text-muted-foreground">Date Added</th>
              <th class="px-4 py-2 text-left text-sm font-medium text-muted-foreground">Action</th>
            </tr>
          </thead>
          <tbody class="bg-background divide-y divide-border">
            <tr v-if="beneficiaries.length === 0">
              <td colspan="5" class="text-center py-12 text-muted-foreground">
                No beneficiaries found
              </td>
            </tr>
            <tr v-for="b in beneficiaries" :key="b.id">
              <td class="px-4 py-2">{{ b.name }}</td>
              <td class="px-4 py-2">{{ b.currency }}</td>
              <td class="px-4 py-2">{{ b.type }}</td>
              <td class="px-4 py-2">{{ b.created_at ? b.created_at.split('T')[0] : '' }}</td>
              <td class="px-4 py-2 flex gap-2">
                <button
                  class="bg-blue-600 text-white px-3 py-1 rounded"
                  @click="openEditModal(b)"
                >
                  Edit
                </button>
                <button
                  class="bg-red-600 text-white px-3 py-1 rounded"
                  @click="deleteBeneficiary(b.id)"
                >
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Add/Edit Modal -->
      <div v-if="showModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-md space-y-4">
          <h2 class="text-lg font-semibold">
            {{ isEditing ? 'Edit Beneficiary' : 'Add Beneficiary' }}
          </h2>
          <input type="text" placeholder="Name" v-model="form.name" class="px-3 py-2 border rounded w-full" />
          <input type="text" placeholder="Currency" v-model="form.currency" class="px-3 py-2 border rounded w-full" />
          <input type="text" placeholder="Type" v-model="form.type" class="px-3 py-2 border rounded w-full" />
          <div class="flex justify-end gap-2">
            <button class="px-3 py-2 border rounded" @click="closeModal">Cancel</button>
            <button
              class="px-3 py-2 bg-green-600 text-white rounded"
              @click="isEditing ? updateBeneficiary() : createBeneficiary()"
            >
              Save
            </button>
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
import { ref, onMounted } from 'vue'
import DashboardLayout from '@/Layouts/DashboardLayout.vue'

const API_URL = import.meta.env.VITE_API_URL + '/api/beneficiaries'

const beneficiaries = ref([])
const showModal = ref(false)
const isEditing = ref(false)
const form = ref({ id: null, name: '', currency: '', type: '' })

// Load all beneficiaries
const loadBeneficiaries = async () => {
  try {
    const res = await fetch(API_URL)
    beneficiaries.value = await res.json()
  } catch (e) {
    console.error('Error fetching beneficiaries', e)
  }
}

// Add new
const createBeneficiary = async () => {
  if (!form.value.name || !form.value.currency || !form.value.type) return alert('Fill all fields')
  await fetch(API_URL, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(form.value)
  })
  closeModal()
  await loadBeneficiaries()
}

// Open edit modal
const openEditModal = (b) => {
  form.value = { ...b }
  isEditing.value = true
  showModal.value = true
}

// Update existing
const updateBeneficiary = async () => {
  await fetch(`${API_URL}/${form.value.id}`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(form.value)
  })
  closeModal()
  await loadBeneficiaries()
}

// Delete
const deleteBeneficiary = async (id) => {
  if (!confirm('Are you sure?')) return
  await fetch(`${API_URL}/${id}`, { method: 'DELETE' })
  await loadBeneficiaries()
}

// Close modal
const closeModal = () => {
  showModal.value = false
  isEditing.value = false
  form.value = { id: null, name: '', currency: '', type: '' }
}

onMounted(loadBeneficiaries)
</script>
