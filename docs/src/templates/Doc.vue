<template>
	<Layout>
		<h1>
			{{ $page.doc.title }}
		</h1>
		<div class="markdown content" v-html="$page.doc.content" />
	</Layout>
</template>

<page-query>
query Doc($path: String!) {
	doc: doc(path: $path) {
		title
		path
		date(format: "D. MMMM YYYY")
		timeToRead
		content
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

