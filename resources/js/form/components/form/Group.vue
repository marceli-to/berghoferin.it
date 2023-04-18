<template>
  <div :class="[error ? 'text-red-500' : '', `flex justify-between ${$props.cssClass}`]">
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
    cssClass: {
      type: String,
      default: ''
    }
  }
}
</script>