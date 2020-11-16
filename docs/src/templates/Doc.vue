<template>
	<Layout>
		<h1>
			{{ $page.doc.title }}
		</h1>
		<VueRemarkContent />
	</Layout>
</template>

<page-query>
query Doc($path: String!) {
	doc: doc(path: $path) {
		title
		description
	}
}
</page-query>

<script>
export default {
	metaInfo() {
		return {
			title: this.$page.doc.title,
			meta: [
				{
					key: 'description',
					name: 'description',
					content: this.$page.doc.description,
				},
			],
		}
	},
}
</script>
