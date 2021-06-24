<template>
	<div class="container">
		<div class="copy-content-wrapper">
			<button
				type="button"
				v-clipboard:copy="text"
				v-clipboard:success="onCopy"
				v-clipboard:error="onError"
			>
				<span>{{ message }}</span>
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
			this.message = 'Copied to clipboard!'

			setTimeout(() => (this.message = ''), 3000)
		},
		onError: function (e) {
			this.message = 'Failed to copy to clipboard!'

			setTimeout(() => (this.message = ''), 3000)
		},
	},
}
</script>

<style>
span {
	display: block;
	padding-right: 0.2em;
}

button {
	position: absolute;
	top: 0.8px;
	background: none;
	border: none;
	right: -0em;
	cursor: pointer;
	display: flex;
	align-items: center;
}

.icon,
span {
	color: #767676;
}
</style>
