<template>
  <div :class="[error ? 'text-red-500' : '', 'flex items-center justify-between mb-12']">
    <slot />
  </div>
</template>
<script>
export default {
  props: {
    error: {
      type: Boolean,
      default: false
    },
  }
}
</script>