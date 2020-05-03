<template>
  <sui-segment class="placeholder" :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }">
    <sui-header class="icon">
      <sui-icon name="chrome"></sui-icon>O-oo-ops!
    </sui-header>
    <sui-button color="blue" @click.prevent="pushToBack()" >Return to the back page</sui-button>
  </sui-segment>
</template>

<script>
export default {
  metaInfo: {
    title: "Error"
  },
  methods: {
    pushToBack() {
      this.$router.push("/")
    }
  }
};
</script>

<style>
</style>