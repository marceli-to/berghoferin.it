<template>
  <input
    :id="id"
    :type="type"
    :value="modelValue"
    :placeholder="placeholder"
    @input="updateInput"
    class="border-0 border-b border-b-midnight-300 focus:border-midnight-300 ring-0 focus:ring-0 px-0 py-0 h-36 text-md placeholder:text-md placeholder:leading-none placeholder:text-midnight-500 xl:placeholder:text-midnight-300 text-midnight-500"
  />
</template>
<script>
export default {
  name: "FormInput",
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
};
</script>