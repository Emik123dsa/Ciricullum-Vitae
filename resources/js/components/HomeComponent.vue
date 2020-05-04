<template>
  <div class="ui segment placeholder" :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }">
    <sui-grid class="two column stackable center aligned">
      <sui-divider :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }" vertical>&</sui-divider>
      <sui-grid-row class="aligned middle">
        <sui-grid-column>
          <sui-header :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }" icon>
            <sui-icon name="pdf file" class="outline"></sui-icon>Web & Developer
          </sui-header>
          <div class="field">
            <div class="ui search">
              <div class="ui icon input">
                <input class="prompt" type="text" placeholder="Find something here" />
                <i class="search icon" :class="{blue: this.$cookie.get('__at-es') === 'true' ? true : false }"></i>
              </div>
              <div class="results"></div>
            </div>
          </div>
        </sui-grid-column>
        <sui-grid-column>
          <sui-header :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }" icon>
            <sui-icon name="freebsd"></sui-icon>
            {{ text }}
          </sui-header>
          <div class="field">
            <sui-button :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }" color="blue" @click.native="pushAbout()">Let's get started</sui-button>
          </div>
        </sui-grid-column>
      </sui-grid-row>
    </sui-grid>
  </div>
</template>

<script>
export default {
  data() {
    return {
      text: "Emil Shari"
    };
  },
  created() {},
  metaInfo: {
      title: 'Home',
    },
  methods: {
    pushAbout() {
      this.$router.push('/about');
    }
  }
};
</script>

<style>
</style>