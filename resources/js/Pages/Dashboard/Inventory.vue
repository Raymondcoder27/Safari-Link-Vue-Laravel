<!-- <script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { ref, onMounted } from 'vue'
import { Settings, Plus, MoreHorizontal } from 'lucide-vue-next'

const inventories = ref([])
const showForm = ref(false)
const newItem = ref('')
const newQuantity = ref('')
const startDate = ref('')
const endDate = ref('')

// Fetch inventories
async function fetchInventories() {
  const res = await fetch('/api/inventories')
  inventories.value = await res.json()
}

async function addInventory() {
  if (!newItem.value || !newQuantity.value) return alert('Please fill all fields')

  const res = await fetch('/api/inventories', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ item: newItem.value, quantity: Number(newQuantity.value) })
  })

  if (res.ok) {
    newItem.value = ''
    newQuantity.value = ''
    showForm.value = false
    await fetchInventories()
  } else {
    alert('Error adding inventory')
  }
}

onMounted(fetchInventories)
</script>

<template>
  <DashboardLayout>
    <div class="p-6 space-y-6">
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-semibold text-foreground">What's on offer</h1>
          <p class="text-sm text-muted-foreground">Manage and view your inventories</p>
        </div>

        <div class="flex items-center gap-4">
          <div class="flex items-center gap-2">
            <input v-model="startDate" placeholder="Start date" class="border rounded-md px-3 py-2 w-40" />
            <input v-model="endDate" placeholder="End date" class="border rounded-md px-3 py-2 w-40" />
          </div>
          <button class="border px-3 py-2 rounded-md">
            <MoreHorizontal class="h-4 w-4" />
          </button>
          <button
            class="bg-green-600 text-white px-4 py-2 rounded-md flex items-center"
            @click="showForm = !showForm"
          >
            <Plus class="h-4 w-4 mr-2" />
            Add New
          </button>
        </div>
      </div>

      <div v-if="showForm" class="border p-4 rounded-md bg-gray-50 space-y-3">
        <h2 class="text-lg font-semibold">Add Inventory Item</h2>
        <input
          v-model="newItem"
          placeholder="Item name"
          class="border px-3 py-2 rounded w-full"
        />
        <input
          v-model="newQuantity"
          type="number"
          placeholder="Quantity"
          class="border px-3 py-2 rounded w-full"
        />
        <button class="bg-blue-600 text-white px-4 py-2 rounded" @click="addInventory">
          Save
        </button>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div
          v-for="inv in inventories"
          :key="inv.id"
          class="bg-white shadow-sm rounded-lg p-6 border hover:shadow-md transition"
        >
          <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold">{{ inv.item }}</h3>
            <span class="text-gray-500 text-sm">Qty: {{ inv.quantity }}</span>
          </div>

          <div class="mt-4 flex gap-2">
            <button class="bg-green-600 text-white px-3 py-2 rounded-md flex items-center text-sm">
              <Settings class="h-4 w-4 mr-2" /> Settings
            </button>
            <button class="border px-3 py-2 rounded-md text-sm">
              View Details →
            </button>
          </div>
        </div>

        <div
          class="border-dashed border-2 border-gray-300 rounded-lg flex flex-col items-center justify-center py-12 hover:bg-gray-50 cursor-pointer"
          @click="showForm = true"
        >
          <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mb-4">
            <Plus class="h-6 w-6 text-white" />
          </div>
          <h3 class="text-lg font-medium text-gray-700">ADD INVENTORY</h3>
        </div>
      </div>

      <div class="pt-8">
        <p class="text-xs text-muted-foreground text-center">
          © 2025 Safari-Link, All rights Reserved
        </p>
      </div>
    </div>
  </DashboardLayout>
</template> -->




















































<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue'
import { ref, onMounted } from 'vue'
import { Plus, Settings, MoreHorizontal, MapPin, Bed, Calendar, DollarSign, CheckCircle, XCircle } from 'lucide-vue-next'

// State Management
const activeTab = ref('packages') // 'packages' or 'rooms'
const showAddDropdown = ref(false)
const showPackageForm = ref(false)
const showRoomForm = ref(false)

// Tour Package Form Data
const newPackage = ref({
  title: '',
  city: '',
  country: '',
  offering: '', // e.g., Safari, Cultural, Adventure
  type: '', // e.g., Group, Private, Family
  units: '', // e.g., Person, Couple, Group
  duration: '', // e.g., 1 Day, 3 Days
  categories: [],
  shortDescription: '',
  description: '',
  included: '',
  notIncluded: '',
  pricePerPerson: '',
  currency: 'USD',
  hasDeadline: false,
  allowInstallments: false,
  mapIframe: '',
  address: '',
  coordinates: '0,0',
  videoIframe: '',
  images: []
})

// Hotel Room Form Data
const newRoom = ref({
  name: '',
  capacity: 1,
  quantity: 1,
  priority: '',
  unitPrice: '',
  currency: 'USD',
  categories: [],
  shortDescription: '',
  description: '',
  amenities: [{ name: '', value: '' }],
  extraServices: [],
  images: []
})

// Mock Data (Replace with API later)
const packages = ref([
  {
    id: 1,
    title: 'Murchison Falls Safari',
    city: 'Kampala',
    country: 'Uganda',
    duration: '3 Days',
    price: 850,
    currency: 'USD',
    status: 'draft',
    image: '/african-elephant-in-savanna.jpg'
  },
  {
    id: 2,
    title: 'Gorilla Trekking Experience',
    city: 'Bwindi',
    country: 'Uganda',
    duration: '1 Day',
    price: 600,
    currency: 'USD',
    status: 'published',
    image: '/mountain-gorilla-in-forest.jpg'
  }
])

const rooms = ref([
  {
    id: 1,
    name: 'Deluxe Suite',
    capacity: 2,
    quantity: 5,
    price: 150,
    currency: 'USD',
    status: 'published',
    image: '/hotel-room-deluxe.jpg'
  },
  {
    id: 2,
    name: 'Standard Room',
    capacity: 1,
    quantity: 10,
    price: 80,
    currency: 'USD',
    status: 'draft',
    image: '/hotel-room-standard.jpg'
  }
])

// Toggle Add Dropdown
const toggleAddDropdown = () => {
  showAddDropdown.value = !showAddDropdown.value
}

// Show Form Functions
const addPackage = () => {
  showPackageForm.value = true
  showRoomForm.value = false
  showAddDropdown.value = false
}

const addRoom = () => {
  showRoomForm.value = true
  showPackageForm.value = false
  showAddDropdown.value = false
}

// Save Functions (Mock)
const savePackage = async () => {
  console.log('Saving package:', newPackage.value)
  // TODO: POST to /api/packages
  alert('Package saved successfully!')
  showPackageForm.value = false
  // Refresh list
  packages.value.push({ ...newPackage.value, id: Date.now() })
  resetPackageForm()
}

const saveRoom = async () => {
  console.log('Saving room:', newRoom.value)
  // TODO: POST to /api/rooms
  alert('Room saved successfully!')
  showRoomForm.value = false
  // Refresh list
  rooms.value.push({ ...newRoom.value, id: Date.now() })
  resetRoomForm()
}

// Reset Forms
const resetPackageForm = () => {
  newPackage.value = {
    title: '',
    city: '',
    country: '',
    offering: '',
    type: '',
    units: '',
    duration: '',
    categories: [],
    shortDescription: '',
    description: '',
    included: '',
    notIncluded: '',
    pricePerPerson: '',
    currency: 'USD',
    hasDeadline: false,
    allowInstallments: false,
    mapIframe: '',
    address: '',
    coordinates: '0,0',
    videoIframe: '',
    images: []
  }
}

const resetRoomForm = () => {
  newRoom.value = {
    name: '',
    capacity: 1,
    quantity: 1,
    priority: '',
    unitPrice: '',
    currency: 'USD',
    categories: [],
    shortDescription: '',
    description: '',
    amenities: [{ name: '', value: '' }],
    extraServices: [],
    images: []
  }
}

// Add Amenity Row
const addAmenity = () => {
  newRoom.value.amenities.push({ name: '', value: '' })
}

// Remove Amenity Row
const removeAmenity = (index) => {
  if (newRoom.value.amenities.length > 1) {
    newRoom.value.amenities.splice(index, 1)
  }
}
</script>

<template>
  <DashboardLayout>
    <div class="p-6 space-y-6">

      <!-- Header -->
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-2xl font-semibold text-foreground">What's on offer</h1>
          <p class="text-sm text-muted-foreground">Manage tour packages and hotel rooms</p>
        </div>

        <div class="flex items-center gap-4">
          <!-- Add New Dropdown -->
          <div class="relative" @click.outside="showAddDropdown = false">
            <button
              class="bg-green-600 text-white px-4 py-2 rounded-md flex items-center"
              @click="toggleAddDropdown"
            >
              <Plus class="h-4 w-4 mr-2" />
              Add New
            </button>
            <div
              v-if="showAddDropdown"
              class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-10"
            >
              <div
                class="px-4 py-2 hover:bg-gray-100 cursor-pointer"
                @click="addPackage"
              >
                Package
              </div>
              <div
                class="px-4 py-2 hover:bg-gray-100 cursor-pointer"
                @click="addRoom"
              >
                Room
              </div>
            </div>
          </div>

          <!-- Filters & Actions -->
          <div class="flex items-center gap-2">
            <input placeholder="Start date" class="border rounded-md px-3 py-2 w-40" />
            <input placeholder="End date" class="border rounded-md px-3 py-2 w-40" />
          </div>
          <button class="border px-3 py-2 rounded-md">
            <MoreHorizontal class="h-4 w-4" />
          </button>
        </div>
      </div>

      <!-- Tabs -->
      <div class="border-b">
        <div class="flex space-x-8">
          <button
            :class="`py-3 px-4 font-medium border-b-2 transition ${
              activeTab === 'packages'
                ? 'border-green-600 text-green-600'
                : 'border-transparent text-gray-600 hover:text-gray-900'
            }`"
            @click="activeTab = 'packages'"
          >
            Packages
          </button>
          <button
            :class="`py-3 px-4 font-medium border-b-2 transition ${
              activeTab === 'rooms'
                ? 'border-green-600 text-green-600'
                : 'border-transparent text-gray-600 hover:text-gray-900'
            }`"
            @click="activeTab = 'rooms'"
          >
            Rooms
          </button>
        </div>
      </div>

      <!-- Package Creation Form -->
      <div v-if="showPackageForm" class="bg-white p-6 rounded-lg shadow space-y-6">
        <div class="flex justify-between items-center">
          <h2 class="text-xl font-semibold">Create New Tour Package</h2>
          <button
            class="text-red-600 hover:text-red-800"
            @click="showPackageForm = false"
          >
            Cancel
          </button>
        </div>

        <!-- Basic Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium mb-1">Title</label>
            <input
              v-model="newPackage.title"
              class="w-full border rounded-md px-3 py-2"
              placeholder="e.g. Murchison Falls Safari"
            />
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">City</label>
            <input
              v-model="newPackage.city"
              class="w-full border rounded-md px-3 py-2"
              placeholder="e.g. Kampala"
            />
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Country</label>
            <select
              v-model="newPackage.country"
              class="w-full border rounded-md px-3 py-2"
            >
              <option value="">Select Country</option>
              <option value="Uganda">Uganda</option>
              <option value="Kenya">Kenya</option>
              <option value="Tanzania">Tanzania</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Duration</label>
            <select
              v-model="newPackage.duration"
              class="w-full border rounded-md px-3 py-2"
            >
              <option value="">Select Duration</option>
              <option value="1 Day">1 Day</option>
              <option value="2 Days">2 Days</option>
              <option value="3 Days">3 Days</option>
              <option value="5+ Days">5+ Days</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Price per Person</label>
            <input
              v-model="newPackage.pricePerPerson"
              type="number"
              class="w-full border rounded-md px-3 py-2"
              placeholder="e.g. 850"
            />
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Currency</label>
            <select
              v-model="newPackage.currency"
              class="w-full border rounded-md px-3 py-2"
            >
              <option value="USD">USD</option>
              <option value="UGX">UGX</option>
              <option value="KES">KES</option>
            </select>
          </div>
        </div>

        <!-- Description -->
        <div class="space-y-4">
          <label class="block text-sm font-medium">Short Description</label>
          <textarea
            v-model="newPackage.shortDescription"
            rows="2"
            class="w-full border rounded-md px-3 py-2"
            placeholder="Brief summary of the tour"
          ></textarea>
        </div>

        <div class="space-y-4">
          <label class="block text-sm font-medium">Full Description</label>
          <textarea
            v-model="newPackage.description"
            rows="4"
            class="w-full border rounded-md px-3 py-2"
            placeholder="Detailed itinerary, what to expect, etc."
          ></textarea>
        </div>

        <!-- What's Included / Not Included -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium mb-1">What's Included</label>
            <textarea
              v-model="newPackage.included"
              rows="4"
              class="w-full border rounded-md px-3 py-2"
              placeholder="e.g. Transport, Guide, Meals"
            ></textarea>
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">What's NOT Included</label>
            <textarea
              v-model="newPackage.notIncluded"
              rows="4"
              class="w-full border rounded-md px-3 py-2"
              placeholder="e.g. Flights, Tips, Personal Expenses"
            ></textarea>
          </div>
        </div>

        <!-- Media -->
        <div class="space-y-4">
          <label class="block text-sm font-medium">Map (Google Maps iframe)</label>
          <input
            v-model="newPackage.mapIframe"
            class="w-full border rounded-md px-3 py-2"
            placeholder="Copy and paste iframe code here"
          />
        </div>

        <div class="space-y-4">
          <label class="block text-sm font-medium">Address</label>
          <input
            v-model="newPackage.address"
            class="w-full border rounded-md px-3 py-2"
            placeholder="e.g. Bwindi Impenetrable Forest, Uganda"
          />
        </div>

        <div class="space-y-4">
          <label class="block text-sm font-medium">Video (YouTube iframe)</label>
          <input
            v-model="newPackage.videoIframe"
            class="w-full border rounded-md px-3 py-2"
            placeholder="Copy and paste embed code here"
          />
        </div>

        <!-- Images -->
        <div class="space-y-4">
          <label class="block text-sm font-medium">Package Images</label>
          <div class="border-dashed border-2 border-gray-300 rounded-md p-4 text-center">
            <input type="file" multiple class="hidden" id="packageImages" />
            <label for="packageImages" class="cursor-pointer">
              <div class="flex flex-col items-center">
                <Plus class="h-8 w-8 text-gray-400 mb-2" />
                <span class="text-sm text-gray-600">Add Images</span>
              </div>
            </label>
          </div>
        </div>

        <!-- Save Button -->
        <div class="flex justify-end pt-4">
          <button
            class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700"
            @click="savePackage"
          >
            Save Package
          </button>
        </div>
      </div>

      <!-- Room Creation Form -->
      <div v-if="showRoomForm" class="bg-white p-6 rounded-lg shadow space-y-6">
        <div class="flex justify-between items-center">
          <h2 class="text-xl font-semibold">Create New Hotel Room</h2>
          <button
            class="text-red-600 hover:text-red-800"
            @click="showRoomForm = false"
          >
            Cancel
          </button>
        </div>

        <!-- Basic Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium mb-1">Room Name</label>
            <input
              v-model="newRoom.name"
              class="w-full border rounded-md px-3 py-2"
              placeholder="e.g. Deluxe Suite"
            />
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Capacity</label>
            <input
              v-model="newRoom.capacity"
              type="number"
              class="w-full border rounded-md px-3 py-2"
              placeholder="e.g. 2"
            />
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Quantity</label>
            <input
              v-model="newRoom.quantity"
              type="number"
              class="w-full border rounded-md px-3 py-2"
              placeholder="e.g. 5"
            />
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Unit Price</label>
            <input
              v-model="newRoom.unitPrice"
              type="number"
              class="w-full border rounded-md px-3 py-2"
              placeholder="e.g. 150"
            />
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Currency</label>
            <select
              v-model="newRoom.currency"
              class="w-full border rounded-md px-3 py-2"
            >
              <option value="USD">USD</option>
              <option value="UGX">UGX</option>
              <option value="KES">KES</option>
            </select>
          </div>
        </div>

        <!-- Description -->
        <div class="space-y-4">
          <label class="block text-sm font-medium">Short Description</label>
          <textarea
            v-model="newRoom.shortDescription"
            rows="2"
            class="w-full border rounded-md px-3 py-2"
            placeholder="Brief summary of the room"
          ></textarea>
        </div>

        <div class="space-y-4">
          <label class="block text-sm font-medium">Full Description</label>
          <textarea
            v-model="newRoom.description"
            rows="4"
            class="w-full border rounded-md px-3 py-2"
            placeholder="Detailed features, view, amenities, etc."
          ></textarea>
        </div>

        <!-- Amenities -->
        <div class="space-y-4">
          <label class="block text-sm font-medium">Room Amenities</label>
          <div v-for="(amenity, index) in newRoom.amenities" :key="index" class="flex gap-2 mb-2">
            <input
              v-model="amenity.name"
              class="flex-1 border rounded-md px-3 py-2"
              placeholder="e.g. Air Conditioning"
            />
            <input
              v-model="amenity.value"
              class="flex-1 border rounded-md px-3 py-2"
              placeholder="e.g. Yes"
            />
            <button
              v-if="newRoom.amenities.length > 1"
              class="bg-red-100 text-red-600 px-2 rounded"
              @click="removeAmenity(index)"
            >
              <XCircle class="h-5 w-5" />
            </button>
          </div>
          <button
            class="bg-blue-100 text-blue-600 px-3 py-1 rounded text-sm"
            @click="addAmenity"
          >
            + Add Amenity
          </button>
        </div>

        <!-- Images -->
        <div class="space-y-4">
          <label class="block text-sm font-medium">Room Images</label>
          <div class="border-dashed border-2 border-gray-300 rounded-md p-4 text-center">
            <input type="file" multiple class="hidden" id="roomImages" />
            <label for="roomImages" class="cursor-pointer">
              <div class="flex flex-col items-center">
                <Plus class="h-8 w-8 text-gray-400 mb-2" />
                <span class="text-sm text-gray-600">Add Images</span>
              </div>
            </label>
          </div>
        </div>

        <!-- Save Button -->
        <div class="flex justify-end pt-4">
          <button
            class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700"
            @click="saveRoom"
          >
            Save Room
          </button>
        </div>
      </div>

      <!-- Packages List -->
      <div v-if="activeTab === 'packages'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="pkg in packages"
          :key="pkg.id"
          class="bg-white shadow-sm rounded-lg p-6 border hover:shadow-md transition relative"
        >
          <div class="flex items-start justify-between">
            <div class="flex-1">
              <h3 class="text-lg font-semibold">{{ pkg.title }}</h3>
              <p class="text-sm text-gray-600">{{ pkg.city }}, {{ pkg.country }}</p>
              <p class="text-sm text-gray-600 mt-1">{{ pkg.duration }}</p>
              <p class="text-lg font-bold mt-2">{{ pkg.currency }}{{ pkg.price }}</p>
            </div>
            <div class="flex flex-col items-end gap-2">
              <span
                :class="`inline-flex items-center px-2 py-1 text-xs rounded-full ${
                  pkg.status === 'published'
                    ? 'bg-green-100 text-green-800'
                    : 'bg-yellow-100 text-yellow-800'
                }`"
              >
                {{ pkg.status }}
              </span>
              <img
                :src="pkg.image"
                alt="Package"
                class="h-16 w-16 object-cover rounded-md"
              />
            </div>
          </div>

          <div class="mt-4 flex gap-2">
            <button class="bg-green-600 text-white px-3 py-2 rounded-md flex items-center text-sm">
              <Settings class="h-4 w-4 mr-2" /> Edit
            </button>
            <button class="border px-3 py-2 rounded-md text-sm">
              View Bookings →
            </button>
          </div>
        </div>

        <!-- Add New Package Card -->
        <div
          class="border-dashed border-2 border-gray-300 rounded-lg flex flex-col items-center justify-center py-12 hover:bg-gray-50 cursor-pointer"
          @click="addPackage"
        >
          <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mb-4">
            <Plus class="h-6 w-6 text-white" />
          </div>
          <h3 class="text-lg font-medium text-gray-700">ADD TOUR PACKAGE</h3>
        </div>
      </div>

      <!-- Rooms List -->
      <div v-if="activeTab === 'rooms'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="room in rooms"
          :key="room.id"
          class="bg-white shadow-sm rounded-lg p-6 border hover:shadow-md transition relative"
        >
          <div class="flex items-start justify-between">
            <div class="flex-1">
              <h3 class="text-lg font-semibold">{{ room.name }}</h3>
              <p class="text-sm text-gray-600">Capacity: {{ room.capacity }} guests</p>
              <p class="text-sm text-gray-600 mt-1">Available: {{ room.quantity }}</p>
              <p class="text-lg font-bold mt-2">{{ room.currency }}{{ room.price }}</p>
            </div>
            <div class="flex flex-col items-end gap-2">
              <span
                :class="`inline-flex items-center px-2 py-1 text-xs rounded-full ${
                  room.status === 'published'
                    ? 'bg-green-100 text-green-800'
                    : 'bg-yellow-100 text-yellow-800'
                }`"
              >
                {{ room.status }}
              </span>
              <img
                :src="room.image"
                alt="Room"
                class="h-16 w-16 object-cover rounded-md"
              />
            </div>
          </div>

          <div class="mt-4 flex gap-2">
            <button class="bg-green-600 text-white px-3 py-2 rounded-md flex items-center text-sm">
              <Settings class="h-4 w-4 mr-2" /> Edit
            </button>
            <button class="border px-3 py-2 rounded-md text-sm">
              View Bookings →
            </button>
          </div>
        </div>

        <!-- Add New Room Card -->
        <div
          class="border-dashed border-2 border-gray-300 rounded-lg flex flex-col items-center justify-center py-12 hover:bg-gray-50 cursor-pointer"
          @click="addRoom"
        >
          <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mb-4">
            <Bed class="h-6 w-6 text-white" />
          </div>
          <h3 class="text-lg font-medium text-gray-700">ADD HOTEL ROOM</h3>
        </div>
      </div>

      <!-- Footer -->
      <div class="pt-8">
        <p class="text-xs text-muted-foreground text-center">
          © 2025 Safari-Link, All rights Reserved
        </p>
      </div>
    </div>
  </DashboardLayout>
</template>

<style scoped>
/* Optional: subtle hover */
.card:hover {
  transform: translateY(-2px);
  transition: transform 0.2s ease;
}
</style>