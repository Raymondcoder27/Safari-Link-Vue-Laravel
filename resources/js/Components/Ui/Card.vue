<script setup>
defineProps({
  tag: {
    type: String,
    default: 'div',
  },
})
</script>

<template>
  <component :is="tag" class="rounded-lg shadow-sm border p-4 bg-white" v-bind="$attrs">
    <slot />
  </component>
</template>
