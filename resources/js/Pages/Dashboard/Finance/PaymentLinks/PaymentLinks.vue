<template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-foreground">Payment Links</h1>
        <button @click="showCreatePaymentLink = true"
          class="bg-green-600 text-white px-4 py-2 rounded-md flex items-center">
          <Plus class="h-4 w-4 mr-2" />
          CREATE PAYMENT LINK
        </button>
      </div>

      <!-- Payment Link Modal -->
      <div v-if="showCreatePaymentLink" @click.self="showCreatePaymentLink = false"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-[9999]">
        <div @click.stop class=" rounded-lg p-6 w-full max-w-2xl max-h-[90vh] overflow-y-auto mx-4">
          <!-- <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-bold text-gray-900">Create Payment Link</h3>
                        <button @click="showCreatePaymentLink = false" class="text-gray-500 hover:text-gray-700">
                            ✕
                        </button>
                    </div> -->

          <!-- Form -->
          <div v-if="showCreatePaymentLink" @click.self="showCreatePaymentLink = false"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div @click.stop class="bg-white rounded-lg p-6 w-full max-w-lg mx-4">
              <div class="flex items-center justify-between mb-4">
                <h3 class="text-2xl font-bold text-gray-900">Create Payment Link</h3>
                <button @click="showCreatePaymentLink = false" class="text-gray-500 hover:text-gray-700">✕</button>
              </div>

              <div class="space-y-4">
                <div>
                  <label for="reference" class="block text-sm font-medium text-gray-700 mb-1">Payment
                    Reference</label>
                  <input id="reference" v-model="form.title" placeholder="Tag what this payment link is for"
                    class="border px-3 py-2 rounded-md w-full" />
                </div>

                <div>
                  <label for="details" class="block text-sm font-medium text-gray-700 mb-1">Payment
                    Details</label>
                  <textarea id="details" v-model="form.description" placeholder="Brief description of the payment"
                    rows="4" class="border px-3 py-2 rounded-md w-full"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
                    <input v-model="form.amount" id="amount" type="number" placeholder="0"
                      class="border px-3 py-2 rounded-md w-full" />
                  </div>
                  <div>
                    <label for="currency" class="block text-sm font-medium text-gray-700 mb-1">Currency</label>
                    <select v-model="form.currency" class="border px-3 py-2 rounded-md w-full">
                      <option value="ugx">UGX</option>
                      <option value="kes">KES</option>
                      <option value="usd">USD</option>
                    </select>
                  </div>
                </div>

                <div class="flex gap-2 pt-4">
                  <button @click="createPaymentLink" class="bg-green-600 text-white px-4 py-2 rounded-md">Create Payment
                    Link</button>
                  <button class="border border-gray-300 px-4 py-2 rounded-md"
                    @click="showCreatePaymentLink = false">Close</button>
                </div>
              </div>
            </div>
          </div>

          <!-- <div class="space-y-4">
            <div>
              <Label for="reference">Payment Reference</Label>
              <Input id="reference" placeholder="Tag what this payment link is for" />
            </div>

            <div>
              <Label for="details">Payment Details</Label>
              <Textarea id="details" placeholder="Brief description of the payment" rows="4" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <Label for="amount">Amount</Label>
                <Input id="amount" type="number" placeholder="0" />
              </div>
              <div>
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
              <Button variant="outline" @click="showCreatePaymentLink = false">Close</Button>
            </div>
          </div> -->
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
              <td class="p-4 flex gap-2">
                <!-- view details -->
                  <!-- <router-link :to="`/payment-links-details/${link.id}`" class="bg-blue-500 cursor-pointer text-white px-2 py-1 rounded-md text-sm"> -->
                  <Link href="/payment-links-details" class="bg-blue-500 cursor-pointer text-white px-2 py-1 rounded-md text-sm">
                    Details
                  </Link>
                <button @click="copyLink(link)" class="bg-gray-500 text-white px-2 py-1 rounded-md text-sm">
                  Copy
                </button>
                <button @click="shareLink(link)" class="bg-green-500 text-white px-2 py-1 rounded-md text-sm">
                  Share
                </button>
              </td>

              <!-- <td class="p-4">
                                <Button variant="ghost" size="sm">
                                    <MoreHorizontal class="h-4 w-4" />
                                </Button>
                            </td> -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import { ref } from 'vue'
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { Plus, MoreHorizontal } from 'lucide-vue-next'
import { Link, usePage } from "@inertiajs/vue3"

async function createPaymentLink() {
  try {
    const res = await axios.post('/api/payment-links', form.value)
    alert('Payment link created successfully!')
    paymentLinks.value.push({
      id: Date.now(),
      name: form.value.title,
      amount: form.value.amount,
      currency: form.value.currency,
      description: form.value.description,
    })
    showCreatePaymentLink.value = false
  } catch (e) {
    console.error(e)
    alert('Failed to create payment link')
  }
}


function copyLink(link) {
  const url = `${window.location.origin}/payment-links/${link.id}`;
  navigator.clipboard.writeText(url)
    .then(() => alert('Payment link copied to clipboard!'))
    .catch(() => alert('Failed to copy link.'));
}

function shareLink(link) {
  const url = `${window.location.origin}/payment-links/${link.id}`;
  if (navigator.share) {
    navigator.share({
      title: link.name,
      text: link.description,
      url,
    }).catch(() => alert('Share canceled or failed.'));
  } else {
    alert(`Your browser does not support sharing. Copy this link: ${url}`);
  }
}

const form = ref({
  title: '',
  amount: '',
  currency: 'UGX',
  description: '',
})

const showCreatePaymentLink = ref(false)
const paymentLinks = ref([
  { id: 1, name: 'Booking', amount: 50000, currency: 'UGX', description: 'Brief Description' },
])

// Components
const Button = { props: ['variant', 'class'], template: `<button :class="['px-4 py-2 rounded-md font-medium', class]"><slot/></button>` }
const Input = { props: ['id', 'placeholder', 'type'], template: `<input :id="id" :placeholder="placeholder" :type="type || 'text'" class="border px-3 py-2 rounded-md w-full"/>` }
const Textarea = { props: ['id', 'placeholder', 'rows'], template: `<textarea :id="id" :placeholder="placeholder" :rows="rows" class="border px-3 py-2 rounded-md w-full"></textarea>` }
const Label = { props: ['for'], template: `<label :for="for" class="block text-sm font-medium text-gray-700 mb-1"><slot/></label>` }
const Select = { template: `<div><slot/></div>` }
const SelectTrigger = { template: `<div><slot/></div>` }
const SelectValue = { template: `<div><slot/></div>` }
const SelectContent = { template: `<div><slot/></div>` }
const SelectItem = { template: `<div><slot/></div>` }
</script>
