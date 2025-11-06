<template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <!-- Header -->
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-semibold text-foreground">Finance</h1>
          <p class="text-sm text-muted-foreground">Finance</p>
        </div>
        <div class="flex items-center gap-2">
          <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-primary/90 transition-colors">
            <span class="mr-2">👥</span>
            Beneficiaries
          </button>
          <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-primary/90 transition-colors">
            <span class="mr-2">🔗</span>
            Payment Links
          </button>
        </div>
      </div>

      <!-- Currency Tabs -->
      <div class="flex gap-1">
        <button
          v-for="currency in currencyTabs"
          :key="currency"
          @click="setActiveCurrency(currency)"
          :class="[
            'px-4 py-2 text-sm font-medium rounded-lg transition-colors',
            activeCurrency === currency
              ? 'bg-green-600 text-white'
              : 'text-muted-foreground hover:text-foreground hover:bg-muted'
          ]"
        >
          {{ currency }}
        </button>
      </div>

      <!-- Balance Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-card text-card-foreground border border-border rounded-lg shadow-sm">
          <div class="p-6 pb-2">
            <h3 class="text-center text-muted-foreground font-semibold">Available Balance</h3>
          </div>
          <div class="p-6 pt-0">
            <div class="text-center">
              <div class="text-3xl font-bold text-foreground">
                <span class="text-sm text-muted-foreground mr-2">{{ activeCurrency }}</span>0
              </div>
            </div>
          </div>
        </div>

        <div class="bg-card text-card-foreground border border-border rounded-lg shadow-sm">
          <div class="p-6 pb-2">
            <h3 class="text-center text-muted-foreground font-semibold">Total Balance</h3>
          </div>
          <div class="p-6 pt-0">
            <div class="text-center">
              <div class="text-3xl font-bold text-foreground">
                <span class="text-sm text-muted-foreground mr-2">{{ activeCurrency }}</span>0
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center text-sm text-muted-foreground">
        Please note: Payments are only active for verified accounts.
      </div>

      <!-- Finance Tabs -->
      <div class="flex gap-1 border-b border-border">
        <button
          v-for="tab in financeTabs"
          :key="tab.id"
          @click="setActiveTab(tab.id)"
          :class="[
            'px-4 py-2 text-sm font-medium border-b-2 transition-colors',
            activeTab === tab.id
              ? 'border-primary text-primary bg-primary/5'
              : 'border-transparent text-muted-foreground hover:text-foreground'
          ]"
        >
          {{ tab.name }}
        </button>
      </div>

      <!-- Tab Content -->
      <div v-if="activeTab === 'collections'">
        <div class="border border-border rounded-lg overflow-hidden">
          <table class="w-full">
            <thead class="bg-muted/50">
              <tr>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Type</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Customer</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Currency</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Amount</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Method</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="6" class="text-center py-16">
                  <div class="flex flex-col items-center">
                    <div class="w-12 h-12 bg-muted rounded-full flex items-center justify-center mb-4">
                      <svg class="h-6 w-6 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                    </div>
                    <p class="text-muted-foreground">No payments</p>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div v-else-if="activeTab === 'transfers'">
        <div class="relative max-w-md mb-6">
          <input 
            type="text" 
            placeholder="enter search term" 
            class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
          />
        </div>
        <div class="border border-border rounded-lg overflow-hidden">
          <table class="w-full">
            <thead class="bg-muted/50">
              <tr>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Date</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Source Currency</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Purpose</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Type</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Amount</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Status</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="7" class="text-center py-16">
                  <div class="flex flex-col items-center">
                    <div class="w-12 h-12 bg-muted rounded-full flex items-center justify-center mb-4">
                      <svg class="h-6 w-6 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                    </div>
                    <p class="text-muted-foreground">No transactions</p>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div v-else-if="activeTab === 'statement'">
        <div class="flex items-center gap-4 mb-6">
          <div class="flex items-center gap-2">
            <label class="text-sm text-muted-foreground">Date From</label>
            <input 
              type="text" 
              placeholder="dd/mm/yyyy" 
              class="w-40 flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
            />
          </div>
          <div class="flex items-center gap-2">
            <label class="text-sm text-muted-foreground">Date To</label>
            <input 
              type="text" 
              placeholder="dd/mm/yyyy" 
              class="w-40 flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
            />
          </div>
          <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-primary/90 transition-colors flex items-center">
            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
            </svg>
            Print
          </button>
        </div>

        <div class="text-center mb-6">
          <h2 class="text-xl font-semibold text-foreground mb-2">Agency Statement Report</h2>
          <p class="text-sm text-muted-foreground">Print Date: 2025/09/23</p>
        </div>

        <div class="border border-border rounded-lg overflow-hidden">
          <table class="w-full">
            <thead class="bg-muted/50">
              <tr>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Date</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Agency</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Details</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Currency</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Credit</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Debit</th>
                <th class="text-left p-4 text-sm font-medium text-muted-foreground">Balance</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="7" class="text-center py-16">
                  <div class="flex flex-col items-center">
                    <div class="w-12 h-12 bg-muted rounded-full flex items-center justify-center mb-4">
                      <svg class="h-6 w-6 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                    </div>
                    <p class="text-muted-foreground">No transactions</p>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
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
import { ref } from 'vue'
import DashboardLayout  from '@/Layouts/DashboardLayout.vue'

// Reactive state
const activeTab = ref('collections')
const activeCurrency = ref('UGX')

// Static data
const financeTabs = [
  { id: 'collections', name: 'Collections' },
  { id: 'transfers', name: 'Transfers' },
  { id: 'statement', name: 'Statement' }
]

const currencyTabs = ['UGX', 'KES', 'USD']

// Methods
const setActiveTab = (tabId) => {
  activeTab.value = tabId
}

const setActiveCurrency = (currency) => {
  activeCurrency.value = currency
}
</script>
