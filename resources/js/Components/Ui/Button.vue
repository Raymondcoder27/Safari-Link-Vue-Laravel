<script setup>
import { defineProps } from 'vue'
import { computed } from 'vue'

const props = defineProps({
  size: {
    type: String,
    default: 'md', // sm | md | lg
  },
  variant: {
    type: String,
    default: 'solid', // solid | outline
  },
})

const sizeClass = computed(() => {
  switch (props.size) {
    case 'sm': return 'px-3 py-1 text-sm'
    case 'lg': return 'px-6 py-3 text-lg'
    default: return 'px-4 py-2 text-base'
  }
})

const variantClass = computed(() => {
  switch (props.variant) {
    case 'outline': return 'border'
    default: return ''
  }
})
</script>

<template>
  <button
    :class="[
      'inline-flex items-center justify-center font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2',
      sizeClass,
      variantClass,
      $attrs.class
    ]"
    v-bind="$attrs"
  >
    <slot />
  </button>
</template>
