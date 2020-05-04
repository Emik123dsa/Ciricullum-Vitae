<template>
  <div class="pusher">
    <vue-particles 
    class="bg-pusher bg-pusher__particles" 
    color="#2185d0"
    linesColor="#2185d0"
    ></vue-particles>
    <div ref="active" class="bg-pusher" :class="{'bg-pusher__background': this.$cookie.get('__at-es') === 'true' ? true : false}"></div>
    <div class="pusher pusher__wrapper">
      <sui-segment stripe vertical>
        <sui-container text>
          <Header />
          <sui-segment attached :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }">
            <Breadcrumb />
          </sui-segment>

          <transition name="slide-fade">
            <sui-segment attached :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }">
              <section class="pusher__menu pusher-context">
                <router-view />
              </section>
            </sui-segment>
          </transition>
          <Alert />
          <Footer />
        </sui-container>
      </sui-segment>
    </div>
  </div>
</template>

<script>
import Header from "./components/header/HeaderComponent";
import Footer from "./components/footer/FooterComponent";
import Alert from "./components/AlertComponent";
import Breadcrumb from "./components/global/Breadcrumb";

export default {
  components: {
    Header,
    Footer,
    Alert,
    Breadcrumb
  },
  methods: {
  },
  metaInfo: {
    title: "My Vue CV",
    meta: [
      { vmid: "description", property: "description", content: "My Vue CV" },
      { vmid: "og:title", property: "og:title", content: "My Vue CV" },
      {
        vmid: "og:description",
        property: "og:description",
        content: "My Vue CV"
      }
    ]
  }
};
</script>

<style lang="scss" scoped>
.slide-fade-enter-active {
  transition: all 1s ease;
}
.slide-fade-leave-active {
  transition: all 1s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-enter,
.slide-fade-leave-to {
  opacity: 0;
}

.bg-pusher {
  position: fixed;
  width: 100%;
  height: 100%;
  &__particles {
    //transform: rotate(180deg);
    opacity: 1;
    z-index: 1;
  }
  &__background {
    background: #0c0c0c;
  }
}

.pusher {
  &__wrapper {
    position: absolute;
    transform: translateX(-50%);
    left: 50%;
    z-index: 99;
  }
}

</style>