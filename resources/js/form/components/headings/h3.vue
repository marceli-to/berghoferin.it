<template>
  <h3 :class="`border-b border-midnight-400 mb-12 ${$props.cssClass}`">
    <slot />
  </h3>
</template>
<script>
export default {
  name: 'HeadingThree',

  props: {
    cssClass: {
      type: String,
      default: ''
    }
  }
}
</script>