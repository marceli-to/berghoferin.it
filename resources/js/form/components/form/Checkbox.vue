<template>
  <div class="relative">
    <label :for="id" class="break-words block hyphens-auto text-midnight-300 cursor-pointer pl-20 select-none">
      <input
        :id="id"
        type="checkbox"
        :value="modelValue"
        :placeholder="placeholder"
        @input="updateInput"
        class="opacity-0 absolute cursor-pointer h-0 w-0 t-8"
      />
      <span class="block w-12 h-12 rounded-full border border-midnight-300 absolute left-0 top-6"></span>
      <slot name="label"></slot>
    </label>
  </div>
</template>
<script>

export default {
  name: "FormCheckbox",
  props: {
    
    id: {
      type: String,
      default: "",
    },
    
    modelValue: {
      type: [String, Number],
      default: "",
    },

    type: {
      type: String,
      default: "text",
    },

    placeholder: {
      type: String,
      default: "",
    },
  },

  methods: {
    updateInput(event) {
      this.$emit("update:modelValue", event.target.value);
    }
  }
}
</script>

<style scoped>
input[type="checkbox"]:checked ~ span::before {
  @apply rounded-full bg-midnight-500 w-6 h-6 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2;
  content: "";
}

input[type="checkbox"]:checked ~ span {
  @apply border-midnight-500;
}

label:has(input[type="checkbox"]:checked) {
  @apply text-midnight-500;
}
</style>
