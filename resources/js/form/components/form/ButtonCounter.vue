<template>
  <a href="" @click.prevent="$emit($props.action)" class="flex items-center justify-center w-32 h-32 border border-midnight-300 text-center text-black">
    <slot />
  </a>
</template>
<script>
export default {
  
  props: {
    action: {
      type: String,
      default: null
    }
  },

}
</script>