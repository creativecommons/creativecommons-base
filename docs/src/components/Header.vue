<template>
	<header class="header" >
		<Logo />
		<nav class="nav">
			<MenuToggle v-if="menuToggle" />
		</nav>
	</header>
</template>

<script>
import MenuToggle from '~/components/MenuToggle.vue'
import Logo from '~/components/Logo.vue'

export default {
	components: {
		MenuToggle,
		Logo,
	},
	props: {
		menuToggle: {
			type: Boolean,
			default: true,
		},
	},
}
</script>

<style lang="scss" scoped>
.header {
	display: flex;
	justify-content: space-between;
	align-items: center;
	position: fixed;
	top: 0;
	right: -12px;
	left: 0;
	z-index: 10;
	padding: 15px 30px;
	border-bottom: 1px solid transparent;
	background-color: #fff;

	@include respond-above(sm);
}
</style>
