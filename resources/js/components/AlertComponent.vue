<template>
  <sui-message v-bind:style="{border: this.$cookie.get('__at-es') === 'true' ? '1px solid #555 !important' : false}" attached v-if="activeAlert && isAlert" :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }">
    <sui-icon name="close" @click.prevent="removeAlert()"></sui-icon>
    <sui-message-header>Thank you so much for reaching me out</sui-message-header>
    <sui-message-list>
      <sui-message-item>You can just check out my site CV as much as you want</sui-message-item>
      <sui-message-item>I'm eager to fetch any feedback from you as soon as possible</sui-message-item>
    </sui-message-list>
  </sui-message>
</template>

<script>
export default {
  data() {
    return {
      isAlert: true
    };
  },
  computed: {
    activeAlert() {
      if (this.$cookie.get("__alert-active") == "true") {
        return true;
      } else {
        return false;
      }
    },
    testThis() {
      return "message";
    }
  },
  created() {
    var alertCookie = this.$cookie.get("__alert-active");

    if (!alertCookie) {
      this.$cookie.set("__alert-active", this.isAlert, { expires: "1Y" });
      this.isAlert = true;
    }
  },
  methods: {
    removeAlert() {
      var __alert_remove = false;
      //var alertCookie = this.$cookie.get("__alert-active");
      this.$cookie.set("__alert-active", __alert_remove, { expires: "1Y" });
      this.isAlert = __alert_remove;
    }
  },
  mounted() {
    //console.log(this.$cookie.get("__alert-active"));
    //console.log(this.$refs);
  }
};
</script>

<style>
</style>