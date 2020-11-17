<template>
	<div class="container">
		<!-- <p>{{ message }}</p> -->
		<div class="copy-content-wrapper">
			<button
				type="button"
				v-clipboard:copy="text"
				v-clipboard:success="onCopy"
				v-clipboard:error="onError"
			>
				<copy-icon class="icon" />
			</button>
			<pre>{{ text }}</pre>
		</div>
	</div>
</template>

<script>
import { CopyIcon } from 'vue-feather-icons'

export default {
	data() {
		return {
			message: '',
		}
	},
	components: {
		CopyIcon,
	},
	props: {
		text: {
			type: String,
			default: 'Some text',
		},
	},
	methods: {
		onCopy: function (e) {
			this.message = 'Copied'
		},
		onError: function (e) {
			this.message = 'Failed to copy'
		},
	},
}
</script>

<style>
button {
	position: absolute;
	top: 0.8px;
	background: none;
	border: none;
	right: -0em;
	outline: none;
}

.icon {
	color: #767676;
}
</style>
