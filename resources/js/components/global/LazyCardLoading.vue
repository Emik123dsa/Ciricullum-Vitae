<template>
  <div class="ui three column grid stackable">
    <div class="column">
      <div class="ui raised segment" :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }">
        <div class="ui placeholder" :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }">
          <div class="image header">
            <div class="line"></div>
            <div class="line"></div>
          </div>
          <div class="paragraph">
            <div class="medium line"></div>
            <div class="short line"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="column">
      <div class="ui raised segment" :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }">
        <div class="ui placeholder" :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }">
          <div class="image header">
            <div class="line"></div>
            <div class="line"></div>
          </div>
          <div class="paragraph">
            <div class="medium line"></div>
            <div class="short line"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="column">
      <div class="ui raised segment" :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }">
        <div class="ui placeholder" :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }">
          <div class="image header">
            <div class="line"></div>
            <div class="line"></div>
          </div>
          <div class="paragraph">
            <div class="medium line"></div>
            <div class="short line"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>