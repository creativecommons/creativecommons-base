<template>
	<Layout :sidebar="true">
		<div class="content">
			<h1>{{ $static.metadata.siteName }}</h1>
			<div class="screenshot-wrapper">
				<g-image src="~/screenshot.png" />
			</div>
			<p>
				Creative Commons (CC) Base is a universal WordPress theme for all front-facing
				Creative Commons websites.
			</p>
			<p>
				Although the CC Base source code is
				<a href="https://www.gnu.org/philosophy/free-sw.html" target="_blank"
					>free and open-source software</a
				>, it’s intended to be used for the CC brand only as part of the
				<a
					href="https://cc-vocabulary.netlify.app/?path=/story/vocabulary-introduction--page"
					target="_blank"
					>CC Vocabulary</a
				>. To learn more about the policies and licenses governing the use of
				the theme, view
				<a href="https://creativecommons.org/policies" target="_blank"
					>Policies - Creative Commons</a
				>.
			</p>
			<div class="content-inner">
				<h2>Why CC Base ?</h2>
				<ul>
					<li>
						Provides uniformity in design and improves the ease of maintenance:
						The CC Base theme is used across the Creative Commons ecosystem
						and as a consequence, all the websites are uniform and are generally
						easier to maintain.
					</li>
					<li>
						Reduces the barrier of entry to contributing: CC Base theme is
						essentially a WordPress theme, so anyone with little to no knowledge
						of web design can easily start contributing to CC websites. To learn
						more about contributing to CC Base theme, see the
						<a href="#">Contributing</a> section.
					</li>
				</ul>
			</div>
			<div class="content-inner">
				<h2>Features of the CC Base</h2>
				<ul>
					<li>Responsive site and images</li>
					<li>Customizable</li>
				</ul>
			</div>
		</div>
	</Layout>
</template>

<static-query>
query {
	metadata {
		siteName
	}
}
</static-query>

<script>
export default {
	data() {
		return {
			description:
				'Community facing documentation for the Creative Commons WordPress Base Theme.',
		}
	},
	metaInfo() {
		return {
			title: this.description,
			meta: [
				{
					key: 'description',
					name: 'description',
					content:
						'Community facing documentation for the Creative Commons WordPress Base Theme, start building CC Websites fast.',
				},
			],
		}
	},
}
</script>

<style lang="scss" scoped>
.content {
	display: flex;
	flex-direction: column;
}

.screenshot-wrapper {
	width: 100%;
	height: auto;
	display: flex;
	border: 1px solid lightgrey;
	padding-bottom: 2em;
	margin-bottom: 3em;
}

h1 {
	text-align: center;
	max-width: 600px;

	@include respond-above(md) {
		max-width: 1000px;
	}
}

h2 {
	font-size: 1.4rem;
	margin: 0;
}

nav {
	display: flex;
	justify-content: space-between;
	flex-direction: column;

	@include respond-above(sm) {
		flex-direction: row;
	}
}

.content-inner {
	margin-bottom: 1em;
}
</style>
