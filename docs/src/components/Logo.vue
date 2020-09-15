<template>
  <g-link to="/" class="logo" title="Back to home">
      <div>
        <g-image src="~/assets/img/mock.svg" alt="logo" />
      </div>
  </g-link>
</template>

<style lang="scss" scoped>
.logo {
  height: 40px;
  display: block;
  transition: color .15s ease-in-out;
  color: $textBright;
  position: relative;
  perspective: 200px;

  div {
    height: 1.8em;
    width: 12em;
    position: absolute;
    top: 0;
    left: 0;
  }

  img {
    height: 100%;
    width: auto;
  }
}

.theme-enter-active, .theme-leave-active {
  transition: opacity .15s ease-in-out;
}
.theme-enter, .theme-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>


