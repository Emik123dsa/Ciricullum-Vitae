<template>
  <sui-item-group divided v-if="!loading" class="card-animation-wrapper">
    <sui-item>
      <sui-item-image
        v-if="this.$cookie.get('__at-es') === 'false' ? true : false"
        size="small"
        class="photo_feature"
        src
      />
      <sui-item-content>
        <sui-item-header
          v-bind:style="{color: this.$cookie.get('__at-es') === 'true' && '#fff'}"
        >Emil Shari</sui-item-header>
        <sui-item-meta>
          <span
            class="price"
            v-bind:style="{color: this.$cookie.get('__at-es') === 'true' && '#fff'}"
          >Web & Developer</span>
        </sui-item-meta>
        <sui-item-description>
          <p v-bind:style="{color: this.$cookie.get('__at-es') === 'true' && '#fff'}">
            Hello! My name is Emil.
            <br />I'm being a Full Stack Web Developer.
            <br />I'm experienced with essential strides of the commercial/self projects building and serving.
            <br />Currently, I'm trying to enhance myself in the Front End framework, as Vue.js/Nuxt.js, but simultaneously, actively programming in the Back End, as PHP and his frameworks as well. (Essentially, Laravel).
          </p>
        </sui-item-description>
      </sui-item-content>
    </sui-item>
    <sui-item>
      <h3
        is="sui-header"
        :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }"
      >
        <sui-icon name="linux" />
        <sui-header-content>
          Programming stack:
          <sui-header-subheader>Let me count my professional programming skills quickly:</sui-header-subheader>
        </sui-header-content>
      </h3>
    </sui-item>
    <sui-item>
      <sui-list :class="{inverted: this.$cookie.get('__at-es') === 'true' ? true : false }">
        <sui-item>
          <sui-icon name="folder" color="blue"></sui-icon>
          <sui-item-content>
            <sui-item-header>Front-End</sui-item-header>
            <sui-list>
              <sui-item v-for="(item, i) in front" :key="i">
                <sui-icon size="large" :class="`${item.color}`" :name="`${item.img}`"></sui-icon>
                <sui-item-content>
                  <sui-item-header>{{item.name}}</sui-item-header>
                  <sui-item-description>{{item.description}}</sui-item-description>
                </sui-item-content>
              </sui-item>
            </sui-list>
          </sui-item-content>
        </sui-item>

        <sui-item>
          <sui-icon name="folder" color="red"></sui-icon>
          <sui-item-content>
            <sui-item-header>Back-End</sui-item-header>
            <sui-list>
              <sui-item v-for="(item, i) in back" :key="i">
                <sui-icon size="large" :class="`${item.color}`" :name="`${item.img}`"></sui-icon>
                <sui-item-content>
                  <sui-item-header>{{item.name}}</sui-item-header>
                  <sui-item-description>{{item.description}}</sui-item-description>
                </sui-item-content>
              </sui-item>
            </sui-list>
          </sui-item-content>
        </sui-item>

        <sui-item>
          <sui-item-content>
            <sui-list>
              <sui-item 
              v-for="(item, i) in def" 
              :key="i">
                <sui-icon size="large" :class="`${item.color}`" :name="`${item.img}`"></sui-icon>
                <sui-item-content>
                  <sui-item-header>{{item.name}}</sui-item-header>
                  <sui-item-description>{{item.description}}</sui-item-description>
                </sui-item-content>
              </sui-item>
            </sui-list>
          </sui-item-content>
        </sui-item>
      </sui-list>
    </sui-item>
  </sui-item-group>
  <div v-else> 
    <lazy-loading />
  </div>
</template>

<script>
import LazyLoading from "./LazyLoading";
export default {
  components: {
    LazyLoading
  },
  data() {
    return {
      loading: true,
      about: ""
    };
  },
  created() {
    this.loadAbout();
  },
  computed: {
    back() {
      return this.about.filter(function(item) {
        return item.parent === "back";
      });
    },
    front() {
      return this.about.filter(function(item) {
        return item.parent === "front";
      });
    },
    def() {
      return this.about.filter(function(item) {
        return item.parent === "default";
      });
    }
  },
  methods: {
    async loadAbout() {
      this.loading = true;
      await this.$store.dispatch("loadAbout");
      var features = this.$store.getters.aboutFeatures;
      this.about = !!features.data.data ? features.data.data : "";
      this.loading = false;
    }
  },
  metaInfo: {
    title: "About Me"
  }
};
</script>

<style lang="scss" scoped>
.photo {
  &_feature {
    background: url("https://emilshari.github.io/img/photo_face.png") no-repeat
      center center;
    background-size: cover;
  }
}

.card-animation-wrapper {
  animation: card ease 0.5s both;
}

.card-animation-wrapper {
  &:hover {
    //transform: translateY(-15px);
  }
}

.webpack {
  background: url("https://cdn.worldvectorlogo.com/logos/webpack.svg") no-repeat
    center center;
  background-size: contain;
}

@keyframes card {
  from {
    transform: translate3d(0, -30px, 0);
    opacity: 0;
  }

  to {
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}
</style>