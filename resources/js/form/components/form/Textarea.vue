<template>
  <textarea
    :id="id"
    :type="type"
    :value="modelValue"
    :placeholder="placeholder"
    @input="updateInput"
    class="border-0 ring-0 focus:ring-0 px-0 py-0 min-h-[200px] w-full text-md placeholder:text-md placeholder:text-midnight-300 text-midnight-500">
  </textarea>
</template>
<script>
export default {
  name: "FormTextarea",
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