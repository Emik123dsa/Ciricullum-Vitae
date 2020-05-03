<template>
    <div class="ui placeholder" :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false}">
      <div class="image header">
        <div class="line"></div>
        <div class="line"></div>
      </div>
      <div class="paragraph">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </div>
</template>

<script>
export default {
  props: {
    loading: Boolean
  }
};
</script>

<style lang="scss" scoped>
</style>