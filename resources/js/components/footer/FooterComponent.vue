<template>
  <sui-segment attached="bottom" :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false}">
    <footer class="footer__pusher">Footer</footer>
  </sui-segment>
</template>

<script>
export default {};
</script>

<style>
</style>