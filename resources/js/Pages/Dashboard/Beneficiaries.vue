<template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <!-- Header -->
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

      <!-- Beneficiaries Table -->
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

      <!-- Footer -->
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