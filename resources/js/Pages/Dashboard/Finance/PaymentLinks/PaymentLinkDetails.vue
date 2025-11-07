<!-- <template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-foreground">Payment Link Details</h1>
        <Button variant="outline" class="text-primary border-primary bg-transparent">
          <Copy class="h-4 w-4 mr-2" />
          Copy Link
        </Button>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
          <Card>
            <CardHeader>
              <CardTitle>Booking</CardTitle>
              <p class="text-sm text-muted-foreground">Brief Description</p>
            </CardHeader>
            <CardContent class="space-y-4">
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <p class="text-sm text-muted-foreground">Amount</p>
                  <p class="text-lg font-semibold">50000 UGX</p>
                </div>
                <div>
                  <p class="text-sm text-muted-foreground">Created</p>
                  <p class="text-lg font-semibold">Sep 8, 2025, 3:43:21 PM</p>
                </div>
              </div>

              <div>
                <p class="text-sm text-muted-foreground mb-2">Payment Link</p>
                <div class="flex items-center gap-2 p-3 bg-muted rounded-lg">
                  <code class="text-sm flex-1 text-foreground">
                    http://harlycon.tripesa.co/payment/296e563d-f949-4181-a05e-6e329ee7f671
                  </code>
                  <Button variant="ghost" size="sm">
                    <Copy class="h-4 w-4" />
                  </Button>
                </div>
              </div>
            </CardContent>
          </Card>

          <Card>
            <CardHeader>
              <CardTitle>Payment Requests</CardTitle>
            </CardHeader>
            <CardContent>
              <div class="flex flex-col items-center justify-center py-12">
                <div class="w-12 h-12 bg-muted rounded-full flex items-center justify-center mb-4">
                  <Info class="h-6 w-6 text-muted-foreground" />
                </div>
                <p class="text-muted-foreground">No payment requests found</p>
              </div>
            </CardContent>
          </Card>
        </div>

        <div class="space-y-6">
          <Card>
            <CardHeader>
              <CardTitle>Quick Actions</CardTitle>
            </CardHeader>
            <CardContent class="space-y-3">
              <Button variant="outline" class="w-full justify-start bg-transparent">
                <Mail class="h-4 w-4 mr-2" />
                Email To Client
              </Button>
              <Button variant="outline" class="w-full justify-start bg-transparent">
                <Copy class="h-4 w-4 mr-2" />
                Copy Link
              </Button>
              <Button variant="destructive" class="w-full justify-start">
                <Trash2 class="h-4 w-4 mr-2" />
                Delete Link
              </Button>
            </CardContent>
          </Card>

          <Card>
            <CardContent class="pt-6">
              <div class="space-y-2">
                <div class="flex items-center justify-between">
                  <span class="text-sm text-muted-foreground">Status:</span>
                  <Badge class="bg-green-100 text-green-800">Active</Badge>
                </div>
                <div class="flex items-center justify-between">
                  <span class="text-sm text-muted-foreground">Total Payment Requests:</span>
                  <span class="text-sm font-medium">0</span>
                </div>
              </div>
            </CardContent>
          </Card>
        </div>
      </div>

      <div class="pt-8">
        <p class="text-xs text-muted-foreground">© 2025 Safari-Link, All rights Reserved</p>
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { Copy, Mail, Trash2, Info } from 'lucide-vue-next'

// Local components
const Button = { props: ['variant', 'class'], template: `<button :class="class"><slot/></button>` }
const Card = { template: `<div class="card"><slot/></div>` }
const CardHeader = { template: `<div class="card-header"><slot/></div>` }
const CardContent = { template: `<div class="card-content"><slot/></div>` }
const CardTitle = { template: `<div class="font-bold text-lg"><slot/></div>` }
const Badge = { props: ['class'], template: `<span :class="class"><slot/></span>` }
</script> -->























<template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-foreground">Payment Link Details</h1>
        <button
          @click="copyLink"
          class="border border-green-600 text-green-600 px-4 py-2 rounded-md flex items-center bg-transparent hover:bg-green-50"
        >
          <Copy class="h-4 w-4 mr-2" />
          Copy Link
        </button>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
          <!-- Booking Details -->
          <div class="border rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-2">Booking</h2>
            <p class="text-sm text-gray-500 mb-4">Brief Description</p>

            <div class="grid grid-cols-2 gap-4">
              <div>
                <p class="text-sm text-gray-500">Amount</p>
                <p class="text-lg font-semibold">50,000 UGX</p>
              </div>
              <div>
                <p class="text-sm text-gray-500">Created</p>
                <p class="text-lg font-semibold">Sep 8, 2025, 3:43:21 PM</p>
              </div>
            </div>

            <div class="mt-4">
              <p class="text-sm text-gray-500 mb-1">Payment Link</p>
              <div class="flex items-center gap-2 p-3 bg-gray-50 rounded-md">
                <code class="text-sm flex-1 text-gray-800 break-all">
                  {{ paymentLink }}
                </code>
                <button
                  @click="copyLink"
                  class="bg-gray-100 hover:bg-gray-200 p-2 rounded-md"
                >
                  <Copy class="h-4 w-4 text-gray-600" />
                </button>
              </div>
            </div>
          </div>

          <!-- Payment Requests Table -->
          <div class="border rounded-lg">
            <div class="border-b px-4 py-3 font-semibold">Payment Requests</div>
            <div v-if="paymentRequests.length" class="overflow-x-auto">
              <table class="min-w-full text-sm">
                <thead class="bg-gray-50 text-gray-500 uppercase">
                  <tr>
                    <th class="px-4 py-2 text-left">Request ID</th>
                    <th class="px-4 py-2 text-left">Amount</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="request in paymentRequests"
                    :key="request.id"
                    class="border-t hover:bg-gray-50"
                  >
                    <td class="px-4 py-2">{{ request.id }}</td>
                    <td class="px-4 py-2">{{ request.amount.toLocaleString() }} UGX</td>
                    <td class="px-4 py-2">{{ request.status }}</td>
                    <td class="px-4 py-2">{{ request.date }}</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div v-else class="py-12 flex flex-col items-center justify-center">
              <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                <Info class="h-6 w-6 text-gray-400" />
              </div>
              <p class="text-gray-500 text-sm">No payment requests found</p>
            </div>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
          <div class="border rounded-lg p-4">
            <h2 class="font-semibold mb-3">Quick Actions</h2>
            <div class="flex flex-col gap-2">
              <button class="border px-4 py-2 rounded-md flex items-center hover:bg-gray-50">
                <Mail class="h-4 w-4 mr-2" /> Email To Client
              </button>
              <button class="border px-4 py-2 rounded-md flex items-center hover:bg-gray-50">
                <Copy class="h-4 w-4 mr-2" /> Copy Link
              </button>
              <button class="bg-red-600 text-white px-4 py-2 rounded-md flex items-center">
                <Trash2 class="h-4 w-4 mr-2" /> Delete Link
              </button>
            </div>
          </div>

          <div class="border rounded-lg p-4 space-y-2">
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Status:</span>
              <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Active</span>
            </div>
            <div class="flex justify-between text-sm">
              <span class="text-gray-500">Total Payment Requests:</span>
              <span class="font-medium">{{ paymentRequests.length }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="pt-8">
        <p class="text-xs text-gray-500 text-center">© 2025 Safari-Link, All rights Reserved</p>
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import { Loading } from 'notiflix/build/notiflix-loading-aio'
import { Notify } from 'notiflix/build/notiflix-notify-aio'
import { usePage } from '@inertiajs/vue3'

onMounted(async () => {
  try {
    Loading.circle('Loading Payment Link...')
    const res = await fetch(`/api/payment-links/${linkId}`)
    const data = await res.json()

    paymentLink.value = data.link
    paymentRequests.value = data.requests
    Notify.success('Payment link details loaded!')
  } catch (error) {
    Notify.failure('Failed to load payment link!')
    console.error(error)
  } finally {
    Loading.remove()
  }
})

const { props } = usePage()
const linkId = props?.id || props?.paymentLink?.id 

// const linkId = route.params.id
// const linkId = router.currentRoute.value.params.id

//using inertia
// const linkId = router.currentRoute.value.params.id

const paymentLink = ref(null)
const paymentRequests = ref([])

function copyLink() {
  if (paymentLink.value?.url) {
    navigator.clipboard.writeText(paymentLink.value.url)
    Notify.success('Payment link copied!')
  } else {
    Notify.warning('No link found to copy')
  }
}
</script>
