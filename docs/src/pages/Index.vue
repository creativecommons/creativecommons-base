<template>
  <Layout :sidebar="true">
    <div class="content">
      <h1>{{ $static.metadata.siteName }}</h1>
      <div class="screenshot">
        <p>Mock Screenshot</p>
      </div>
      <p>The CC WordPress Base Theme is a universal theme for all front-facing Creative Commons websites.</p>
      <div class="features">
        <strong>Features</strong>
        <ul>
          <li>Responsive site and images</li>
          <li>Customizable</li>
          <li></li>
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
      description: 'The ultimate static generated documentation theme for the JAM-stack'
    }
  },
  metaInfo() {
    return {
      title: this.description,
      meta: [
        { key: 'description', name: 'description', content: 'A theme for static site documentation based on Gridsome, ready to deploy to Netlify in one click.' }
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

.screenshot{
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

.git {
  margin: 3em 0 0;
  align-self: center;

  @include respond-above(md) {
    margin: 5em 0 0;
  }
}
</style>
