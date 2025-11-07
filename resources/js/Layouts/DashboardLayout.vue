<script setup>
import { ref, computed } from "vue"
import { Link, usePage } from "@inertiajs/vue3"
import {
    LayoutDashboard,
    CreditCard,
    Users,
    Calendar,
    DollarSign,
    UserCheck,
    Settings,
    Bell,
    HelpCircle,
    Menu,
    X,
    FileChartLine
} from "lucide-vue-next"



// import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
// import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

const showingNavigationDropdown = ref(false);

const sidebarOpen = ref(false)
const page = usePage()
const pathname = computed(() => page.url)
const isActive = (href) => pathname.value === href || pathname.value.startsWith(href + '/')
// const isActive = (href) => pathname.value === href || pathname.value.startsWith(`${href}/`)


const navigation = [
    { name: "Dashboard", href: "/dashboard", icon: LayoutDashboard },
    { name: "Inventory", href: "/inventory", icon: Calendar },
    { name: "Bookings", href: "/bookings", icon: Calendar },
    { name: "Customers", href: "/customers", icon: Users },
    { name: "My Business", href: "/mybusiness", icon: Settings },
]

const financeNavigation = [
    { name: "Finance", href: "/finance", icon: DollarSign },
    { name: "Payment Links", href: "/payment-links", icon: CreditCard },
    { name: "Payment Links Details", href: "/payment-links-details", icon: CreditCard },
    { name: "Beneficiaries", href: "/beneficiaries", icon: UserCheck },
]

// Local UI Components
const Button = {
    template: `<button class="inline-flex items-center justify-center px-3 py-2 rounded-md font-medium transition bg-transparent hover:bg-gray-100 text-gray-800">
      <slot />
    </button>`
}

const Avatar = {
    template: `<div class="relative inline-flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full overflow-hidden">
      <slot />
    </div>`
}

const AvatarImage = {
    props: ["src"],
    template: `<img :src="src" class="w-full h-full object-cover" alt="Avatar"/>`
}

const AvatarFallback = {
    template: `<span class="text-xs font-semibold text-gray-600"><slot /></span>`
}

const Badge = {
    props: ["variant"],
    template: `<span class="px-2 py-1 text-xs font-semibold rounded-md bg-gray-200 text-gray-700">
      <slot />
    </span>`
}
</script>









<template>
    <div class="min-h-screen bg-background">
        <!-- Header -->
        <header class="bg-sidebar border-b border-sidebar-border">
            <div class="flex items-center justify-between px-4 py-3">
                <div class="flex items-center gap-4">
                    <Button variant="ghost" size="sm" class="md:hidden text-sidebar-foreground"
                        @click="sidebarOpen = !sidebarOpen">
                        <component :is="sidebarOpen ? X : Menu" class="h-5 w-5" />
                    </Button>
                    <Link href="/" class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <!-- <span class="text-primary-foreground font-bold text-sm">SL</span> -->
                         <!-- logo -->
                            <img src="/logo.png" alt="Safari-Link" class="w-15 h-15">
                    </div>
                    <span class="text-sidebar-foreground font-semibold text-lg">
                        Safari-Link
                    </span>
                    </Link>
                </div>

                <div class="flex items-center gap-4">
                    <div class="hidden md:flex items-center gap-2">
                        <span class="text-sm text-sidebar-foreground/70">CURRENT PLAN</span>
                        <Link href="/subscriptions">
                        <Badge variant="secondary"
                            class="bg-green-600 text-white cursor-pointer hover:bg-primary/90">
                            FREE
                        </Badge>
                        </Link>
                    </div>
                    <Button variant="ghost" size="sm" class="text-sidebar-foreground">
                        <Bell class="h-5 w-5" />
                    </Button>
                    <Button variant="ghost" size="sm" class="text-sidebar-foreground">
                        <HelpCircle class="h-5 w-5" />
                    </Button>
                    <!-- <div class="flex items-center gap-2">
                        <Avatar class="h-8 w-8">
                            <AvatarImage src="/placeholder.svg?height=32&width=32" />
                            <AvatarFallback>RM</AvatarFallback>
                        </Avatar>
                        <div class="hidden md:block">
                            <p class="text-sm font-medium text-sidebar-foreground">
                                RAYMOND MWEBE
                            </p>
                            <p class="text-xs text-sidebar-foreground/70">
                                mwebraymond13@gmail.com
                            </p>
                        </div>
                    </div> -->



                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                            >
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                </div>
            </div>
        </header>

        <div class="flex">
            <!-- Sidebar -->
            <aside :class="[
                'fixed inset-y-0 left-0 z-50 w-64 bg-background border-r border-border transform transition-transform duration-200 ease-in-out md:relative md:translate-x-0',
                sidebarOpen ? 'translate-x-0' : '-translate-x-full'
            ]">
                <div class="flex flex-col h-full pt-16 md:pt-0">
                    <nav class="flex-1 px-4 py-6 space-y-8">
                        <!-- <ul class="space-y-2">
              <li v-for="item in navigation" :key="item.name">
                <Link
                  :href="item.href"
                  class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-colors"
                  :class="pathname === item.href
                    ? 'bg-green-600 text-white'
                    : 'text-muted-foreground hover:bg-muted hover:text-foreground'"
                >
                  <component :is="item.icon" class="h-5 w-5" />
                  {{ item.name }}
                </Link>
              </li>
            </ul> -->
                        <ul class="space-y-2">
                            <li v-for="item in navigation" :key="item.name">
                                <Link :href="item.href"
                                    class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-colors"
                                    :class="isActive(item.href)
                                        ? 'bg-green-600 text-white'
                                        : 'text-muted-foreground hover:bg-muted hover:text-foreground'">
                                <component :is="item.icon" class="h-5 w-5" />
                                {{ item.name }}
                                </Link>
                            </li>
                        </ul>


                        <ul class="space-y-2">
                            <li v-for="item in financeNavigation" :key="item.name">
                                <Link :href="item.href"
                                    class="flex items-center gap-3 px-3 py-2 text-sm font-medium rounded-lg transition-colors"
                                    :class="isActive(item.href)
                                        ? 'bg-green-600 text-white'
                                        : 'text-muted-foreground hover:bg-muted hover:text-foreground'">
                                <component :is="item.icon" class="h-5 w-5" />
                                {{ item.name }}
                                </Link>
                            </li>
                        </ul>
                    </nav>

                    <div class="p-4 border-t border-border">
                        <p class="text-xs text-muted-foreground">
                            © 2025 Safari-Link, All rights Reserved
                        </p>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 min-h-screen">
                <slot />
            </main>
        </div>

        <!-- Mobile overlay -->
        <div v-if="sidebarOpen" class="fixed inset-0 z-40 bg-black/50 md:hidden" @click="sidebarOpen = false" />


          <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
    </div>
</template>


<style scoped>
</style>