<template>
  <h2 :class="`${$props.cssClass}`">
    <slot />
  </h2>
</template>
<script>
export default {
  name: 'HeadingTwo',

  props: {
    cssClass: {
      type: String,
      default: ''
    }
  }
}
</script>