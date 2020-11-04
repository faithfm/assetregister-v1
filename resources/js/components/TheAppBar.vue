<template>
	<v-app-bar :clipped-left="$vuetify.breakpoint.lgAndUp" app color="blue darken-3" dark>
		<v-app-bar-nav-icon @click="$emit('toggle-drawer')"></v-app-bar-nav-icon>
		<v-toolbar-title style="width: 300px" class="ml-0 pl-4">
			<span class="hidden-sm-and-down">{{ app.config.name }}</span>
		</v-toolbar-title>
		<v-text-field
			flat
			solo-inverted
			hide-details
			prepend-inner-icon="mdi-magnify"
			label="Search"
			class="hidden-sm-and-down"
		></v-text-field>
		<v-spacer></v-spacer>

        <template v-if="app.guest">
            <v-btn href="/login">Login</v-btn>
        </template>

        <template v-else>
    		<span class="mx-1">{{app.user.name}}&nbsp;</span>
            <v-btn @click="$emit('logout')">Logout</v-btn>
        </template>

		<!-- <v-btn icon>
			<v-icon>mdi-apps</v-icon>
		</v-btn>
		<v-btn icon>
			<v-icon>mdi-bell</v-icon>
		</v-btn>
		<v-btn icon large>
			<v-avatar size="32px" item>
				<v-img src="https://cdn.vuetifyjs.com/images/logos/logo.svg" alt="Vuetify"></v-img>
			</v-avatar>
		</v-btn> -->
	</v-app-bar>
</template>

<script>
export default {
	data: () => ({
        app: LaravelAppGlobals,
	}),
};
</script>
