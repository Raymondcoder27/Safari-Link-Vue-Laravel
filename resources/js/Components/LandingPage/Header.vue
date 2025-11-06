<script setup>
import { ref } from 'vue'
import Button from '@/Components/Ui/Button.vue'
import { Menu, X } from 'lucide-vue-next'
import { Link } from '@inertiajs/vue3'


const isMenuOpen = ref(false)
</script>

<template>
  <header class="sticky top-0 z-50 w-full border-b bg-gray-900 text-black dark:bg-gray-900/95 backdrop-blur supports-[backdrop-filter]:bg-white/60 dark:supports-[backdrop-filter]:bg-gray-900/60">
    <div class="container mx-auto flex h-16 items-center justify-between px-4">
      <!-- Logo -->
      <div class="flex items-center space-x-2">
        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-green-600">
          <span class="text-lg font-bold text-white">S</span>
        </div>
        <span class="text-xl font-bold text-gray-900 dark:text-white">Safari-Link</span>
      </div>

      <!-- Desktop Navigation -->
      <nav class="hidden md:flex items-center space-x-8">
        <a href="#features" class="text-sm font-medium hover:text-green-600 transition-colors">Features</a>
        <!-- <a href="#pricing" class="text-sm font-medium hover:text-green-600 transition-colors">Pricing</a> -->
         <!-- <a href="/pricing" class="text-sm font-medium hover:text-green-600 transition-colors">Pricing</a> -->
           <Link :href="route('pricing')" class="text-sm font-medium hover:text-green-600 transition-colors">Pricing</Link>
        <a href="#testimonials" class="text-sm font-medium hover:text-green-600 transition-colors">Success Stories</a>
        <a href="#contact" class="text-sm font-medium hover:text-green-600 transition-colors">Contact</a>
      </nav>

      <!-- Desktop Buttons -->
      <div class="hidden md:flex items-center space-x-4">
        <Button class="text-black">
          <Link :href="route('login')" class="w-full" type="button" variant="ghost" size="sm">Sign In</Link>
        </Button>
        <!-- <Button variant="ghost" size="sm">Sign In</Button> -->
        <!-- <Button size="sm" class="bg-green-600 hover:bg-green-500">Start Free Trial</Button> -->
         <Button class="bg-green-600 hover:bg-green-500 text-white" size="sm">
          <Link :href="route('register')"  type="button" variant="ghost">Start Free Trial</Link>
          </Button>
      </div>

      <!-- Mobile Menu Button -->
      <button class="md:hidden" @click="isMenuOpen = !isMenuOpen">
        <component :is="isMenuOpen ? X : Menu" class="h-6 w-6 text-gray-900 dark:text-white" />
      </button>
    </div>

    <!-- Mobile Navigation -->
    <div v-if="isMenuOpen" class="md:hidden border-t bg-white dark:bg-gray-900">
      <nav class="container mx-auto py-4 px-4 space-y-4">
        <a href="#features" class="block text-sm font-medium hover:text-green-600 transition-colors">Features</a>
        <!-- <a href="#pricing" class="block text-sm font-medium hover:text-green-600 transition-colors">Pricing</a> -->
         <!-- <a href="/pricing" class="block text-sm font-medium hover:text-green-600 transition-colors">Pricing</a> -->
           <Link :h-ref="route('pricing')" class="block text-sm font-medium hover:text-green-600 transition-colors">Pricing</Link>
        <a href="#testimonials" class="block text-sm font-medium hover:text-green-600 transition-colors">Success Stories</a>
        <a href="#contact" class="block text-sm font-medium hover:text-green-600 transition-colors">Contact</a>

        <div class="pt-4 space-y-2">
          <!-- <Button variant="ghost" size="sm" class="w-full">Sign In</Button> -->
          <Link :h-ref="route('login')" class="w-full" >Sign In</Link>
          <Button size="sm" class="w-full bg-green-600 hover:bg-green-500">Start Free Trial</Button>
        </div>
      </nav>
    </div>
  </header>
</template>

<style scoped>
/* No additional CSS needed; all Tailwind */
</style>
