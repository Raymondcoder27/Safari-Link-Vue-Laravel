<template>
  <DashboardLayout>
    <div class="flex">
      <!-- Sidebar -->
      <div class="w-64 border-r border-border p-6">
        <div class="space-y-6">
          <div>
            <h2 class="text-lg font-semibold text-foreground mb-4">My Business</h2>
            <p class="text-sm text-muted-foreground">My Business</p>
          </div>

          <div>
            <h3 class="text-sm font-medium text-foreground mb-3">Sections</h3>
            <nav class="space-y-1">
              <button
                v-for="section in sections"
                :key="section.id"
                @click="setActiveSection(section.id)"
                :class="[
                  'w-full text-left px-3 py-2 text-sm rounded-lg transition-colors',
                  activeSection === section.id
                    ? 'bg-green-600 text-white'
                    : 'text-muted-foreground hover:text-foreground hover:bg-muted'
                ]"
              >
                {{ section.name }}
              </button>
            </nav>
          </div>
        </div>
      </div>

      <!-- Main Content -->
      <div class="flex-1 p-6">
        <div class="max-w-4xl">
          <!-- General Information Section -->
          <div v-if="activeSection === 'general'" class="space-y-6">
            <div class="flex items-center justify-end">
              <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-primary/90 transition-colors">Save</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="space-y-2">
                <label for="name" class="text-sm font-medium text-foreground">Name</label>
                <input 
                  id="name" 
                  type="text" 
                  :value="'Harlycon'"
                  class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                />
              </div>
              <div class="space-y-2">
                <label for="slug" class="text-sm font-medium text-foreground">Slug (Subdomain name)</label>
                <input 
                  id="slug" 
                  type="text" 
                  :value="'harlycon'"
                  class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                />
              </div>
            </div>

            <div class="space-y-2">
              <label for="category" class="text-sm font-medium text-foreground">Category</label>
              <input 
                id="category" 
                type="text" 
                :value="'Car rental service'"
                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
              />
            </div>

            <div class="space-y-2">
              <label for="description" class="text-sm font-medium text-foreground">Description</label>
              <textarea 
                id="description" 
                rows="4"
                class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
              ></textarea>
            </div>

            <div class="space-y-2">
              <label for="terms" class="text-sm font-medium text-foreground">Terms & Condition</label>
              <textarea 
                id="terms" 
                rows="4"
                class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
              ></textarea>
            </div>

            <div>
              <h3 class="text-lg font-medium text-foreground mb-4">Contact information</h3>
              <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="space-y-2">
                  <label for="email" class="text-sm font-medium text-foreground">Email Address</label>
                  <input 
                    id="email" 
                    type="email" 
                    :value="'mwebraymond13@gmail.com'"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                  />
                </div>
                <div class="space-y-2">
                  <label for="phone-code" class="text-sm font-medium text-foreground">Phone Code</label>
                  <input 
                    id="phone-code" 
                    type="text" 
                    :value="'256'"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                  />
                </div>
                <div class="space-y-2">
                  <label for="phone" class="text-sm font-medium text-foreground">Phone</label>
                  <input 
                    id="phone" 
                    type="text" 
                    :value="'701627925'"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                  />
                </div>
              </div>
              <div class="mt-4 space-y-2">
                <label for="website" class="text-sm font-medium text-foreground">Website URL</label>
                <input 
                  id="website" 
                  type="url"
                  class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                />
              </div>
            </div>

            <div>
              <h3 class="text-lg font-medium text-foreground mb-4">Address information</h3>
              <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="space-y-2">
                  <label for="address" class="text-sm font-medium text-foreground">Address</label>
                  <input 
                    id="address" 
                    type="text"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                  />
                </div>
                <div class="space-y-2">
                  <label for="city" class="text-sm font-medium text-foreground">City</label>
                  <input 
                    id="city" 
                    type="text"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                  />
                </div>
                <div class="space-y-2">
                  <label for="postal" class="text-sm font-medium text-foreground">Postal Code</label>
                  <input 
                    id="postal" 
                    type="text"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                  />
                </div>
              </div>
              <div class="mt-4 space-y-2">
                <label for="country" class="text-sm font-medium text-foreground">Country</label>
                <select 
                  id="country"
                  :value="'uganda'"
                  class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                >
                  <option value="uganda">Uganda (UG)</option>
                  <option value="kenya">Kenya (KE)</option>
                  <option value="tanzania">Tanzania (TZ)</option>
                </select>
              </div>
            </div>

            <div>
              <h3 class="text-lg font-medium text-foreground mb-4">Business Details</h3>
              <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="space-y-2">
                  <label for="business-category" class="text-sm font-medium text-foreground">Business Category</label>
                  <select 
                    id="business-category"
                    :value="'car-rental'"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                  >
                    <option value="car-rental">Car rental service</option>
                    <option value="tour-operator">Tour operator</option>
                    <option value="hotel">Hotel</option>
                  </select>
                </div>
                <div class="space-y-2">
                  <label for="company-size" class="text-sm font-medium text-foreground">Company Size</label>
                  <select 
                    id="company-size"
                    :value="'1'"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                  >
                    <option value="1">1 (Just me)</option>
                    <option value="2-10">2-10 employees</option>
                    <option value="11-50">11-50 employees</option>
                  </select>
                </div>
                <div class="space-y-2">
                  <label for="business-volume" class="text-sm font-medium text-foreground">Business Volume (Monthly booking)</label>
                  <select 
                    id="business-volume"
                    :value="'0-10'"
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                  >
                    <option value="0-10">0 - 10</option>
                    <option value="11-50">11 - 50</option>
                    <option value="51-100">51 - 100</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="flex justify-end pt-6">
              <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-primary/90 transition-colors">Save</button>
            </div>
          </div>

          <!-- KYC Verification Documents Section -->
          <div v-else-if="activeSection === 'kyc'" class="space-y-6">
            <div class="grid gap-6">
              <div class="bg-card text-card-foreground border-2 border-dashed border-muted-foreground/25 rounded-lg shadow-sm">
                <div class="flex flex-col items-center justify-center py-12 p-6">
                  <div class="w-16 h-16 bg-primary rounded-lg flex items-center justify-center mb-4">
                    <svg class="h-8 w-8 text-primary-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                  </div>
                  <p class="text-sm text-primary font-medium">CLICK TO UPLOAD CERTIFICATE OF INCORPORATION</p>
                </div>
              </div>

              <div class="bg-card text-card-foreground border-2 border-dashed border-muted-foreground/25 rounded-lg shadow-sm">
                <div class="flex flex-col items-center justify-center py-12 p-6">
                  <div class="w-16 h-16 bg-primary rounded-lg flex items-center justify-center mb-4">
                    <svg class="h-8 w-8 text-primary-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                  </div>
                  <p class="text-sm text-primary font-medium text-center">
                    CLICK TO UPLOAD CERTIFIED MEMORANDUM AND ARTICLES OF ASSOCIATION
                  </p>
                </div>
              </div>

              <div class="bg-card text-card-foreground border-2 border-dashed border-muted-foreground/25 rounded-lg shadow-sm">
                <div class="flex flex-col items-center justify-center py-12 p-6">
                  <div class="w-16 h-16 bg-primary rounded-lg flex items-center justify-center mb-4">
                    <svg class="h-8 w-8 text-primary-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                  </div>
                  <p class="text-sm text-primary font-medium text-center">
                    CLICK TO UPLOAD BOTH SIDES OF DIRECTORS NATIONAL I.D, DRIVING LICENSE OR PASSPORT
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Settings Section -->
          <div v-else-if="activeSection === 'settings'" class="space-y-6">
            <div class="flex items-center justify-end">
              <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-primary/90 transition-colors">Save</button>
            </div>

            <div class="bg-card text-card-foreground border border-border rounded-lg shadow-sm">
              <div class="p-6">
                <div class="flex flex-col items-center justify-center py-8">
                  <div class="w-16 h-16 bg-primary rounded-lg flex items-center justify-center mb-4">
                    <svg class="h-8 w-8 text-primary-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                  </div>
                  <p class="text-sm text-primary font-medium">CLICK TO CHANGE LOGO</p>
                </div>
              </div>
            </div>

            <div class="w-24 h-16 bg-muted rounded border-2 border-dashed border-muted-foreground/25 flex items-center justify-center">
              <span class="text-xs text-muted-foreground">2/3</span>
            </div>

            <div class="bg-card text-card-foreground border border-border rounded-lg shadow-sm">
              <div class="p-6 pb-2">
                <div class="flex items-center justify-between">
                  <h3 class="font-semibold text-foreground">SOCIAL LINKS</h3>
                  <div class="flex gap-2">
                    <button class="bg-green-600 text-white px-3 py-1.5 text-sm rounded-md hover:bg-primary/90 transition-colors flex items-center">
                      <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                      </svg>
                      Add
                    </button>
                    <button class="bg-primary/10 text-primary px-3 py-1.5 text-sm rounded-md border border-primary/20 hover:bg-primary/20 transition-colors">
                      Save
                    </button>
                  </div>
                </div>
              </div>
              <div class="p-6 pt-0">
                <div class="flex items-center gap-4">
                  <select class="w-32 flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                    <option value="facebook">Facebook</option>
                    <option value="twitter">Twitter</option>
                    <option value="instagram">Instagram</option>
                  </select>
                  <input 
                    placeholder="URL" 
                    class="flex-1 flex h-10 rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                  />
                  <div class="flex items-center gap-2">
                    <label class="relative inline-flex items-center cursor-pointer">
                      <input type="checkbox" class="sr-only peer" checked />
                      <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                    </label>
                    <span class="text-sm text-foreground">Enable</span>
                  </div>
                  <button class="text-destructive hover:bg-destructive/10 p-2 rounded-md transition-colors">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="space-y-6">
              <div class="bg-card text-card-foreground border border-border rounded-lg shadow-sm">
                <div class="p-6 pb-2">
                  <h3 class="font-semibold text-foreground">Maintenance Mode</h3>
                </div>
                <div class="p-6 pt-0">
                  <div class="flex items-center gap-3">
                    <label class="relative inline-flex items-center cursor-pointer">
                      <input type="checkbox" class="sr-only peer" />
                      <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                    </label>
                    <span class="text-sm text-foreground">Disable Website</span>
                  </div>
                </div>
              </div>

              <div class="bg-card text-card-foreground border border-border rounded-lg shadow-sm">
                <div class="p-6 pb-2">
                  <h3 class="font-semibold text-foreground">Collection fees</h3>
                </div>
                <div class="p-6 pt-0">
                  <div class="flex items-center gap-3">
                    <label class="relative inline-flex items-center cursor-pointer">
                      <input type="checkbox" class="sr-only peer" />
                      <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                    </label>
                    <span class="text-sm text-foreground">Consume collection fees from clients</span>
                  </div>
                </div>
              </div>

              <div class="bg-card text-card-foreground border border-border rounded-lg shadow-sm">
                <div class="p-6 pb-2">
                  <h3 class="font-semibold text-foreground">Blog Settings</h3>
                </div>
                <div class="p-6 pt-0">
                  <div class="flex items-center gap-3">
                    <label class="relative inline-flex items-center cursor-pointer">
                      <input type="checkbox" class="sr-only peer" />
                      <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                    </label>
                    <span class="text-sm text-foreground">Enable Blog</span>
                  </div>
                </div>
              </div>

              <div class="bg-card text-card-foreground border border-border rounded-lg shadow-sm">
                <div class="p-6 pb-2">
                  <h3 class="font-semibold text-foreground">Shop Settings</h3>
                </div>
                <div class="p-6 pt-0">
                  <div class="flex items-center gap-3">
                    <label class="relative inline-flex items-center cursor-pointer">
                      <input type="checkbox" class="sr-only peer" />
                      <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                    </label>
                    <span class="text-sm text-foreground">Enable Shop</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="flex justify-end pt-6">
              <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-primary/90 transition-colors">Save</button>
            </div>
          </div>

          <!-- Footer -->
          <div class="pt-8">
            <p class="text-xs text-muted-foreground">© 2025 Safari-Link, All rights Reserved</p>
          </div>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>

<script setup>
import { ref } from 'vue'
import DashboardLayout  from '@/Layouts/DashboardLayout.vue'

// Reactive state
const activeSection = ref('general')

// Static data
const sections = [
  { id: 'general', name: 'General Information' },
  { id: 'kyc', name: 'KYC Verification Documents' },
  { id: 'settings', name: 'Settings' }
]

// Methods
const setActiveSection = (sectionId) => {
  activeSection.value = sectionId
}
</script>
