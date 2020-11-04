<template>
	<v-snackbar
		:timeout="timeout"
		:color="color"
		:top="top"
		v-model="active"
		class="application"
	>
		{{ text }}

		<template v-slot:action="{ attrs }">
			<v-btn icon v-bind="attrs" @click="active = false" >
				<v-icon small v-if="icon.length > 0">
					{{ icon }}
				</v-icon>
			</v-btn>
		</template>
	</v-snackbar>
</template>


<script>
export default {
  data() {
    return {
      active: false,
      text: '',
      icon: '',
      color: 'info',
      timeout: -1,
      top: true,
    };
  },
  methods: {
    show(options = {}) {
      if (this.active) {
        this.close();
        this.$nextTick(() => this.show(options));
        return;
      }
      Object.keys(options).forEach(field => (this[field] = options[field]));
      this.active = true;
    },
    close() {
      this.active = false;
    },
    dismiss() {
      if (this.dismissible) {
        this.active = false;
      }
    },
  },
};
</script>