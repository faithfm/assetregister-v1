<template>
	<v-app-bar
		:clipped-left="$vuetify.breakpoint.lgAndUp"
		app
		color="light-blue darken-4"
		dark
		flat
	>
		<v-app-bar-nav-icon @click="$emit('toggle-drawer')"></v-app-bar-nav-icon>
		<v-img
			src="/faithfm-white-R4.png"
			alt="Faith FM logo"
			max-width="125"
			class="d-flex align-self-center"
		></v-img>
		<v-spacer class="d-none d-sm-flex"></v-spacer>

		<v-toolbar-title href="/" class="ml-0 pl-4 d-flex align-self-center">
			<span class="hidden-sm-and-down">{{ app.config.name }}</span>
		</v-toolbar-title>
		<v-spacer class="d-none d-sm-flex"></v-spacer>
		<v-text-field
			flat
			solo-inverted
			hide-details
			prepend-inner-icon="mdi-magnify"
			label="Search"
			class="d-none d-sm-flex align-self-center"
		></v-text-field>
		<v-spacer></v-spacer>

		<template v-if="app.guest">
			<v-btn class="d-flex align-self-center" href="/login">Login</v-btn>
		</template>

		<template v-else>
			<span class="mx-1 text-body-1 d-none d-sm-flex align-self-center">{{
				app.user.name
			}}</span>
			<v-btn @click="logout()" class="d-flex align-self-center">Logout</v-btn>
		</template>
	</v-app-bar>
</template>

<script>
export default {
	data: () => ({
		app: LaravelAppGlobals,
	}),
};
</script>
