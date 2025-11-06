<template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-foreground">Payment Link Details</h1>
        <Button variant="outline" class="text-primary border-primary bg-transparent">
          <Copy class="h-4 w-4 mr-2" />
          Copy Link
        </Button>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
          <!-- Booking Details -->
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

          <!-- Payment Requests -->
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

        <!-- Sidebar -->
        <div class="space-y-6">
          <!-- Quick Actions -->
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

          <!-- Status -->
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

      <!-- Footer -->
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
</script>
