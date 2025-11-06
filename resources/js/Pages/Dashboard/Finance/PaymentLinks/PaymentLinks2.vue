<script setup>
import { ref } from 'vue'
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { Plus, MoreHorizontal, ExternalLink } from 'lucide-vue-next'

const showCreatePaymentLink = ref(false)

const openCreatePaymentLink = () => {
  console.log('Opening payment link modal')
  showCreatePaymentLink.value = true
}

// Local components
const Button = {
  props: ['variant', 'class', 'size'],
  template: `<button :class="['inline-flex items-center justify-center px-3 py-2 rounded-md font-medium transition', class]"><slot /></button>`
}

const Input = {
  props: ['id', 'placeholder', 'type', 'class'],
  template: `<input :id="id" :placeholder="placeholder" :type="type || 'text'" :class="class" class="input" />`
}

const Textarea = {
  props: ['id', 'placeholder', 'rows'],
  template: `<textarea :id="id" :placeholder="placeholder" :rows="rows" class="textarea"></textarea>`
}

const Label = {
  props: ['for'],
  template: `<label :for="for" class="text-sm font-medium text-foreground"><slot /></label>`
}

const Select = { template: `<div><slot /></div>` }
const SelectTrigger = { template: `<div><slot /></div>` }
const SelectValue = { template: `<div><slot /></div>` }
const SelectContent = { template: `<div><slot /></div>` }
const SelectItem = { template: `<div><slot /></div>` }



const Dialog = {
  props: ['modelValue'],
  emits: ['update:modelValue'],
  template: `
    <div>
      <slot name="trigger" />
      <div v-if="modelValue" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-full max-w-lg">
          <slot />
        </div>
      </div>
    </div>
  `
}

const DialogTrigger = {
  emits: ['click'],
  template: `<div @click="$emit('click')"><slot /></div>`
}


// const Dialog = { props: ['modelValue'], emits: ['update:modelValue'], template: `<div><slot /></div>` }
// const DialogTrigger = { template: `<div><slot /></div>` }
const DialogContent = { template: `<div><slot /></div>` }
const DialogHeader = { template: `<div><slot /></div>` }
const DialogTitle = { template: `<div><slot /></div>` }

const showCreateModal = ref(false)
const paymentLinks = ref([
  {
    id: 1,
    name: 'Booking',
    amount: 50000,
    currency: 'UGX',
    description: 'Brief Description',
  },
])
</script>


<template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <!-- Header -->
      <!-- <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-foreground">Payment Links</h1>
        <Button class="bg-green-600 text-white">
              <Plus class="h-4 w-4 mr-2" />
              CREATE PAYMENT LINK
            </Button>
      </div> -->
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-foreground">Payment Links</h1>
        <button @click="openCreatePaymentLink" class="bg-green-600 text-white px-4 py-2 rounded-md flex items-center">
          <Plus class="h-4 w-4 mr-2" />
          CREATE PAYMENT LINK
        </button>
      </div>









      <Dialog v-model="showCreateModal">
        <template #trigger>
          <DialogTrigger @click="showCreateModal = true">
            <Button class="bg-green-600 text-white">
              <Plus class="h-4 w-4 mr-2" />
              CREATE PAYMENT LINK
            </Button>
          </DialogTrigger>
        </template>

        <DialogContent>
          <DialogHeader>
            <DialogTitle>Create Payment Link</DialogTitle>
          </DialogHeader>

          <div class="mt-4">
            <p>Dialog content here…</p>
            <Button @click="showCreateModal = false">Close</Button>
          </div>
        </DialogContent>
      </Dialog>

      <!-- Plan Selection Modal -->
      <div v-if="showCreatePaymentLink" @click.self="showCreatePaymentLink = false"
        class="fixed inset-0 bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-[9999]">
        <div class="space-y-2">
          <Label for="reference">Payment Reference</Label>
          <Input id="reference" placeholder="Simple label to tag what the payment link is for" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="space-y-2">
            <Label for="details">Payment Details</Label>
            <Textarea id="details" placeholder="Brief Description of the Payment" rows="4" />
          </div>
          <div class="space-y-2">
            <Label for="product">Product Title (Optional)</Label>
            <Select>
              <SelectTrigger>
                <SelectValue placeholder="Search and select a package" />
              </SelectTrigger>
              <SelectContent>
                <SelectItem value="package1">Package 1</SelectItem>
                <SelectItem value="package2">Package 2</SelectItem>
              </SelectContent>
            </Select>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="space-y-2">
            <Label for="amount">Payment Amount</Label>
            <Input id="amount" type="number" placeholder="0" />
          </div>
          <div class="space-y-2">
            <Label for="currency">Currency</Label>
            <Select>
              <SelectTrigger>
                <SelectValue placeholder="Select currency" />
              </SelectTrigger>
              <SelectContent>
                <SelectItem value="ugx">UGX</SelectItem>
                <SelectItem value="kes">KES</SelectItem>
                <SelectItem value="usd">USD</SelectItem>
              </SelectContent>
            </Select>
          </div>
        </div>

        <div class="flex gap-2 pt-4">
          <Button class="bg-green-600 text-white">Create Payment Link</Button>
          <Button variant="outline" @click="showCreateModal = false">
            Close
          </Button>
        </div>
      </div>



      <!-- Payment Links Table -->
      <div class="border border-border rounded-lg overflow-hidden">
        <table class="w-full">
          <thead class="bg-muted/50">
            <tr>
              <th class="text-left p-4 text-sm font-medium text-muted-foreground">Payment Link</th>
              <th class="text-left p-4 text-sm font-medium text-muted-foreground">Amount</th>
              <th class="text-left p-4 text-sm font-medium text-muted-foreground">Currency</th>
              <th class="text-left p-4 text-sm font-medium text-muted-foreground">Description</th>
              <th class="text-left p-4 text-sm font-medium text-muted-foreground">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="link in paymentLinks" :key="link.id" class="border-t border-border">
              <td class="p-4">
                <router-link :to="`/payment-links/${link.id}`" class="text-primary hover:underline">
                  {{ link.name }}
                </router-link>
              </td>
              <td class="p-4 text-foreground">{{ link.amount.toLocaleString() }}</td>
              <td class="p-4 text-foreground">{{ link.currency }}</td>
              <td class="p-4 text-foreground">{{ link.description }}</td>
              <td class="p-4">
                <Button variant="ghost" size="sm">
                  <MoreHorizontal class="h-4 w-4" />
                </Button>
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
