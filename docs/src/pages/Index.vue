<template>
  <Layout :sidebar="true">
    <div class="content">
      <h1>{{ $static.metadata.siteName }}</h1>
      <div class="screenshot">
        <p>Mock Screenshot</p>
      </div>
      <p>The CC WordPress Base Theme is a universal theme for all front-facing Creative Commons websites.</p>
			<p>
				Although CC WP Base Theme code is <a href="https://www.gnu.org/philosophy/free-sw.html" target="_blank">free software</a>, it’s intended to be used for the CC brand only as part of the <a href="https://cc-vocabulary.netlify.app/?path=/story/vocabulary-introduction--page" target="_blank">CC Vocabulary</a>. To learn more about the policies and licenses governing the use of the theme visit this <a href="https://creativecommons.org/policies" target="_blank">link</a>.
			</p>
			 <div  class="content-inner"> 
        <h2>Why CC WP Base Theme ?</h2>
        <ul>
          <li>Provides uniformity in design and improves the ease of maintenance: The CC WP Base Theme is used across the Creative Commons ecosystem and as a consequence, all the websites are uniform and are generally easier to maintain.</li>
          <li>Reduces the barrier of entry to contributing: CC WP Base theme is essentially a  WordPress theme, so anyone with little to no knowledge of web design can easily start contributing to CC websites. To learn more about contributing to CC WP Base Theme, please follow this <a href="#">link</a>.</li>
        </ul>
      </div>
      <div class="content-inner">
        <h2>Features of the CC WP Base Theme</h2>
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
      description: 'Community facing documentation for the Creative Commons WordPress Base Theme.'
    }
  },
  metaInfo() {
    return {
      title: this.description,
      meta: [
        { key: 'description', name: 'description', content: 'Community facing documentation for the Creative Commons WordPress Base Theme, start building CC Websites fast.' }
      ]
    }
  }
}
</script>

<style lang="scss" scoped>
.content {
	display: flex;
	flex-direction: column;
}

.screenshot {
	width: 100%;
	height: 30em;
	display: flex;
	align-items: center;
	justify-content: center;
	background-color: aqua;
	margin-bottom: 2em;
	font-weight: 500;
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
